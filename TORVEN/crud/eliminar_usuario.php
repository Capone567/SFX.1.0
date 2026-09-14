```php
<?php

include "conexion.php";

if (!empty($_GET["id"])) {

    $id = $_GET["id"];

    $sql = $conexion->query("DELETE FROM usuarios WHERE id_usuario = $id");

    if ($sql) {

        header("Location: index.php");
        exit;

    } else {

        echo "<script>
                alert('Error al eliminar');
                window.location.href='index.php';
              </script>";

    }

}

?>
```
