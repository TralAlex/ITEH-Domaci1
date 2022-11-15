<?php

require "../DBBroker.php";
require "../model/product.php";

if (isset($_POST['Brandid']) && isset($_POST['model']) && isset($_POST['ram']) && isset($_POST['storage']) && isset($_POST['price']) && isset($_POST['colour']) && isset($_POST['os']) && isset($_POST['slika'])) {
    $rezultat = Product::add((int) $_POST['Brandid'], $_POST['model'], $_POST['ram'], $_POST['storage'], $_POST['price'], $_POST['colour'], $_POST['os'], $_POST['slika'], $conn);
    if ($rezultat) {
        echo "Success";
    } else {
        echo "Error";
    }
}
?>