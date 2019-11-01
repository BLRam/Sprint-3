<?php
require_once('persona.php');

class usuarios extends persona
{
   private $contrasena2;
   private $foto;
   private $emaillogin;
   private $contrasenalogin;

  function __construct($post= null, $file = null, $emaillogin=null, $contrasenalogin= null)
  {
    parent:: __construct($post);
    $this->contrasena2= $post["contrasena2"];
    $this->foto= $file["foto"];
    $this->emaillogin= $emaillogin;
    $this->contrasenalogin= $contrasenalogin;

  }
  public function getfoto(){
    return $this->foto;
  }

  public function setfoto($foto){
    $this->foto = $foto;
  }

   public function buscarporemail($email){
     $dsn="mysql:host=localhost;port=3306;dbname=quized_db";
     $usuario= "root";
     $contrasena="";


   try {

     $conexion= new PDO($dsn, $usuario, $contrasena);
     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
     catch (\Exception $e){
      echo "Se produjo un error al cargar la Base de Datos"; exit;
 }

    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE email = '$email'");
    $consulta->execute();
    $usuario= $consulta->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
      return $usuario;
    }
     else {
      return null;
    }
}

private function validarlogin(){

   $errores=[];
   $usuariologin= $this->buscarporemail($this->emaillogin);
   if ($usuariologin== null) {
     $errores["emaillogin"]= "Los datos ingresagos no son correctos";
   }else {
     if (password_verify($this->contrasenalogin, $usuariologin["contrasena"])== false) {
      $errores["contrasenalogin"]= "Los datos ingresados no son correctos";
    }
   }
   return $errores;
}

public function iniciosesion($usuario){

  $_SESSION["nombre"]= $usuario["nombre"];
  $_SESSION["apellido"]= $usuario["apellido"];
  $_SESSION["email"]= $usuario["email"];
  $_SESSION["foto"]= $usuario["foto"];

  if (isset($_POST["recordarusuario"])) {
    setcookie("email", $_POST["emaillogin"],time()+3600);
    setcookie("contrasena",$_POST["contrasenalogin"],time()+3600);
  }
}

private function validarregistro(){

  $errores = [];

      if (strlen($this->nombre) == null) {
        $errores["nombre"] = "El campo nombre se encuentra vacio";
      }
    else {
      if (strlen($this->nombre) <= 2) {
        $errores["nombre"] = "El campo nombre tiene menos de 3 caracteres";
      }
     }
      if (strlen($this->apellido) == null) {
        $errores["apellido"] = "El campo apellido se encuentra vacio";
    }
   else {

     if (strlen($this->apellido) <= 2) {
        $errores["apellido"] = "El campo apellido tiene menos de 3 caracteres";
        }
       }

     if (strlen($this->email) == null) {
        $errores["email"] = "Por favor ingresa un email";
      }else {

        if (!filter_var($this->email,FILTER_VALIDATE_EMAIL)) {
        $errores["email"] = "El email no tiene el formato correcto";
     }

        if ($this->buscarporemail($this->email) == true) {
        $errores["email"] = "El email ya se encuentra registrado";
        }
}

  if (strlen($this->contrasena) == null) {
      $errores["contrasena"] ="Por favor ingresa una contraseña";
}
    else {
      if (strlen($this->contrasena) <= 7) {
        $errores["contrasena"] ="La contraseña tiene menos de 8 caracteres";
        }
}

    if (strlen($this->contrasena2) == null) {
      $errores["contrasena2"] = "Por favor repite la contraseña";
    }else {
      if ($this->contrasena != $this->contrasena2) {
        $errores["contrasena2"] = "Las contraseñas no coinciden";
          }
}

      if ($this->foto){
      if ($this->foto["error"] == UPLOAD_ERR_NO_FILE){
         $errores["foto"] = "Por favor carga una foto de perfil";


       }else {
         if ($this->foto["error"] != UPLOAD_ERR_OK){
           $errores["foto"] = "Se produjo un error al cargar la imagen";

         }
       }
      $nombredeimagen = $this->foto["name"];
      $extension = pathinfo($nombredeimagen, PATHINFO_EXTENSION);
      if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "webp") {
        if ($extension != null) {
          $errores["foto"] = "La extension del archivo es incorrecta";

        }
      }
    }
  return $errores;
}

public function imprimirerrores($i){
  if (recordardatos("nombre") || recordardatos("apellido") || recordardatos("email") || recordardatos("contrasena") || recordardatos("contrasena2")) {
  $errores = $this->validarregistro($_POST);
    if (isset($errores[$i])) {
      return $errores[$i];
    }
  }

  if (recordardatos("emaillogin") || recordardatos("contrasenalogin")) {
  $errores = $this->validarlogin($_POST);
  if (isset($errores[$i])) {
    return $errores[$i];
  }
 }
}

public function armarimagen(){
   $nombre = $this->foto["name"];
   $extension = pathinfo($nombre, PATHINFO_EXTENSION);

   $archivotemporal= $this->foto["tmp_name"];

   $rutadestino= dirname(__FILE__);
   $rutadestino= $rutadestino."/../fotos/";

   $nombreunico= uniqid();

   $rutafinal= $rutadestino .$nombreunico. "." .$extension;

   move_uploaded_file($archivotemporal, $rutafinal);

   return $nombreunico. "." .$extension;

 }

public function armarusuario($foto){
    $contrasenahasheada= password_hash($this->contrasena, PASSWORD_DEFAULT);

    $usuario=[
      "nombre"=> $this->nombre,
      "apellido"=> $this->apellido,
      "email"=> $this->email,
      "contrasena"=> $contrasenahasheada,
      "foto"=> $foto,
    ];
        return $usuario;
  }

public function guardarusuario($usuarioarmado){
    $dsn="mysql:host=localhost;port=3306;dbname=quized_db";
    $usuario= "root";
    $contrasena="";

  try {

    $conexion= new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
    catch (\Exception $e){
     echo "Se produjo un error al cargar la Base de Datos"; exit;
}
         $nombre= $usuarioarmado["nombre"];
         $apellido= $usuarioarmado["apellido"];
         $email= $usuarioarmado["email"];
         $contrasena= $usuarioarmado["contrasena"];
         $foto= $usuarioarmado["foto"];

  $consulta= $conexion->prepare("INSERT INTO usuarios values(default, :nombre, :apellido, :email, :contrasena, :foto)");

  $consulta->bindValue(":nombre", $nombre);
  $consulta->bindValue(":apellido", $apellido);
  $consulta->bindValue(":email", $email);
  $consulta->bindValue(":contrasena", $contrasena);
  $consulta->bindValue(":foto", $foto);

    $consulta->execute();
}
}
 ?>
