<?php

class Usuario
{
  private $id;
  private $nombre;
  private $email;
  private $username;
  private $password;
  private $gender;
  private $pais;
  private $ciudad;
  private $foto;

  function __construct($array)
  {
    if (isset($array["id"])){
      $this->id = $array["id"];
      $this->password = $array["password"];
    } else {
      $this->id = null;
      $this->password = password_hash($array["password"], PASSWORD_DEFAULT);
    }
    $this->nombre = trim($array["nombre"]);
    $this->email = trim($array["email"]);
    $this->username = trim($array["username"]);
    $this->gender = trim($array["gender"]);
    $this->pais = trim($array["pais"]);
    $this->ciudad = trim($array["ciudad"]);
    $this->foto = $array["foto"];

  }

  public function setName($nombre)
  {
    $this->nombre = $nombre;
    return $this;
  }
  public function setGender($gender)
  {
    $this->gender = $gender;
    return $this;
  }
  public function setEmail($email)
  {
    $this->email = $email;
    return $this;
  }
  public function setPass($password)
  {
    $this->password = $password;
    return $this;
  }
  public function setAvatar($foto)
  {
    $this->foto = $foto;
    return $this;
  }
  public function getId()
  {
    return $this->id;
  }
  public function getName()
  {
    return $this->nombre;
  }
  public function getUsername()
  {
    return $this->username;
  }
  public function getGender()
  {
    return $this->gender;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getPass()
  {
    return $this->password;
  }
  public function getAvatar()
  {
    return $this->foto;
  }
  public function getPais()
  {
    return $this->pais;
  }
  public function getCiudad()
  {
    return $this->ciudad;
  }

}
