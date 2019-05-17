<header>
  <h2 class="logo">DarkCode</h2>
  <input type="checkbox" id="chk">
  <label for="chk" class="show-menu-btn">
    <i class="fas fa-ellipsis-h"></i>
  </label>

  <ul class="menu-header">
    <a href="home.php">Home</a>
    <a href="productos.php">Productos</a>
    <a href="registro.php">Registro</a><!--Recordar que es como si estubiera parado en el home o en el register-->
    <?php if (usuarioLogueado()): ?>
      <a class="btn btn-danger" href="logout.php">Logout</a>
    <?php else: ?>
      <a class="btn btn-success" href="login.php">Login</a>
    <?php endif; ?>
    <label for="chk" class="hide-menu-btn">
      <i class="fas fa-times"></i>
    </label>
  </ul>
</header>
