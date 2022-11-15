<?php

require "../DBBroker.php";
require "../model/product.php";

if (isset($_POST['term'])) {
    $rezultat = Product::search($_POST['term'], $conn);
    if ($rezultat) {
        echo json_encode($rezultat);
    } else {
        echo json_encode([]);
    }
}
?>