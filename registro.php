<?php
include "funciones.php";

if(usuarioLogueado()){
  header("Location:home.php");
  exit;
}

$errores = [];

$nombreOk='';
$emailOk='';
$usernameOk='';//hay que validar que no haya otro con el mismo username


if ($_POST) {
  $errores = validarRegistro($_POST);

  $nombreOk = trim($_POST["nombre"]);
  $emailOk = trim($_POST["email"]);
  $usernameOk = trim($_POST["username"]);

  if(empty($errores)){//NO EXISTE O  ES VACIO
      $usuario = armarUsuario();
      if ($_FILES["foto"]["error"]== 4) {
          $usuario["foto"]= "img/img-defecto.jpg";
      }
      guardarUsuario($usuario);

      $ext= pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["foto"]["tmp_name"], "img/" . $_POST["username"]. "." . $ext);
      header('Location: felicitaciones.php');
      exit;

  }
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1"><!--Deberia redirigir  al apagina de felicitacion solo si esta bien para eso lo dejamos por defecto y arriba en el if( si no hay algun problema){crear usuario y redireccionar a la pagina} -->
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/styleRegistro.css">

    <title>REGISTRO</title>
  </head>
  <body>
  <?php include("partes/header.php"); ?>

  <div class="container">
  <h2 class="text-center text-lg-left">Completá tus datos</h2>

  <form action="registro.php" method="post" enctype="multipart/form-data"><!--A donde va ir cuando presione ENviar-->
      <div class="form-group form-row">
          <div class="form-group col-xs-12 col-sm-6">
            <label for="nombre">Nombre Completo</label><!--Falta el value que es el valor que viajara y el name con la posicion que tendra-->
            <input type="text" class="form-control" id="inputNombre" name="nombre" value='<?= $nombreOk ?>' placeholder="Nombre" >
            <?php if(isset($errores["nombre"])): ?>
              <span class="small text-danger"><?= $errores["nombre"] ?></span>
            <?php endif ?>
          </div>
          <div class="form-group col-xs-12 col-sm-6">
            <label for="nombre">Email</label>
            <input type="email" class="form-control" id="inputApellido" name="email" value='<?= $emailOk ?>' placeholder="Email" >
            <?php if(isset($errores["email"])): ?>
              <span class="small text-danger"><?= $errores["email"] ?></span>
            <?php endif ?>
          </div>
      </div>
      <div class="form-group form-row">
          <div class="form-group col-xs-12 col-sm-6">
            <label for="inputEmail4">Username</label>
            <input type="text" class="form-control" id="inputEmail4" name="username" value='<?= $usernameOk ?>' placeholder="Username">
            <?php if(isset($errores["username"])): ?>
              <span class="small text-danger"><?= $errores["username"] ?></span>
            <?php endif ?>
          </div>
          <div class="form-group col-xs-12 col-sm-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password" required>
          </div>
      </div>
      <div class="form-group form-row">
        <div class="col-xs-12 col-lg-12">
          <label for="" >Hobbies</label>
        </div>
        <div class="form-check form-check-inline col-xs-12 col-lg-3">
          <?php if (isset($_POST["hobbies"]) && isset($_POST["hobbies"]["sports"])): ?>
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hobbies[sports]" value="option1" checked>
          <?php else: ?>
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hobbies[sports]" value="option1">
          <?php endif; ?>
          <label class="form-check-label" for="inlineCheckbox1">Deportes</label>
        </div>
        <div class="form-check form-check-inline col-xs-12 col-lg-3">
          <?php if (isset($_POST["hobbies"]) && isset($_POST["hobbies"]["sports"])): ?>
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="hobbies[viaje]" value="option2" checked>
          <?php else: ?>
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="hobbies[viaje]" value="option2">
          <?php endif; ?>
          <label class="form-check-label" for="inlineCheckbox2">Viajes</label>
        </div>
        <div class="form-check form-check-inline col-xs-12 col-lg-3">
          <?php if (isset($_POST["hobbies"]) && isset($_POST["hobbies"]["sports"])): ?>
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="hobbies[programming]" value="option3" checked>
          <?php else: ?>
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="hobbies[programming]" value="option3">
          <?php endif; ?>
          <label class="form-check-label" for="inlineCheckbox3">Programación</label>
        </div>
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

<?php include("partes/footer.php"); ?>
    <!-- Js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
