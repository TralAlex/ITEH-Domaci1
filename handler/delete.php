<?php

require "../DBBroker.php";
require "../model/product.php";

if (isset($_POST['id'])) {
    $rezultat = Product::delete((int) $_POST['id'], $conn);
    if ($rezultat) {
        echo 'Success';
    } else {
        echo "Error";
    }
}
?>