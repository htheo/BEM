<?php		include('config.php');
?>
<html lang='fr'>
<head>

	<title>Bourse Echange et Matériaux</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Archivo+Narrow:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

	

	
	<meta name="viewport" content="width=device-width" />
	<link rel="icon" type="image/png" href="images/bem.png" />
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
	<meta name="Indentifier-URL" content="www.bem.fr">
	<!-- END Référencement -->


	<!-- Open Graph-->
	<meta property="og:image" content="images/bem.png">
	<meta property="og:title" content="Bourse Echange et Matériaux">
	<meta property="og:image" content="images/BEM.png">
	<meta property="og:type" content="website">
	<meta property="og:url" content="www.bem.fr">
	<meta property="og:site_name" content="Bourse Echange et Matériaux">
	<meta property="og:description" content="Bourse échange et matériaux (BEM) permets aux entreprises de trouver en ligne des matériaux bon marché proche">
</head>


<body>
<nav>
	<a  value="Accueil" href="index.php"><span><div class="logo"><img src="images/logo.png" alt="logo BEM bourse d'échange et matériaux"></div>
</span> </a>

	<ul  class="menu_principal">
		<?php



		if (empty($_SESSION["name"])) {
			echo '<li><a value="Accueil" href="index.php"><span>Accueil</span></a></li>';
			echo '<li><a value="Contact" href="materiaux/">Matériaux</a></li>';
			echo '<li><a value="Partenaire" href="partenaires/">Nos partenaires</a></li>';
			echo '<li><a  value="Se connecter" href="connection.php"><span>Connexion</span></a></li>';
			echo '<li><a  value="inscription" href="inscription.php"><span>Inscription</span> </a></li>';

		}else{
			echo '<li><a value="Accueil" href="index.php">Accueil</a></li>';
			echo '<li><a value="Contact" href="materiaux/">Matériaux</a></li>';
			echo '<li><a value="Bars" href="partenaires/">Nos partenaires</a></li>';
			echo '<li><a value="deconnection" href="deconnection.php">Déconnexion</a></li>';
			echo '<li><a href="single_user.php">'.$_SESSION["name"].'</a></li>';
		}
		?>

	</ul>

	<div class="sousmenu">

		<ul>
			<li><a  href="materiaux/materiau.php?type=Sable&name=sable">Sables</a></li>
			<li><a href="materiaux/materiau.php?type=Argile&name=argile">Argiles</a></li>
			<li><a href="materiaux/materiau.php?type=Limon&name=limons">Limons</a></li>
			<li><a href="materiaux/materiau.php?type=Marne&marnes">Marnes</a></li>
			<li><a  href="materiaux/materiau.php?type=Marne&marnes">Calcaires</a></li>
			<li><a href="materiaux/materiau.php?type=Craie&name=craies">Craies</a></li>
			<li><a href="materiaux/materiau.php?type=Roche_argileuse&name=roches%20argileuses">Roches argileuses</a></li>
			<li><a href="materiaux/">Autres</a></li>

		</ul>

	</div>
</nav>