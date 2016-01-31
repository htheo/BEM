<?php include('header.php');?>

<?php
if (empty($_SESSION["name"])) {
	header("Location: erreur_acces.php");
}
if (empty($_SESSION["role"])) {
	header("Location: erreur_acces.php");
}
if ($_SESSION["role"]!=4) {
	header("Location: erreur_acces.php");
}


?>

<h2>Bienvenue cher client</h2>
</body>
</html>