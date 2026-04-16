<?php
    // Credenciales
    $host = "localhost";
    $user = "noahmolina_cerveceria";
    $password = "noahDominio3";
    $base_datos = "noahmolina_cerveceria";
    // Crear conexión
    $conexion = new mysqli($host, $user, $password, $base_datos);
    // Comprobar conexión
    if ($conexion->connect_error)
        die('No se ha podido conectar a la base de datos');
    // Establecer codificación
    $conexion->set_charset("utf8mb4");
?>
    