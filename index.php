<?php
require('header.php');
include('materiaux/function.php');?>

<script src="js/script.js"></script>



<div class="content">


	<div class="slider">
		<div class="container">
		<h1>Vous êtes en exces ou en déficit de matériaux ?</h1>
		<h2>La solution pour l’échange de matériaux de terrassements entres chantiers</h2>
		</div>
	</div>

	<div class="container marg_top">
		<div class="col1 content2">
			<h2>Articles populaires</h2>
			<form action="index.php" method="get" class="recherche">
				<?php 
					if(isset($_SESSION['ville'])&&isset($_SESSION['adresse'])&&$_GET['ville']!="1"&&$_GET['adresse']!="1"){
						$ville=$_SESSION['ville'];
						$adresse=$_SESSION['adresse'];
						?>
							<input class="input_recherche" type="text" name="ville" value="<?php echo $ville; ?>">
						<?php
					}else{
						?>
							<input class="input_recherche" id="address" type="text" name="ville" placeholder="Adresse ou vous voulez chercher">
						<?php
					}
				?>
				
				<p> dans un rayon de </p>
				<input class="input_recherche form_number" type="number" name="range" value="50" ><p> km</p><br>
				<SELECT class="input_recherche" name="type" size="1" required>
					<OPTION value="Argile">Argile</option>
							<OPTION value="Autres">Autres</option>
							<OPTION value="Autres_organique">Autres organique</option>
							<OPTION value="Calcaire">Calcaire</option>
							<OPTION value="Cendres">Cendres volantes</option>
							<OPTION value="Craie">Craie</option>
							<OPTION value="Deblais">Déblais</option>
							<OPTION value="Demolition">Démolition</option>
							<OPTION value="Faible_organique">Faible organique</option>
							<OPTION value="Laitier_fourneau">Laitier fourneau</option>
							<OPTION value="Limon">Limon</option>
							<OPTION value="Machefer">Machefer</option>
							<OPTION value="Marne">Marne</option>
							<OPTION value="Phosphogypse">Phosphogypse</option>
							<OPTION value="Remblais">Remblais</option>
							<OPTION value="Roche_argileuse">Roche argileuse</option>
							<OPTION value="Roche_magmatique">Roche magmatique</option>
							<OPTION value="Roche_saline">Roche saline</option>
							<OPTION value="Sable">Sable</option>
				</SELECT>
				<SELECT class="input_recherche" name="tri" size="1" required>
					<OPTION value="ID">date</option>
				</SELECT>
				
				<p onclick="verif2();">Vérifier</p>
						
				
					<div class="role">

						<input type="number" name="role" value="3">

					
			
						<input type="number" id="lat2" step="any" name="lat" value="" hidden>					

						<input type="number" id="long2" step="any" name="long" value="" hidden>
</div> 
		
			<input id="valid2" class="btn2" type="submit" value="Rechercher"></br></br>
			</form>
			<h2>Vous voulez</h2>
			<h2 id="achat2" class="selection_swap swap">trouver des matériaux</h2><h2 id="besoin2" class="swap">vendre des matériaux</h2>

						<div id="besoin">


							<!-- personne dans le besoin  -->
						<?php
							if (isset($_GET['type'])){
								$type=$_GET['type'];
								
									$sql="SELECT * FROM materiaux WHERE type='". $type."' && vente='1' ORDER BY ID DESC";
								
								


							}
							else // Il manque des paramètres, on avertit le visiteur
							{
								
								$sql="SELECT * FROM materiaux WHERE vente='1'  ORDER BY ID DESC";
							}
					$req = $db->prepare($sql);
					$req->execute();
					  
					$result = $req->fetchAll(PDO::FETCH_ASSOC);

				if (isset($_GET['range'])&&isset($_GET['lat'])&&isset($_GET['long'])){
								$latitude=$_GET['lat'];
								$longitude=$_GET['long'];

								$range=$_GET['range'];
							$i=0;
							foreach($result as $val){
								if($i<12){
									if (isset($latitude)){

										$lat=$val['lattitude'];
										$long=$val['longitude'];
										$km = round(get_distance_m($latitude, $longitude, $lat, $long) / 1000);
											if($km<=$range){
												?><article>
												<img src="images/materiaux/<?php echo $val['type']; ?>.jpg" alt="<?php echo $val['type']; ?>">
												<h3><?php echo $val['type']; ?></h3>
												<p><?php echo $val['soustype']; ?></p>

												<?php 
												echo (round(get_distance_m($latitude, $longitude, $lat, $long) / 1000)). ' km';
									 			?>
									 			<br>
												<a href="materiaux/annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

												</article>
												<?php
												$i++;
											}
									}
								
								
							}
						}
									
							
					
					




				}else{

					$i=0;
					foreach($result as $val){
						?>

							<article>
								<img src="images/materiaux/<?php echo $val['type']; ?>.jpg" alt="<?php echo $val['type']; ?>">
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
								

							<a href="materiaux/annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

							</article>
						<?php

						}
						$i++;
					
				}
				?>
					
						
				
							

					</div>
					<div id="vente" class="hidden">
				

							<!-- personne dans le besoin  -->
						<?php
							if (isset($_GET['type'])){
								$type=$_GET['type'];
								
									$sql="SELECT * FROM materiaux WHERE type='". $type."' && vente='0' ORDER BY ID DESC";
								
								


							}
							else // Il manque des paramètres, on avertit le visiteur
							{
								
								$sql="SELECT * FROM materiaux WHERE vente='0'  ORDER BY ID DESC";
							}
					$req = $db->prepare($sql);
					$req->execute();
					  
					$result = $req->fetchAll(PDO::FETCH_ASSOC);

						if (isset($_GET['range'])&&isset($_GET['lat'])&&isset($_GET['long'])){
								$latitude=$_GET['lat'];
								$longitude=$_GET['long'];

								$range=$_GET['range'];
							$i=0;
							foreach($result as $val){
								if($i<12){
									if (isset($latitude)){

										$lat=$val['lattitude'];
										$long=$val['longitude'];
										$km = round(get_distance_m($latitude, $longitude, $lat, $long) / 1000);
											if($km<=$range){
												?><article>
												<img src="images/materiaux/<?php echo $val['type']; ?>.jpg" alt="<?php echo $val['type']; ?>">
												<h3><?php echo $val['type']; ?></h3>
												<p><?php echo $val['soustype']; ?></p>

												<?php 
												echo (round(get_distance_m($latitude, $longitude, $lat, $long) / 1000)). ' km';
									 			?>
									 			<br>
												<a href="materiaux/annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

												</article>
												<?php
												$i++;
											}
									}
								
							
							}
						}
				}else{

					$i=0;
					foreach($result as $val){
						?>

							<article>
								<img src="images/materiaux/<?php echo $val['type']; ?>.jpg" alt="<?php echo $val['type']; ?>">
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
								

							<a href="materiaux/annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

							</article>
						<?php

						}
					$i++;
				}
				?>
					
						
				
							

					</div>

	</div>
		<div class="col2">

			<?php
			if(empty($_SESSION['name'])){
				include ('inscription_field.php');
			}else{
				?> <h2>Bonjour à vous <?php echo $_SESSION['name']; ?></h2>

				<a class="marg_top" href="single_user.php">Accéder à votre compte</a>
				<?php 
					if($_SESSION['role']==3){ 	
				?>
				<a href="single_user.php">Ajouter un article</a>
				<a href="partenaires/single.php?entreprise=<?php echo $_SESSION['name']; ?>">Voir tous vos articles</a>

			   <?php
					}
			}  ?>
		</div>
	</div>
</div>

<?php include('footer.php'); ?>