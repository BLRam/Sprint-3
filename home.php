<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
  </head>
  <body>
  <?php include_once('barrademenu.php'); ?>

    <section>
    <h2 class="bienvenido2">¡Elige tu categoria!</h2>

    <section class="categories">
      <div class="card-deck">
        <div class="card">
          <img src="image/historia.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Historia</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer">
            <a href="agregarpregunta.php" class="btn btn-primary">Agregar pregunta</a>
          </div>
        </div>

        <div class="card">
          <img src="image/geografía.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Geografía</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Agregar pregunta</a>
          </div>
        </div>

        <div class="card">
          <img src="image/deporte.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Deporte</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Agregar pregunta</a>
          </div>
        </div>

        <div class="card">
          <img src="image/arte.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Arte</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Agregar pregunta</a>
          </div>
        </div>

        <div class="card">
          <img src="image/entretenimiento.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Entretenimiento</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Agregar pregunta</a>
          </div>
        </div>
      </div>
    </section>


    <footer>
          <?php include_once('footer.php') ?>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
