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
			<form action="index.php" method="get" class="recherche">
				<?php 
					if(isset($_SESSION['ville'])&&isset($_SESSION['adresse'])&&$_GET['ville']!="1"&&$_GET['adresse']!="1"){
						$ville=$_SESSION['ville'];
						$adresse=$_SESSION['adresse'];
						?>
							<input class="input_recherche" type="text" name="ville" value="<?php echo $ville; ?>">
							<input class="input_recherche" type="text" name="adresse" value="<?php echo $adresse; ?>">
						<?php
					}else{
						?>
							<input class="input_recherche" type="text" name="ville" placeholder="Votre ville">
							<input class="input_recherche" type="text" name="adresse" placeholder="Votre adresse">
						<?php
					}
				?>
				
				<p> dans un rayon de </p>
				<input class="input_recherche form_number" type="number" name="range" value="50" ><p> km</p><br>


				<SELECT class="input_recherche" name="tri" size="1" required>
					<OPTION value="prix">prix</option>
					<OPTION value="ID">temps</option>
				</SELECT>
				
				<input class="btn2" type="submit" value="rechercher"></br></br>
			</form>
			<h2>Annonce de</h2>
			<h2 id="achat2" class="selection_swap swap">recherche de matériaux</h2><h2 id="besoin2" class="swap">vente de matériaux</h2>

						<div id="besoin">


							<!-- personne dans le besoin  -->
						<?php
							if (isset($_GET['tri'])&&isset($_GET['type'])) // On a le nom et le prénom
							{
								$tri=$_GET['tri'];
								$type=$_GET['type'];
								
								$sql="SELECT * FROM materiaux WHERE type='". $type ."' && vente='1' ORDER BY " . $tri ."";
								
							}
							elseif (isset($_GET['type'])){
								$type=$_GET['type'];
								
									$sql="SELECT * FROM materiaux WHERE type='". $type."' && vente='1'";
								
								


							}
							elseif (isset($_GET['tri'])){
								$tri=$_GET['tri'];
								$sql="SELECT * FROM materiaux WHERE vente='1' ORDER BY " . $tri;
							}
							else // Il manque des paramètres, on avertit le visiteur
							{
								$tri = 'prix';
								$sql="SELECT * FROM materiaux WHERE vente='1'  ORDER BY " . $tri;
							}
							if (isset($_GET['range'])&&isset($_GET['ville'])&&isset($_GET['adresse'])&&$_GET['ville']!="1"&&$_GET['adresse']!="1"){
								$adresse=$_GET['adresse'];
								$ville=$_GET['ville'];

								$range=$_GET['range'];
							
								
								$urlWebServiceGoogle = 'http://maps.google.com/maps/api/geocode/json?address=%s&sensor=false&language=fr';
								$postal2Address = $adresse.', '.$ville.',  France';
									 
								$url = vsprintf($urlWebServiceGoogle, urlencode($postal2Address));
								$response = json_decode(file_get_contents($url));
								
									$latitude =  $response->results[0]->geometry->location->lat;
									$longitude = $response->results[0]->geometry->location->lng;
									
								


							}

				  
					$req = $db->prepare($sql);
					$req->execute();
					  
					$result = $req->fetchAll(PDO::FETCH_ASSOC);
					$i=0;
					foreach($result as $val){
						if($i<8){
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

						}
						
					}//fin if
					}
				?>
					
						
				
							

					</div>
					<div id="vente" class="hidden">
						<?php
							if (isset($_GET['tri'])&&isset($_GET['type'])) // On a le nom et le prénom
							{
								$tri=$_GET['tri'];
								$type=$_GET['type'];
								
								$sql="SELECT * FROM materiaux WHERE type='". $type ."' && vente='0' ORDER BY " . $tri ." LIMIT 8";
								
							}
							elseif (isset($_GET['type'])){
								$type=$_GET['type'];
								if ($type="all"){
									$sql="SELECT * FROM materiaux";
								}else{
									$sql="SELECT * FROM materiaux WHERE type='". $type."' && vente='0' LIMIT 8";
								}
								


							}
							elseif (isset($_GET['tri'])){
								$tri=$_GET['tri'];
								$sql="SELECT * FROM materiaux WHERE vente='0' ORDER BY " . $tri;
							}
							else // Il manque des paramètres, on avertit le visiteur
							{
								$tri = 'prix';
								$sql="SELECT * FROM materiaux WHERE vente='0' ORDER BY " . $tri;
							}
							if (isset($_GET['range'])&&isset($_GET['ville'])&&isset($_GET['adresse'])&&$_GET['ville']!="1"&&$_GET['adresse']!="1"){
								$adresse=$_GET['adresse'];
								$ville=$_GET['ville'];

								$range=$_GET['range'];
							
								
								$urlWebServiceGoogle = 'http://maps.google.com/maps/api/geocode/json?address=%s&sensor=false&language=fr';
								$postal2Address = $adresse.', '.$ville.',  France';
									 
								$url = vsprintf($urlWebServiceGoogle, urlencode($postal2Address));
								$response = json_decode(file_get_contents($url));
								
									$latitude =  $response->results[0]->geometry->location->lat;
									$longitude = $response->results[0]->geometry->location->lng;
									
								


							}

				  
					$req = $db->prepare($sql);
					$req->execute();
					  
					$result = $req->fetchAll(PDO::FETCH_ASSOC);
					$j=0;
					foreach($result as $val){
						if($j<8){
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
							$j++;
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

								}
								?>
								

							<a href="annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

							</article>
						<?php
						$j++; 

						}
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