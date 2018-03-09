<?php
namespace Helpers;
/**
* Singleton
*/
trait Singleton
{
    private static $__instance = [];

    public function getInstance(...$p){
        if(!isset(static::$__instance[static::class])){
            static::$__instance[static::class] = new static(...$p);
        }
        return static::$__instance[static::class];
    }
}
