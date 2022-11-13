<?php

class Brand{
    public $Brandid;
    public $brandname;
    public $products;
   

public function __construct($Brandid = null,$brandname=null,$products=null){
    $this->Brandid = $Brandid;
   $this->brandname = $brandname;
   $this->products =$products;
}
    


}

?>