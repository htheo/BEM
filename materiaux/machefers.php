<?php require('header.php'); ?>

<div class="content">
	
	<form action="Sables.php" method="get">
		<h2>trier par :</h2>
		<select name="tri" class="autosubmit">
			<option value="prix">Par Prix</option>
			<option value="ID">Par ID</option>

		</select>
	    
		
		<h2>sous classe :</h2>
		<select name="sousclasse" class="autosubmit">
			<option value="Neutralise">Grossier neutralisé à la chaux</option>
			<option value="Non_neutralise">Fin ou grossier non neutralisé</option>
			

		</select>
	    

		
		<input class ="btn"type="submit"></br></br>
	</form>

	<h1>machefers</h1>

	<?php 

	include('function.php');
	
	if (isset($_GET['tri']) && isset($_GET['sousclasse'])) // On a le nom et le prénom
	{
		$tri=$_GET['tri'];
		$sousclasse=$_GET['sousclasse'];
		$sql="SELECT * FROM materiaux WHERE type = 'machefers' AND soustype = '" . $sousclasse . "' ORDER BY " . $tri;
	}
	elseif (isset($_GET['tri']))
	{
		$tri=$_GET['tri'];
		$sql="SELECT * FROM materiaux WHERE type = 'machefers' ORDER BY " . $tri;
	}
	else // Il manque des paramètres, on avertit le visiteur
	{
		$tri = 'prix';
		$sql="SELECT * FROM materiaux WHERE type = 'machefers'  ORDER BY " . $tri;
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
