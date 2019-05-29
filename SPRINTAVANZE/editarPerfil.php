<?php
require 'funciones.php';
echo "ACA ESTA LA MAGIA <br>";
echo "1) REscatar los datos de session<br>";
echo "2)PErmitir -Cambiar la foto: Usar la variable global session para editar la foto//copiar del registro y de funciones.php <br>";

$usuario = buscarPorId($_GET["id"]);
var_dump($usuario);
echo "<hr>";
$errores = [];

$nombreOk='';
$emailOk='';
$usernameOk='';//hay que validar que no haya otro con el mismo username


if ($_POST) {

//  $errores = validarRegistro($_POST);
  modificarCuenta($_POST);
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/editarPerfil.css">
    <title>Edicion</title>
  </head>
  <body>

    <div class="container">
    <h2 class="text-center text-lg-left">PANEL DE CUENTA</h2>

    <form action="editarPerfil.php?id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data"><!--A donde va ir cuando presione ENviar-->

            <div class="form-group col-xs-12 col-sm-6">
              <label for="nombre">Modificar Nombre</label><!--Falta el value que es el valor que viajara y el name con la posicion que tendra-->
              <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre" value='<?=$nombreOk ?>' placeholder="<?=$usuario["nombre"] ?>" >
              <?php if(isset($errores["nombre"])): ?>
                <span class="small text-danger"><?= $errores["nombre"] ?></span>
              <?php endif ?>
            </div>
            <div class="form-group col-xs-12 col-sm-6">
              <label for="inputEmail4">Modificar Usuario</label>
              <input type="text" class="form-control" id="inputEmail4" name="username" placeholder="Usuario"value='<?= $usernameOk ?>' placeholder="Username">
              <?php if(isset($errores["username"])): ?>
                <span class="small text-danger"><?= $errores["username"] ?></span>
              <?php endif ?>
            </div>
            <div class="form-group form-column">
            <div class="form-group col-xs-12 col-sm-6">
              <label for="inputPassword4">Modificar Contraseña</label>
              <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Contraseña" >
            </div>
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
          <div class="form-group">
            <div class="form-check">
                <input class="form-check-input is-invalid" type="checkbox" id="gridCheck" required>
                <label class="form-check-label" for="gridCheck">
                  De acuerdo a los términos y condiciones
                </label>
                <div class="invalid-feedback">
                    Usted debe estar de acuerdo antes de enviar.
                </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-formulario">Enviar</button>
    </form>
    </div>




  </body>
</html>