<?php

/**
 * Conexión mySql
 */
class DbMysql extends Db
{
  public $connection;

  function __construct()
  {
    //Gestionar la conexión a DB
    $dsn = "mysql:host=localhost;dbname=tp_db;port=3306";
    //$dsn = "mysql:host=127.0.0.1;dbname=movies_db;port=3306";
    $user = "root";
    $pass = "123456";

    //$db = new PDO($dsn, $user, $pass);

    try {
      $this->connection = new PDO($dsn, $user, $pass);
      //le dice a la db que muestre los errores en PHP.
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //echo "todo bien.";
    } catch (\Exception $e) {
      echo "Hubo un error. <br>";
      echo $e->getMessage();
      exit;
    }
  }

  public function guardarUsuario(Usuario $usuario)
  {
    $stmt = $this->connection->prepare("INSERT INTO usuarios VALUES(default,:nombre ,:email , :username, :password, :gender, :pais, :ciudad, :foto)"); //Hay que explicitar los campos que son cadena de texto en SQL.

    $stmt->bindValue(":nombre",$usuario->getName());
    $stmt->bindValue(":email",$usuario->getEmail());
    $stmt->bindValue(":username", $usuario->getUsername());
    $stmt->bindValue(":password",$usuario->getPass());
    $stmt->bindValue(":gender",$usuario->getGender());
    $stmt->bindValue(":pais", $usuario->getPais());
    $stmt->bindValue(":ciudad", $usuario->getCiudad());
    $stmt->bindValue(":foto",$usuario->getAvatar());

    $stmt->execute();
  }

  public function buscarClientePorUsuario($username)
  {
    $stmt = $this->connection->prepare("SELECT * FROM usuarios WHERE username = :username");
    $stmt->bindValue(":username", $username);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if($usuario){
      // return $usuario;
      $usuario = new Usuario($usuario);
      return $usuario;
    }

    return null;
  }

  public function existeUsuario($username){
    return $this->buscarClientePorUsuario($username) !== null;
  }

  public function traerUsuarioLogueado()
  {
    // Si está logueado trae los datos del usuario
    if(isset($_SESSION["username"])) {
      $usuario = $this->buscarClientePorUsuario($_SESSION["username"]);
      return $usuario;
    } else {
      // Sino: FALSE
      return false;
    }
  }
  public function modificarCuenta($datos){

    if ($datos["password"]=="") {
      $stmt = $this->connection->prepare("UPDATE usuarios SET nombre = :nombre, username = :username , foto = :foto WHERE id = :id ");
    }else {
      $stmt = $this->connection->prepare("UPDATE usuarios SET nombre = :nombre, username = :username , password = :password, foto = :foto WHERE id = :id ");
       $stmt->bindValue(":password", $datos["password"]);
    }

   $stmt->bindValue(":id", $_GET['id'] );
   $stmt->bindValue(":nombre", $datos["nombre"]);
   $stmt->bindValue(":username", $datos["username"]);
   $stmt->bindValue(":foto", $datos["foto"]);
   $stmt->execute();
  }

}
