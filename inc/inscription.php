<?php
	require('fonction.php');
	$pseud = $_GET['insertpseudo'];
	$age = $_GET['inputage'];
	$password = $_GET['inputpass'];
	$indiceexist = checkexist($pseud);
	if($age <= 80 && $age >= 14 && $indiceexist == 0){
		$checkuser = inscription($pseud, $age, $password);
		header("Location:../pages/connexion.php?er=0");
	}else if($indiceexist >=1){
		header("Location:../pages/connexion.php?er=2");
	}if($age < 14){
		header("Location:../pages/connexion.php?er=3");
	}if($age > 80){
		header("Location:../pages/connexion.php?er=4");
	}
	
?>