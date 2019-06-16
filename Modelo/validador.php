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
        if ($_FILES["foto"]["error"]!= 4) {
          $errores["foto"] = "Hubo un error al acargar la imagen ";
        }
        //Cargaste una imagen se te pondra la que elegiste
      }else {//ACA SE CARGO BIEN LA FOTO
            $ext = pathinfo($_FILES["foto"]["name"],PATHINFO_EXTENSION);
            if ($ext!= "jpg" && $ext!= "jpeg" && $ext!= "png") {//verificar las extenciones posibles
                $errores["foto"] = "la foto debe ser jpg ,jpeg o png";
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

  public static function validarNuevoPerfil($datos){
    $errores=[];
    if(strlen($datos["nombre"]) == 0){
      $errores["nombre"] = "Por favor complete el campo nombre.";
    } else if(ctype_alpha($datos["nombre"]) == false){
      $errores["nombre"] = "El nombre debe contener solo letras";
    }
//RECORDAR 0 es cargo bien | 4 es que no se cargo un foto
//tube muchos problemas en esta pr el 4:esta version es la mejor que encontre NO HAY OTRA
    if ($_FILES["foto"]["error"]!= 0 ) {
      if ($_FILES["foto"]["error"]!= 4) {//aqui adentro el error no es tipo 0 ni 4
        $errores["foto"] = "Hubo un error al acargar la imagen ";
      }
        //NO cargaste imagen se te mantendra con la que ya tienes
    }else {//ACA SE CARGO BIEN LA FOTO
          $ext = pathinfo($_FILES["foto"]["name"],PATHINFO_EXTENSION);
          if ($ext!= "jpg" && $ext!= "jpeg" && $ext!= "png") {//verificar las extenciones posibles
              $errores["foto"] = "la foto debe ser jpg ,jpeg o png <br>";
          }
    }

      return $errores;
  }

}
