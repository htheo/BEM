<?php

	require('header.php');
	$pseudo		= htmlentities($_POST['pseudo']);
	$mail		= htmlentities($_POST['mail']);
	$password	= htmlentities($_POST['password']);
	$longitude = htmlentities($_POST['long']);
	$lattitude = htmlentities($_POST['lat']);
	
	$ville	= htmlentities($_POST['ville']);
	$role	= htmlentities($_POST['role']);	


  /* $postalAddress=str_replace(" ", "+", $ville);
   $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . $postalAddress . "&sensor=false&key=AIzaSyAd1NVaLNsix-xOu9465diKYQMlava86Jc";

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $details_url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $geoloc = json_decode(curl_exec($ch), true);*/
   



  

	 	
	$sql = "INSERT INTO 
			users_bem
		SET 
			pseudo = :pseudo,
			password = :password,
			mail = :mail,
			ville = :ville,
			longitude = :longitude,
			lattitude = :lattitude,
			role = :role
			
			
		";

	$req = $db->prepare($sql);

	$req->execute(array(
		':pseudo'	=>	$pseudo,
		':password'	=>	$password,
		':mail' => $mail,
		':ville'	=>	$ville,
		':lattitude'	=>	$lattitude,
		':longitude'	=>	$longitude,
		':role'		=>	$role
		
	));
	$_SESSION['name'] = $pseudo;
	$_SESSION['password'] = $password;
	$_SESSION['role'] = $role;

	header("Location: index.php");




/*
	}*/
	 
	//}


