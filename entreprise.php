
<?php include('header.php'); ?>

<?php
if (empty($_SESSION["name"])) {
	header("Location: erreur_acces.php");
}
if (empty($_SESSION["role"])) {
	header("Location: erreur_acces.php");
}
if ($_SESSION["role"]!=3) {
	header("Location: erreur_acces.php");
}


?>

<div class="container marg_top">
	<div class="col1">
		<h1>Mon Profil</h1>


			<?php 

				echo '<p> Votre nom : '.$_SESSION["name"].'</p>';
				$idencours=$_SESSION['ID'];
				
		
			$sql="SELECT * FROM users_BEM WHERE ID = " . $idencours;
		$req = $db->prepare($sql);
		$req->execute();
		  
		$result = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $val){
			echo "<p>Votre mail : ".$val['mail']."</p>";
			echo "<p>Votre adresse : ".$val['ville']." ".$val['adresse']."</p>";

			
		
	}?>
			<a class="btn2" href="envoimail.php">Mot de passe oublié ?</a>



	</div>
	<div class="col2">

		<form class="form_inscription" method="POST" action="insert_materiau.php">
				<h2>Ajout d'une annonce</h2>

						<p>entreprise : <input type="text" name="entreprise" pattern="[a-zA-Z0-9 ]+" value="<?php echo $_SESSION["name"];  ?>" required ></p>

						<p>description : <textarea type="text" name="description" pattern="[a-zA-Z0-9 ]+" placeholder="informations supplémentaires" required></textarea> 
						<P>Vous cherchez à :</p>
						<SELECT name="vente" size="1">
							<OPTION value="1">Vendre des matériaux</option>
							<OPTION value="0">Trouver des matériaux</option>
						</SELECT><br>
						<p>Type du matériau : </p>
						<SELECT name="type" size="1" required>
							<OPTION value="Argile">Argile</option>
							<OPTION value="Autres">Autres</option>
							<OPTION value="Autres_organique">Autres organique</option>
							<OPTION value="Calcaire">Calcaire</option>
							<OPTION value="Cendres">Cendres volantes</option>
							<OPTION value="Craie">Craie</option>
							<OPTION value="Deblais">Déblais</option>
							<OPTION value="Demolition">Démolition</option>
							<OPTION value="Faible_organique">Faible organique</option>
							<OPTION value="Fortement_organique">Fortement organique</option>
							<OPTION value="Laitier_fourneau">Laitier fourneau</option>
							<OPTION value="Limon">Limon</option>
							<OPTION value="Machefer">Machefer</option>
							<OPTION value="Marne">Marne</option>
							<OPTION value="Phosphogypse">Phosphogypse</option>
							<OPTION value="Remblais">Remblais</option>
							<OPTION value="Roche_argileuse">Roche argileuse</option>
							<OPTION value="Roche_magmatique">Roche magmatique</option>
							<OPTION value="Roche_saline">Roche saline</option>
							<OPTION value="Roche_silicieuse">Roche silicieuse</option>
							<OPTION value="Sable">Sable</option>

						</SELECT><br>
									
				
								
							<p>téléphone : <input type="text" name="telephone" pattern="[a-zA-Z0-9 ]+" placeholder="Votre numéro" /></p>
		
								
							<p>mail : <input type="email" name="mail" placeholder="Votre adresse mail" /></p>
									
			
								
							<p>adresse : <input type="text" id="address" name="ville" placeholder="Votre adresse" required /></p>
									
				<p onclick="verif2();">Vérifier</p>
						
				
					<div class="role">

			
						<input type="number" id="lat2" step="any" name="lat" value="" hidden>					

						<input type="number" id="long2" step="any" name="long" value="" hidden>
					</div> 
		
			<input id="valid2" class="btn2" type="submit" value="Envoyer"></br></br>
			</form>

	</div>
</div>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>