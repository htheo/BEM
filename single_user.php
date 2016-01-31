<?php 					include ('config.php');

?>

<html lang="fr">
<head>
	<meta charset="utf-8">

	<title>connection</title>
	<meta name="connection" >

	<link href="css/style.css" rel="stylesheet" type="text/css">


</head>
<body>


<nav>


			<ul>
				<?php
					if (empty($_SESSION["name"])) {
						echo '<li><a value="Accueil" href="index.php"><span>Accueil</span></a></li>';
						echo '<li><a value="Contact" href="materiaux.php">Matériaux</a></li>';
						echo '<li><a value="Bars" href="partenaires.php">Nos partenaires</a></li>';
						echo '<li><a  value="Se connecter" href="connection.php"><span>Connexion</span></a></li>';
						echo '<li><a  value="inscription" href="inscription.php"><span>Inscription</span> </a></li>';

					}else{
						echo '<li><a value="Accueil" href="index.php">Accueil</a></li>';
						echo '<li><a value="Contact" href="materiaux.php">Matériaux</a></li>';
						echo '<li><a value="Bars" href="partenaires.php">Nos partenaires</a></li>';
						echo '<li><a value="deconnection" href="deconnection.php">Déconnexion</a></li>';
						echo '<li><a>'.$_SESSION["name"].'</a></li>';
					}
				?>

			</ul>

</nav>
<div class='content'>

	<?php
	$pseudo =$_SESSION["name"];
	$sql="SELECT * FROM users WHERE pseudo='".$pseudo."'";



	$req = $db->prepare($sql);
	$req->execute();

	$result = $req->fetchAll(PDO::FETCH_ASSOC);

	foreach($result as $val){
		 $role=$val['role'];
	}
$_SESSION['role']=$role;

if ($role==1){
	header("Location: rezzgedfgyyhfgjk.php");
}
if ($role==2){
	header("Location: qsdfsdqqsf.php");
}
if ($role==3){
	header("Location: entreprise.php");

}

if ($role==4){
	header("Location: client.php");
}







?>

</div>

</body>
</html>