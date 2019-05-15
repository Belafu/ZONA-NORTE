<?php
session_start();
echo "RELLENASTE CORRECTAMENTE TODOS TUS DATOS";

var_dump($_POST);
var_dump($_SESSION);
//NO FUNCIONA COMO ACCEDEMOS A LOS DATOS

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BIEN</title>
  </head>
  <body>
    <a class="btn btn-success" href="home.php">IR AL HOME</a>
  </body>
</html>
