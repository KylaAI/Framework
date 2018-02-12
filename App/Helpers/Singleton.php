<?php
namespace Helpers;
trait Singleton{
	private static $__instance;

	public static function getInstance(...$param){
		if(self::$__instance === null){
			self::$__instance = new self(...$param);
		}
		return self::$__instance;
	}
}