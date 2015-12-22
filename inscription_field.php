
	<!-- Libs -->
	

	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script language="javascript" type="text/javascript"> /* fonction bascule form fournisseur/client  */

	function fournisseur()
	   {
	 
	 
	   document.getElementById('fournisseur').style.display="block";

	   document.getElementById('client').style.display="none";
	    
	}
	function client()
	   {
	 
	 
	   document.getElementById('client').style.display="block";

	   document.getElementById('fournisseur').style.display="none";
	    
	}

//commentaire



</script>

<div class=''>



	<div id="client">
		<form method="POST" action="insert_user.php">
			<h2>Inscription Client</h2>
					<div class="form-input">
							
						<p>Entreprise/pseudo : <input type="text" name="pseudo" pattern="[a-zA-Z0-9]+" placeholder="Votre nom" required ></p>
								
							
					</div>
					<div class="form-input">
							
						<p>Mot de passe : <input type="password" name="password" pattern"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" placeholder="Votre mot de passe" required ></p>
								
							
					</div>
					<div class="form-input">
							
						<p>Email : <input type="email" name="mail" placeholder="Votre email"  required ></p>
								
							
					</div>
					<div class="form-input">
							
						<p>Adresse : <input type="text" name="adresse" pattern="[a-zA-Z0-9 ]+" placeholder="Votre adresse" required /></p>
								
							
					</div>
					<div class="form-input">
							
						<p>Code postal : <input type="text" name="postal" pattern="[0-9]{5}" placeholder="Votre code postal" required ></p>
								
							
					</div>
					<div class="form-input">
							
						<p>Ville : <input type="text" name="ville" pattern="[a-zA-Z0-9]+" placeholder="Votre ville" required ></p>
								
							
					</div>

					<div class="role">

						<input type="number" name="role" value="4">

					</div>

			<input class ="btn"type="submit"></br></br>
			</form>

	</div>


	<div class="inscription">
		<a href="" onclick="client();return false">Inscription client</a>
	</div>
	<div class="inscription">
		<a href="" onclick="fournisseur();return false">Inscription fournisseur</a>
	</div>



	<div id="fournisseur">
		<form method="POST" action="insert_user.php">
			<h2>- Inscription entreprise -</h2>
					<div class="form-input">
							
						<p>entreprise : <input type="text" name="pseudo" pattern="[a-zA-Z0-9]+" placeholder="Votre nom" required ></p>
								
							
					</div>
					<div class="form-input">
							
						<p>mot de passe : <input type="password" name="password" pattern"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" placeholder="Votre mot de passe" required ></p>
								
							
					</div>
					<div class="form-input">
							
						<p>email : <input type="email" name="mail" placeholder="Votre email"  required ></p>
								
							
					</div>
					<div class="form-input">
							
						<p>adresse : <input type="text" name="adresse" pattern="[a-zA-Z0-9]+" value="" placeholder="Votre adresse" required /></p>
								
							
					</div>
					<div class="form-input">
							
						<p>code postal : <input type="text" name="postal" pattern="[0-9]{5}" placeholder="Votre code postal"></p>
								
							
					</div>
					<div class="form-input">
							
						<p>ville : <input type="text" name="ville" pattern="[a-zA-Z0-9]+" placeholder="Votre ville" required ></p>
								
							
					</div>

					<div class="role">

						<input type="number" value="3">

					</div> 
						
						
						

		
		
		
		
			<input class ="btn"type="submit"></br></br>
		</form>
	</div>
</div>

