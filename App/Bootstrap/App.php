<?php
namespace Bootstrap;

/**
*  
*/
class App
{
    public static function run(){
        require BASEPATH."App/Bootstrap/helper.php";
        self::g2(self::g1());
    }
    public static function g1(){
        $s = str_replace("index.php","",$_SERVER['SCRIPT_NAME']);
        define("BASEURL",$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$s);
        return $s;
    }
    public static function g2(String $s){
        if($s == "/"){
            $req = $_SERVER['REQUEST_URI'];
        }
        else {
            $req = str_replace($s,'',$_SERVER['REQUEST_URI']);
        }
        $req = explode("?",$req)[0];
        $req = explode('/',$req);
        $req = array_filter($req);
        $i = 0;
        $seg = [];
        foreach ($req as $key) {
            $seg[$i] = $key;
            $i++;
        }

        $c = (isset($seg[0]))?$seg[0]:'home';
        $m = (isset($seg[1]))?$seg[1]:'index';

        $controller = "\\Http\Controllers\\".ucfirst($c)."Controller";

        if(!is_callable([$controller,$m])){
            die("URL Not Found");
        }
        $slice = [];
        if($seg >2){
            $slice = array_slice($seg, 2);
        }
        try {
            call_user_func_array([$controller,$m], $slice);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
