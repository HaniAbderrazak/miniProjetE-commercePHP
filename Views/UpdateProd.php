 <?php
include "../Connection/BD.php";
include "../Controllers/GestionProduit.php";

  $gs=new GestionProduit();
  $image="img\\\\".$_POST["Image"];
  $gs->UpdateProduit($_POST["Id"],$_POST["nom"],$_POST["Diametre"],$_POST["Prix"],$image,$_POST["CatCheck"]);
  header("Location:ConsulterProduit.php");
  ?>