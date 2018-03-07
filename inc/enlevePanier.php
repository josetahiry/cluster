<?php
require('Fonction.php');
$article=$_GET["art"];
session_start();
$_SESSION["pseudo"];
if(isDispo($article)==1)
{
   delPanier($article,$_SESSION["pseudo"]);
  gestionStock($article,1);
header('Location:../pages/panier.php');
}else{
     header('Location:../pages/erreur.php?er=0');
}

    
?>