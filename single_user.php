<?php 				
require('header.php');

?>


<div class='content'>
<div class="content_back erreur">
<br><br><br><br><br>
		<h1>Problème avec votre compte</h1>
		<a href="inscription.php">réessayez de s'inscrire</a>	</div> 

	<?php
	$pseudo =$_SESSION["name"];
	$sql="SELECT * FROM users_bem WHERE pseudo='".$pseudo."'";



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