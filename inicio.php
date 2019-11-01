<?php
$dsn="mysql:dbname=quized_db;host=127.0.0.1;port=3306";
$usuario = "root";
$pass = "";


try{
  $basededatos = new PDO($dsn,$usuario,$pass);
$basededatos->setattribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

}
catch (\Exception $e){
  echo "oh no, hubo un error :(";
echo $e->getMessage();
exit;
}




 ?>
