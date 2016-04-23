<?php
	require('header.php');
	$entreprise		= htmlentities($_POST['entreprise']);
	$mail		= htmlentities($_POST['mail']);
	$type	= htmlentities($_POST['type']);
	$telephone	= htmlentities($_POST['telephone']);
	$longitude = htmlentities($_POST['long']);
	$lattitude = htmlentities($_POST['lat']);
	$ville	= htmlentities($_POST['ville']);
	$description	= htmlentities($_POST['description']);
	$vente = htmlentities($_POST['vente']);


	$sql = "INSERT INTO 
			materiaux 
		SET 
			entreprise = :entreprise,
			type = :type,
			mail = :mail,
			ville = :ville,
			longitude = :longitude,
			lattitude = :lattitude,
			vente = :vente,
			telephone = :telephone,
			description = :description
			
			
		";

	$req = $db->prepare($sql);

	$req->execute(array(
		':entreprise'	=>	$entreprise,
		':type'	=>	$type,
		':mail' => $mail,
		':ville'	=>	$ville,
		':lattitude'	=>	$lattitude,
		':longitude'	=>	$longitude,
		':vente'	=>	$vente,
		':telephone'		=>	$telephone,
		':description'	=> $description
		
	));
	

	/*echo $entreprise;
	echo $type;
	echo $mail;
	echo $prix;
	echo $adresse;
	echo $postal;
	echo $ville;
	echo $latitude;
	echo $longitude;
	echo $entreprise;*/
	header("Location: materiaux/");





	


