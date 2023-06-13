<?php

class Commande
{
  static $IdCommande;


    public function  __construct()
     {
         
     }
     public function add()
     {
        self::$IdCommande++;
     }

    public function __get($att){
        return( $this->{$att});
    }

    public function __set($att,$v){
        $this->{$att}=$v;
    }
}