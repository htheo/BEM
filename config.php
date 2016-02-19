<?php

	session_start();

	$dbname = "archi";
	$host = "localhost";
	$user = "root";
	$pass = "root";
/*
	$dbname = "theohinfkzbad";
	$host = "theohinfkzbad.mysql.db";
	$user = "theohinfkzbad";
	$pass = "A26c985tub";
*/

	try {
	$db = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

/* Definition d'une variable d'url du site pour inclure le header sur n'importe quelle page */



?>