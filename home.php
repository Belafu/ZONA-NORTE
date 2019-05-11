<?php
require 'funciones.php';

$usuario = traerUsuarioLogueado();//SIERVE PARA TRAER SU IMAGEN Y DEMAS DATOS
$usuarioLogueado = usuarioLogueado();
var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/styleHome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <?php include("partes/header.php"); ?>

    <?php if (usuarioLogueado()): ?>
        <img class="avatar" src="img/<?= $usuario["username"] . ".png"?>" alt="">
      <a class="btn btn-danger" href="logout.php">Logout</a>
    <?php else: ?>
      <a class="btn btn-success" href="login.php">Login</a>
    <?php endif; ?>

    <div class="container">
      <section "carro">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://fakeimg.pl/550x300/" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://fakeimg.pl/550x300/" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://fakeimg.pl/550x300/" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>

      </section>
      </div>


<div class="container">
  <article class="product">
    <img src="https://fakeimg.pl/300x300/" class="img-fluid" alt="Responsive image">
    <img src="https://fakeimg.pl/300x300/" class="img-fluid" alt="Responsive image">
    <img src="https://fakeimg.pl/300x300/" class="img-fluid" alt="Responsive image">

  </article>
</div>

<div class="container">
  <section class="info">
    <div class="card">
    <img src="https://fakeimg.pl/350x200/">
    <div class="card-body">
      <h5 class="card-title">Mouse Gamer</h5>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
      <a href="#" class="btn btn-primary">Ver mas</a>
      </div>
      </div>
      <div class="card">
      <img src="https://fakeimg.pl/350x200/">
      <div class="card-body">
        <h5 class="card-title">Mouse Gamer</h5>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        <a href="#" class="btn btn-primary">Ver mas</a>
        </div>
        </div>
        <div class="card">
        <img src="https://fakeimg.pl/350x200/">
        <div class="card-body">
          <h5 class="card-title">Mouse Gamer</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
          <a href="#" class="btn btn-primary">Ver mas</a>
          </div>
          </div>
  </section>

</div>
<marquee class="marque"><img class="fotos-marque" src="https://fakeimg.pl/300x100/"><img class="fotos-marque" src="https://fakeimg.pl/300x100/"><img class="fotos-marque" src="https://fakeimg.pl/300x100/"><img class="fotos-marque" src="https://fakeimg.pl/300x100/"><img class="fotos-marque" src="https://fakeimg.pl/300x100/"><img class="fotos-marque" src="https://fakeimg.pl/300x100/"></marquee>

  <?php include("partes/footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
