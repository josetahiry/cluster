<!DOCTYPE html>
<html lang="en">
    <?php
	require('../inc/Fonction.php'); 
	session_start();
 if(isset($_SESSION["login"]))
 {
     if($_SESSION["login"]=="OK")
     {
         $listePanier=getArticlePanier($_SESSION["pseudo"]); 
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
             <h1 align="center">Votre panier</h1>
			<div class="breadcrumbs"> 
				<ol class="breadcrumb">
				  <li><a href="acueil.php">ShopOnline</a></li>
				  <li class="active"><a href="panier.php">Panier</a></li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Article</td>
							<td class="description"></td>
							<td class="price">Prix</td>
							<td class="quantity">Quantité</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                        <?php foreach($listePanier as $mylist){
                           $count=countArticle($mylist,$_SESSION["pseudo"]);
                           $art=getArticleByid($mylist,$_SESSION["pseudo"]);
                           $total=totalArticle($mylist,$_SESSION["pseudo"]);
                        ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="../img/resize/<?php echo $art->nom;?>.jpg" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $art->nom;?></a></h4>
								<p><?php echo $art->description;?></p>
							</td>
							<td class="cart_price">
								<p>Ar <?php echo $art->prixunitaire;?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" style="font-size:20px" href="../inc/ajouterPanier.php?art=<?php echo $mylist; ?>"><strong>+ </strong></a>
									<i><?php echo $count;?></i>
									<a class="cart_quantity_down" style="font-size:20px" href="../inc/enlevePanier.php?art=<?php echo $mylist; ?>"><strong>- </strong></a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Ar <?php echo $total;?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="../inc/deletePanier.php?art=<?php echo $mylist; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        <?php }?>	
					</tbody>
				</table>
             <h2>TOTAL : <?php echo number_format ( totalPanier($_SESSION["pseudo"]) , 0 , "," ,"." );?> AR</h2>
				<a href="traiteInfo.php"><button class="btn btn-xl">valider panier</button></a>
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