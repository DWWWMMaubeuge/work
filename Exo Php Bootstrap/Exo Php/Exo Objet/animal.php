<?php

Class Animal
{  
	 
	public $type;

	public function __construct( $type )
	{
        $this->type = $type;
        echo "je suis"." ".$this->type."<br>";
	}


	public function manger()
	{
		echo "je mange ";
	
	}

	public function dormir()
	{
		echo "je dors ";

	}

    public function bouger()
	{
        echo "je bouge ";
	}

   

}

Class Chat extends Animal
{
	public function __construct()
	{
		parent::__construct(  "un chat"  );
	}

	public function manger()
    {
        parent::manger();
        echo "des croquettes<br>";
    }
    public function dormir()
    {
		parent::dormir();
		echo " sous la couverture<br>";
	}

	public function bouger()
	{
		parent::bouger();
		echo " dans tous les coins de la maison<br>";
	}

	
	
}

Class Chien extends Animal
{
	public function __construct()
	{
		parent::__construct(  "un chien"  );
	}

	public function manger()
	{
		parent::manger();
		echo " un os<br>";
	}

	public function dormir()
	{
		parent::dormir();
		echo " dans mon panier<br>";
    }
    
	public function bouger()
	{
		parent::bouger();
		echo " dans le jardin <br>";
	}

   


}


$chat = new Chat();
$chat->manger();
$chat->dormir();
$chat->bouger();

echo "<br>";

$chien = new Chien();
$chien->manger();
$chien->dormir();
$chien->bouger();

echo "<br>";



