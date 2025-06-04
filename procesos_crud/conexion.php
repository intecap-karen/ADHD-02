<?php
    $servidor = "localhost";
    $usuario = "root";
    $contra ="";
    $baseDatos="fs2025_ciudadanos";

    $conexion = mysqli_connect($servidor, $usuario, $contra, $baseDatos);
    if(!$conexion){
        echo "problemas en conexión";
    }

?>