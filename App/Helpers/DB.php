<?php
namespace Helpers;
/**
* 
*/
use Helpers\Singleton;
use Config\Config;
class DB
{
	use Singleton;

	private $pdo;
	function __construct()
	{
		try {
			$conf = Config::get('database');
			$this->pdo = new \PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'],$conf['username'],$conf['password'],[3=>2]);
		} catch (\PDOException $e) {
			echo $e->getMessages();
		}
	}
	public function clear(){
		$this->pdo = null;
	}
	public static function __callStatic($method, $param)
    {
    	if($method == "clear"){
    		return self::getInstance()->clear();
    	}
        return self::getInstance()->pdo->{$method}(...$param);
    }
}
