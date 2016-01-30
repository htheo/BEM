
<?php include('header.php');?>
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