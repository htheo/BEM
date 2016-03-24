<?php require('header.php'); ?>

<div class="annonce-main">
	<h4 class="title-bar">L'annonce</h4>
	<div class="annonce-description">

<?php    //afficher l'annonce en cours
	if (isset($_GET['annonce'])) // On a le nom et le prénom
	{
		$idencours = $_GET['annonce'];
		$sql="SELECT * FROM materiaux WHERE ID = " . $idencours;
		$req = $db->prepare($sql);
		$req->execute();
		  
		$result = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $val){
			$entreprise=$val['entreprise'];
			echo "<h2>".$val['type']."</h2><br><h3>Infomations</h2><hr class='annonce-hr'><br>";
			echo "Prix : <h4 class='annonce-prix'>".$val['prix']." €</h4><br>";

			echo "Adresse : <b>".$val['adresse']."</b> à <b>".$val['ville']."</b> par <a href='../partenaires/single.php?entreprise=".$entreprise."'><b>".$val['entreprise']."</b></a><br>";
			?>
		
						
			<?php

			$image=$val['type'];
			$entreprise=$val['entreprise'];
			

			
		
	}?>

<?php    //afficher l'annonce en cours


		$sql="SELECT * FROM users_BEM WHERE pseudo = '" . $entreprise ."'";
		$req = $db->prepare($sql);
		$req->execute();
		  
		$result = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $val){
			echo "<br><h3>Entreprise</h2><hr class='annonce-hr'><br>";
			echo $val['pseudo']."<br>";
			echo $val['mail']."<br>";

			?>
			<br/><a class="btn2" type="button" href="#">Reserver</a><br><br>
			</div>
			
			<?php

		
			

			
		
	}?>


<div class="annonce-image">
				<img src="../images/materiaux/<?php echo $image; ?>.jpg" class="img-responsive" alt="">
			</div>
	
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