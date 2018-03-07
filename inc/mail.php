<?php

$mes=$_POST["message"];
$mail=$_POST["email"];
echo $mes;
echo 'DD'.verifMail($mail);
try{
   if(verifMail($mail))
   {
    $destinataire = 'localhost@gogle.local'; 
$expediteur =  $mail;
$copie = 'localhost@gogle.local';
$copie_cachee = 'localhost@gogle.local';
$objet = 'TestPHP4';
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIM
$headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: "Nom_de_expediteur"<'.$expediteur.'>'."\n"; // Expediteu
$headers .= 'Cc: '.$copie."\n"; // Copie Cc
$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc 
$message = '<div style="width: 100%; text-align: center; font-weight: bold">'.$mes.'</div>';
mail ($destinataire, $objet, $message, $headers);
 header('Location:../pages/acueil.php');
   }
   else{
       echo 'mail non valide';
   }

}
catch(Exception $ex){
 echo 'pute ';
}

function  verifMail ($mail) 
{
    if (preg_match ('/^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$]/i', $mail ))
    {
         return false;
    }
    list ($nom, $domaine) = explode ('@', $mail);
    if (getmxrr ($domaine, $mxhosts))  
    { 
         return true;
    }
    else{
         return false;
    }
 
}
?>