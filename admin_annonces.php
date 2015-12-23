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


		$sql="SELECT * FROM materiaux";
	

	  
		$req = $db->prepare($sql);
		$req->execute();
		  
		$result = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $val){
			echo $val['type']."<br>";
			echo "prix : ".$val['prix']." euros <br>";
			echo "adresse : ".$val['adresse']." ".$val['ville']."<br>";
			?>
			<a href="modif_annonce.php?annonce=<?php echo $val['ID']; ?>">Voir/Modifier l'annonce</a><br><br>

			<?php
			

			
		
	}?>
	

</body>
</html>