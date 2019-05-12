
  <header>
    <a href="home.php"><h2 class="logo">DarkCode</h2></a>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-ellipsis-h"></i>
    </label>

    <ul class="menu-header">

      <?php if (usuarioLogueado()): ?>
        <img class="avatar" src="<?= $usuario["foto"] ?>" alt="">
        <span class="nombre-header"><?= $usuario["username"] ?></span>
        <a class="btn btn-danger" href="logout.php">Logout</a>
      <?php else: ?>
        <a class="btn btn-success" href="login.php">Login</a>
        <a href="registro.php">Registro</a>
      <?php endif; ?>
      <a href="#">Contact</a>
      <label for="chk" class="hide-menu-btn">
        <i class="fas fa-times"></i>
      </label>
    </ul>
  </header>
