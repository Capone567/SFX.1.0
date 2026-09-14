```php
<?php

include "conexion.php";

$id = $_GET["id"];

$sql = $conexion->query("SELECT * FROM usuarios WHERE id_usuario = $id");

$usuario = $sql->fetch_object();


if (!empty($_POST["btnmodificar"])) {

    $nom_usuario = $_POST["nom_usuario"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $modificar = $conexion->query("UPDATE usuarios SET

        nom_usuario = '$nom_usuario',
        telefono = '$telefono',
        email = '$email',
        password = '$password'

        WHERE id_usuario = $id

    ");


    if ($modificar) {

        header("Location: index.php");
        exit;

    } else {

        echo "<div class='alert alert-danger'>
                Error al modificar los datos.
              </div>";

    }

}

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Modificar Usuario</title>

<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet"
>

</head>

<body>

<div class="container p-4">

    <form
        class="col-4 p-3 m-auto border rounded shadow"
        method="POST"
    >

        <h3 class="text-center text-secondary">
            Modificar Usuario
        </h3>


        <div class="mb-3">

            <label class="form-label">
                Nombre de usuario
            </label>

            <input
                type="text"
                class="form-control"
                name="nom_usuario"
                value="<?= $usuario->nom_usuario ?>"
                required
            >

        </div>


        <div class="mb-3">

            <label class="form-label">
                Teléfono
            </label>

            <input
                type="text"
                class="form-control"
                name="telefono"
                value="<?= $usuario->telefono ?>"
                required
            >

        </div>


        <div class="mb-3">

            <label class="form-label">
                Correo Electrónico
            </label>

            <input
                type="email"
                class="form-control"
                name="email"
                value="<?= $usuario->email ?>"
                required
            >

        </div>


        <div class="mb-3">

            <label class="form-label">
                Contraseña
            </label>

            <input
                type="text"
                class="form-control"
                name="password"
                value="<?= $usuario->password ?>"
                required
            >

        </div>


        <button
            type="submit"
            class="btn btn-primary"
            name="btnmodificar"
            value="ok"
        >
            Guardar Cambios
        </button>


        <a
            href="index.php"
            class="btn btn-secondary"
        >
            Cancelar
        </a>

    </form>

</div>

</body>

</html>
```
