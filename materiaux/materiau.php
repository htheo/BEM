<?php
require('header.php');
include('function.php');?>




<div class="content">


	<div class="slider">
		<div class="container">
		<h1>Listes des Annonces de type <?php if(isset($_GET['name'])){echo $_GET['name'];}else{echo "non renseignée";} ?></h1>
		</div>
	</div>

	<div class="container marg_top materiau">
		<div class="col1 content2">
			<h2>Articles populaires</h2>
			<form action="materiau.php" method="get" class="recherche">
				
							<input class="input_recherche" id="address" type="text" name="ville" placeholder="Adresse ou vous voulez chercher">
		
				<p> dans un rayon de </p>
				<input class="input_recherche form_number" type="number" name="range" value="50" ><p> km</p><br>

				
				<SELECT class="input_recherche" name="tri" size="1" required>
					<OPTION value="ID">date</option>
				</SELECT>
				
				
				<p onclick="verif2();">Vérifier</p>
						
				
					<div class="role">

						<input type="text" value="<?php if(isset($_GET['type'])){echo $_GET['type'];}else{echo "non renseignée";}?>" name="type" size="1" hidden>
						<input type="text" value="<?php if(isset($_GET['name'])){echo $_GET['name'];}else{echo "non renseignée";}?>" name="type" size="1" hidden>

					
			
						<input type="number" id="lat2" step="any" name="lat" value="" hidden>					

						<input type="number" id="long2" step="any" name="long" value="" hidden>
					</div> 
		
			<input id="valid2" class="btn2" type="submit" value="Rechercher"></br></br>

			</form>
			<h2>Annonce de</h2>
			<h2 id="achat2" class="selection_swap swap">recherche de matériaux</h2><h2 id="besoin2" class="swap">vente de matériaux</h2>

						<div id="besoin">


							<!-- personne dans le besoin  -->
						<?php

							if (isset($_GET['tri'])&&isset($_GET['type'])) // On a le nom et le prénom
							{
								$type=$_GET['type'];
								$tri=$_GET['tri'];
								
								
								$sql="SELECT * FROM materiaux WHERE type='". $type ."' && vente='1' ORDER BY ID DESC";
								
							}
							elseif (isset($_GET['type'])){
								$type=$_GET['type'];
								
									$sql="SELECT * FROM materiaux WHERE type='". $type."' && vente='1' ORDER BY ID DESC";
								
								


							}
							elseif (isset($_GET['tri'])){
								$tri=$_GET['tri'];
								$sql="SELECT * FROM materiaux WHERE vente='1' ORDER BY ID DESC" ;
							}
							else // Il manque des paramètres, on avertit le visiteur
							{
								$tri = 'ID';
								$sql="SELECT * FROM materiaux WHERE vente='1' ORDER BY ID DESC" ;
							}
							if (isset($_GET['range'])&&isset($_GET['lat'])&&isset($_GET['long'])){
								$latitude=$_GET['lat'];
								$longitude=$_GET['long'];

								$range=$_GET['range'];
							}
							$req = $db->prepare($sql);
							$req->execute();
							  
							$result = $req->fetchAll(PDO::FETCH_ASSOC);
							$i=0;
							foreach($result as $val){
								if($i<12){
									if (isset($latitude)){

										$lat=$val["lattitude"];
										$long=$val["longitude"];
										
										$km = round(get_distance_m($latitude, $longitude, $lat, $long) / 1000);
											if($km<=$range){
												?><article>
												<img src="../images/materiaux/<?php echo $val['type']; ?>.jpg" alt="<?php echo $val['type']; ?>">
												<h3><?php echo $val['type']; ?></h3>
												<p><?php echo $val['soustype']; ?></p>

												<?php 
												echo (round(get_distance_m($latitude, $longitude, $lat, $long) / 1000)). ' km';
									 			?>
									 			<br>
												<a href="annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

												</article>
												<?php
												$i++;
											}
									}else{
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

								} $i++;
								?>
								

							<a href="annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

							</article>
						<?php

						
						
					}//fin if
}	
}
				
				?>
					
						
				
							

					</div>
					<div id="vente" class="hidden">
						<?php
							if (isset($_GET['tri'])&&isset($_GET['type'])) // On a le nom et le prénom
							{
								$tri=$_GET['tri'];
								$type=$_GET['type'];
								
								$sql="SELECT * FROM materiaux WHERE type='". $type ."' && vente='0' ORDER BY ID DESC LIMIT 8";
								
							}
							elseif (isset($_GET['type'])){
								$type=$_GET['type'];
								
									$sql="SELECT * FROM materiaux WHERE type='". $type."' && vente='0' ORDER BY ID DESC LIMIT 8";
								
							


							}
							elseif (isset($_GET['tri'])){
								$tri=$_GET['tri'];
								$sql="SELECT * FROM materiaux WHERE vente='0' ORDER BY ID DESC";
							}
							else // Il manque des paramètres, on avertit le visiteur
							{
								$tri = 'prix';
								$sql="SELECT * FROM materiaux WHERE vente='0' ORDER BY ID DESC" ;
							}
							if (isset($_GET['range'])&&isset($_GET['lat'])&&isset($_GET['long'])){
								$latitude=$_GET['lat'];
								$longitude=$_GET['long'];

								$range=$_GET['range'];
							}
							$req = $db->prepare($sql);
							$req->execute();
							  
							$result = $req->fetchAll(PDO::FETCH_ASSOC);
							$i=0;
							foreach($result as $val){
								if($i<12){
									if (isset($latitude)){

										$lat=$val['lattitude'];
										$long=$val['longitude'];
										$km = round(get_distance_m($latitude, $longitude, $lat, $long) / 1000);
											if($km<=$range){
												?><article>
												<img src="../images/materiaux/<?php echo $val['type']; ?>.jpg" alt="<?php echo $val['type']; ?>">
												<h3><?php echo $val['type']; ?></h3>
												<p><?php echo $val['soustype']; ?></p>

												<?php 
												echo (round(get_distance_m($latitude, $longitude, $lat, $long) / 1000)). ' km';
									 			?>
									 			<br>
												<a href="annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

												</article>
												<?php
												$i++;
											}
									}else{
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

								} $i++;
								?>
								

							<a href="annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

							</article>
						<?php

						
						
					}//fin if
}	
}			
					
				?>
					
						
				
							

					</div>

	</div>
	
	</div>
</div>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="../js/script.js"></script>
</body>