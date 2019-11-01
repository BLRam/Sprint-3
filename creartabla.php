<?php
require_once('clases/tabla.php');

function recordardatos($i){

  if (isset($_POST[$i])) {

    return $_POST[$i];
  }
}
  if ($_POST) {
    $creartabla= new creartabla ($_POST);


  if ($creartabla->imprimirerrores("nombredelatabla") == null) {
     $metodoprimeracolumna= $creartabla->imprimirerrores("primeracolumnanombre")== null && $creartabla->imprimirerrores("primeracolumnacaracter")== null;

  if (recordardatos("primeracolumna")) {
    if ($metodoprimeracolumna) {
      $nuevatabla= $creartabla->creartabla();
      header("Location: creartabla.php");
      exit;
    }
  }


   }

  }



 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Tables Created</title>
     <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
<form class="creartabla" action="creartabla.php" method="post">
  <h1>
 <input type="text" name="nombredelatabla" value="<?=recordardatos("nombredelatabla")?>" placeholder="Nombre de la tabla">

</h1>
<?php if ($_POST): ?>
  <div class="">
    <p><?=$creartabla->imprimirerrores("nombredelatabla")?></p>
  </div>
<?php endif; ?>

<ul>


  <li>
    <ul>

      <li>
        <label for="primeracolumna">Activar Columna</label>
        <input type="checkbox" name="primeracolumna" value="activado" checked>
     </li>

      <li>
       <input type="text" name="primeracolumnanombre" value="<?=recordardatos("primeracolumnanombre")?>" placeholder="Nombre de la columna">
       <?php if ($_POST): ?>
         <p>
          <?=$creartabla->imprimirerrores("primeracolumnanombre")?> </p>
       <?php endif; ?>
      </li>

      <li>
        <select class="" name="primeracolumnadato">
          <optgroup label="Tipo de Datos">
            <option value="varchar">Varchar</option>
            <option value="int"
          <?php if (recordardatos("primeracolumnadato")== "int"): ?>
            selected
          <?php endif; ?>
            >Int</option>

          </optgroup>

        </select>
      </li>

      <li>
        <input type="text" name="primeracolumnacaracter" value="<?=recordardatos("primeracolumnacaracter")?>" placeholder="Cantidad de caracteres">
        <?php if ($_POST): ?>
          <p>
           <?=$creartabla->imprimirerrores("primeracolumnacaracter")?> </p>
        <?php endif; ?>
      </li>

      <li>
        <label for="primeracolumnann">Columna Obligatoria </label>
        <input type="checkbox" name="primeracolumnann" value="not null"
        <?php if (recordardatos("primeracolumnann")): ?>
            checked
          <?php endif; ?>>
      </li>

      <li>
        <label for="primeracolumnaunica">Unico</label>
        <input type="checkbox" name="primeracolumnaunica" value="unique"
          <?php if (recordardatos("primeracolumnaunica")): ?>
              checked
            <?php endif; ?>>
     </li>

    </ul>
  </li>

  <button type="submit" name="button">Crear Tabla</button>



</ul>


</form>
   </body>
 </html>
