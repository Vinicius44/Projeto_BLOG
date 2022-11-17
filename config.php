
<?php

$autoload = function($class){
		if($class == "Email"){
			require_once("classes/phpmailer/PHPMailerAutoload.php");
		}	
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define("INCLUDE_PATH", "http://localhost/Portf%c3%b3lio/Back-End/Projeto_Noticia/");

	define("HOST", "localhost");
	define("USER", "root");
	define("PASSWORD", "");
	define("DATABASE" , "projeto_blog");



?>