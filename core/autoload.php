<?php

// Add your class dir to include path
set_include_path(dirname(__DIR__) . PATH_SEPARATOR . get_include_path());

// You can use this trick to make autoloader look for commonly used "My.class.php" type filenames
spl_autoload_extensions('.php');

// Use default autoload implementation
//spl_autoload_register();
spl_autoload_register(function($class){
	$class = trim(str_replace('\\', DIRECTORY_SEPARATOR, $class), '\\');
	/*
	echo "\t".$class . '.php'."\n";
	echo "\t".'T: '.gentime().'; M: '.round(memory_get_peak_usage(false)/1024/1024, 4).' <em>'.$class.'</em>'."\n\n";
	 */
	include $class . '.php';
});
