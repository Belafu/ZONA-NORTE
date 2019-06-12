<?php

class Validador {

  public static function validarRegistro($datos){
      global $dbAll;

      $errores=[];
      $datosFinales = [];

      foreach ($datos as $posicion => $valores) {

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
      } elseif(ctype_alpha($datosFinales["nombre"]) == false){
        $errores["nombre"] = "El nombre debe contener solo letras..";
      }

      if(strlen($datosFinales["email"]) == 0){
        $errores["email"] = "Por favor complete el campo email.";
      } elseif (!filter_var($datosFinales["email"], FILTER_VALIDATE_EMAIL)) {
        $errores["email"] = "Por favor ingrese un email con formato válido.";
      }

      if($dbAll->existeUsuario($datosFinales["username"])){
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
              $errores["foto"] = "Hubo un error al acargar la imagen ";
      }else {//ACA SE CARGO BIEN LA FOTO
            $ext = pathinfo($_FILES["foto"]["name"],PATHINFO_EXTENSION);
            if ($ext!= "jpg" && $ext!= "jpeg" && $ext!= "png") {//verificar las extenciones posibles
                $errores["foto"] = "la foto debe ser jpg ,jpeg o png <br>";
            }
      }

      return $errores;
  }

  public static function validarLogin($datos){
    global $dbAll;

    $errores = [];
    if(strlen($datos["username"]) == 0){
      $errores["username"] = "Por favor complete el campo email.";
    } elseif(!$dbAll->existeUsuario($datos["username"])){
      $errores["username"] = "Este Username no se encuentra registrado.";
    }

    if(strlen($datos["password"]) == 0){
      $errores["password"] = "El campo contraseña no puede estar vacío.";
    } else {
      $usuario = $dbAll->buscarClientePorUsuario($datos["username"]);
      if(!password_verify($datos["password"], $usuario->getPass())){
        $errores["password"] = "La contraseña es incorrecta.";
      }
    }

    return $errores;
  }

  public function validarNuevoPerfil($datos){
    $errores=[];
    if(strlen($datos["nombre"]) == 0){
      $errores["nombre"] = "Por favor complete el campo nombre.";
    } else if(ctype_alpha($datos["nombre"]) == false){
      $errores["nombre"] = "El nombre debe contener solo letras";
    }

    if ($_FILES["avatar"]["error"]!= 0 ) {
            $errores["avatar"] = "Hubo un error al acargar la imagen ";
    }else {//ACA SE CARGO BIEN LA FOTO
          $ext = pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION);
          if ($ext!= "jpg" && $ext!= "jpeg" && $ext!= "png") {//verificar las extenciones posibles
              $errores["avatar"] = "la foto debe ser jpg ,jpeg o png <br>";
          }
    }

      return $errores;
  }

}
