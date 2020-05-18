<?php
    //Conexion al servidor de base de datos
    $servername = "localhost";
    $database = "DbLinkShortener";
    $username = "root";
    $password = "";
    // Crear conexión
    $conn = mysqli_connect($servername, $username, $password, $database)or die ("Ups.. No se ha podido conectar al servidor");
    // Validar conexión
    if (!$conn) {
        die("La conexión fallo: " . mysqli_connect_error());
    }
    $status = "Exito en la conexión";
?> 