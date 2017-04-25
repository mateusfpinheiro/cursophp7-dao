<?php 

spl_autoload_register(function($className){

	$file_name = "class" . DIRECTORY_SEPARATOR . $className . ".php";

	if (file_exists(($file_name))) {
		
		require_once($file_name);
	}

});