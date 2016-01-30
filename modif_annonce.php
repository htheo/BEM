<?php require('header.php'); ?>

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

<h1>Bienvenue Théo Hinfray</h1>
<h2>Menu de modification des annonces</h2>
<?php 

	$annonce =$_GET["annonce"];
	$sql="SELECT * FROM materiaux WHERE ID=". $annonce . "";


	$req = $db->prepare($sql);
	$req->execute();
	  
	$result = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($result as $val){
		 echo $val['type']."<br>";
		 echo $val['prix']."euros<br>";
		 echo $val['entreprise']."<br>";
		 echo $val['type']."<br>";
		 ?>
	
			<a href="modif_annonce.php?annonce=<?php echo $val['ID']; ?>">Supprimer l'annonce</a><br><br>
			<a href="modif_entreprise.php?entreprise=<?php echo $val['ID']; ?>">Voir/Modifier l'entreprise qui à publier l'annonce</a><br><br>

			<?php
			

			
		
	}?>
	

</body>
</html>