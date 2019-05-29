<?php
//el session_start(); siempre al principio de todo: Proba intercambiando las lineas 2 y 3
session_start();
include "pdo.php";


function validarRegistro($datos){
    $errores=[];
    $datosFinales = [];

    foreach ($datos as $posicion => $valores) {//todo el foreach es para trimiar los datos (osea que no queden espacios a los costados)
    if(!is_array($datos[$posicion])){
        $datosFinales[$posicion] = trim($valores);
    }
      // if($posicion !== "hobbies"){
      //   $datosFinales[$posicion] = trim($valores);
      // }
    } // ver en que caso rompe.... Rta: cuando el dato es un array.

    //var_dump($errores, $datosFinales);

    if(strlen($datosFinales["nombre"]) == 0){
      $errores["nombre"] = "Por favor complete el campo nombre.";
    } else if(ctype_alpha($datosFinales["nombre"]) == false){
      $errores["nombre"] = "El nombre debe contener solo letras";
    }

    if(strlen($datosFinales["email"]) == 0){
      $errores["email"] = "Por favor complete el campo email.";
    } elseif (!filter_var($datosFinales["email"], FILTER_VALIDATE_EMAIL)) {
      $errores["email"] = "Por favor ingrese un email con formato válido.";
    }

    if(existeUsuario($datosFinales["username"])){
      $errores["username"] = "El usuario ya se encuentra registrado.";
    }
    if(strlen($datosFinales["username"]) == 0){
      $errores["username"] = "Por favor complete el campo Username.";
    }

    if(strlen($datosFinales["password"]) == 0){
      $errores["password"] = "El campo contraseña no puede estar vacío.";
    }
    if(!isset($datosFinales["gender"])){
      $errores["gender"] = "El campo genero no puede estar vacío.";
    }

//VALIDACION DE LA IMAGEN
    if ($_FILES["foto"]["error"]!= 0 ) {
      if ($_FILES["foto"]["error"]!= 4) {//aqui adentro el error no es tipo 0 ni 4
        $errores["foto"] = "Hubo un error al acargar la imagen ";
      }else {//aqui adentro el error no es tipo 0 PERO SI 4
      }
    }else {//ACA SE CARGO BIEN LA FOTO
      $ext = pathinfo($_FILES["foto"]["name"],PATHINFO_EXTENSION);
      if ($ext!= "jpg" && $ext!= "jpeg" && $ext!= "png") {//verificar las extenciones posibles
          $errores["foto"] = "la foto debe ser jpg ,jpeg o png <br>";
      }
    }



    return $errores;
}

/*function nextId(){
  // TODO: que pasa si no hay usuario anterior.
  if (!file_exists("usuarios.json")) {
    $json = "";//'' no va
  }else {
    $json = file_get_contents("usuarios.json");
  }
  if ($json == "") {
    return 1;
  }

  $array = json_decode($json, true);
  $ultimoUsuario = array_pop($array["usuarios"]);
  $lastId = $ultimoUsuario["id"];

  return $lastId + 1;

}*/

/*function armarUsuario(){
  return  [
    "id" => nextId(),
    "nombre" => trim($_POST["nombre"]),
    "email" =>  trim($_POST["email"]),
    "username" => trim($_POST["username"]),
    "password" => password_hash($_POST["password"],PASSWORD_DEFAULT),
    "gender"=> $_POST["gender"],
    "pais" => $_POST["pais"],
    "ciudad" => $_POST["ciudad"]
  ];
} */
function armarUsuario(){
  return  [
    "nombre" => trim($_POST["nombre"]),
    "email" =>  trim($_POST["email"]),
    "username" => trim($_POST["username"]),
    "password" => password_hash($_POST["password"],PASSWORD_DEFAULT),
    "gender"=> $_POST["gender"],
    "pais" => $_POST["pais"],
    "ciudad" => $_POST["ciudad"]
  ];
}
/*function guardarUsuario($usuario){
  // TOD: que pasa si no hay archivo.
  if (!file_exists("usuarios.json")) {
    $json = '';
  }else {
    $json = file_get_contents("usuarios.json");
  }
//  $json = file_get_contents("usuarios.json");
  $array = json_decode($json, true);

  $array["usuarios"][] = $usuario;
  $array = json_encode($array, JSON_PRETTY_PRINT);

  file_put_contents("usuarios.json", $array);
}*/
function guardarUsuario($usuario){
  global $db;
  $stmt = $db->prepare("INSERT INTO usuarios VALUES(default,:nombre ,:email , :username, :password, :gender, :pais, :ciudad, :foto)"); //Hay que explicitar los campos que son cadena de texto en SQL.
  $stmt->bindValue(":nombre", $usuario["nombre"]);
  $stmt->bindValue(":email", $usuario["email"]);
  $stmt->bindValue(":username", $usuario["username"]);
  $stmt->bindValue(":password", $usuario["password"]);
  $stmt->bindValue(":gender", $usuario["gender"]);
  $stmt->bindValue(":pais", $usuario["pais"]);
  $stmt->bindValue(":ciudad", $usuario["ciudad"]);
  $stmt->bindValue(":foto", $usuario["foto"]);

  $stmt->execute();

}


