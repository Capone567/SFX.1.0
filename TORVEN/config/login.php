<?php
session_start();
require_once __DIR__ . "/conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../views/login.php");
    exit;
}

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    echo "<script>alert('Completá todos los campos');location.href = '../views/login.php';</script>";
    exit;
}

$buscar = $conexion->prepare("SELECT id_usuario, nom_usuario, password, id_rol FROM usuarios WHERE email = ?");
$buscar->bind_param("s", $email);
$buscar->execute();
$buscar->store_result();
$buscar->bind_result($id_usuario, $nombre, $hash, $id_rol);

if ($buscar->num_rows === 1) {
    $buscar->fetch();
    $buscar->close();

    if (password_verify($password, $hash)) {
        $_SESSION['usuario_id'] = $id_usuario;
        $_SESSION['rol']        = $id_rol;
        $_SESSION['usuario']    = $nombre;
        echo "<script>alert('¡Bienvenido, $nombre!');location.href = '../views/index.php';</script>";
        exit;
    }
    echo "<script>alert('Contraseña incorrecta');location.href = '../views/login.php';</script>";
    exit;
}

$buscar->close();
echo "<script>alert('No existe una cuenta con ese correo');location.href = '../views/login.php';</script>";
$conexion->close();