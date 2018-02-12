<?php
namespace System;
/**
 * View Class
 */
class View
{
    public static function init($page,$parram=[],$template='Default')
    {
        extract($parram);
        return require BASEPATH.'/App/Templates/'.$template.'/index.php';
    }
}
