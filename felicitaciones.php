<?php
session_start();
//var_dump($_POST);
//var_dump($_SESSION);


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BIEN</title>
  </head>
  <body>
    <h2><?= $_SESSION['username'] ?></h2>
    <p>TUS DATOS FUERON REGISTRADOS CORRECTAMENTE</p>
    <a class="btn btn-success" href="home.php">IR AL HOME</a>

  </body>
</html>
