<?php 
include "../Connection/BD.php";
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

    <title>Sun Ceramique</title>

    <!-- Bootstrap core CSS -->
    <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="template/assets/css/fontawesome.css">
    <link rel="stylesheet" href="template/assets/css/style.css">
    <link rel="stylesheet" href="template/assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** 
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

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
                <li class="nav-item"><a class="nav-link" href="ConsulterPanier.php">panier</a></li>
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
              <h4>SUN CERAMIQUE</h4>
              <h2>Product Details</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "../Controllers/GestionProduit.php"; 
          		$gs=new GestionProduit();
                  $tab=array();
                  $tab=$gs->RecupererProduitParId($_GET['Id']);
                  $n=count($tab);
                  for($i=0;$i<$n;$i++) { 
                  	$x = $tab[$i]['IdCategorie'];


          ?>
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <div>
              <img src="<?php echo $tab[$i]['image'];?>" alt="" class="img-fluid wc-image">
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4 col-xs-6">
                <div>
                  
                </div>
                <br>
              </div>
              <div class="col-sm-4 col-xs-6">
                <div> 
                  
                </div>
                <br>
              </div>
              <div class="col-sm-4 col-xs-6">
                <div>
                  
                </div>
                <br>
              </div>
            </div>
          </div>
          
          <div class="col-md-8 col-xs-12">
            <form action="AjouterAuPanier.php" method="post" class="form">
              <h2><?php echo $tab[$i]['nomProd'];?></h2>

              <br>

              <p class="lead">
                <small><del> </del></small><strong class="text-primary"><?php echo $tab[$i]['Prix'] ;?></strong>
              </p>

              <br>

              <p class="lead">
                <?php echo $tab[$i]['nomProd']; ?>
              </p>

              <br> 

          
                <div class="col-sm-8">
                  <label class="control-label">Quantity</label>
 
                  <div class="row">
                    <div class="col-sm-6">
                      
                       
                        <input type="text" name="Quantity" class="form-control" placeholder="1"/>
                        <input type="hidden" name="nameUser" value="<?php echo $_SESSION['nom'] ;?> "/>
                        <input type="hidden" name="IdProd" value="<?php echo $tab[$i]['IdProd']; ?> "/>
                      
                    </div>

                    <div class="col-sm-6">
                     <input type="submit" class="btn btn-primary btn-block" value="Add to card"/>
                      </form>
                    </div>	
                   
                            <?php 
                            } 
                        ?>
                     
                        
                  </div>
                 </div>
              </div>
            </form>

				<?php  
			      
                  $gs=new GestionProduit();
                  $Produits=array();
                  $Produits=$gs->RecupererProduitsParCategorie($x);
                  $n=count($Produits);
                 ?>

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Similar Products</h2>
              
              <a href="ProduitsParCategorie.php?Id=<?php echo $x ;?>">view more <i class="fa fa-angle-right"></i></a>
            </div>
        </div>
           <?php for($i=0;$i<$n;$i++){
                 ?>
          <div class="col-md-4">
            <div class="product-item">

              <a href="ProduitDetails.php?Id=<?php echo $Produits[$i]['IdProd'] ;?>"><img src="<?php echo $Produits[$i]['image'] ;?>" alt=""></a>
              <div class="down-content">
                <a href="ProduitDetails.php?Id=<?php echo $Produits[$i]['IdProd'] ;?>"><h4><?php echo $Produits[$i]['nomProd'] ;?></h4></a>
                <h6><small><del></del></small> <?php echo $Produits[$i]['Prix'] ;?></h6>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
        
</body>
    

  <footer>
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

</footer>
</html>
