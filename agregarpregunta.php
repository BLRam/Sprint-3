<?php
session_start();
include_once('barrademenu.php');
include_once('inicio.php');
if ($_POST) {
  $pregunta=$_POST["pregunta"];
  $respuesta=$_POST["respuesta"];
  $respuesta1=$_POST["respuesta1"];
  $respuesta2=$_POST["respuesta2"];
  $respuesta3=$_POST["respuesta3"];
  try {

    $agregarpregunta = $basededatos->prepare("INSERT INTO pregunta VALUES(default,'$pregunta', '$respuesta','$respuesta1','$respuesta2','$respuesta3')");

    $agregarpregunta->execute();

  } catch (\Exception $e) {
    echo "error al insertar pregunta";
    $e->getMessage();
  }
}


 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="css/style.css">
     <title></title>
   </head>
   <body>
      <form class="agregarpregunta" action="agregarpregunta.php" method="post"  enctype="multipart/form-data">
       <label for="">Pregunta</label>
       <input type="text" name="pregunta" value="">
       <br>
       <label for="">Respuesta Correcta</label>
       <input type="text" name="respuesta" value="">
       <br>
       <label for="">Respuesta Incorrecta 1</label>
       <input type="text" name="respuesta1" value="">
       <br>
       <label for="">Respuesta Incorrecta 2</label>
       <input type="text" name="respuesta2" value="">
       <br>
       <label for="">Respuesta Respuesta Incorrecta 3</label>
       <input type="text" name="respuesta3" value="">
       <br>

       <button type="submit" name="button">Guardar</button>
     </form>
     <footer>
       <?php include_once('footer.php');?>
     </footer>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   </body>
 </html>
