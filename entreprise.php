
<<<<<<< HEAD
	<title>Compte client</title>
	<meta name="client" >

	<!-- Libs -->


	<link href="css/style.css" rel="stylesheet" type="text/css">

</head>
<body>
=======
>>>>>>> origin
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

				echo '<div>'.$_SESSION["name"].'</div>';
				echo '<div>'.$_SESSION["name"].'</div>';

			?>
			<a href="envoimail.php">Mot de passe oublié ?</a>



	</div>
	<div class="col2">

		<form class="form_inscription" method="POST" action="insert_materiau.php">
				<h2>Ajout d'une annonce</h2>

							<p>entreprise : <input type="text" name="entreprise" pattern="[a-zA-Z0-9]+" value="<?php echo $_SESSION["name"];  ?>" readonly required ></p>
									
						
						
						<p>Type du matériau : </p>
						<SELECT name="type" size="1" required>
							<OPTION value="deblais">Deblais</option>
							<OPTION value="materiau">Materiau</option>
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