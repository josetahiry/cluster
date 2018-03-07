<?php
require('Fonction.php');
$article=$_GET["idart"];
session_start();
$_SESSION["pseudo"];
echo $_SESSION["pseudo"];
if(isDispo($article)==1)
{
    echo isDispo($article);
    insert($article,$_SESSION["pseudo"]);
    gestionStock($article,0);
    header('Location:../pages/acueil.php#portfolio');
}
else{
     header('Location:../pages/erreur.php?er=1');
}

?>