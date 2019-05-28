<?php
include "funciones.php";


echo "<hr>";
/*$stmt = $db->prepare("SELECT * FROM usuarios WHERE username = :username ");
$stmt->bindValue(":username", 'jorgto');
$stmt->execute();

$search = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($search);
echo "<hr>";
echo $search["username"];*/
$search = buscarClientePorUsuario("jorgito");
var_dump($search);
//DEVUELV UN FALSE SI NO LO NCUENTRA

 ?>
