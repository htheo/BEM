<?php

	require('header.php');
	$pseudo		= htmlentities($_POST['pseudo']);
	$mail		= htmlentities($_POST['mail']);
	$password	= htmlentities($_POST['password']);
	$adresse		= htmlentities($_POST['adresse']);
	$postal		= htmlentities($_POST['postal']);
	$ville	= htmlentities($_POST['ville']);
	$role	= htmlentities($_POST['role']);	

	$urlWebServiceGoogle = 'http://maps.google.com/maps/api/geocode/json?address=%s&sensor=false&language=fr&key=AIzaSyD_NJRmaEQFlKuz1CG9WJCLBAzP9dYvT2k';
	$postalAddress = $adresse.', '.$ville.',  France';
	 
	$url = vsprintf($urlWebServiceGoogle, urlencode($postalAddress));
	$response = json_decode(file_get_contents($url));
	     
	if (empty($response->status)) {
	?>
	<div class="content_back erreur">
<br><br><br><br><br>
		<h1>L'adresse indiquée est vide ou ou Google Map n'arrive pas à la trouver !</h1>
		<a href="inscription.php">réessayez de s'inscrire</a>	</div> 
<?php
}
	if ($response->status != "OK") { 
?>
	<div class="content_back erreur">
<br><br><br><br><br>
		<h1>Google Map n'arrive pas à trouver l'adresse indiquée !</h1>
		<a href="inscription.php">réessayez de s'inscrire</a>	</div> <?php
	} else {

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
	 
	


