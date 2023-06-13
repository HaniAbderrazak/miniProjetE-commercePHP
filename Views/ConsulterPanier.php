<?php session_start(); 

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
       <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
                 
                  include "../Connection/BD.php";
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
                <li class="nav-item"><a class="nav-link" href="ConsulterPanier.php">Panier</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <body>
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                      <h1>Produit details</h1>
                        <div class="top-right-button-container">
                            
                            <div class="btn-group">
                               
                               
                            </div>
                        </div>

                  <?php
            
            include "../Controllers/GestionPanier.php";
            include "../Controllers/GestionCommande.php";
            include "../Controllers/GestionProduit.php";
            
            $gs=new GestionProduit();
            $gp=new GestionPanier();
            $gu=new GestionUsers();
            $gc=new GestionCommande();
       $tab2=$gu->RecupererUserByName($_SESSION['nom']);
       foreach($tab2 as $donne)
       {
         $id=$donne['Id'];
       }
            
            $tab1=$gp->RecupererProduitsParUser($id);
            
            
            //$tab=$gs->RecupererProduitParId();
            //$n=count($tab);
        ?>
        <div class="row">
                <div class="col-12 list" data-check-all="checkAll">
                    <div class="card d-flex flex-row mb-3">
                        <div class="d-flex flex-grow-1 min-width-zero">
                            <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">nom produit</p>
                               <p class="mb-0 text-muted text-small w-15 w-xs-100">id produit</p>
                               <p class="mb-0 text-muted text-small w-15 w-xs-100">diametre</p>
                               <p class="mb-0 text-muted text-small w-15 w-xs-100">prix</p>
                               <p class="mb-0 text-muted text-small w-15 w-xs-100">image path</p>
                               <p class="mb-0 text-muted text-small w-15 w-xs-100">quantite</p>

                               <p class="mb-0 text-muted text-small w-15 w-xs-100"> 

                                </p>
                              
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">
                                 
                                 </p>
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">
                                 
                                 </p>

                              
                            </div>
                            <label class="custom-control custom-checkbox mb-1 align-self-center pr-4">
                                
                            </label>
                        </div>
                    </div>
                  </div>
                </div>

   <?php 
   $prixTotale=0;
   foreach($tab1 as $donne)
       {
         
         $tab=$gs->RecupererProduitParId($donne['idProduit']);
          
          foreach($tab as $d) { ?>
            <div class="row">
                <div class="col-12 list" data-check-all="checkAll">
                    <div class="card d-flex flex-row mb-3">
                        <div class="d-flex flex-grow-1 min-width-zero">
                            <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                <p class="list-item-heading mb-0 truncate w-40 w-xs-100" >
                                      <?php echo $d['nomProd'] ; ?>
                                </a>
                                
                               <p class="mb-0 text-muted text-small w-15 w-xs-100"><?php echo $d['IdProd'] ; ?></p>
                               <p class="mb-0 text-muted text-small w-15 w-xs-100"><?php echo $d['diametre'] ; ?></p>
                               <p class="mb-0 text-muted text-small w-15 w-xs-100"><?php echo $d['Prix'] ; ?></p>
                               <p class="mb-0 text-muted text-small w-15 w-xs-100"><?php echo $d['image'] ; ?></p>
                               <p class="mb-0 text-muted text-small w-15 w-xs-100"><?php echo $donne['quantite'] ; ?></p>
                               <?php $prixTotale=$prixTotale+doubleval($d['Prix'])*$donne['quantite'] ;?>
                               <a href="DeleteProduitAchet.php?IdProduit=<?php echo $d['IdProd'] ;?>" class="mb-0 text-muted text-small w-15 w-xs-100"> 
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="color: red " >
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg>

                                </a>
                              
                                <a href="ProduitDetails.php?Id=<?php echo $d['IdProd'] ;?>" class="mb-0 text-muted text-small w-15 w-xs-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                   <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                   </svg>
                                 </a>  
                            </div>
                            <label class="custom-control custom-checkbox mb-1 align-self-center pr-4">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </div>
                    </div>
                  </div>
                </div>
              <?php }}?>

              </div>
            </main>
            <div class="row">
              <h3 style="margin-left: 50px;"><?php echo "Prix totale : ".$prixTotale ;?></h3>
            </div>
            <a href="PasseCommande.php?id=<?php echo $id; ?>&prix=<?php echo $prixTotale ?>" class="btn btn-primary btn-block">Passe Commande</a>
          
          </body>
    

    <!-- Additional Scripts -->
    <script src="template/assets/js/custom.js"></script>
    <script src="template/assets/js/owl.js"></script>
    <script src="js/scripts.js"></script>
