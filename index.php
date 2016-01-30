<?php
require('header.php');
include('materiaux/function.php');?>





<div class="content">


	<div class="slider">
		<div class="container">
		<h1>BEM, Bourse d'échange de matériaux</h1>
		<h2>Architectes, trouvez facilement vos fournisseurs de matières premières.</h2>
		</div>
	</div>

	<div class="container marg_top">
		<div class="col1 content2">
			<h2>Articles populaires</h2>
			<form action="index.php" method="get" class="recherche">
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
				<input class="input_recherche" type="number" name="range" value="50" class="form_number"><p> km</p><br>
				<SELECT class="input_recherche" name="type" size="1" required>
					<OPTION value="all">Type de matériaux</option>
					<OPTION value="Sable">Sable</option>
					<OPTION value="Argile">Argile</option>
					<OPTION value="Limon">Limon</option>
					<OPTION value="Marne">Marne</option>
					<OPTION value="Calcaire">Calcaire</option>
					<OPTION value="Craie">Craie</option>
					<OPTION value="Roche-argileuse">Roche argileuses</option>
					<OPTION value="Argile">Argile</option>
				</SELECT>
				<SELECT class="input_recherche" name="tri" size="1" required>
					<OPTION value="prix">prix</option>
					<OPTION value="ID">temps</option>
				</SELECT>
				
				<input class="btn2" type="submit" value="rechercher"></br></br>
			</form>
			<?php
				if (isset($_GET['tri'])&isset($_GET['type'])) // On a le nom et le prénom
				{
					$tri=$_GET['tri'];
					$type=$_GET['type'];
					if ($type="all"){
						$sql="SELECT * FROM materiaux ORDER BY " . $tri ." LIMIT 8";
					}else{
					$sql="SELECT * FROM materiaux WHERE type='". $type ."' ORDER BY " . $tri ." LIMIT 8";
					}
				}
				elseif (isset($_GET['type'])){
					$type=$_GET['type'];
					if ($type="all"){
						$sql="SELECT * FROM materiaux";
					}else{
						$sql="SELECT * FROM materiaux WHERE type='". $type."' LIMIT 8";
					}
					


				}
				elseif (isset($_GET['tri'])){
					$tri=$_GET['tri'];
					$sql="SELECT * FROM materiaux ORDER BY " . $tri;
				}
				else // Il manque des paramètres, on avertit le visiteur
				{
					$tri = 'prix';
					$sql="SELECT * FROM materiaux  ORDER BY " . $tri;
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
				}
			}else{
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
		}
	?>
		
			
	
				

		</div>
		<div class="col2">

			<?php
			if(empty($_SESSION['name'])){
				include ('inscription_field.php');
			}else{
				?> <h2>Bonjour à vous <?php echo $_SESSION['name'];  ?></h2>

				<a class="marg_top" href="single_user.php">Accéder à votre compte</a>
				<?php 
					if($_SESSION['role']==3){ 	
				?>
				<a href="single_user.php">Ajouter un article</a>
				<a href="single_user.php">Voir tous vos articles</a>

			   <?php
					}
			}  ?>
		</div>
	</div>
</div>

<?php include ('footer.php'); ?>