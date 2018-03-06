<?php
require('model.php');
ini_set('session.save_handler', 'user');//on définit l'utilisation des sessions en personnel
session_set_save_handler( 'open','close','read','write','destroy','gc');//on précise les méthodes à employer pour les sessions*/
session_start();
if(isset($_POST['nom']) && isset($_POST['mdp'])){
//$user=getUtilisateur($_POST['nom'],$_POST['mdp']);
	//if(isset($user) && $user[0][0]=$_POST['nom'] && $user[0][1]=$_POST['mdp']){
   		 $table[]=$_POST['nom'];
		$table[]=$_POST['mdp'];
		$_SESSION['user']=$table;

//echo $_SESSION['user'];
	//header('Location:liste.php');
	/*}else{
	echo "Erreur login !!!!!";
	}*/
}
?>
<!DOCTYPE html>
<html>
	<head>
	<title>teste site avec apache2</title>
	</head>
	<body>
		<p>testsite2</p>
		
		<h1>teste site 2 avec apache2 !!!!</h1>
 	<p>Inscription !!! </p>
	<form method="Post" action="index.php">
		<label>Nom<input type="text" name="nom"></label></br>
		<label>Mot de passe<input type="text" name="mdp"></label>
		<input type="submit" value="valider">
	</form>
	</body>
</html>
