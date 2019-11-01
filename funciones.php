<?php

function recordardatos($i){
  if (isset($_POST[$i])) {
    return $_POST[$i];
  }
}

function recordarlogin($i){
  if (isset($_COOKIE[$i])) {
    return $_COOKIE[$i];
  }
}

function jsonenarray(){
  if (file_exists("json/usuariosregistrados.json")) {
    $usuariosregistrados = file_get_contents("json/usuariosregistrados.json");
    $recorriendousuarios = explode(PHP_EOL, $usuariosregistrados);
    array_pop($recorriendousuarios);

    foreach ($recorriendousuarios as $usuarios) {
      $arrayusuarios[] = json_decode($usuarios, true);
    }

    return $arrayusuarios;

  }else {
    return null;
  }
}

function buscarporemail($email){
  if (file_exists("json/usuariosregistrados.json")) {
  $arrayusuarios = jsonenarray();

  foreach ($arrayusuarios as $id => $usuario) {
    if ($email === $usuario["email"]) {
      return $usuario;
    }
  }
  return null;
}else {
  return null;
}
}

function validarlogin($datos){
  $errores = [];

  $usuario = buscarporemail($datos["emaillogin"]);

  if ($usuario == null) {
    $errores["emaillogin"] = "Los datos ingresados no son correctos";
  
  }else {
    if (password_verify($datos["contrasenalogin"], $usuario["contrasena"]) == false) {
      $errores["contrasenalogin"] = "los datos ingresados no son conrrectos";
    
    }
  }
  return $errores;
}

function iniciosesion($usuario){
  $_SESSION["nombre"] = $usuario["nombre"];
  $_SESSION["apellido"] = $usuario["apellido"];
  $_SESSION["email"] = $usuario["email"];
  $_SESSION["foto"] = $usuario["foto"];

  if (isset($_POST["recordarusuario"])) {
    setcookie("email",$_POST["emaillogin"],time()+3600);
    setcookie("contraseña",$_POST["contrasenalogin"],time()+3600);
  }
}


function validarregistro($datos){

  $errores = [];

  if ($datos) {

if (strlen($datos["nombre"] == null)) {
      $errores["nombre"] = "El campo nombre se encuentra vacio";
    }
    else {
      if (strlen($datos["nombre"]) <= 2) {
        $errores["nombre"] = "El campo nombre tiene menos de 3 caracteres";
      }
}
    if (strlen($datos["apellido"]) == null) {
      $errores["apellido"] = "El campo apellido se encuentra vacio";
    }
else {
      if (strlen($datos["apellido"]) <= 2) {
        $errores["apellido"] = "El campo apellido tiene menos de 3 caracteres";
        }
}

    if (strlen($datos["email"]) == null) {
      $errores["email"] = "Por favor ingresa un email";


    }else {
      if (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
        $errores["email"] = "El email no tiene el formato correcto";


}elseif (buscarporemail($datos["email"]) == true) {
        $errores["email"] = "El email ya se encuentra registrado";
        }
}

  if (strlen($datos["contraseña"]) == null) {
      $errores["contraseña"] ="Por favor ingresa una contraseña";
}
    else {
      if (strlen($datos["contraseña"]) <= 7) {
        $errores["contraseña"] ="La contraseña tiene menos de 8 caracteres";
        }
}

    if (strlen($datos["contraseña2"]) == null) {
      $errores["contraseña2"] = "Por favor repite la contraseña";
    }
    else {
      if ($datos["contraseña"] != $datos["contraseña2"]) {
        $errores["contraseña2"] = "Las contraseñas no coinciden";
          }
}
      if ($_FILES){
      if ($_FILES["foto"]["error"] == UPLOAD_ERR_NO_FILE){
         $errores["foto"] = "Por favor carga una foto de perfil";


       }else {
         if ($_FILES["foto"]["error"] != UPLOAD_ERR_OK){
           $errores["foto"] = "Se produjo un error al cargar la imagen";

         }
       }
      $nombredeimagen = $_FILES["foto"]["name"];
      $extension = pathinfo($nombredeimagen, PATHINFO_EXTENSION);
      if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "webp") {
        if ($extension != null) {
          $errores["foto"] = "La extension del archivo es incorrecta";

        }
      }
    }
  }
  return $errores;
}


function imprimirerrores($i){
  if (recordardatos("nombre") || recordardatos("apellido") || recordardatos("email") || recordardatos("contraseña") || recordardatos("contraseña2")) {
  $errores = validarregistro($_POST);
    if (isset($errores[$i])) {
      return $errores[$i];
    }
  }

  if (recordardatos("emaillogin") || recordardatos("contrasenalogin")) {
  $errores = validarlogin($_POST);
  if (isset($errores[$i])) {
    return $errores[$i];
  }
 }
}



  function armarimagen($foto){
    $nombre = $foto["foto"]["name"];
    $extension = pathinfo($nombre, PATHINFO_EXTENSION);

    $archivotemporal = $foto["foto"]["tmp_name"];

    $rutadestino = dirname(__FILE__);
    $rutadestino = $rutadestino."/fotos/";


    $nombreunico = uniqid();

    $rutafinal = $rutadestino .$nombreunico.".".$extension;

    move_uploaded_file ($archivotemporal, $rutafinal);

    return $nombreunico.".".$extension;
  }


  function armarusuario($datos, $foto){

    $contraseñahasheada = password_hash($datos["contraseña"], PASSWORD_DEFAULT);

    $usuario = [
      "nombre" => $datos["nombre"],
      "apellido" => $datos["apellido"],
      "email" => $datos["email"],
      "contrasena" => $contraseñahasheada,
      "foto" => $foto,
    ];
    return $usuario;
  }

  function guardarusuario($usuario){
    $jsonencode = json_encode($usuario);
    file_put_contents("json/usuariosregistrados.json",$jsonencode.PHP_EOL, FILE_APPEND);
  }




 ?>
