<!DOCTYPE html>
<html lang="en">
<?php
require('../inc/Fonction.php');
session_start ();
if(isset($_SESSION["login"]))
{
  if($_SESSION["login"]=="OK")
    {
       $idModal;
    $nomModal="portfolioModal";
    $listeType=listType(); 
    $listeType1=listType();
    $pan=countPanier( $_SESSION["pseudo"]);
    ?>
   
  <?php
  include('../inc/head.php');

  ?>

  <body id="page-top">

    <!-- Navigation -->
<?php
include('../inc/nav.php');
?>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Bienvenue sur notre site</div>
          <div class="intro-heading">Faite votre shopping Online</div>
          <a class="btn btn-xl js-scroll-trigger" href="#services">Plus d'info</a>
        </div>
      </div>
    </header>

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Services</h2>
            <h3 class="section-subheading text-muted">Voir tout nos services et fonctionnalité</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Achat multiple</h4>
            <p class="text-muted">Vous pouvez faire votre achat a plusieurs reprise en toute faciliter</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Achat sans vous déplacez de chez vous </h4>
            <p class="text-muted">Il suffit de vous connectez a notre site </p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Sécurité assurée</h4>
            <p class="text-muted">Vos données et informations seront conservés avec sureté</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Nos Types d'articles</h2>
            <h3 class="section-subheading text-muted">Plusieurs types d'article à votre choix</h3>
          </div>
        </div>
        <div class="row">
        <?php foreach($listeType as $myliste) {
         $loc=getLocationImage($myliste->idimage);
          ?>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#<?php echo $nomModal ?><?php echo $myliste->id ?>">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="../<?php echo $loc ?>" alt="">
            </a>
            <div class="portfolio-caption">
              <h4><?php echo $myliste->nom ?></h4>
              <p class="text-muted"><?php echo $myliste->description ?></p>
            </div>
          </div>
          <?php
        }
        ?>
          
    </section>

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">A propos</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
          
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="../img/about/3.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Septembre 2017</h4>
                    <h4 class="subheading">Projet S5 Evaluation</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Projet d'entrer en S5 à l'<i class="text-primary"> IT University</i></p>
                  </div>
                </div>
              </li>
             
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Be Part
                    <br>Of Our
                    <br>Story!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Developpeur Web</h2>
          </div>
        </div>
        <div class="row">
         <div class="col-sm-12">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="../img/team/profil.jpg" alt="">
              <h4>Tohavina Raherindrainy</h4>
              </br>
              <p class="text-muted">Web Designer</p>
              <p class="text-muted">Controller Maker</p>
                 <p class="text-muted">Concepteur de base de donneé</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
      
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">La technologie c'est ma passion, c'est ma vie </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Clients -->
    <section class="py-5">
        <h3 align="center">Nos partenaires</h3>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="../img/logos/envato.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="../img/logos/designmodo.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="../img/logos/themeforest.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="../img/logos/creative-market.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Contactez nous ou envoyez un e-mail</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form name="sentMessage" action="../inc/mail.php" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                     <h4  class="text-primary">Mettre votre adresse mail</h4 >
                    <input name="email" class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>        
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                     <h4  class="text-primary">Message</h4 >
                    <textarea name="message" class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>

                </div>
              </div>
                   <button class="btn btn-xl" type="submit">Envoyez</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; 2017 BY Tohavina</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
             
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
  <?php 
      
  foreach($listeType1 as $mylisteType1)  { 
      ?>
    <div class="portfolio-modal modal fade" id="<?php echo $nomModal ?><?php echo $mylisteType1->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
          
              <div class="col-lg-8 mx-auto">
                    <?php $art=getArticleByType($mylisteType1->id);
                foreach ($art as $myart) {
                $loc1=getLocationImage($myart->idimage);
                $stock=getStock($myart->id);
                $isa=countArticle($myart->id, $_SESSION["pseudo"]);
              ?>
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2> <?php echo $myart->nom; ?></h2>
                  <img src="../<?php echo $loc1 ?>" alt="">
                  <p class="item-intro text-muted" style="font-size:20px"><strong><?php echo $myart->description; ?></strong></p>
                    	<div class="product-overlay">
											<div class="overlay-content">
												<h2 class="text-warning"><?php echo $myart->prixunitaire;?>Ar</h2>
												<p style="font-size:30px">Stock :<?php echo $stock; ?></p>
												<a style="font-size:20px"href="../inc/gestionPannier.php?idart=<?php echo $myart->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ajouter au panier(<?php echo $isa;?>)</a>
											</div>
										</div>
               
                </div>
                  <?php }
              ?>
               <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Fermer la page</button>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php }
    ?>
    

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/agency.min.js"></script>

  </body>
    <?php }
}
else{
  header('Location:erreur.php?er=3');
}
?>

</html>
