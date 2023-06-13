<?php

class User
{
private $IdUser;
private $nomUser;
private $PrenomUser;
private $Email;
private $Password;
private $Role;

    public function  __construct($Id,$n,$d,$P,$Pas)
     {
         $this->IdUser=$Id;
         $this->nomUser=$n;
         $this->PrenomUser=$d;
         $this->Email=$P;  
         $this->Password=$Pas;
        
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
        return 'User [ IdUser = '.$this->IdUser.'  ,nom='.$this->nomUser.' prenom ='.$this->PrenomUser. ' Email ='.$this->Email.' Password = '.$this->Password.' Role= '.$this->Role.']';
    }
}