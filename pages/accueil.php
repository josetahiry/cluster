<?php
require('../inc/connection.php');
require('../inc/session.php');
session_start();
ini_set('session.save_handler', 'user');//on définit l'utilisation des sessions en personnel
session_set_save_handler( 'open','close','read','write','destroy','gc');//on précise les méthodes à employer pour les sessions*/
if($_SESSION["login"]<>"OK") {
	header('Location:connexion.php');
}
?>

<!DOCTYPE html>
<?php
	require('../inc/fonction.php');
?>

<html>
	<head>
		<title>Accueil | Mastermind</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="../assets/images/logo.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Manoa and Jose">
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">
		<script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
	</head>
		<body style="background: url(../assets/images/bg_image.jpg) no-repeat; width: 100%; height: 150px; background-size: 100%;">
		<!-- Logo -->
		<div align="center" class="col-md-12">
			<font size="10" face="Courier New">MASTERMIND</font>
		</div>
		<!--Menu-->
		<div class="col-md-2">
			<div class="row">
				<div class="col-md-1 col-md-offset-1">
					
					
				<div class="col-md-2 col-md-offset-1">
					<a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img"><button class="btn btn-success" type = "submit">Play</button></a>
				</div>
					
					
					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-body modal-spa">
								<div class="col-md-3 span-2">
								</div>
								<div class="col-md-7 span-1 ">
									<h2>LEVEL</h2>
									<p><a href="mastermindstat.php?level=15" title="15 attempts" data-placement="right" data-toggle="tooltip">Easy Game</a></p>
									<p><a href="mastermindstat.php?level=10" title="10 attempts" data-placement="right" data-toggle="tooltip">Low Game</a></p>
									<p><a href="mastermindstat.php?level=5" title="5 attempts" data-placement="right" data-toggle="tooltip">Hard Game</a></p>
									</div>									 
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</br>
			<div class="row">
				<div class="col-md-2 col-md-offset-1">
					<a href="#" data-toggle="modal" data-target="#myModal2" class="offer-img"><button class="btn btn-success" type = "submit">Instruction</button></a>
				</div>
				
				<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-body modal-spa">
								<div class="col-md-3 span-2">
								</div>
								<div class="col-md-12">
									<h2>How to play Mastermind</h2>
									<p>- A sequence of four colors is chosen by the computer. The sequence can incorporate one to four different colors. Most Mastermind boards include at least six different colors, which means that not all colors can be played at one time. You should not see this arrangement but we let you to see it when you are very crazy in thinking.</p>
									<p>- You place four colored pegs in the first row.</p>
									<p>- Use the button "test" for showing your result</p>
									<p>- Game play continues by repeating steps 3, 4... until you correctly guesse the code or all rows of the Mastermind board are filled without finding a correct answer.</p>
									</div>									 
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				
				
			</div>
			</br>
			<div class="row">
				<div class="col-md-2 col-md-offset-1">
					<a href="#" data-toggle="modal" data-target="#myModal3" class="offer-img"><button class="btn btn-success" type = "submit">About</button></a>
				</div>
				
				<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-body modal-spa">
								<div class="col-md-3 span-2">
								</div>
								<div class="col-md-7 span-1 ">
									<h2>About the game</h2>
									<p>Mastermind is a difficult puzzle game, in which one player tries to guess the code their opponent comes up with. Originally a board game, though with roots in earlier pen-and-paper games, Mastermind is now widely available online and for mobile devices as well.
									</br>
									</br>
									You can also play Mastermind with paper and pen if you don't have the board game or video game version.
									</br>
									</br>
									This game is a hobby for many people and the web designers/programmers Jose and Manoa build this game in this website</p>
									</div>									 
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				
			</div>
			</br>
			
			<a href="accueil.php?bestscore=1"><button class="btn btn-primary" title="Score" data-placement="right" data-toggle="tooltip" type="button"> Best Score Stat</button></a></br></br>
			
			<?php
			if(isset($_GET["bestscore"])){
				$listes=getStat();
				?>
				<h3 align="center"><span class="label label-primary">Stat</span></h3>
				<table  class="table table-striped" align="center" border=1>
					<tr>
						<th>Classement</th>
						<th>Name</th>
						<th>Score</th>
					</tr>
					<?php $i=1; ?>
					<?php foreach($listes AS $liste){ ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $liste->name; ?></td>
						<td><?php echo $liste->att; ?></td>
					</tr>
					<?php $i++;} ?>
				</table>			
		<?php		
			}
		?>
		
		<a href="../inc/deconnexion.php"><button class="btn btn-primary" title="Deconnexion" data-placement="right" data-toggle="tooltip" type="button">Deconnexion</button></a>
		</div>
		<div class="col-md-5">
			<img style="margin-left:20px" alt="First slide" src="../assets/images/images.jpg" height="500px">
		</div>
	</body>
</html>