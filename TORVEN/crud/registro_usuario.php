```php
<?php

include "conexion.php";

if (!empty($_POST["btnregistrar"])) {

    $nom_usuario = $_POST["nom_usuario"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = $conexion->query("INSERT INTO usuarios 
        (nom_usuario, telefono, email, password)
        VALUES ('$nom_usuario', '$telefono', '$email', '$password')");

    if ($sql) {

        header("Location: index.php");
        exit;

    } else {

        echo "<div class='alert alert-danger'>
                Error al registrar el usuario.
              </div>";

    }

}

?>
```
