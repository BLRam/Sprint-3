<?php

class creartabla
{
  private $nombredelatabla;

  private $primeracolumna;
  private $primeracolumnanombre;
  private $primeracolumnadato;
  private $primeracolumnacaracter;
  private $primeracolumnann;
  private $primeracolumnaunica;


  function __construct($post)
  {
    if (isset($post["nombredelatabla"])) {
      $this->nombredelatabla = $post["nombredelatabla"];
    }

    if (isset($post["primeracolumna"])) {
     $this->primeracolumna= $post["primeracolumna"];

    }

    if (isset($this->primeracolumna)) {
      $this->primeracolumnanombre= $post["primeracolumnanombre"];
      $this->primeracolumnadato= $post["primeracolumnadato"];
      $this->primeracolumnacaracter= $post["primeracolumnacaracter"];

    if (isset($post["primeracolumnann"])) {
      $this->primeracolumnann= $post["primeracolumnann"];
    }

    if (isset($post["primeracolumnaunica"])) {
      $this->primeracolumnaunica= $post["primeracolumnaunica"];
    }
    }
  }

    private function validarcolumna(){

      $errores = [];

      if (strlen($this->nombredelatabla) == null) {
        $errores["nombredelatabla"] = "El campo se encuentra vacio";

      }

      if (isset($this->primeracolumna)) {

       if (strlen($this->primeracolumnanombre) == null) {
         $errores["primeracolumnanombre"] = "El campo se encuentra vacio";

       }

      if (strlen($this->primeracolumnacaracter) == null) {
        $errores["primeracolumnacaracter"] = "El campo se encuentra vacio";
      }

      }
      return $errores;
    }

  public function imprimirerrores($i){
      $errores = $this->validarcolumna();

    if (isset($errores[$i])) {
      return $errores[$i];
  }
  }

  public function creartabla(){
    $dsn = "mysql:host=localhost;port=3306;quized_db";
    $usuario = "root";
    $contrasena = "";

    try {
      $conexion= new PDO($dsn, $usuario, $contrasena);
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (\Exception $e) {

     echo "Se produjo un errror al cargar la página"; exit;

    }

    if (isset($this->primeracolumna)) {
          $consulta = $conexion->prepare("CREATE  TABLE `quized_db`.`$this->nombredelatabla` (
            `id` INT NOT NULL AUTO_INCREMENT ,
            `$this->primeracolumnanombre` $this->primeracolumnadato($this->primeracolumnacaracter) $this->primeracolumnann $this->primeracolumnaunica,
            PRIMARY KEY (`id`) )
          DEFAULT CHARACTER SET = utf8
          COLLATE = utf8_bin;");

          $consulta->execute();
        }
  }
}



 ?>
