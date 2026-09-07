<?php
$server = "localhost"; 
$user = "root";
$pass = "";
$db = "torven";

$conexion = new mysql($server, $user, $pass, $db);
if($conexion->connect_errno){
    die("conexión fallida" . $conexion->connect_errno);    
}else {
echo "conectado";
}
?> 