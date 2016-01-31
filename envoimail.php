<?php
include('header.php');

if(isset($_SESSION['ID'])){
	$id=$_SESSION['ID'];
	$reponse = $db->query("SELECT * FROM users WHERE ID='".$id."'");
	foreach($reponse as $val){
		 
		 $mail=$val['mail'];
		 $pseudo=$val['pseudo'];
		 $password=$val['password'];
		 	
		 		 	

	}


$message="Bonjour ".$pseudo.", Votre mot de passe sur le site BEM est ".$password;

$sujet="BEM retrouver votre mot de passe";

$headers = 'From: hinfraytheo@gmail.com' . "\r\n" .
     'Reply-To: hinfraytheo@gmail.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

?>



<div class="content_back erreur">
<br><br><br><br><br>
		<h1>Envoie de Mail effectué</h1>
		<p>Un mail avec votre mot de passe a été envoyé à l'adresse <?php echo $mail;?></p>
	</div>
<?php

mail($mail,$sujet,$message,$header);
}elseif(isset($_POST['mail'])){

	$mail=$_POST['mail'];
	$reponse = $db->query("SELECT * FROM users WHERE ID='".$mail."'");
	foreach($reponse as $val){
		 
		 $mail=$val['mail'];
		 $pseudo=$val['pseudo'];
		 $password=$val['password'];
		 	
		 		 	

	}


$message="Bonjour ".$pseudo.", Votre mot de passe sur le site BEM est ".$password;

$sujet="BEM retrouver votre mot de passe";

$headers = 'From: hinfraytheo@gmail.com' . "\r\n" .
     'Reply-To: hinfraytheo@gmail.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

?>



<div class="content_back erreur">
<br><br><br><br><br>
		<h1>Envoie de Mail effectué</h1>
		<p>Un mail avec votre mot de passe a été envoyé à l'adresse <?php echo $mail;?></p>
	</div>
<?php

mail($mail,$sujet,$message,$header);



}else{
?>
	<div class="content_back erreur form">
	<br><br><br><br><br>
		<h1>Quel est votre mail ?</h1>
		<form action="envoimail.php" method="POST">
			<input class="form-input" type="mail" name="mail" placeholder="Votre mail"><br>
			<input class="btn2" type="submit"></br>

		</form>
	</div>
<?php
}

?>