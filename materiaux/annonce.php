<?php require('header.php'); ?>

<div class="content">

<?php    //afficher l'annonce en cours
	if (isset($_GET['annonce'])) // On a le nom et le prénom
	{
		$idencours = $_GET['annonce'];
		$sql="SELECT * FROM materiaux WHERE ID = " . $idencours;
		$req = $db->prepare($sql);
		$req->execute();
		  
		$result = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $val){
			echo $val['type']."<br>";
			echo "prix : ".$val['prix']." euros <br>";
			echo "adresse : ".$val['adresse']." ".$val['ville']."<br>";
			?>
			<a href="#">Reserver</a><br><br>

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