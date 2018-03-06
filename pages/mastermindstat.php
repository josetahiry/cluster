<?php
	require('../inc/session.php');
	ini_set('session.save_handler', 'user');//on définit l'utilisation des sessions en personnel
	session_set_save_handler( 'open','close','read','write','destroy','gc');//on précise les méthodes à employer pour les sessions*/
	session_start();
	if($_SESSION["login"]<>"OK") {
		header('Location:connexion.php');
	}
	require('../inc/fonction.php');
	$pseudo = $_SESSION["pseudo"];
	$level = $_GET['level'];
	$result=array();
	for( $i=1;$i<=8;$i++)
		{
			$variable1=rand(1,8);
			$result[] = $variable1;
		} 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>MasterMind by GG Team</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="../assets/images/logo.png"/>
		<meta name="author" content="Manoa et Jose">
		<link href="../assets/css/bootstrap.css" rel="stylesheet">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">
		
		<script type="text/javascript">
	function circle(lvl)
	{
		var p;
		var o;
		var b;
		var w;
		var level = 4*lvl;
		var level2 = lvl;
		for(p=1;p<=level;p++){
			var canvas = document.getElementById("canvas"+p); 
			var context = canvas.getContext("2d");
			context.beginPath();
			context.lineWidth="2";
			context.arc(50, 50, 20, 0, 2 * Math.PI);
			context.stroke();
		}
		for(o=1;o<=4;o++){
			var canvas = document.getElementById("color"+o); 
			var context = canvas.getContext("2d");
			context.beginPath();
			context.lineWidth="2";
			context.arc(50, 50, 20, 0, 2 * Math.PI);
			context.stroke();
		}
		for(b=1;b<=level2;b++){
			var canvas = document.getElementById("black"+b); 
			var context = canvas.getContext("2d");
			context.beginPath();
			context.lineWidth="2";
			context.fillStyle="black"
			context.arc(15, 10, 10, 0, 2 * Math.PI);
			context.fill();
		}
		for(w=1;w<=level2;w++){
			var canvas = document.getElementById("white"+w); 
			var context = canvas.getContext("2d");
			context.beginPath();
			context.lineWidth="2";
			context.arc(15, 10, 10, 0, 2 * Math.PI);
			context.stroke();
		}
	} 
	function color(i)
	{
	  var t=i;
	  var canvas = document.getElementById("canvas"+t);
	  var elementTexte=document.getElementById("texte");
	  elementTexte.innerHTML = ""+t+""; 
	  var context = canvas.getContext("2d");
	  context.beginPath();
	  context.fillStyle="White"
	  context.arc(50, 50, 20, 0, 2 * Math.PI);
	  context.fill();
	} 
	function showcolor(id)
	{
		if(document.getElementById(id).style.visibility=="hidden")
		{
			document.getElementById(id).style.visibility="visible";
			document.getElementById('c').innerHTML='Clic to hide results';
		}
		else
		{
			document.getElementById(id).style.visibility="hidden";
			document.getElementById('c').innerHTML='Clic to show results';
		}
		return true;
	}
	
	var centi=0
	var secon=0
	var minu=0
	
	function testColor(a,i)
	{
		 var t=i;
		document.getElementById("testest"+t).disabled = true;
		var elementTexte=document.getElementById("texte");
		var indiceText=elementTexte.innerText;
		var indiceNumber4 = parseInt(indiceText) - parseInt(1);
		var indiceNumber3 = parseInt(indiceText) - parseInt(2);
		var indiceNumber2 = parseInt(indiceText) - parseInt(3);
		var indiceNumber1 = parseInt(indiceText) - parseInt(4);
		var canvas1 = document.getElementById("canvas"+indiceNumber1);
		var canvas2 = document.getElementById("canvas"+indiceNumber2);
		var canvas3 = document.getElementById("canvas"+indiceNumber3);
		var canvas4 = document.getElementById("canvas"+indiceNumber4);
		var hide1 = document.getElementById("color1");
		var hide2 = document.getElementById("color2");
		var hide3 = document.getElementById("color3");
		var hide4 = document.getElementById("color4");
		var context1 = canvas1.getContext("2d");
		var context2 = canvas2.getContext("2d");
		var context3 = canvas3.getContext("2d");
		var context4 = canvas4.getContext("2d");
		var contextHide1 = hide1.getContext("2d");
		var contextHide2 = hide2.getContext("2d");
		var contextHide3 = hide3.getContext("2d");
		var contextHide4 = hide4.getContext("2d");
		
		var tableau = new Array(4);
		var tableauHide = new Array(4);
		
		tableau[0] = context1;
		tableau[1] = context2;
		tableau[2] = context3;
		tableau[3] = context4;
		
		tableauHide[0] = contextHide1;
		tableauHide[1] = contextHide2;
		tableauHide[2] = contextHide3;
		tableauHide[3] = contextHide4;
		
		var compteuridentique = 0;
		var goodplace = 0;
		var i = 0;
		var p;
		while(i<4){
			for(p=0;p<4;p++){
				if(tableau[i].fillStyle==tableauHide[p].fillStyle){
					compteuridentique++;
					break;
				}
			}
			if(tableau[i].fillStyle==tableauHide[i].fillStyle){
				goodplace++;
			}
			i++;
		}
		compteuridentique -= goodplace;
		
		
		var elementTexteS=document.getElementById("S"+a);
		var elementTexteO=document.getElementById("O"+a);
		var indiceTextS=elementTexteS.innerText;
		var indiceTextO=elementTexteO.innerText;
		elementTexteS.innerHTML = ""+compteuridentique+""; 
		elementTexteO.innerHTML = ""+goodplace+"";
		
		alert('identique: '+compteuridentique+' and goodplace: '+goodplace);
		
		var elementTexteTest=document.getElementById("texteTest");
		var indiceTextTest=elementTexteTest.innerText;
		var elementTextelvl=document.getElementById("lvl");
		var indiceTextTestlvl=elementTextelvl.innerText;
		var elementTextePseudo=document.getElementById("pseudo");
		var indiceTextPseudo=elementTextePseudo.innerText;
		
		elementTexteTest.innerHTML = ""+(parseInt(indiceTextTest) + parseInt(1))+"";
		if(indiceTextTest == indiceTextTestlvl && goodplace != 4){
			alert('You loose ! Try again !');
			clearTimeout(compte);
			showcolor('co');
		}
		
		if(goodplace == 4){
			alert('Good Game ! You win the game with '+indiceTextTest+' attempt!');
			document.location.href="../inc/fonction.php?name="+indiceTextPseudo+"&number="+indiceTextTest+"&level="+indiceTextTestlvl+"";
			goodplace=0;
			clearTimeout(compte);
		}
	}
	
	function fillCircle(id)
	{
		var elementTexte=document.getElementById("texte");
		var indiceText=elementTexte.innerText;
		elementTexte.innerHTML = ""+(parseInt(indiceText) + parseInt(1))+""; 
		var div = document.getElementById(id).value;
	    var canvas = document.getElementById("canvas"+indiceText);
	    var context = canvas.getContext("2d");
	    context.beginPath();
	    context.fillStyle=""+div+""
	    context.arc(50, 50, 20, 0, 2 * Math.PI);
	    context.fill();
	  <!--  addColor();  -->
	    if(parseInt(indiceText)%4 ==0){
			alert('Tester vos couleurs');
		}
	}
	
	function addfillCircleBegin()
	{
		var elementTexte1=document.getElementById("col1");
		var elementTexte2=document.getElementById("col2");
		var elementTexte3=document.getElementById("col3");
		var elementTexte4=document.getElementById("col4");
		var indiceText1=elementTexte1.innerText;
		var indiceText2=elementTexte2.innerText;
		var indiceText3=elementTexte3.innerText;
		var indiceText4=elementTexte4.innerText;
		var colo1 = document.getElementById(indiceText1).value;
		var colo2 = document.getElementById(indiceText2).value;
		var colo3 = document.getElementById(indiceText3).value;
		var colo4 = document.getElementById(indiceText4).value;
		
		var tableauHide = new Array(4);
		tableauHide[0] = colo1;
		tableauHide[1] = colo2;
		tableauHide[2] = colo3;
		tableauHide[3] = colo4;
		
		var i;
		for(i=1;i<=4;i++){
			var canvas = document.getElementById("color"+i);
			var context = canvas.getContext("2d");
			context.beginPath();
			context.fillStyle=tableauHide[i-1];
			context.arc(50, 50, 20, 0, 2 * Math.PI);
			context.fill();
		}
		chrono();
		showcolor('co');
	}
	
	function chrono(){
		centi++;
		if (centi>9){centi=0;secon++}
		if (secon>59){secon=0;minu++}
		document.forsec.secc.value="  "+centi
		document.forsec.seca.value="  "+secon
		document.forsec.secb.value="  "+minu
		compte=setTimeout('chrono()',100)
	}
	function rasee(){
		clearTimeout(compte)
		centi=0;
		secon=0;
		minu=0;
		document.forsec.secc.value="  "+centi
		document.forsec.seca.value="  "+secon
		document.forsec.secb.value="  "+minu
	}
	</script>
	
	<style>
		.rond{
			border-radius:50%;
			width:40px;
			height:40px;
			box-shadow: 0px 3px 8px #aaa, inset 0px 2px 3px #fff;
			border:none;
			outline:none;
			text-shadow: 1px 1px 1px lighgrey;
	</style>
		
	</head>
	<body onload="circle(<?php echo $level ?>)">
		<nav class="navbar navbar-primary" role="navigation">
		  <div class="container-fluid">
		    <div class="collapse navbar-collapse navbar-ex2-collapse">
				<h2 class="navbar-text">Mastermind Game</h2>
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="accueil.php">Accueil</a></li>
				<li class="active"><a href="team.php">Equipe/Team</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		       <li><a href="connexion.php">Inscription</a></li>
		        <li><a href="../inc/deconnexion.php">Deconnexion</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
		
			<div class="panel panel-danger col-md-3">
				<div align="center">
					<h1><span class="label label-primary">Pub</span></h1>
					<h4><span class="label label-primary">A game</span></h4>
					<img alt="First slide" src="../assets/images/instru.jpg">
					<h3>Maxi Mastermind</h3>
				</div>
			</div>
		
	<div class="col-md-6" id="Contenu">
	
	<p id="lvl" hidden class="hidden"><?php echo $level ?></p>
	<h2 align="center"><input id="play" type="button" onclick="addfillCircleBegin()" value="CLIC TO START"/></h2>
	
	<center><form name="forsec">
		<input type="text" size="3" name="secb"> minute(s)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="3" name="seca"> secondes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" size="3" name="secc"> dixièmes<br /><br /><br />
	</form></center><br />

	<a href="mastermindstat.php?level=<?php echo $level; ?>"><button class="btn btn-primary" title="Try" data-placement="right" data-toggle="tooltip" type="button">CLIC HERE TO TRY AGAIN</button></a>
	<a href="accueil.php"><button class="btn btn-primary" title="Accueil" data-placement="right" data-toggle="tooltip" type="button">Give up and go back</button></a>
	<a href="accueil.php?bestscore=1"><button class="btn btn-primary" title="Score" data-placement="right" data-toggle="tooltip" type="button">Show statistics</button></a></br></br>
	
	<h1 align="center" class="text-danger"> The game space (<?php echo $level ?> attempts)</h1>
	<h4 align="center" class="text-danger">(You can choose the circle that you wan to color)</h4>
	<br/>

	<table class="table table-striped">
    <caption class="text-center">Mastermind</caption>
    <thead>
        <tr>
		<?php for($i=1;$i<=4;$i++){?>
			<th>Case <?php echo $i ?></th>
		<?php } ?>
			<th>Tester</th>
		</tr>
		<?php $indice=1;?>
		<?php for($a=1;$a<=$level;$a++){ $same="S$a"; $ok="O$a"; $white="white$a"; $black="black$a"; $btn="testest$a";?>
		<tr>
		<?php for($i=0;$i<4;$i++){ $texte="canvas$indice";?>
			<td><canvas id="<?php echo $texte;?>" onclick="color(<?php echo $indice;?>)" width="100" height="100"></canvas></td>
		<?php $indice++;} ?>
			<td><input type="button" id="<?php echo $btn;?>" onclick="testColor(<?php echo $a ?>,<?php echo $a;?>)" value="Test"/></td>
			<td><canvas id="<?php echo $white;?>" width="75" height="22"></canvas> <p id="<?php echo $same;?>">0</p></td>
			<td><canvas id="<?php echo $black;?>" width="75" height="22"></canvas> <p id="<?php echo $ok;?>">0</p></td>
		</tr>
		<?php } ?>
	</table>
	
	<h2 align="center"><span class="bouton label label-danger" id="c" onclick="showcolor('co')">Clic to hide results</span></h2>
	<div id="co" align="center"> 
	<?php $indice0=1;?>
		<?php for($i=0;$i<4;$i++){ $texte="color$indice0";?>
			<canvas id="<?php echo $texte;?>" width="100" height="100"></canvas>
		<?php $indice0++;} ?>
		<p id="col1" hidden class="hidden"><?php echo $result[0] ?></p>
		<p id="col2" hidden class="hidden"><?php echo $result[1] ?></p>
		<p id="col3" hidden class="hidden"><?php echo $result[2] ?></p>
		<p id="col4" hidden class="hidden"><?php echo $result[3] ?></p>
	</div>

	<p id="texte"  hidden class="hidden">1</p>
	<p id="texteTest"  hidden class="hidden">1</p>
	<p id="pseudo" hidden class="hidden"><?php echo $pseudo ;?></p>
	
	

</div>
		
		<div style="position: fixed; top: 10; right: 0; width: 20%; background-color : #AAC9F2" class="panel panel-primary col-md-3">
			<h2 align="center"><span class="label label-danger">All colors</span></h2>
            <div align="center" class="form-group">
				<input id="1" style="background-color: #FF0000;" class="rond" type="button" onclick="fillCircle(1)" value="Red"/></br></br>
				<input id="2" style="background-color: #0000FF;" class="rond" type="button" onclick="fillCircle(2)" value="Blue"/></br></br>
				<input id="3" style="background-color: #66CD00;" class="rond" type="button" onclick="fillCircle(3)" value="Green"/></br></br>
				<input id="4" style="background-color: #FFFF00;" class="rond" type="button" onclick="fillCircle(4)" value="Yellow"/></br></br>
				<input id="5" style="background-color: #FF4540;" class="rond" type="button" onclick="fillCircle(5)" value="Orange"/></br></br>
				<input id="6"  style="background-color: #A020F0;" class="rond" type="button" onclick="fillCircle(6)" value="Purple"/></br></br>
				<input id="7" style="background-color: #A52A2A;" class="rond" type="button" onclick="fillCircle(7)" value="Brown"/></br></br>
				<input id="8" style="background-color: #FF1493;" class="rond" type="button" onclick="fillCircle(8)" value="Pink"/>
            </div>
			</div>
		

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/bootstrap.js"></script>
		<script src="assets/js/npm.js"></script>
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>