
<?php

$autoload = function($class){
		if($class == "Email"){
			require_once("classes/phpmailer/PHPMailerAutoload.php");
		}	
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define("INCLUDE_PATH", "http://localhost/Projetos_PHP/Projeto_01/");



?>