
<html>
	<head>

		<title>Bourse Echange et Matériaux</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">

		<meta name="viewport" content="width=device-width" />
		<link rel="icon" type="image/png" href="../image/logo2.png" />
		<meta name="DC.title" content="Bourse Echange et Matériaux">
		<meta name="DC.creator" content="Theo Hinfray">
		<meta name="DC.subject" content="Bourse échange et matériaux (BEM) permets aux entreprises de trouver en ligne des matériaux bon marché proche" />
		<meta name="DC.description" content="Bourse échange et matériaux (BEM) permets aux entreprises de trouver en ligne des matériaux bon marché proche" />
		<meta name="DC.publisher" content="Theo Hinfray">
		<meta name="DC.format" content="website">
		<meta name="DC.identifier" content="www.theo-hinfray.fr">
		<meta name="DC.language" content="fr-FR">
		<meta name="DC.coverage" content="World">
		<meta name="DC.rights" content="&copy; Badabouh corp">
		<!-- END Dublin Core -->


		<!-- Referencement -->
		<meta name="description" content="Bourse échange et matériaux (BEM) permets aux entreprises de trouver en ligne des matériaux bon marché proche">
		<meta name="keywords" content="BEM, Bourse, echange, materiaux, materiau, bourse d'échange de materiaux, chantier, btp, en ligne, boursomat, proximité, proche">
		<meta name="author" content="Theo Hinfray">
		<meta name="robots" content="index"> 
		<meta name="Indentifier-URL" content="www.cinepulv.fr">
		<!-- END Référencement -->


		<!-- Open Graph-->
		<meta property="og:title" content="Bourse Echange et Matériaux">
		<meta property="og:type" content="website">
		<meta property="og:url" content="www.cinepulv.fr">
		<meta property="og:site_name" content="Bourse Echange et Matériaux">
		<meta property="og:description" content="Bourse échange et matériaux (BEM) permets aux entreprises de trouver en ligne des matériaux bon marché proche">

	</head>


	<body class="materiaux">
		<div class="logo"><img src="../images/logo.png" alt="logo BEM bourse d'échange et matériaux"></div>
<nav>

				
			<ul>
				<?php
					include ('../config.php');

					

					if (empty($_SESSION["name"])) {
						echo '<li><a value="Accueil" href="../index.php"><span>Accueil</span></a></li>';
						echo '<li><a value="Contact" href="#">Matériaux</a></li>';
						echo '<li><a value="Bars" href="../partenaires.php">Nos partenaires</a></li>';
						echo '<li><a  value="Se connecter" href="../connection.php"><span>Se connecter</span></a></li>';
						echo '<li><a  value="inscription" href="../inscription.php"><span>Inscription</span> </a></li>';

					}else{
						echo '<li><a value="Accueil" href="index.php">Accueil</a></li>';
						echo '<li><a value="Contact" href="#">Matériaux</a></li>';
						echo '<li><a value="Bars" href="../partenaires.php">Nos partenaires</a></li>';
						echo '<li><a value="deconnection" href="../deconnection.php">se déconnecter</a></li>';
						echo '<li><a href="../single_user.php">'.$_SESSION["name"].'</a></li>';
					}
				?>

			</ul>
	<div class="sousmenu">

		<ul>
			<li><a href="">Materiaux</a></li>
			<li><a href="">Materiaux</a></li>
			<li><a href="">Materiaux</a></li>
			<li><a href="">Materiaux</a></li>
			<li><a href="">Materiaux</a></li>
			<li><a href="">Materiaux</a></li>
			<li><a href="">Materiaux</a></li>
			<li><a href="">Materiaux</a></li>

		</ul>

	</div>
</nav>
<div class="content">
	
	<form action="autre_organique.php" method="get">
		<h2>trier par :</h2>
	    <input type="radio" name="tri" value="prix" checked>Par prix

		<input type="radio" name="tri" value="ID">Par ID
		
		<input class ="btn"type="submit"></br></br>
	</form>

	<h1>autre_organique</h1>

	<?php 

	include('function.php');
	
	if (isset($_GET['tri'])) // On a le nom et le prénom
	{
		$tri=$_GET['tri'];
		$sql="SELECT * FROM materiaux WHERE type = 'autre_organique'  ORDER BY " . $tri;
	}
	else // Il manque des paramètres, on avertit le visiteur
	{
		$tri = 'prix';
		$sql="SELECT * FROM materiaux WHERE type = 'autre_organique'  ORDER BY " . $tri;
	}

		
		
	
	

	  
		$req = $db->prepare($sql);
		$req->execute();
		  
		$result = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $val){
			echo $val['type']."<br>";
			echo "prix : ".$val['prix']." euros <br>";
			echo "adresse : ".$val['adresse']." ".$val['ville']."<br>";
			?>
			<a href="annonce.php?annonce=<?php echo $val['ID']; ?>">Voir l'annonce</a><br><br>

			<?php
			

			
		
	}?>
	

	</div>	

</div>

	<script type="text/javascript" src="../js/script.js"></script>
	</body>
</html>
