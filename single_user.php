
				<?php
					include ('config.php');


$role=$_SESSION['role'];

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
