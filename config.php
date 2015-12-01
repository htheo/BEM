<?php

	session_start();

	$dbname = "archi";
	$host = "localhost";
	$user = "root";
	$pass = "root";

	/*$dbname = "theohinfkzbad";
	$host = "theohinfkzbad.mysql.db";
	$user = "theohinfkzbad";
	$pass = "TDP3xcSNeDZ7";*/


	try {
	$db = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


	


?>