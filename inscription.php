<html lang="fr">
<head>
	<meta charset="utf-8">

	<title>Inscription BEM</title>
	<meta name="connection" >
	
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

</head>
<body>

<? include('header.php'); ?>
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
								
		
							
						<p>adresse <input class="form-input"  type="text" name="adresse" pattern="[a-zA-Z0-9 ]+" placeholder="Votre adresse" required /></p>
								
			
							
						<p>code postal <input class="form-input"  type="text" name="postal" pattern="[0-9]{5}" placeholder="Votre code postal" required ></p>
								
							
				
							
						<p>ville <input class="form-input"  type="text" name="ville" pattern="[a-zA-Z0-9]+" placeholder="Votre ville" required ></p>
								
						

					<div class="role">

						<input type="number" name="role" value="4">

					</div> 
						
						
						
						

		
		
		
		
			<input class ="btn"type="submit"></br></br>
		</form>
	</div>
	<div id="fournisseur">
		<form class="form" method="POST" action="insert_user.php">
			<h2>Inscription Acheteur/Vendeur</h2>
					

							
						<p>entreprise<input  class="form-input" type="text" name="pseudo" pattern="[a-zA-Z0-9]+" placeholder="Votre nom" required ></p>
								
							
			
							
						<p>mot de passe <input  class="form-input" type="password" name="password" pattern"^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" placeholder="Votre mot de passe" required ></p>
			

							
						<p>email <input class="form-input"  type="email" name="mail" placeholder="Votre email"  required ></p>
		

							
						<p>adresse <input class="form-input"  type="text" name="adresse" pattern="[a-zA-Z0-9]+" value="" placeholder="Votre adresse" required /></p>
								
				
							
						<p>code postal <input class="form-input" type="text" name="postal" pattern="[0-9]{5}" placeholder="Votre code postal"></p>
								
					
							
						<p>ville <input class="form-input" type="text" name="ville" pattern="[a-zA-Z0-9]+" placeholder="Votre ville" required ></p>
								
							
					

					<div class="role">

						<input type="number" value="3">

					</div> 
						
						
						

		
		
		
		
			<input class="btn" type="submit"></br></br>
		</form>
	</div>
</div>


</body>
</html>