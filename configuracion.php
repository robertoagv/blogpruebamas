<?php 

	$host = 'localhost';
	$namedb = 'dbblogprueba';
	$user = 'root';
	$pass = '';

	try {
		$pdo = new PDO("mysql:host=$host;dbname=$namedb", $user, $pass);
		//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
			echo $e->getMessage();
	}


 ?>