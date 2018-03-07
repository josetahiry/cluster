<?php
require('Fonction.php');
$article=$_GET["art"];
session_start();
;
deletePanier($article,$_SESSION["pseudo"]);
header('Location:../pages/panier.php');
    
?>