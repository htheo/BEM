
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

							<p>entreprise : <input type="text" name="entreprise" pattern="[a-zA-Z0-9]+" value="<?php echo $_SESSION["name"];  ?>" readonly required ></p>
									
						
						
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

								
							<p>prix : <input type="text" name="prix" pattern="[a-zA-Z0-9 ]+" placeholder="Votre numéro" /></p>
									
				
								
							<p>téléphone : <input type="text" name="telephone" pattern="[a-zA-Z0-9 ]+" placeholder="Votre numéro" /></p>
		
								
							<p>mail : <input type="email" name="mail" placeholder="Votre adresse mail" /></p>
									
			
								
							<p>adresse : <input type="text" name="adresse" pattern="[a-zA-Z0-9 ]+" placeholder="Votre adresse" required /></p>
									

								
							<p>code postal : <input type="text" name="postal" pattern="[0-9]{5}" placeholder="Votre code postal" required ></p>
									
		
								
							<p>ville : <input type="text" name="ville" pattern="[a-zA-Z0-9]+" placeholder="Votre ville" required ></p>
									
				
					
							
							
							
							

			
			
			
			
				<input class ="btn"type="submit"></br></br>
			</form>

	</div>
</div>

</body>
</html>