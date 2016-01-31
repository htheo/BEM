<<<<<<< HEAD
<?php 					include ('config.php');

?>

<html lang="fr">
<head>
	<meta charset="utf-8">
=======
>>>>>>> 6e7f27f394f0e38f3ca7409b7c43249a358b0b36

				<?php
<<<<<<< HEAD
					if (empty($_SESSION["name"])) {
						echo '<li><a value="Accueil" href="index.php"><span>Accueil</span></a></li>';
						echo '<li><a value="Contact" href="materiaux.php">Matériaux</a></li>';
						echo '<li><a value="Bars" href="partenaires.php">Nos partenaires</a></li>';
						echo '<li><a  value="Se connecter" href="connection.php"><span>Connexion</span></a></li>';
						echo '<li><a  value="inscription" href="inscription.php"><span>Inscription</span> </a></li>';

					}else{
						echo '<li><a value="Accueil" href="index.php">Accueil</a></li>';
						echo '<li><a value="Contact" href="materiaux.php">Matériaux</a></li>';
						echo '<li><a value="Bars" href="partenaires.php">Nos partenaires</a></li>';
						echo '<li><a value="deconnection" href="deconnection.php">Déconnexion</a></li>';
						echo '<li><a>'.$_SESSION["name"].'</a></li>';
					}
				?>

			</ul>

</nav>	
<div class='content'>
	
	<?php
	$pseudo =$_SESSION["name"];
	$sql="SELECT * FROM users WHERE pseudo='".$pseudo."'";
=======
					include ('config.php');

>>>>>>> 6e7f27f394f0e38f3ca7409b7c43249a358b0b36

$role=$_SESSION['role'];

if ($role==1){
	header("Location: rezzgedfgyyhfgjk.php");
}
if ($role==2){
	header("Location: qsdfsdqqsf.php");
}
if ($role==3){
	header("Location: entreprise.php");
}

if ($role==4){
	header("Location: client.php");
}
else{
	echo $_SESSION['role'];
}








?>
