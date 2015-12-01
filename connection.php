<html lang="fr">
<head>
	<meta charset="utf-8">

	<title>connection</title>
	<meta name="connection" >
	
	<link href="css/style.css" rel="stylesheet" type="text/css">
	

</head>
<body>


<nav>

				
			<ul>
				<?php
					include ('config.php');

					

					if (empty($_SESSION["name"])) {
						echo '<li><a value="Accueil" href="index.php"><span>Accueil</span></a></li>';
						echo '<li><a value="Contact" href="materiaux.php">Matériaux</a></li>';
						echo '<li><a value="Bars" href="partenaires.php">Nos partenaires</a></li>';
						echo '<li><a  value="Se connecter" href="connection.php"><span>Se connecter</span></a></li>';
						echo '<li><a  value="inscription" href="inscription.php"><span>Inscription</span> </a></li>';

					}else{
						echo '<li><a value="Accueil" href="index.php">Accueil</a></li>';
						echo '<li><a value="Contact" href="materiaux.php">Matériaux</a></li>';
						echo '<li><a value="Bars" href="partenaires.php">Nos partenaires</a></li>';
						echo '<li><a value="deconnection" href="deconnection.php">se déconnecter</a></li>';
						echo '<li><a>'.$_SESSION["name"].'</a></li>';
					}
				?>

			</ul>

</nav>	
<div class='content'>
	
	<div class='form'>
				<form method="POST" action="validation.php">
					<h2>- Connectez vous -</h2>
					<div class="form-input">
						
							<p>pseudo : <input type="text" name="pseudo" pattern"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" placeholder="Votre pseudo ou nom de votre entreprise"></p>
							
						
					</div>
					<div class="form-input">
						
							<p>mot de passe : <input type="password" pattern"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" name="motdepasse" placeholder="mot de passe"></p>
							
						
					</div></br>
					<div class="form-submit">
						<input class='btn'type="submit" value="Se Connecter">	
					</div></br>
				</form>
	</div>
</div>
<div class ='footer'>
			


		</div>
</body>
</html>