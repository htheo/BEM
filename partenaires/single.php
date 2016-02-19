<?php require('header.php'); ?>

<div class="content">

<?php    //afficher l'entreprise en cours
	if (isset($_GET['entreprise'])) // On a le nom et le prénom
	{
		$idencours = $_GET['entreprise'];
		$sql="SELECT * FROM users_BEM WHERE ID = " . $idencours;
		$req = $db->prepare($sql);
		$req->execute();
		  
		$result = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $val){
			echo $val['pseudo']."<br>";
			echo "mail : ".$val['mail']." euros <br>";
			echo "adresse : ".$val['adresse']." ".$val['ville']."<br>";
			?>
			<a href="#">Lien vers le site de l'entreprise</a><br><br>

			<?php
			

			
		
	}?>
</div>	

			
		<?php
	}
	else // Il n'y a pas d'annonce choisit il y a donc une erreur
	{
		?>
		<h1>Erreur ! </h1>
		<?php
		
	}
	?>

</body>
</html>