/*function buscarClientePorUsuario($username){
  $json = file_get_contents("usuarios.json");
  $array = json_decode($json, true);
  foreach ($array["usuarios"] as $value) {
    if ($value["username"]==$username) {
      return $value;
    }
  }
  return null;
}*/

function buscarClientePorUsuario($username){
//LAS VARIABLES EXTERNAS NO SABEN EN LS FUNCIONES
  global $db;

  $stmt = $db->prepare("SELECT * FROM usuarios WHERE username = :username");
  $stmt->bindValue(":username", $username);
  $stmt->execute();

  $search = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($search) {
    return $search;
  }
  return null;
}


function existeUsuario($username){
  return buscarClientePorUsuario($username) !== null;
}

function validarLogin($datos){
  $errores = [];
  if(strlen($datos["username"]) == 0){
    $errores["username"] = "Por favor complete el campo email.";
  } elseif(!existeUsuario($datos["username"])){
    $errores["username"] = "Este Username no se encuentra registrado.";
  }

  if(strlen($datos["password"]) == 0){
    $errores["password"] = "El campo contraseña no puede estar vacío.";
  } else {
    $usuario = buscarClientePorUsuario($datos["username"]);
    if(!password_verify($datos["password"], $usuario["password"])){
      $errores["password"] = "La contraseña es incorrecta.";
    }
  }

  return $errores;
}

function loguearUsuario($username){
  $_SESSION["username"] = $username;
}

function usuarioLogueado(){
  return isset($_SESSION["username"]) ;
}

function traerUsuarioLogueado(){
  // Si está logueado trae los datos del usuario
  if(isset($_SESSION["username"])) {
    $usuario = buscarClientePorUsuario($_SESSION["username"]);
    return $usuario;
  } else {
    // Sino: FALSE
    return false;
  }
}

function modificarCuenta($datos){
 // $errores = [];
 // if(strlen($datos["username"]) == 0){
 //   $errores["username"] = "Por favor complete el campo modificar nombre.";
 // } elseif(existeUsuario($datos["username"])){
 //   $errores["username"] = "Este Username se encuentra registrado.";
 // }
 // elseif(existeUsuario($datos["username"]) == existeUsuario($datos["username"])){
 //   $errores["username"] = "El usuario no puede ser el mismo";
 global $db;
 $stmt = $db->prepare("UPDATE usuarios SET nombre = :nombre, username = :username , password = :password WHERE id = :id ");

 $stmt->bindValue(":id", $_GET['id'] );
 $stmt->bindValue(":nombre", $datos["nombre"]);
 $stmt->bindValue(":username", $datos["username"]);
 $stmt->bindValue(":password", $datos["password"]);
 $stmt->execute();
}
/*function listaUsuarios(){
  $json = file_get_contents("db.json");
  $array = json_decode($json, true);

  return $array["usuarios"];
}*/
function validarNuevoPerfil($datos){
  $errores=[];
  if(strlen($datos["nombre"]) == 0){
    $errores["nombre"] = "Por favor complete el campo nombre.";
  } else if(ctype_alpha($datos["nombre"]) == false){
    $errores["nombre"] = "El nombre debe contener solo letras";
  }
  if(existeUsuario($datos["username"])){
    $errores["username"] = "El usuario ya se encuentra registrado.";
  }
  if(strlen($datos["password"]) == 0){
    $errores["password"] = "El campo contraseña no puede estar vacío.";
  }

    return $errores;
}





 ?>
