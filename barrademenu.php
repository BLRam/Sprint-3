<?php
?>


 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <header>
     <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#373741;">
     <a class="navbar-brand" href="home.php">
       <img src="image/logo.png" width="150" height="60" alt="">
     </a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
           <a class="nav-link" href="home.php" style="color:white;"></a> <span class="sr-only">(current)</span></a>
         </li>

         <li class=nav-item active>
           <a class="nav-link" href="jugar.php" style="color:white;"><b>JUGAR</b><span class="sr-only">(current)</span></a>
         </li>

         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#"  style="color:white;"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <b>PREGUNTAS FRECUENTES</b>
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="preguntas.php #1">¿Necesito estar registrado?</a>
             <a class="dropdown-item" href="preguntas.php #2">¿Cómo puedo conseguir más puntos?</a>
             <a class="dropdown-item" href="preguntas.php #3">¿Qué son los retos?</a>
             <a class="dropdown-item" href="preguntas.php #4">¿Cómo funcionan los puntos en los retos?</a>
             <a class="dropdown-item" href="preguntas.php #5">¿Cómo retar a un amigo?</a>
             <a class="dropdown-item" href="preguntas.php #6">¿Cómo puedo consultar los resultados de mis amigos?</a>
             <a class="dropdown-item" href="preguntas.php #7">¿Cómo agregar una pregunta?</a>
             <a class="dropdown-item" href="preguntas.php #8">¿Para que sirve el botón de denunciar?</a>

           </div>
         </li>

         <?php if ($_SESSION): ?>

           <li class=nav-item active>
             <img src="fotos/<?=$_SESSION["foto"]?>" width="50" height="50" alt="Foto de perfil">
           </li>

           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#"  style="color:white;"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <b>Hola, <?=$_SESSION["nombre"]. " " .$_SESSION["apellido"]?></b>
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="#">Mi Cuenta</a>
               <a class="dropdown-item" href="#">Estadisticas</a>
               <a class="dropdown-item" href="#">Panel de Control</a>
               <a class="dropdown-item" href="cerrarsesion.php">Cerrar Sesion</a>

             </div>
           </li>



         <?php endif; ?>
       </ul>
       <?php if ($_SESSION == null): ?>
        <span class="navbar-text"><a class="nav-link" href="iniciarsesion.php" style="color:white;"><b>INICIAR SESIÓN</b></a></span>
       <?php endif; ?>
     </div>
     </nav>
   </header>
   </body>
 </html>
