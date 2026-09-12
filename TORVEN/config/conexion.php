<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "torven";

$conexion = new mysqli($server, $user, $pass, $db);
$conexion->set_charset("utf8mb4");

if ($conexion->connect_errno) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}   