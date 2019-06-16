<?php
include "Modelo/init.php";
//require 'funciones.php';

$usuario = $dbAll->buscarClientePorUsuario($_SESSION["username"]);
//var_dump($usuario);
$errores = [];

$nombreOk = $usuario->getName();
$usernameOk = $usuario->getUsername();



if ($_POST) {
  $errores = Validador::validarNuevoPerfil($_POST);
  $nombreOk = trim($_POST["nombre"]);
  $usernameOk = trim($_POST["username"]);

  if (empty($errores)){
    if (!empty($_POST["password"])) {    //  echo "la contraseña se Cambio|Osea escribio otra|";
      $_POST["password"] = password_hash($_POST["password"],PASSWORD_DEFAULT);
    }
    if ($_FILES["foto"]["error"]!= 4 ) {  // Se  cargo alguna una foto
      $ext= pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
      $usuario->setAvatar("img/" . $_POST["username"]. "." . $ext);
      move_uploaded_file($_FILES["foto"]["tmp_name"], "img/" . $_POST["username"]. "." . $ext);
    }else {//si NO carge ninguna foto
      //si cambio el username ,se debe cambiar el nombre de mi foto
      $extActual= pathinfo($usuario->getAvatar(), PATHINFO_EXTENSION);
      if ($_POST["username"] != $usuario->getUsername()) {
        rename($usuario->getAvatar(), "img/" . $_POST["username"]. "." . $extActual);
        $usuario->setAvatar("img/" . $_POST["username"]. "." . $extActual);
        //queda a criterio eliminar la imagen de la antigua foto dado que ya no usa este username estaria disponible, y se podria usar .Aunque creo que si se cambia se sobreescribe , pero en el registro con foto creo que tambien se sobreescribe .
        //DA igual creo .Lo unico que pasaria es que estaria flotando
      }
    }


    $_POST["foto"]=$usuario->getAvatar();
    $dbAll->modificarCuenta($_POST);

    $auth->loguearUsuario($_POST["username"]);
    header("Location:home.php");
    exit;
  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/editarPerfil.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Edicion</title>
  </head>
<body>

  <div class="container">
    <form action="editarPerfil.php?id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="form-group col-xs-12 col-sm-6">
          <h2 class="text-center text-lg-left">Modifica  tus datos</h2>
          <label for="nombre">Modificar Nombre</label>
          <input type="text" class="form-control" id="inputNombre" name="nombre" value='<?=$nombreOk ?>' placeholder="Nombre" >
          <?php if(isset($errores["nombre"])): ?>
            <span class="small text-danger"><?= $errores["nombre"] ?></span>
          <?php endif ?>
        </div>

        <div class="form-group col-xs-12 col-sm-6">
          <label for="inputUsername">Modificar Usuario</label>
          <input type="text" class="form-control" id="inputUsername" name="username" value='<?= $usernameOk ?>' placeholder="Username">
          <?php if(isset($errores["username"])): ?>
            <span class="small text-danger"><?= $errores["username"] ?></span>
          <?php endif ?>
        </div>

        <div class="form-group col-xs-12 col-sm-6">
          <label for="inputPassword4">Modificar Contraseña</label>
          <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Contraseña"  >
        </div>

        <div class="form-group form-column">
            <div class="foto-perfil form-group col-xs-12 col-sm-6">
              <label for="inputPassword4">Modificar Foto de perfil</label>
              <br>
              <input type="file"  id="inputNombre" name="foto" value="">
              <?php if(isset($errores["foto"])): ?>
                <span class="small text-danger"><?= $errores["foto"] ?></span>
              <?php endif ?>
            </div>
        </div>
    <!--El checkbox de acepto los datos enviados-->
          <div class="form-group form-column col-xs-12 col-sm-6">
            <div class="form-check">
                <input class="form-check-input is-invalid" type="checkbox" id="gridCheck" required>
                <label class="form-check-label" for="gridCheck">
                  De acuerdo a los términos y condiciones
                </label>
                <div class="invalid-feedback">
                    Usted debe estar de acuerdo antes de enviar.
                </div>
            </div>
            <br>
              <button type="submit" class="btn btn-primary btn-formulario ">Enviar</button>
          </div>
    </form>
  </div>

  </body>
</html>
