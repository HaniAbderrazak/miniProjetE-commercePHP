<?php 

 include "../Connection/BD.php";
include "../Controllers/GestionCategorie.php";
 $id=$_GET["IdCategorie"];
	$gs=new GestionCategorie();
	$gs->DeleteCategorie($id);
	header("Location:ConsulterCategorie.php");
?>