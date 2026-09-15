<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "torven";
$port = "3306";

$conexion = new mysqli($server, $user, $pass, $db, $port);
$conexion->set_charset("utf8mb4");

if ($conexion->connect_errno) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}   