<?php

//Incluímos todas las clases necesarias para operar y las instancias iniciales que necesite el proyecto.
include "usuario.php";
include "db.php";
include "dbMysql.php";
include "dbJson.php";
include "validador.php";
include "auth.php";

$dbAll = new DbMysql; //En caso de usar json cambiar por new DbJson
$auth = new Auth;
