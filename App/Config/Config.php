<?php
namespace Config;
/**
* 
*/
class Config
{
	public static function get($data,$param=null){
		$r = require(BASEPATH."App/Config/".ucfirst($data).".php");
		if($param){
			return $r[$param];
		}
		return $r;
	}
	public static function __callStatic($m,$s){
		return self::get($m,...$s);
	}
}