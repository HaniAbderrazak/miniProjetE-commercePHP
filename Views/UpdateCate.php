 <?php
include "../Connection/BD.php";
include "../Controllers/GestionCategorie.php";

  $gs=new GestionCategorie();
  $gs->UpdateCategorie($_POST["IdCategorie"],$_POST["nomCateg"]);
  header("Location:ConsulterCategorie.php")
  ?>