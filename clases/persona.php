<?php

abstract class persona {
  protected $nombre;
  protected $apellido;
  protected $email;
  protected $contrasena;

  function __construct($post)
  {
    $this->nombre= $post["nombre"];
    $this->apellido= $post["apellido"];
    $this->contrasena= $post["contrasena"];
    $this->email= $post ["email"];

  }

  public function getnombre(){
    return $this->nombre;
  }

  public function setnombre($nombre){
    $this->nombre = $nombre;
  }

  public function getapellido(){
    return $this->apellido;
  }

  public function setapellido($apellido){
    $this->apellido = $apellido;
  }

  public function getemail(){
    return $this->email;
  }

  public function setemail($email){
    $this->email = $email;
  }

  public function getcontrasena(){
    return $this->contrasena;
  }

  public function setcontrasena($contrasena){
    $this->contrasena = $contrasena;
  }
}



 ?>
