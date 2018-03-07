<?php
        session_start();
        $pseudo=$_POST["name"];
	    $_SESSION["login"]="OK";
		$_SESSION["pseudo"]=$pseudo;
        ECHO $_SESSION["pseudo"].'  '. $_SESSION["login"];
    header('Location:../pages/acueil.php');
?>