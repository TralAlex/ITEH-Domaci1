<?php

require "dbBroker.php";
require "model/product.php";
session_start();
if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    die();
}

$result = Product::getAll($conn);
if (!$result) {
    echo "ERROR<br>";
    die();
}
if ($result->num_rows == 0) {
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
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="jumbotron text-center" style=" background-color: rgba(255, 182, 193, 0);">
    <div class="container">
        <h1 style="color:darkred">BANANAS</h1>
    </div>
</div>

<div class="col-md-8" style="text-align:center; width:66.6%;float:left">
    <div id="pregled">
        <table id="tabela" class="table sortable table-bordered table-hover ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">RAM</th>
                    <th scope="col">Price</th>
                    <th scope="col">Colour</th>
                    <th scope="col">OS</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($red = $result->fetch_array()) {
                ?>
                    <tr id="tr-<?php echo $red["Productid"] ?>">
                        <td><?php echo $red["Productid"] ?></td>
                        <td><?php echo $red["brandname"] ?></td>
                        <td><?php echo $red["model"] ?></td>
                        <td><?php echo $red["ram"] ?></td>
                        <td><?php echo $red["price"] ?></td>
                        <td><?php echo $red["colour"] ?></td>
                        <td><?php echo $red["os"] ?></td>
                        <td><img src="<?php echo $red["image"] ?>" alt="Phone" width="100" height="100"></td>
                        

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

  </body>
</html>