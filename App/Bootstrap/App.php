<?php
namespace Bootstrap;
/**
* 
*/
class App
{
	public static function run(){
		require_once(BASEPATH.'App/Bootstrap/helper.php');
        date_default_timezone_set("Asia/Jakarta");
        self::getClass(
            self::getSeg(
                self::check()
            )
        );
	}
	public static function getClass(String $r){
		$seg = explode('/',$r);
        $seg = array_filter($seg);
        define("SEGMENT",$seg);

        $c = (isset($seg[0]))?$seg[0]:'home';
        $cU = (isset($seg[0]))?$seg[0]:'';
        $m = (isset($seg[1]))?$seg[1]:'index';
        
        define("CONTROLLER",$cU);

        $c = "\\Http\Controllers\\".ucfirst($c)."Controller";
        $c = new $c;

        if(!method_exists($c, $m)){
            die("Method ".$m." Tidak ditemukan");
        }

        $slice = array_slice($seg,2);
        call_user_func_array([$c,$m],$slice);
	}
	public static function getSeg(String $str){
		$r = explode($str,$_SERVER['REQUEST_URI'])[1];
        $r = explode('?',$r)[0];
        return $r;
	}
	public static function check(){
		$s = str_replace('index.php','',$_SERVER['SCRIPT_NAME']);
        return $s;
	}
}
