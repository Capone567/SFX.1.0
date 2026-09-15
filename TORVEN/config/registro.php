<?php

//DIR se usa para que este estrictamente en esta ruta
require_once __DIR__ . '/conexion.php';


// En caso de que se use GET te redirija devuelta a la pagina
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../views/registro.php");
    exit;
}

//trim para sacar los espacios
//Se le asigna un valor por defecto con el ?? para que no tire un undifende
$usuario  = trim($_POST['nom'] ?? '');
$telefono = trim($_POST['tel'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';


//En caso de que alguno este vacio se reinicia la pagina con un alert
if ($usuario === '' || $telefono === '' || $email === '' || $password === '') {
    echo "<script>alert('Completá todos los campos');location.href = '../views/registro.php';</script>";
    exit;
}

//Verifica que el password sea de mas de 8 caracteres. El strelen hace un get de caracteres 
if (strlen($password) < 8) {
    echo "<script>alert('La contraseña debe tener al menos 8 caracteres');location.href = '../views/registro.php';</script>";
    exit;
}


//Verifica el formato email. El filter_var es para verificar variables segun el formato pasado en parametros
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('El correo electrónico no es válido');location.href = '../views/registro.php';</script>";
    exit;
}


//Va modificando sumar que es una variable. En caso de detectar un valor que sea el mismo suma uno a la variable, para luego tirar un alert
//el prepare prepara a la base de datos para evitar injecciones sql. El bind_param especifica los tipos de variables
//
$buscar = $conexion->prepare("SELECT id_usuario FROM usuarios WHERE nom_usuario = ? OR telefono = ? OR email = ?");
$buscar->bind_param("sss", $usuario, $telefono, $email);

// Ejecuta la consulta definitivamente el execute
$buscar->execute();

// Guarda los datps em el php para que se pueda hacer la cuenta con la variable buscar
$buscar->store_result();

if ($buscar->num_rows > 0) {
    //Cuando se usa prepare se hace un espacio en memoria para la consulta. Con close() liberas ese espacio.
    $buscar->close();
    echo "<script>alert('Ya existe una cuenta con ese nombre de usuario, teléfono o correo');location.href = '../views/registro.php';</script>";
    exit;
}
$buscar->close();

// Se prepara la consulta para determinar el rol del usuario. Igual esta determinado en cliente que es = a 1
$rol = $conexion->prepare("SELECT id_rol FROM roles WHERE nombre_rol = 'cliente' LIMIT 1");
$rol->execute();
$id_rol = 1;
//Prepara el resultado 
$rol->bind_result($id_rol);
//Lo ejecuta y lo modifica
$rol->fetch();
$rol->close();

// Se modifica la variable de la contra para hacerla encriptada
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$insertar = $conexion->prepare("INSERT INTO usuarios (nom_usuario, telefono, email, password) VALUES (?, ?, ?, ?)");
$insertar->bind_param("ssss", $usuario, $telefono, $email, $password_hash);


if ($insertar->execute()) {
    $id_usuario = $conexion->insert_id;

    // El usuario solo se anota en cliente si su rol es igual a 1. Hay que ver como hacemos para modificar la tabla cuando lo pasemos a administrador
    if ($id_rol === 1) {
    $cliente = $conexion->prepare("INSERT INTO clientes (nombre, telefono, id_usuario) VALUES (?, ?, ?)");
    $nombre_cliente = $usuario;
    $cliente->bind_param("ssi", $nombre_cliente, $telefono, $id_usuario);
    $cliente->execute();
    $cliente->close();
    }

    echo "<script>alert('¡Ya estás registrado!');location.href = '../views/login.php';</script>";
} else {
    echo "<script>alert('No se pudo completar el registro. Intentá de nuevo.');location.href = '../views/registro.php';</script>";
}


$insertar->close();
$conexion->close();