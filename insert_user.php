<?php
	include('config.php');
	$pseudo		= htmlentities($_POST['pseudo']);
	$mail		= htmlentities($_POST['mail']);
	$password	= htmlentities($_POST['password']);
	$adresse		= htmlentities($_POST['adresse']);
	$postal		= htmlentities($_POST['postal']);
	$ville	= htmlentities($_POST['ville']);
	$role	= htmlentities($_POST['role']);	

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
			users_BEM 
		SET 
			pseudo = :pseudo,
			password = :password,
			mail = :mail,
			adresse = :adresse,
			postal = :postal,
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
		':adresse'	=>	$adresse,
		':postal'	=>	$postal,
		':ville'	=>	$ville,
		':lattitude'	=>	$latitude,
		':longitude'	=>	$longitude,
		':role'		=>	$role
		
	));
	$_SESSION['name'] = $pseudo;
	$_SESSION['password'] = $password;

	header("Location: index.php");





	}
	 
	


