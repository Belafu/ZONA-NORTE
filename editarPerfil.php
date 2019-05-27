<?php
require 'funciones.php';
echo "ACA ESTA LA MAGIA <br>";
echo "1) REscatar los datos de session<br>";
echo "2)PErmitir -Cambiar la foto: Usar la variable global session para editar la foto//copiar del registro y de funciones.php <br>";

$usuario = buscarClientePorUsuario($_SESSION["username"]);
var_dump($usuario);
echo "<hr>";
$errores = [];

$nombreOk='';
$emailOk='';
$usernameOk='';//hay que validar que no haya otro con el mismo username


if ($_POST) {

  $errores = validarRegistro($_POST);
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
    <title>Edicion</title>
  </head>
  <body>

    <div class="container">
    <h2 class="text-center text-lg-left">MODIFICA  tus datos</h2>

    <form action="registro.php" method="post" enctype="multipart/form-data"><!--A donde va ir cuando presione ENviar-->
        <div class="form-group form-row">
            <div class="form-group col-xs-12 col-sm-6">
              <label for="nombre">Nombre Completo</label><!--Falta el value que es el valor que viajara y el name con la posicion que tendra-->
              <input type="text" class="form-control" id="inputNombre" name="nombre" value='<?= $nombreOk ?>' placeholder="<?=$usuario["nombre"]  ?>" >
              <?php if(isset($errores["nombre"])): ?>
                <span class="small text-danger"><?= $errores["nombre"] ?></span>
              <?php endif ?>
            </div>
            <div class="form-group col-xs-12 col-sm-6">
              <label for="inputEmail4">Username</label>
              <input type="text" class="form-control" id="inputEmail4" name="username" value='<?= $usernameOk ?>' placeholder="Username">
              <?php if(isset($errores["username"])): ?>
                <span class="small text-danger"><?= $errores["username"] ?></span>
              <?php endif ?>
            </div>
        </div>
        <div class="form-group form-row">
            <div class="form-group col-xs-12 col-sm-6">
              <label for="inputPassword4">Password</label>
              <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password" required>
            </div>
        </div>
        <div class="form-group form-row">
          <div class="col-xs-12 col-lg-12">
            <label for="" >Género</label>
          </div>
          <div class="form-check form-check-inline col-xs-12 col-lg-3">
            <?php if(isset($_POST["gender"]) && $_POST["gender"] == "masc"): ?>
              <input class="form-check-input" name="gender" type="radio" id="inlineRadio1" value="masc" checked>
            <?php else: ?>
            <input class="form-check-input" name="gender" type="radio" id="inlineRadio1" value="masc">
          <?php endif ?>
            <label class="form-check-label" for="inlineRadio1">Masculino</label>
          </div>
          <div class="form-check form-check-inline col-xs-12 col-lg-3">
            <?php if(isset($_POST["gender"]) && $_POST["gender"] == "fem"): ?>
                <input class="form-check-input" name="gender" type="radio" id="inlineRadio2" value="fem" checked>
            <?php else: ?>
              <input class="form-check-input" name="gender" type="radio" id="inlineRadio2" value="fem">
            <?php endif; ?>
            <label class="form-check-label" for="inlineRadio2">Femenino</label>
          </div>
          <div class="form-check form-check-inline col-xs-12 col-lg-3">
            <?php if(isset($_POST["gender"]) && $_POST["gender"] == "other"): ?>
                <input class="form-check-input" name="gender" type="radio" id="inlineRadio3" value="other" checked>
            <?php else: ?>
              <input class="form-check-input" name="gender" type="radio" id="inlineRadio3" value="other">
            <?php endif; ?>
            <label class="form-check-label" for="inlineRadio3">Prefiero no decirlo</label>
          </div>
          <?php if(isset($errores["gender"])): ?>
            <span class="small text-danger"><?= $errores["gender"] ?></span>
          <?php endif ?>
        </div>
        <div class="form-group form-row">
            <div class="form-group col-xs-12">
              <!--Falta el value que es el valor que viajara y el name con la posicion que tendra-->
              Foto de Perfil  <input type="file"  id="inputNombre" name="foto" value="">
              <?php if(isset($errores["foto"])): ?>
                <span class="small text-danger"><?= $errores["foto"] ?></span>
              <?php endif ?>
            </div>
        </div>
        <div class="form-group form-row">
            <div class="form-group col-xs-12 col-sm-6">
                  <label for="pais">Pais</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="pais">
                  <option value="argentina">Argentina</option>
                  <option value="urugai">Urugays</option>
                  <option value="brasil">Brasil</option>
                  <option value="chile">Chile</option>
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-6">
                <label for="ciudad">Ciudad</label>
                <select id="inputState" class="form-control" name="ciudad">
                  <option value="Buenos Aires">Buenos Aires</option>
                  <option value="La Rioja">La Rioja</option>
                  <option value="Acassuso">Acassuso</option>
                </select>
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
