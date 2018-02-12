<?php
spl_autoload_register(function($class){
	$class = str_replace('\\','/',$class);
	$file = BASEPATH.'App/'.$class.'.php';
	if(file_exists($file))
		require $file;
	else 
		die("Class ".$class." not found");
	
});