<?php
namespace System;
/**
* 
*/
use System\View;
class Controller
{
    public static function View($page,$parram=[],$template='default'){
        View::init($page,$parram,ucfirst($template));
    }
}
