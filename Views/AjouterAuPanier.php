<?php
        include "../Controllers/GestionUsers.php";
       include "../Connection/BD.php";
       include "../Controllers/GestionPanier.php";
       $gs=new GestionUsers();
       $tab=$gs->RecupererUserByName($_POST['nameUser']);
       foreach($tab as $donne)
       {
       	 $id=$donne['Id'];
       }
       $gp=new GestionPanier();
       $gp->AjouterAuPanier($_POST['IdProd'],$id,$_POST['Quantity']);
       //INSERT INTO produitachete(idProduit,idUser,quantite) VALUES (,,)
       header("location:../Views/Home.php");
        
        
?>