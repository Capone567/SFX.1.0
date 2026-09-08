<?php
include('database.php');
$usuario = $_POST['nom'];
$telefono = $_POST['tel'];
$email = $_POST['email'];
$password = $_POST['pass'];
$verificacion = mysql_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");

$r = mysqli_num_rows($verificacion);

if($r > 0){
    echo '
    <script>
    alert("El nombre de usuario ya está siendo utilizado");
    location.href = "../DATABASE/registro.php"; 
    </script>
    ';
    exit;
    }

$insertar = mysqli_query($conexion, "INSERT INTO usuarios(nom_usuario, telefono, email, password, rol);
VALUES ('$usuario', '$telefono', '$email', '$password', 'cliente')" );
?>  