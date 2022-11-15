<?php

class Product
{
    public $Productid;
    public $Brandid;
    public $model;
    public $ram;
    public $storage;
    public $price;
    public $colour;
    public $os;
    public $slika;

    public function __construct($Productid = null, $Brandid = null, $model = null, $ram = null, $storage = null, $price = null, $colour = null, $os = null, $slika = null)
    {
        $this->Productid = $Productid;
        $this->Brandid = $Brandid;
        $this->model = $model;
        $this->ram = $ram;
        $this->storage = $storage;
        $this->price = $price;
        $this->colour = $colour;
        $this->os = $os;
        $this->slika = $slika;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM product INNER JOIN brand ON product.Brandid=brand.Brandid";
        return $conn->query($q);

    }


    public static function add($Brandid = null, $model = null, $ram = null, $storage = null, $price = null, $colour = null, $os = null, $slika = null, mysqli $conn)
    {
        $q = "INSERT INTO product(Brandid, model, ram, storage, price, colour, os,slika) values($Brandid, '$model', '$ram', '$storage', '$price',  '$colour','$os', '$slika')";
        return $conn->query($q);
    }

    public static function delete(int $id, mysqli $conn)
    {
        $q = "DELETE FROM product WHERE product.Productid = $id";
        return $conn->query($q);
    }

    public static function search($term, mysqli $conn)
    {
        $q = "SELECT * FROM product INNER JOIN brand ON product.Brandid=brand.Brandid WHERE product.model like '%$term%' or brand.brandname like '%$term%'";
        $result = $conn->query($q);
        return $result->fetch_all();
    }
}

?>