<?php require('header.php'); ?>

<div class="content">



	<div class="container marg_top">
		<div class="col1 content2">
			<h2>Articles en argile</h2>
			<form action="argiles.php" method="get" class="recherche">
				<?php 
					if(isset($_SESSION['ville'])&isset($_SESSION['adresse'])&$_GET['ville']!="1"&$_GET['adresse']!="1"){
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
			<?php
				
				if (isset($_GET['tri'])){
					$tri=$_GET['tri'];
					$sql="SELECT * FROM materiaux WHERE type = 'Argile' ORDER BY " . $tri;
				}
				else // Il manque des paramètres, on avertit le visiteur
				{
					$tri = 'prix';
					$sql="SELECT * FROM materiaux WHERE type = 'Argile'  ORDER BY " . $tri;
				}
				if (isset($_GET['range'])&isset($_GET['ville'])&isset($_GET['adresse'])&$_GET['ville']!="1"&$_GET['adresse']!="1"){
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

		foreach($result as $val){
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
				<a href="materiaux/annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

				</article>
			<?php
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
					

				<a href="materiaux/annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

				</article>
			<?php

			}
		}
	?>
		
			
	
				

		</div>

	<script type="text/javascript" src="../js/script.js"></script>
	</body>
</html>
