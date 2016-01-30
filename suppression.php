
<?php
if (empty($_SESSION["name"])) {
	header("Location: erreur_acces.php");
}
if (empty($_SESSION["role"])) {
	header("Location: erreur_acces.php");
}
if ($_SESSION["role"]>2) {
	header("Location: erreur_acces.php");
}


?>
<?php 
if (isset($_GET['annonce'])) // On a le nom et le prénom
	{


	$annonce =$_GET["annonce"];
	$sql="DELETE * FROM materiaux WHERE ID=". $annonce . "";


	
}   //fin isset
else{
	header("Location: erreur_acces.php");
}
?>
	

</body>
</html>