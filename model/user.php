<?php

class User{
    public $id;
    public $username;
    public $password;
    public $fullname;
    public $phone;
    public $address;

public function __construct($id = null, $username = null, $password = null, $fullname =null, $phone=null, $address=null){
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
    $this->fullname = $fullname;
    $this->phone = $phone;
    $this->address = $address;
}
    
public static function login($username, $password, mysqli $conn){
    $q = "select * from user where username= '".$username."' and password ='".$password."' limit 1;";
    
    return $conn->query($q);
}

}

?>