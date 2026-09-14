```php
<?php

include "conexion.php";

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registro de usuarios</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://kit.fontawesome.com/2b665f6a21.js" crossorigin="anonymous"></script>

</head>

<body>

<h1 class="text-center p-3">Registro de usuarios</h1>

<div class="container-fluid">

    <div class="row">

        <!-- FORMULARIO DE REGISTRO -->

        <form class="col-4 p-3" method="POST" action="registro_usuario.php">

            <h3 class="text-center text-secondary">
                Registro de usuarios
            </h3>

            <div class="mb-3">

                <label class="form-label">
                    Nombre de usuario
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="nom_usuario"
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
                    required
                >

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Contraseña
                </label>

                <input
                    type="password"
                    class="form-control"
                    name="password"
                    required
                >

            </div>

            <button
                type="submit"
                class="btn btn-primary"
                name="btnregistrar"
                value="ok"
            >
                Registrar
            </button>

        </form>


        <!-- TABLA DE USUARIOS -->

        <div class="col-8 p-4">

            <table class="table table-dark table-striped-columns">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Nombre de usuario</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $sql = $conexion->query("SELECT * FROM usuarios");

                    while ($datos = $sql->fetch_object()) {

                    ?>

                        <tr>

                            <td>
                                <?= $datos->id_usuario ?>
                            </td>

                            <td>
                                <?= $datos->nom_usuario ?>
                            </td>

                            <td>
                                <?= $datos->telefono ?>
                            </td>

                            <td>
                                <?= $datos->email ?>
                            </td>

                            <td>
                                <?= $datos->password ?>
                            </td>

                            <td>

                                <a
                                    href="editar_usuario.php?id=<?= $datos->id_usuario ?>"
                                    class="btn btn-small btn-warning"
                                >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <a
                                    onclick="return confirmarEliminacion()"
                                    href="eliminar_usuario.php?id=<?= $datos->id_usuario ?>"
                                    class="btn btn-small btn-danger"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </a>

                            </td>

                        </tr>

                    <?php

                    }

                    ?>

                </tbody>

            </table>

        </div>

    </div>

</div>


<script>

function confirmarEliminacion() {

    return confirm("¿Estás seguro de que deseas eliminar este usuario?");

}

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
```
