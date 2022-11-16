<?php

require "dbBroker.php";
require "model/product.php";
require "model/brand.php";
session_start();
if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    die();
}

$result = Product::getAll($conn);
$sviBrendovi = Brand::getAll($conn);
if (!$result) {
    echo "ERROR<br>";
    die();
}
if (!$sviBrendovi) {
    echo "ERROR<br>";
    die();
}
if ($result->num_rows == 0) {
    echo "Nema timova";
    die();
}
if ($sviBrendovi->num_rows == 0) {
    echo "Nema timova";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <title>BANANAS</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <style>
        body {
            background-image: url('plava.jpg');
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <div class="jumbotron text-center" style=" background-color: rgba(255, 182, 193, 0);">
        <div class="container">
            <h1 style="color:yellow">BANANAS</h1>
        </div>
    </div>

    <div style="text-align:center">
        <div id="pregled">
            <table id="tabela" class="table sortable table-hover ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">RAM</th>
                        <th scope="col">Storage</th>
                        <th scope="col">Price</th>
                        <th scope="col">Colour</th>
                        <th scope="col">OS</th>
                        <th scope="col">Slika</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="tr-Add">
                        <form action="#" method="post" id="dodajForm">
                            <td></td>
                            <td>
                                <select name="Brandid" id="Brandid">
                                    <?php
                                    while ($brand = $sviBrendovi->fetch_array()) {
                                    ?>
                                    <option value="<?php echo $brand["Brandid"] ?>">
                                        <?php echo $brand["brandname"] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td> <input type="text" name="model" placeholder="Model *" value="" /></td>
                            <td> <input type="text" name="ram" placeholder="RAM*" value="" /></td>
                            <td> <input type="text" name="storage" placeholder="Storage *" value="" /></td>
                            <td> <input type="text" name="price" placeholder="Price *" value="" /></td>
                            <td> <input type="text" name="colour" placeholder="Colour *" value="" /></td>
                            <td> <input type="text" name="os" placeholder="OS*" value="" /></td>
                            <td> <input type="text" name="slika" placeholder="Image URL *" value="" /></td>
                            <td> <button id="btnDodaj" type="submit" class="btn btn-success btn-block"
                                    style="border-radius:50px"><i class="glyphicon glyphicon-plus"></i> Add
                                </button></td>

                        </form>
                    </tr>

                    <tr>
                        <td colspan="9"><input id="search" /><input type="button" onclick="pretrazi();"
                                style="background-color: orange; 1px solid black;" value="Search" /></td>
                    </tr>
                    <?php
                    while ($red = $result->fetch_array()) {
                    ?>
                    <tr id="tr-<?php echo $red["Productid"] ?>">
                        <td>
                            <?php echo $red["Productid"] ?>
                        </td>
                        <td>
                            <?php echo $red["brandname"] ?>
                        </td>
                        <td>
                            <?php echo $red["model"] ?>
                        </td>
                        <td>
                            <?php echo $red["ram"] ?>
                        </td>
                        <td>
                            <?php echo $red["storage"] ?>
                        </td>
                        <td>
                            <?php echo $red["price"] ?>
                        </td>
                        <td>
                            <?php echo $red["colour"] ?>
                        </td>
                        <td>
                            <?php echo $red["os"] ?>
                        </td>
                        <td><img src="<?php echo $red["slika"] ?>" alt="Phone" width="50" height="50"></td>
                        <td><button id="btnObrisi" type="button" class="btn btn-success btn-block"
                                onclick='deleteProduct(<?php echo $red["Productid"] ?>);'
                                style="background-color: red; border-radius:50px;"><i
                                    class="glyphicon glyphicon-minus"></i>
                                Delete
                            </button></td>

                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div>




            </div>
        </div>
    </div>

    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="js/main.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>