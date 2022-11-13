<?php

class Product{
    public $Productid;
    public $Brandid;
    public $model;
    public $ram;
    public $storage;
   public $price;
   public $colour;
   public $os;
   public $image;

public function __construct($Productid = null,$Brandid=null,$model=null,$ram=null,$price=null,$colour=null,$os=null,$image=null){
    $this->Productid = $Productid;
   $this->Brandid = $Brandid;
   $this->model=$model;
   $this->ram=$ram;
   $this->price=$price;
   $this->colour=$colour;
   $this->os=$os;
   $this->image=$image;
}

public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM product INNER JOIN brand ON product.Brandid=brand.Brandid";
        return $conn->query($q);

    }

}

?>