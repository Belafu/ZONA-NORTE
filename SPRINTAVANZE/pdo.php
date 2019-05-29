<?php
//Gestionar la conexión a DB

$dsn = "mysql:host=127.0.0.1;dbname=proyecto;port=3306";
$user = "root";
$pass = "root";



try {
  $db = new PDO($dsn, $user, $pass);
  //le dice a la db que muestre los errores en PHP.
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (\Exception $e) {
  echo "Hubo un error. <br>";
  echo $e->getMessage();
  exit;
}

?>
