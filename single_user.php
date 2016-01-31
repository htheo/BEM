
				<?php
					include ('config.php');

$role=$_SESSION['role'];


>>>>>>> aba95591c2cd42a8218088da613f0eeb143b66a6
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
else{
	echo $_SESSION['role'];
}








?>
