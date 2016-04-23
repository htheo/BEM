
	<!-- Libs -->
	

	

	<h2>Inscription</h2>


<div>
	<div class="form_inscription" id="client">
		<form method="POST" action="insert_user.php">
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
						<p>Votre adresse : <input id="address" type="text" name="ville" placeholder="Votre adresse" required ></p>
					</div>

					<a href="#" onclick="verif();">Vérifier</a>
						
				
					<div class="role">

						<input type="number" name="role" value="3">

					
			

					<input type="number" id="lat" step="any" name="lat" value="" hidden>

					

					<input type="number" id="long" step="any" name="long" value="" hidden>
		
		</div> 
			<input id="valid" class="btn" type="submit"></br></br>
			</form>

	</div>

</div>

