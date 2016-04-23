

<?php require('header.php'); ?>
<script src="js/script.js"></script>
<body>
<div class='content_back'>

		<div class="inscription align">
			<a href="" onclick="client();return false">Inscription client</a>
		</div>
		<div class="inscription align padding_r-l">
			<a href="" onclick="fournisseur();return false">Inscription fournisseur</a>
		</div>

	<div id="client">
		<form class="form" method="POST" action="insert_user.php">
			<h2>Inscription Acheteur</h2>
					

							
						<p>entreprise/pseudo <input  class="form-input" type="text" name="pseudo" pattern="[a-zA-Z0-9]+" placeholder="Votre nom" required ></p>
		

							
						<p>mot de passe <input  class="form-input" type="password" name="password" pattern"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" placeholder="Votre mot de passe" required ></p>
								
					

							
						<p>email <input  class="form-input" type="email" name="mail" placeholder="Votre email"  required ></p>
								
							
						<p>Adresse <input class="form-input" id="address"  type="text" name="ville" placeholder="Votre adresse" required ></p>
								
						<a href="#" onclick="verif();">Vérifier</a>
						
				
					<div class="role">

						<input type="number" name="role" value="3">

					</div> 
			
						<input type="number" id="lat" step="any" name="lat" value="" hidden>					

						<input type="number" id="long" step="any" name="long" value="" hidden>

		
			<input id="valid" class="btn" type="submit"></br></br>
		</form>
	</div>
</div>


</body>
</html>