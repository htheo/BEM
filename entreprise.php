<html lang="fr">
<head>
	<meta charset="utf-8">

	<title>Compte client</title>
	<meta name="client" >
	
	<!-- Libs -->
	

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
<?php
if (empty($_SESSION["name"])) {
	header("Location: erreur_acces.php");
}
if (empty($_SESSION["role"])) {
	header("Location: erreur_acces.php");
}
if ($_SESSION["role"]=!3) {
	header("Location: erreur_acces.php");
}


?>
<h1>Bienvenue cher entreprise</h1>

<p>ajouter une annonce ici</p>
<div class="profil">
	<?php 

		echo '<div>'.$_SESSION["name"].'</div>';

	?>



</div>
<div class="annonce_entreprise">

	<form method="POST" action="insert_materiau.php">
			<h2>- Ajout d'une annonce -</h2>
					<div class="form-input">
							
						<p>entreprise : <input type="text" name="entreprise" pattern="[a-zA-Z0-9]+" value="<?php echo $_SESSION["name"];  ?>" readonly required ></p>
								
							
					</div>
					
					Type du matériau :
					<SELECT name="type" size="1" required>
						<OPTION value="deblais">Deblais</option>
						<OPTION value="materiau">Materiau</option>
					</SELECT>
					<div class="form-input">
							
						<p>prix : <input type="text" name="prix" pattern="[a-zA-Z0-9 ]+" placeholder="Votre numéro" /></p>
								
							
					</div>
					<div class="form-input">
							
						<p>téléphone : <input type="text" name="telephone" pattern="[a-zA-Z0-9 ]+" placeholder="Votre numéro" /></p>
								
							
					</div>
					<div class="form-input">
							
						<p>mail : <input type="email" name="mail" placeholder="Votre adresse mail" /></p>
								
							
					</div>
					<div class="form-input">
							
						<p>adresse : <input type="text" name="adresse" pattern="[a-zA-Z0-9 ]+" placeholder="Votre adresse" required /></p>
								
							
					</div>
					<div class="form-input">
							
						<p>code postal : <input type="text" name="postal" pattern="[0-9]{5}" placeholder="Votre code postal" required ></p>
								
							
					</div>
					<div class="form-input">
							
						<p>ville : <input type="text" name="ville" pattern="[a-zA-Z0-9]+" placeholder="Votre ville" required ></p>
								
							
					</div>

				
						
						
						
						

		
		
		
		
			<input class ="btn"type="submit"></br></br>
		</form>

</div>


</body>
</html>