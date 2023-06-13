<?php 
	session_start();
?>  

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="template/assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>SUN CERAMIC</title>

    <!-- Bootstrap core CSS -->
    <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="template/assets/css/fontawesome.css">
    <link rel="stylesheet" href="template/assets/css/style.css">
    <link rel="stylesheet" href="template/assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
  <!--   <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
    <!--  ***** Preloader End ***** -->

    <!-- Header -->
    <header class="header">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="Home.php"><h2>SUN <em>CERAMIC</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
               <!--  <li class="nav-item">
                    <a class="nav-link" href="Home.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li>  -->

                <li class="nav-item active"><a class="nav-link" href="Home.php">Home</a></li>
                <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                <?php
                  include "../Controllers/GestionCategorie.php";
                  include "../Connection/BD.php";

                  $gs=new GestionCategorie();
                  $tab=array();
                  $tab=$gs->RecupererCategories();
                  $n=count($tab);

                 ?>


                    <div class="dropdown-menu">
                     <?php for($i=0;$i<$n;$i++)
                                 { ?>
                      <a class="dropdown-item" href="ProduitsParCategorie.php?Id=<?php echo $tab[$i]['IdCategorie']; ?>"><?php echo $tab[$i]['nomCateg'] ; }?></a>
                     
                    </div>                    
                </li>
                <?php if(!empty($_SESSION['nom'])) { 
                	
   					  include "../Controllers/GestionUsers.php";
  					  $gu=new GestionUsers();
  					  if($gu->IsAdmin($_SESSION['nom'])==1)
  					  {


     
                	?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="ConsulterProduit.php">Consulter Produits</a>
                      <a class="dropdown-item" href="ConsulterCategorie.php">Consulter Categories</a>
                      <a class="dropdown-item" href="ConsulterCommande.php">Consulter Commande</a>
                    </div>                    
                </li>
          <?php  }?>
               
                <li class="nav-item"><a class="nav-link" href="Login.php">Logout</a></li>
            <?php }?>
                <li class="nav-item"><a class="nav-link" href="ConsulterPanier.php">Panier</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(template/assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Ceramique SUN CERAMIC </h4>
              <h2>Products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
         <?php
                   include "../Controllers/GestionProduit.php";

                   $gs=new GestionProduit();
                   $Produits=array();
                   $Produits=$gs->RecupererProduits();
                   $n=count($Produits);
                  
                 ?>
    <div class="products">
      <div class="container">
        <div class="row">
        	<?php for($i=0;$i<$n;$i++){ ?>
          <div class="col-md-4">
            <div class="product-item">
              <a href="ProduitDetails.php?Id=<?php echo $Produits[$i]['IdProd']; ?>">
              <img src="<?php echo $Produits[$i]['image'] ;?>" alt=""></a>
              <div class="down-content">
                <a href="ProduitDetails.php?Id=<?php echo $Produits[$i]['IdProd']; ?>"><h4><?php echo $Produits[$i]['nomProd'] ;?></h4></a>
                <h6><small><del>$999.00 </del></small> <?php echo $Produits[$i]['Prix'] ; ?></h6>
                <p>dimension <?php echo $Produits[$i]['diametre'] ; ?></p>
              </div>
           </div>
       </div>
      
  
  
    <?php }?>      
  </div>   
  
<!--
          <div class="col-md-4">
            <div class="product-item">
              <a href="template/product-details.html"><img src="template/assets/images/product-2-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="template/product-details.html"><h4>Lorem ipsum dolor sit amet.</h4></a>
                <h6><small><del>$99.00</del></small>  $79.00</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non beatae soluta, placeat vitae cum maxime culpa itaque minima.</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="template/product-details.html"><img src="template/assets/images/product-3-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="template/product-details.html"><h4>Lorem ipsum dolor sit amet.</h4></a>
                <h6><small><del>$1999.00</del></small>   $1779.00</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt nisi quia aspernatur, harum facere delectus saepe enim?</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="template/product-details.html"><img src="template/assets/images/product-4-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="template/product-details.html"><h4>Lorem ipsum dolor sit amet.</h4></a>
                <h6><small><del>$999.00 </del></small> $779.00</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dicta voluptas quia dolor fuga odit.</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="template/product-details.html"><img src="template/assets/images/product-5-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="template/product-details.html"><h4>Lorem ipsum dolor sit amet.</h4></a>
                <h6><small><del>$99.00</del></small>  $79.00</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non beatae soluta, placeat vitae cum maxime culpa itaque minima.</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="template/product-details.html"><img src="template/assets/images/product-6-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="template/product-details.html"><h4>Lorem ipsum dolor sit amet.</h4></a>
                <h6><small><del>$1999.00</del></small>   $1779.00</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt nisi quia aspernatur, harum facere delectus saepe enim?</p>
              </div>
            </div>
          </div>
<-->
      <div class="col-md-12">
            <ul class="pages">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
  
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="template/assets/js/custom.js"></script>
    <script src="template/assets/js/owl.js"></script>
  </body>


