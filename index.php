<?php
require "DBBroker.php";
require "model/user.php";

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
  $name = $_POST['username'];
  $password = $_POST['password'];

  $rs = User::logIn($name, $password, $conn);

  if ($rs->num_rows == 1) {
    echo "Uspesno ste se prijavili";
    $_SESSION['loggeduser'] = "prijavljen";
    $_SESSION['id'] = $rs->fetch_assoc()['id'];
    header('Location: products.php');
    exit();
  } else {
    //promeni 
    echo '<script type="text/javascript">alert("Pogresni podaci za login");
                   </script>';
    exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>Prijava</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <style>
    body {
      background-image: url('banana6.jpg');
    }
  </style>
  <div style="text-align:center" class="col-md-4">
  </div>

  <div class="col-md-4">
    <h2 style="text-align:center" text-colour="blue">Dobrodosli na BANANAS</h2>

    <h3 style="text-align:center">Unesite podatke</h3>
    <form class="login-form" style="text-align:center" method="POST">
      <input type="text" placeholder="Korisnicko ime" name="username" required />
      <input type="password" placeholder="Lozinka" name="password" required />
      <button type="submit">PRIJAVA</button>
    </form>
  </div>
</body>

</html>