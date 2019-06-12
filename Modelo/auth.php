<?php

/**
 * Iniciar sesión, loguear y controlar que el usuario esté logueado.
 */
class Auth
{

  function __construct()
  {
    session_start();
  }

  public function loguearUsuario($username){
    $_SESSION["username"] = $username;
  }

  public function usuarioLogueado(){
     return isset($_SESSION["username"]);
  }


}
