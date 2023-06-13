<?php
include "../Controllers/GestionPanier.php";
include "Commande.php";
include "../Connection/BD.php";

// $gp=new GestionPanier();
// $c=new Commande();
// $c->add();
	# code...
			echo $_GET['id']." ".$_GET['prix'] ;
			$id=$_GET['id'];
			$p=$_GET['prix'];
			//$max1=0;
			$max=0;
			 $c=mysqli_connect("127.0.0.1","root","","keramoskhemis");
			// $requete="SELECT MAX(idCommande) FROM commande";
   //            $res=mysqli_query($c,$requete);
              
   //            while($tab =mysqli_fetch_array($res,MYSQLI_NUM)) {
   //            	$max1=$tab[0];
   //            }
			//INSERT INTO commande(idCommande, idUser, prixTotale,dateC) VALUES (0,12,2,sysdate())
			$requete="INSERT INTO commande(idCommande,idUserC,prixTotale,dateC) VALUES (0 ,".$id.",".$p." ,sysdate())";
              
              mysqli_query($c,$requete);
              $requete="SELECT MAX(idCommande) FROM commande";
              $res=mysqli_query($c,$requete);
              
              while($tab =mysqli_fetch_array($res,MYSQLI_NUM)) {
              	$max=$tab[0];
              }
              
              
			   $requete="UPDATE produitcommande SET idCommande=".$max." WHERE idUser =".$id." AND idCommande=0";
     		   mysqli_query($c,$requete);
   		  	   $requete="DELETE FROM produitachete WHERE idUser =".$id.";";
   		       mysqli_query($c,$requete);

header("location:Home.php");
?>
