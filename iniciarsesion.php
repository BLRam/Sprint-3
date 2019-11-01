<?php
function recordardatos($i){
  if (isset($_POST[$i])) {
    return $_POST[$i];
  }
}

session_start();
require_once('clases/usuarios.php');

 $metodologin= recordardatos("emaillogin") || recordardatos("contrasenalogin");

 if ($metodologin) {

   $usuariologin= new usuarios(null, null, $_POST["emaillogin"], $_POST["contrasenalogin"]);

   if ($usuariologin->imprimirerrores("emaillogin") == null && $usuariologin->imprimirerrores("contrasenalogin") == null) {
     $usuario =$usuariologin->buscarporemail($_POST["emaillogin"]);
     $usuariologin->iniciosesion($usuario);
     header("Location: home.php");
     exit;
   }
 }

 ?>

 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/style.css">

     <title>Inicia Sesion</title>
   </head>
   <body>

     <?php include_once('barrademenu.php'); ?>

    <form class="sesion" action="iniciarsesion.php" method="post">
      <h2>Inicia Sesion</h2>

      <input type="text" placeholder="&#128272; Usuario" name="emaillogin"><br>

      <input type="password" placeholder="&#128272; Contraseña" name="contrasenalogin"><br>

      <?php if ($metodologin): ?>
      <?=$usuariologin->imprimirerrores("mensajeerrorlogin")?>
      <?php endif; ?>

      <span class="mensajeerrorlogin">

      <?php if ($metodologin): ?>
      <?=$usuariologin->imprimirerrores("emaillogin")?><?=$usuariologin->imprimirerrores("contrasenalogin")?>
       <?php endif; ?>
      </span>

      <input type="submit" name="" value="Iniciar Sesion"><br>
      <a href="#">¿Olvidó su contraseña?</a>
      <a class="registrarse"href="formulario.php">Registrarse</a><br><br>
      <a href="home.php">Regresar al menu</a>
    </form>

    <footer>
          <?php include_once('footer.php') ?>
    </footer>



     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
 </html>
