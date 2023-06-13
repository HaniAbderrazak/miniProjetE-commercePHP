<?php 

 include "../Connection/BD.php";
include "../Controllers/GestionProduit.php";
 $id=$_GET["IdProduit"];
	$gs=new GestionProduit();
	$gs->DeleteProduit($id);
	header("Location:ConsulterProduit.php");
?>