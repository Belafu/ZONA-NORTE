<?php
//Gestionar la conexión a DB
//$dsn = "mysql:host=localhost;dbname=blend_tm01;port=3306";
$dsn = "mysql:host=127.0.0.1;dbname=tp_db;port=3306";
$user = "root";
$pass = "";

//$db = new PDO($dsn, $user, $pass);

try {
  $db = new PDO($dsn, $user, $pass);
  //le dice a la db que muestre los errores en PHP.
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "todo bien.";
} catch (\Exception $e) {
  echo "Hubo un error. <br>";
  echo $e->getMessage();
  exit;
}
