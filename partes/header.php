<?php



if (isset($_COOKIE["username"])) {
//loguearUsuario($_COOKIE["username"]);
$usuario = $dbAll->buscarClientePorUsuario($_COOKIE["username"]);
$auth->loguearUsuario($usuario["username"]);
}


 ?>


  <header>
    <a href="home.php"><h2 class="logo">DarkCode</h2></a>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-ellipsis-h"></i>
    </label>

    <ul class="menu-header">
      <a href="home.php">Home</a>
      <a href="productos.php">Productos</a>
      <?php if ($auth->usuarioLogueado()): ?>
        <img class="avatar" src="<?= $usuario->getAvatar() ?>" alt="">
        <a href="editarPerfil.php?id=<?= $usuario->getId() ?>"><span class="nombre-header btn btn-color"><?= $usuario->getUsername() ?></span></a>
        <a class="btn btn-danger" href="logout.php">Logout</a>
      <?php else: ?>
        <a href="registro.php">Registro</a>
        <a class="btn btn-success" href="login.php">Login</a>
      <?php endif; ?>
      <a href="carrito.php"><i class="fas fa-shopping-cart"></i></a>
      <label for="chk" class="hide-menu-btn">
        <i class="fas fa-times"></i>
      </label>
    </ul>
  </header>
