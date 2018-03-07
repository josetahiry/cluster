<?php
require('inc/Fonction.php');
session_start();
 if(isset($_SESSION["login"]))
 {
     if($_SESSION["login"]=="OK")
     {
         ECHO 'TAIZA '.$_SESSION["pseudo"];
     }
     else
     {
         
     }
     
 }
 else{
     echo 'FAIL';
 }

?>