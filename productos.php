<?php
include "Modelo/init.php";
//require 'funciones.php';
$usuario = $dbAll->traerUsuarioLogueado();//SIERVE PARA TRAER SU IMAGEN Y DEMAS DATOS

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/styleProducto.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <?php include("partes/header.php"); ?>


    <div class="container">
      <ul class="list">
          <li><a href="#mouses">MOUSES</a></li>
          <li><a href="#teclados">TECLADOS</a></li>
          <li><a href="#auriculares">AURICULARES</a></li>
      </ul>
    </div>


    <div class="container">
        <h1 id="mouses" class="teclados"> MOUSES//</h1>
        <section class="product-container">
          <article class="product-logo">
              <img class="product-img-ofertas img-fluid" src="img/mouse.png" alt="" width="480px" height="400px">
              <h2>Mouse 1 Gamer</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
              <a href="carrito.php?img=img/mouse.png" class="btn btn-primary">COMPRAR</a>
          </article>
          <article class="product-logo">
              <img class="product-img-ofertas img-fluid" src="img/mouse2.png" alt="" width="480px" height="400px">
              <h2>Mouse 2 Gamer</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
              <a href="carrito.php?img=img/mouse2.png" class="btn btn-primary">COMPRAR</a>
          </article>
          <article class="product-logo">
              <img class="product-img-ofertas img-fluid" src="img/mouse3.png" alt="" width="480px" height="400px">
              <h2>Mouse 3 Gamer</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
              <a href="carrito.php?img=img/mouse3.png" class="btn btn-primary">COMPRAR</a>
          </article>
          <article class="product-logo">
              <img class="product-img-ofertas img-fluid" src="img/mouse.png" alt="" width="480px" height="400px">
              <h2>Mouse 4 Gamer</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
              <a href="carrito.php?img=img/mouse.png" class="btn btn-primary">COMPRAR</a>
          </article>
      </div>

      <div class="container">
          <h1 id="teclados" class="teclados"> TECLADOS//</h1>
          <section class="product-container">
            <article class="product-logo">
                <img class="product-img-ofertas img-fluid" src="img/teclado.png" alt="" width="480px" height="400px">
                <h2>Teclado 1 Gamer</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                <a href="carrito.php?img=img/teclado.png" class="btn btn-primary">COMPRAR</a>
            </article>
            <article class="product-logo">
                <img class="product-img-ofertas img-fluid" src="img/teclado2.png" alt="" width="480px" height="400px">
                <h2>Teclado 2 Gamer</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                <a href="carrito.php?img=img/teclado2.png" class="btn btn-primary">COMPRAR</a>
            </article>
            <article class="product-logo">
                <img class="product-img-ofertas img-fluid" src="img/teclado3.png" alt="" width="480px" height="400px">
                <h2>Teclado 3 Gamer</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                <a href="carrito.php?img=img/teclado3.png" class="btn btn-primary">COMPRAR</a>
            </article>
            <article class="product-logo">
                <img class="product-img-ofertas img-fluid" src="img/teclado.png" alt="" width="480px" height="400px">
                <h2>Teclado 4 Gamer</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                <a href="carrito.php?img=img/teclado.png" class="btn btn-primary">COMPRAR</a>
            </article>
        </div>

        <div class="container">
            <h1 id="auriculares" class="teclados"> AURICULARES//</h1>
            <section class="product-container">
              <article class="product-logo">
                  <img class="product-img-ofertas img-fluid" src="img/auricular.png" alt="" width="480px" height="400px">
                  <h2>Auricular 1 Gamer</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                  <a href="carrito.php?img=img/auricular.png" class="btn btn-primary">COMPRAR</a>
              </article>
              <article class="product-logo">
                  <img class="product-img-ofertas img-fluid" src="img/auricular2.png" alt="" width="480px" height="400px">
                  <h2>Auricular 2 Gamer</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                  <a href="carrito.php?img=img/auricular2.png" class="btn btn-primary">COMPRAR</a>
              </article>
              <article class="product-logo">
                  <img class="product-img-ofertas img-fluid" src="img/auricular3.png" alt="" width="480px" height="400px">
                  <h2>Auricular 3 Gamer</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                  <a href="carrito.php?img=img/auricular3.png" class="btn btn-primary">COMPRAR</a>
              </article>
              <article class="product-logo">
                  <img class="product-img-ofertas img-fluid" src="img/auricular.png" alt="" width="480px" height="400px">
                  <h2>Auricular 4 Gamer</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                  <a href="carrito.php?img=img/auricular.png" class="btn btn-primary">COMPRAR</a>
              </article>
          </div>
          <marquee class="marque">
            <img class="fotos-marque" src="img/te1.jpg">
            <img class="fotos-marque" src="img/te2.jpg">
            <img class="fotos-marque" src="img/te3.jpg">
            <img class="fotos-marque" src="img/te4.jpg">
            <img class="fotos-marque" src="img/ant1.jpg">
            <img class="fotos-marque" src="img/te1.jpg">
          </marquee>

          <?php include("partes/footer.php"); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
