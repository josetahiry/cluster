<?php
	session_start();
	require('fonction.php');
	$pseud = $_GET['inputpseudo'];
	$password = $_GET['inputpass'];
	$checkuser = connexion($pseud, $password);
	if($checkuser == 1){
		$_SESSION["pseudo"]="".$pseud."";
		$_SESSION["login"]="OK";
		header("Location:../pages/accueil.php");
	}
	else header("Location:../pages/connexion.php?er=1");
?>