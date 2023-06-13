<?php 
class Categorie 
{
	private $IdCateg;
	private $nomCateg;
	
		public function  __construct($id,$nom)
		{
			$this->IdCateg=$id;
			$this->nomCateg=$nom;
			
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
        return ' Categorie [ IdCateg= '.$this->IdCateg.'  ,nomCateg= '.$this->nomCateg.' ]';
    }
}



?>