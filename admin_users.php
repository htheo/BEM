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
<h2>Menu de modification des users</h2>
<?php 


		$sql="SELECT * FROM users";
	

	  
		$req = $db->prepare($sql);
		$req->execute();
		  
		$result = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $val){
			echo $val['pseudo']."<br>";
			echo "mail : ".$val['mail']." euros <br>";
			echo "adresse : ".$val['adresse']." ".$val['ville']."<br>";
			?>
			<a href="#">Lien vers le site de l'entreprise</a><br><br>
			<a href="modif_entreprise.php?entreprise=<?php echo $val['ID']; ?>">Voir/Modifier l'entreprise</a><br><br>
			<?php
			

			
		
	}?>
			

	

</body>
</html>