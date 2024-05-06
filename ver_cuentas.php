<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Cuentas Bancarias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <?php
        require_once 'database.php';

        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $persona_id = $_GET['id'];

            $sql = "SELECT * FROM CuentaBancaria WHERE persona_id = $persona_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="card mb-3">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">Número de Cuenta: ' . $row["nroCuenta"] . '</h5>';
                    echo '<p class="card-text">Tipo de Cuenta: ' . $row["tipo_cuenta"] . '</p>';
                    echo '<p class="card-text">Saldo: ' . $row["saldo"] . '</p>';
                    echo '<a href="eliminar_cuenta.php?id=' . $row["id"] . '" class="btn btn-danger">Eliminar</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">No se encontraron cuentas bancarias para esta persona.</p>';
            }
        } else {
            echo '<p class="text-center">ID de persona no especificado.</p>';
        }

        $conn->close();
        ?>

        <a href="agregar_cuenta.php?id=<?php echo $persona_id; ?>" class="btn btn-primary">Agregar Cuenta Bancaria</a>
        
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
