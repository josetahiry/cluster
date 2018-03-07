<!DOCTYPE html>
<html lang="en">
  <?php
require('../inc/Fonction.php');
 session_start ();
if(isset($_SESSION["login"]))
{
	
 if($_SESSION["login"]=="OK")
     {
     ?>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panier</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="../css/css2/bootstrap.min.css" rel="stylesheet">
   

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../css/agency.min.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
     <link href="../css/mycss.css" rel="stylesheet">
  </head>
  <body>

	<section id="cart_items">
		<div class="container">
             <h1 align="center">Veuillez remplir le formulaire</h1>
			<div class="breadcrumbs"> 
				<ol class="breadcrumb">
				  <li><a href="acueil.php">ShopOnline</a></li>
				  <li class="active"><a href="panier.php">Formulaire de renseignement</a></li>
				</ol>
			</div>
			<div class="contact">
			 <form  action="facture.php" method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                  <h4  class="text-primary">Nom et prenom</h4 >
                    <input name="name"class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                     <h4  class="text-primary">E-mail</h4 >
                    <input name="email" class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                  <h4  name="Telephone" class="text-primary">Telephone</h4 >
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
            <button  class="btn btn-xl" >Valider</button></a>
                </div>
              </div>
              

            </form>
			</div>
		</div>
	</section>
    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    </body>
        <?php }
}
else{
  header('Location:erreur.php?er=3');
}
?>
</html>