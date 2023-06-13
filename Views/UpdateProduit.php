<?php  ?>

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
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="Home.php"><h2>Sun <em> Ceramique </em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Home.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item active"><a class="nav-link" href="Home.php">Products</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="about-us.html">About Us</a>
                      <a class="dropdown-item" href="blog.html">Blog</a>
                      <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                      <a class="dropdown-item" href="terms.html">Terms</a>
                    </div>
                </li>
                
                <li class="nav-item"><a class="nav-link" href="checkout.html">Checkout</a></li>

                <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
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
              <h2>Update Product</h2>
            </div>

          </div>
        </div>
      </div>
       </div>
        <?php
            include "../Connection/BD.php";
            include "../Controllers/GestionCategorie.php";
            include "../Controllers/GestionProduit.php";
            $id=$_GET["IdProd"];
            $gs=new GestionCategorie();
            $g=new GestionProduit();
            $tab=array();
            $tab=$gs->RecupererCategories();
            $n=count($tab);
            $t=$g->RecupererProduitParId($id);
            for($j=0;$j<count($t);$j++)
            {
        ?>
    
            <form action="UpdateProd.php" method="post" class="form">
            <div class="container" style="    text-align: -webkit-center;display: flex;">
            <img class="col-md-4" src="<?php echo $t[$j]['image'];?>" style="width: 50px ,height= 50px"/>
            
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="hidden" name="Id" class="form-control" value="<?php echo $t[$j]['IdProd'] ;?>" placeholder="<?php echo $t[$j]['IdProd'] ;?>">

                         <label class="control-label">Nom De Produit</label>
                        <input type="text" name="nom" class="form-control" value="<?php echo $t[$j]['nomProd'] ;?>" placeholder="<?php echo $t[$j]['nomProd'] ;?>">
                            <label class="control-label">Diametre</label>
                        <input type="text" name="Diametre" class="form-control" value="<?php echo $t[$j]['diametre'] ;?>" placeholder="<?php echo $t[$j]['diametre'] ;?>">
                          <label class="control-label">Prix</label>
                        <input type="text" name="Prix" class="form-control" value="<?php echo $t[$j]['Prix'] ;?>" placeholder="<?php echo $t[$j]['Prix'] ;?>">
                        <label class="control-label">Image</label>
                        <input type="file" name="Image" placeholder="<?php echo $t[$j]['image'] ;?>" value="<?php echo $t[$j]['image'] ;?>" class="form-control">
                    <?php for($i=0;$i<$n;$i++) { ?>
                      <div class="form-check">
                        <input name="CatCheck"class="form-check-input" type="checkbox" value="<?php echo $tab[$i]['IdCategorie'] ; ?>" id="flexCheckDefault">
                         <label class="form-check-label" for="flexCheckDefault">
                       <?php echo $tab[$i]['nomCateg'] ; ?>
                        </label>
                    </div>
                    <?php } }?>
                     <input type="submit" class="btn btn-primary btn-block" value="Update Product"/>
                    </div>
                      </div>

                    </div>
                    <br>

                        
                  </div>
                </div>
              </div>
            </form>
          </div>
      </body>

    <!-- Bootstrap core JavaScript -->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="template/assets/js/custom.js"></script>
    <script src="template/assets/js/owl.js"></script>

   