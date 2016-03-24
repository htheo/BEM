<?php require('header.php'); ?>


<div class="content">
	<?php
		$sql="SELECT * FROM users_BEM WHERE role = 3";
		$req = $db->prepare($sql);
		$req->execute();
		  
		$result = $req->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $val){
			echo $val['pseudo']."<br>";
			echo "prix : ".$val['mail']." euros <br>";
			echo "adresse : ".$val['adresse']." ".$val['ville']."<br>";
			?>
			<a href="single.php?entreprise=<?php echo $val['pseudo']; ?>">En Savoir plus</a><br><br>

			<?php
			

			
		
	}?>
</div>

</body>
</html>