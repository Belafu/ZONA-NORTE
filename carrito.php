<?php
//aqui se tiene que agregar una fila de datos en la tabla carrito cuande presione COMPRAR
//con toda la imformacion del producto o un enlace mas una columna de orden de compra o factura en comun,ademas del id de la persona pues corresponde a cada usuario una distinta compra y/o carrito
//entonces cuando visualise esta vista voy a la bd y selecciono todas las compras con el campo factura

//aqui dentro las recorro con un foreach::
 ?>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/styleCarrito.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <div class="container">
      <div class="product-container">
        <div class="product-select">
          <div class="image-container">
            <?php if (isset($_GET['img'])): ?>
                 <img class="procuct-image img-fluid" src="<?=$_GET['img']?>">
            <?php else: ?>
                  <img class="procuct-image" src="https://fakeimg.pl/298x250/">
            <?php endif; ?>

          </div>
          <div class="quantity-container">
            <!--<button class="quantity-button" type="button" name="less"><i class="fas fa-less-than"></i></button>-->
            <input class="quantity-number" type="number" name="" value="">
            <!--<button class="quantity-button" type="button" name="greater"><i class="fas fa-greater-than"></i></button>-->
            <p class="buy-info">Informacion de compra</p>

            <input class="buy-button" type="button" name="" value="COMPRAR">
          </div>

        </div>
        <hr>
        <div class="product-select">
          <div class="image-container">
           <img class="procuct-image" src="https://fakeimg.pl/298x250/">

          </div>
          <div class="quantity-container">
            <button class="quantity-button" type="button" name="less"><i class="fas fa-less-than"></i></button>
            <input class="quantity-number" type="number" name="" value="">
            <button class="quantity-button" type="button" name="greater"><i class="fas fa-greater-than"></i></button>
            <p class="buy-info">Informacion de compra</p>

            <input class="buy-button" type="button" name="" value="COMPRAR">
          </div>

        </div>
        <hr>
        <div class="product-select">
          <div class="image-container">
           <img class="procuct-image" src="https://fakeimg.pl/298x250/">

          </div>
          <div class="quantity-container">
            <button class="quantity-button" type="button" name="less"><i class="fas fa-less-than"></i></button>
            <input class="quantity-number" type="number" name="" value="">
            <button class="quantity-button" type="button" name="greater"><i class="fas fa-greater-than"></i></button>
            <p class="buy-info">Informacion de compra</p>

            <input class="buy-button" type="button" name="" value="COMPRAR">
          </div>
        </div>
      </div>
    </div>
<div class="container return-productos">
  <a href="productos.php" class="btn btn-primary ">Volver a Productos</a>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
