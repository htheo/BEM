<?php
require ('config.php');
  
$pseudo		= htmlentities($_POST['pseudo']);
$password	= htmlentities($_POST['motdepasse']);

$connecte = 0;

// On récupère tout le contenu de la table 

$reponse = $db->query('SELECT * FROM users');
foreach($reponse as $val){
		 
		 if ($val['pseudo']==$pseudo){
		 	if($val['password']==$password){
		 	$_SESSION['name'] = $pseudo;
			$_SESSION['password'] = $password;
		 	$connecte = 1;
		 	break;
		 
		 	
		 	

		 	}
		 	// L'user est connecté
		 	
		 		 	

}
}

		 

if ($connecte ==1){header("Location: index.php");
}else{
	header("Location: connection.php");
}



	
	
	
	


?>