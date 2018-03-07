<?php
require('../inc/connection.php');
require('../inc/session.php');
session_start();
echo "Jose";
ini_set('session.save_handler', 'user');//on définit l'utilisation des sessions en personnel
session_set_save_handler( 'open','close','read','write','destroy','gc');//on précise les méthodes à employer pour les sessions*/
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Connexion | Inscription</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<meta name="author" content="Manoa et José">
		<link href="../assets/css/bootstrap.css" rel="stylesheet">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="../assets/images/logo.png"/>
		<script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
	</head>
	<body style="background: url(../assets/images/bg_image.jpg) no-repeat; width: 100%; height: 150px; background-size: 100%;">
	<?php
		if(isset($_GET['er']))
			$er = $_GET['er'];
		else
			$er = null;
		$co_erreur = "";
		$sign_erreur = "";
		$sign = "";
		if($er == "0")
			$sign = "signin successful";
		if($er == "1")
			$co_erreur = "veuillez entrer des identifiants valides";
		if($er == "2")
			$sign_erreur = "ce nom &eacute;xiste deja, veuillez entrer un autre nom";
		if($er == "3")
			$sign_erreur = "vous devez avoir au moins 14 ans";
		if($er == "4")
			$sign_erreur = "&acirc;ge invalide, veuillez entrer votre &acirc;ge exacte";
	?>
		<!-- Logo -->
		<div class="col-md-4 col-md-offset-4">
			<font size="10" face="Courier New">MASTERMIND</font>
		</div>
		<!-- Connexion -->
		<div class="col-md-2 col-md-offset-9">
		<h1><span class="label label-primary">Sign in here</span></h1>
		</br>
			<form class="form-horizontal" role="form" name="form" action="../inc/checkconnexion.php" method="get">
				<div class="form-group">
					<div class="col-sm-24">
						<input type="text" name="inputpseudo" class="form-control" id="pseudo" placeholder="Pseudo" required/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-24">
						<input type="password" name="inputpass" class="form-control" id="pass" placeholder="Password" required/>
					</div>
					
				</div>
				<p style="color: red;" align="center"><?php echo $co_erreur;?></p>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-24">
						<button class="btn btn-success" type = "submit">Connexion</button>
					</div>
				</div>
			</form>
			<hr/>
		</div>
		
		<!-- Inscription -->
		<div class="col-md-2 col-md-offset-9">
		<h1><span class="label label-primary">Create new account</span></h1>
		</br>
			<form class="form-horizontal" role="form" name="form" action="../inc/inscription.php" method="get">
				<div class="form-group">
					<div class="col-sm-24">
						<input type="text" name="insertpseudo" class="form-control" id="inputpseudo" placeholder="Pseudo" required/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-24">
						<input type="number" name="inputage" class="form-control" id="inputage" placeholder="Age" required/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-24">
						<input type="password" name="inputpass" class="form-control" id="inputpass" placeholder="Password" required/>
					</div>
					
				</div>
				<p style="color: green;" align="center"><?php echo $sign;?></p>
					<p style="color: red;" align="center"><?php echo $sign_erreur;?></p>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-24">
						<button class="btn btn-primary" type = "submit">Inscription</button>
					</div>
				</div>
			</form>
		</div>
	<body>
</html>