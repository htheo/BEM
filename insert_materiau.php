<?php
	include('config.php');
	$entreprise		= htmlentities($_POST['entreprise']);
	$mail		= htmlentities($_POST['mail']);
	$type	= htmlentities($_POST['type']);
	$telephone	= htmlentities($_POST['telephone']);
	$prix		= htmlentities($_POST['prix']);
	$adresse		= htmlentities($_POST['adresse']);
	$postal		= htmlentities($_POST['postal']);
	$ville	= htmlentities($_POST['ville']);
	

	$urlWebServiceGoogle = 'http://maps.google.com/maps/api/geocode/json?address=%s&sensor=false&language=fr';
	$postalAddress = $adresse.', '.$ville.',  France';
	 
	$url = vsprintf($urlWebServiceGoogle, urlencode($postalAddress));
	$response = json_decode(file_get_contents($url));
	     
	if (empty($response->status)) {echo "<div class='probleme'><h2>Impossible de trouver l'adresse renseigné</h2><br><p>veuillez renseigner une nouvelle adresse !</p></div";}
	if ($response->status != "OK") {echo "<div class='probleme'><h2>Impossible de trouver l'adresse renseigné</h2><br><p>veuillez renseigner une nouvelle adresse !</p></div>";}
	else {

	$latitude =  $response->results[0]->geometry->location->lat;
	$longitude = $response->results[0]->geometry->location->lng;
	 	
	$sql = "INSERT INTO 
			materiaux 
		SET 
			entreprise = :entreprise,
			type = :type,
			mail = :mail,
			prix = :prix,
			adresse = :adresse,
			postal = :postal,
			ville = :ville,
			longitude = :longitude,
			lattitude = :lattitude,
			telephone = :telephone
			
			
		";

	$req = $db->prepare($sql);

	$req->execute(array(
		':entreprise'	=>	$entreprise,
		':type'	=>	$type,
		':mail' => $mail,
		':prix' => $prix,
		':adresse'	=>	$adresse,
		':postal'	=>	$postal,
		':ville'	=>	$ville,
		':lattitude'	=>	$latitude,
		':longitude'	=>	$longitude,
		':telephone'		=>	$telephone
		
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





	}
	 
	


