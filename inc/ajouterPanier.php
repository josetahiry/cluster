<?php
require('Fonction.php');
$article=$_GET["art"];
session_start();

if(isDispo($article)==1)
{
    addPanier($article,$_SESSION["pseudo"]);
    gestionStock($article,0);
    header('Location:../pages/panier.php');
}else{
     header('Location:../pages/erreur.php?er=1');
}

    
?>