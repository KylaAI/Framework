<?php
namespace System;
/**
 *
 */
use Helpers\DB;
use Helpers\Singleton;
class Model
{
    protected
        $sql,
        $table,
        $select,
        $order,
        $limit,
        $where,
        $whereData;
    protected static $instance=[];
    public static function gi(...$p){
        if(!isset(static::$instance[static::class]))
            static::$instance[static::class] = new static(...$p);
        return static::$instance[static::class];
    }
    public static function __callStatic($method, $param)
    {   
        $method = str_replace('t_','',$method);
        return self::gi()->{$method}(...$param);
    }
    public function table($table){
        $this->table = $table;
        return $this;
    }
    public function getTable(){
        return $this->table;
    }
    public function exec($sql,$data=[]){
        try {
            $where = (isset($this->where))?$this->where : null;
            $prep = DB::prepare($sql.$where);
            $data = (isset($this->whereData))?array_merge($data,$this->whereData):$data;
            $prep->execute($data);
            $this->null_data();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
        return $prep;
    }
    public function null_data(){
        $this->sql = null;
        $this->select = null;
        $this->order = null;
        $this->limit = null;
        $this->where = null;
        $this->whereData = null;
        return $this;
    }
    public function where(array $data, $prefix = "AND", $operator = '='){
        $sql = " WHERE ";
        $jml = count($data);
        $a= 1;
        foreach ($data as $key => $value) {
            $sql .= $key.' '.$operator.' :w_'.$key.' ';
            if($a < $jml){
                $sql .= $prefix.' ';
            }
            $a++;
        }
        $this->whereData = $this->convert($data,'w');
        $this->where = $sql;
        return $this;
    }

    public function get(){
        $select = (isset($this->select))?$this->select : '*';
        $sql = "SELECT ".$select." FROM ".$this->table;
        return $this->exec($sql,[])->fetchAll(5);
    }
    public function first(){
        $select = (isset($this->select))?$this->select : '*';
        $sql = "SELECT ".$select." FROM ".$this->table;
        return $this->exec($sql,[])->fetch(5);
    }
    public function count(){
        $select = (isset($this->select))?$this->select : '*';
        $sql = "SELECT ".$select." FROM ".$this->table;
        return $this->exec($sql,[])->rowCount();
    }
    public function select(array $data){
        $select = implode(', ', $data);
        $this->select = $select;
    }

    public function insert($data){
        foreach ($data as $key => $value) {
            $val[':'.$key] = $key;
        }
        $sql  = "INSERT INTO ".$this->table." (".implode(', ',array_keys($data)).") VALUES (".implode(', ',array_keys($val)).")";
        $sendData = $this->convert($data);
        $this->exec($sql,$sendData);
        return $this;
    }
    public function delete(){
        $sql = "DELETE FROM ".$this->table." ";
        return $this->exec($sql,[]);
    }
    public function update(array $data){
        $sql = "UPDATE ".$this->table." SET ";
        $jml = count($data);
        $a = 1;
        foreach ($data as $key => $value) {
            $sql .=  $key.'=:'.$key.' ';
            if($a<$jml){
                $sql .= ', ';
            }
            $a++;
        }
        $sendData = $this->convert($data);
        $this->exec($sql,$sendData);
        return $this;
    }





    private function convert($data,$prefix=null){
        if(isset($prefix)){
            $prefix = $prefix."_";
        }
        foreach($data as $key=>$value){
            $m[':'.$prefix.$key] = $value;
        }
        return $m;
    }
}
