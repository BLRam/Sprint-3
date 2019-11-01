<?php

// $json = file_get_contents("usuarios.json");
//
// var_dump(json_decode($json));
function abrirBaseDatos(){
    if(file_exists("usuarios.json")){

        $baseDatosJson= file_get_contents("usuarios.json");

        echo "1- <pre>";
        var_dump($baseDatosJson);
        echo "</pre> <br>";

        // Explode: Devuelve un array de string, siendo cada uno un substring del parámetro string formado por la división realizada por los delimitadores indicados en el parámetro delimiter.
        $baseDatosJson = explode(PHP_EOL,$baseDatosJson);

        echo "2- <pre>";
        var_dump($baseDatosJson);
        echo "</pre> <br>";

        //Aquí saco el ultimo registro, el cual está en blanco
        array_pop($baseDatosJson);

        echo "3- <pre>";
        var_dump($baseDatosJson);
        echo "</pre> <br>";

        //Aquí recooro el array y creo mi array con todos los usuarios
        foreach ($baseDatosJson as  $usuarios) {
            $arrayUsuarios[]= json_decode($usuarios,true);
        }

        echo "4- <pre>";
        var_dump($arrayUsuarios);
        echo "</pre> <br>";

        //Aquí retorno el array de usuarios con todos sus datos
        return $arrayUsuarios;

    }else{
        return null;
    }
}

// echo "<pre>";
var_dump(abrirBaseDatos());
// echo "</pre>";

 ?>
