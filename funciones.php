<?php
session_start();
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

    if(file_exists("usuarios.json") && existeUsuario($datosFinales["username"])){
      $errores["username"] = "El usuario ya se encuentra registrado.";
    }
    if(strlen($datosFinales["username"]) == 0){
      $errores["username"] = "Por favor complete el campo Username.";
    }

    if(strlen($datosFinales["password"]) == 0){
      $errores["password"] = "El campo contraseña no puede estar vacío.";
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

function nextId(){
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

}

function armarUsuario(){//Se pasa por $_POST
  return  [
    "id" => nextId(),
    "nombre" => trim($_POST["nombre"]),
    "email" =>  trim($_POST["email"]),
    "username" => trim($_POST["username"]),
    "password" => password_hash($_POST["password"],PASSWORD_DEFAULT)
  // ESTO ES LO QUE JODE : SE AGREGA EN EL REGISTRO "foto" => "img/".$_POST["username"]
  ];
}

function guardarUsuario($usuario){
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
}

//Falta validar que no haya usuarios repetidos ese es nuestro criterio
function buscarClientePorUsuario($username){
  $json = file_get_contents("usuarios.json");
  $array = json_decode($json, true);
  foreach ($array["usuarios"] as $value) {
    if ($value["username"]==$username) {
      return $value;
    }
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
  return isset($_SESSION["username"]);
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

function listaUsuarios(){
  $json = file_get_contents("db.json");
  $array = json_decode($json, true);

  return $array["usuarios"];
}

 ?>
