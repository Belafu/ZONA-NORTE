<?php
include "funciones.php";

$datos = ["nombre"=>'POPO',"username"=>'belafu',"password" => 'qw123',"id"=>2];
var_dump($datos);



echo "<hr>";
modificarCuenta($datos);
//$stmt = $db->prepare("UPDATE usuarios SET nombre = 'belafu', username = 'pepe3', password = '123456'WHERE id = 1 ");
//$stmt-> execute();
//NO LE GUSTA EL PARENTESIS QUITARLO

//DEVUELV UN FALSE SI NO LO NCUENTRA

 ?>
