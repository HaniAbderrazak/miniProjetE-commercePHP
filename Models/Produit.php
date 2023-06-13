<?php

class Produit
{
private $IdProd;
private $nomProd;
private $diametre;
private $Prix;
private $Image;
private $IdCategorie;

    public function  __construct($IdProd,$n,$d,$P,$i,$IdCategorie)
     {
         $this->IdProd=$IdProd;
         $this->nomProd=$n;
         $this->diametre=$d;
         $this->Prix=$P;  
         $this->Image=$i;
         $this->IdCategorie=$IdCategorie;
     }

    public function __get($att){
        return( $this->{$att});
    }

    public function __set($att,$v){
        $this->{$att}=$v;
    }
    public function  __toString()
    {
        // TODO: Implement __toString() method.
        return 'Produit [ IdProd = '.$this->IdProd.'  ,nom='.$this->nomProd.' diametre ='.$this->diametre. ' Prix ='.$this->Prix.' IdCategorie = '.$this->IdCategorie.' ]';
    }
}