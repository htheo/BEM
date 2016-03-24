<?php require('header.php'); ?>

<div class="container">

<div class="col1">

	<h2>Ses annonces</h2>
	<h2 id="achat2" class="selection_swap swap">recherche de matériaux</h2><h2 id="besoin2" class="swap">vente de matériaux</h2>

						<div id="besoin">


							<!-- personne dans le besoin  -->
						<?php
					if (isset($_GET['entreprise'])) // On a le nom et le prénom
					{
						$entreprise = $_GET['entreprise'];
					$sql="SELECT * FROM materiaux WHERE vente='1' & entreprise='".$entreprise."'";
					
						
					$req = $db->prepare($sql);
					$req->execute();
					  
					$result = $req->fetchAll(PDO::FETCH_ASSOC);
			
					foreach($result as $val){
						
						?>
							<article>
								<img src="../images/materiaux/<?php echo $val['type']; ?>.jpg" alt="<?php echo $val['type']; ?>">
								<h3><?php echo $val['type']; ?></h3>
								<p><?php echo $val['soustype']; ?></p>

								<?php 
									$ville=$val['ville'];
									if($ville!=""){
								?>
									<p><?php echo $ville; ?></p>

								<?php
								}else{
									?>
										<p>pas de ville renseignée</p>
									<?php

								}
								?>
								

							<a href="../materiaux/annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

							</article>
						<?php

						
					}
				?>
					
						
				
							

					</div>
					<div id="vente" class="hidden">
						<?php
							
						
							
					$sqll="SELECT * FROM materiaux WHERE vente='0' & entreprise='".$entreprise."' ";
							

				  
					$req = $db->prepare($sqll);
					$req->execute();
					  
					$result = $req->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $val){
						
						?>
							<article>
								<img src="../images/materiaux/<?php echo $val['type']; ?>.jpg" alt="<?php echo $val['type']; ?>">
								<h3><?php echo $val['type']; ?></h3>
								<p><?php echo $val['soustype']; ?></p>

								<?php 
									$ville=$val['ville'];
									if($ville!=""){
								?>
									<p><?php echo $ville; ?></p>

								<?php
								}else{
									?>
										<p>pas de ville renseignée</p>
									<?php

								}
								?>
								

							<a href="../materiaux/annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

							</article>
						<?php
						

						
					
					}
				?>
					
						
				
							

					</div>

			</div>
	
		</div>
	</div>
</div>
	<div class="col2">

<?php    //afficher l'entreprise en cours

		$sql="SELECT * FROM users_BEM WHERE pseudo = '" . $entreprise ."'";
		$req = $db->prepare($sql);
		$req->execute();
		  
		$result = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $val){
			?>
				<h1><?php echo $entreprise;?></h1>
				<p>mail : <?php echo $val['mail'];?></p>
				<p>adresse : <?php echo $val['adresse']." ".$val['ville'];?></p>
			

			<?php
			

			
		
	

}?>	
</div>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>	

			
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