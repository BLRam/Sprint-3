<?php
function recordardatos($i){
  if (isset($_POST[$i])) {
    return $_POST[$i];
  }
}

 session_start();
require_once('clases/usuarios.php');
include_once('inicio.php');

$Nuevainstancia= recordardatos("nombre") || recordardatos("apellido") || recordardatos("email") || recordardatos("contrasena") || recordardatos("contrasena2");

 if ($Nuevainstancia) {

  $usuario= new usuarios($_POST,$_FILES);


if
($usuario->imprimirerrores("nombre") == null && $usuario->imprimirerrores("apellido") == null && $usuario->imprimirerrores("email") == null && $usuario->imprimirerrores("contrasena") == null && $usuario->imprimirerrores("contrasena2") == null && $usuario->imprimirerrores("foto") == null)
{
     $foto= $usuario->armarimagen();
     $usuarioarmado=$usuario->armarusuario($foto);
     $usuario->guardarusuario($usuarioarmado);
     header("Location:home.php");
     exit;
   }

 }

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Registro</title>
  </head>

  <body>
    <?php include_once('barrademenu.php'); ?>

    <div class="formulario">

    <div class="reg">

  <form class="registro" action="formulario.php" method="post"  enctype="multipart/form-data">
    <h2>Registrate para poder ingresar</h2>

    <label for="nombre">Nombre:</label><br>
    <?php if ($Nuevainstancia): ?>
    <?=$usuario->imprimirerrores("bordenombre")?>
    <?php endif; ?>

    <input class="nombre bordenombre" type="text" name="nombre" value="<?=recordardatos("nombre")?>"><br>
    <span class="mensajeerrornombre"><?php if ($Nuevainstancia): ?>
      <?=$usuario->imprimirerrores("nombre")?>
    <?php endif; ?></span><br>


    <label for="apellido">Apellido</label><br>

    <?php if ($Nuevainstancia): ?>
    <?=$usuario->imprimirerrores("bordeapellido")?>
    <?php endif; ?>

    <input class="apellido bordeapellido" type="text" name="apellido" value="<?=recordardatos("apellido")?>"><br>
    <span class="mensajeerrorapellido">
      <?php if ($Nuevainstancia): ?>
      <?=$usuario->imprimirerrores("apellido")?>
      <?php endif; ?></span><br>


    <label for="email">Email:</label><br>

    <input class="email bordeemail" type="email" name="email" value="<?=recordardatos("email")?>"><br>
    <span class="mensajeerroremail">
      <?php if ($Nuevainstancia): ?>
      <?=$usuario->imprimirerrores("email")?>
      <?php endif; ?></span><br>


    <label for="contrasena">Contraseña:</label><br>


    <input class="contrasena bordecontrasena" type="password" name="contrasena" value="<?=recordardatos("contrasena")?>"><br>
    <span class="mensajeerrorcontrasena">
      <?php if ($Nuevainstancia): ?>
      <?=$usuario->imprimirerrores("contrasena")?>
      <?php endif; ?></span><br>


    <label for="contrasena2">Confirmar Contraseña:</label><br>


    <input class="contrasena2 bordecontrasena2" type="password" name="contrasena2" value="<?=recordardatos("contrasena2")?>"><br>
    <span class="mensajeerrorcontrasena2">
      <?php if ($Nuevainstancia): ?>
      <?=$usuario->imprimirerrores("contrasena2")?>
      <?php endif; ?></span><br>


    <label for="sexo">Sexo:</label>
    <input class="femenino" type="radio" name="sexo" value="F">Femenino
    <input class="Masculino" type="radio" name="sexo" value="M">Masculino
    <br>



    <input class="bordefoto" type="file" name="foto" ><br><br>
    <span class="mensajeerrorfoto">
      <?php if ($Nuevainstancia): ?>
      <?=$usuario->imprimirerrores("foto")?>
      <?php endif; ?></span><br>

    <button type="submit" name="button">Enviar Formulario</button>


</form>
</div>

  <footer>
        <?php include_once('footer.php') ?>
  </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </div>
  </body>
</html>
