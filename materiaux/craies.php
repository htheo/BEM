<?php require('header.php'); ?>

<div class="content">
	
	<form action="craies.php" method="get">
		<h2>trier par :</h2>
	    <input type="radio" name="tri" value="prix" checked>Par prix

		<input type="radio" name="tri" value="ID">Par ID
		
		<input class ="btn"type="submit"></br></br>
	</form>

	<h1>craies</h1>

	<?php 

	include('function.php');
	
	if (isset($_GET['tri'])) // On a le nom et le prénom
	{
		$tri=$_GET['tri'];
		$sql="SELECT * FROM materiaux WHERE type = 'craies'  ORDER BY " . $tri;
	}
	else // Il manque des paramètres, on avertit le visiteur
	{
		$tri = 'prix';
		$sql="SELECT * FROM materiaux WHERE type = 'craies'  ORDER BY " . $tri;
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
