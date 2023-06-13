<?php 

 include "../Connection/BD.php";
include "../Controllers/GestionUsers.php";
include "../Controllers/GestionCategorie.php";
	$gs=new GestionUsers();
 	$nom = $_POST['nom'];
    $diametre = $_POST['Diametre'];
    $prix=$_POST['Prix'];
    $image="img\\\\".$_POST['Image'];

    echo " ".$_POST['nom']." ".$_POST['Diametre']." ". $_POST['Prix']." ". $_POST['Image']." ". $_POST['CatCheck'];
    $p=new Produit(0,$_POST['nom'],$_POST['Diametre'],$_POST['Prix'],$image, $_POST['CatCheck']);
    $gs->AjouterProduits($p);
    header("Location:Home.php");

?>