
<?php

include ('header.php');
?>

<html lang="fr">
<head>
	<meta charset="utf-8">

	<title>connection</title>
	<meta name="connection" >
	
	<link href="css/style.css" rel="stylesheet" type="text/css">
	

</head>
<body>


			


<div class='content_back'>
	
	<div class='form'>
				<form method="POST" action="validation.php">
					<h2>Connectez vous</h2>

					<p>pseudo <input class="form-input" type="text" name="pseudo" pattern"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" placeholder="Votre pseudo ou nom de votre entreprise"></p>
							

					<p>mot de passe<input class="form-input" type="password" pattern"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" name="motdepasse" placeholder="mot de passe"></p>

					<div class="form-submit">
						<input class='btn'type="submit" value="Se Connecter">	
					</div>
					<a  class="align" href="inscription.php">Pas encore inscrit ?</a><a class="align" href="inscription.php"> mot de passe oublié ?</a>
				</form>
	</div>
</div>
<?php include('footer.php'); ?>
</body>
</html>