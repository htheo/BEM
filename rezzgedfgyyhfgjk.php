<html lang="fr">
<head>
	<meta charset="utf-8">

	<title>Compte admin</title>
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
if ($_SESSION["role"]=!1) {
	header("Location: erreur_acces.php");
}
else {
	$_SESSION["role"]=1;
}


?>

<h2>Bienvenue Théo Hinfray</h2>
<a href="admin_users.php">Voir les derniers users</a>
<a href="admin_annonces.php">Voir les dernières annonces</a>
</body>
</html>