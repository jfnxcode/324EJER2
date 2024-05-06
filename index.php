<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Conexión a Base de Datos con Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Personas Registradas</h1>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php
                require_once 'database.php';
                echo '<a href="agregar_persona.php" class="btn btn-primary mb-3">Agregar Persona</a>';
                $sql = "SELECT * FROM Persona";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="card mb-3">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row["nombre"] . ' ' . $row["apellido"] . '</h5>';
                        echo '<p class="card-text">CI: '. $row["ci"] . '</p>';
                        echo '<p class="card-text">Correo: '. $row["correo"] . '</p>';
                        echo '<p class="card-text">Departamento: ' . $row["departamento"] . '</p>';
                        echo '<a href="editar_persona.php?id=' . $row["id"] . '" class="btn btn-warning">Editar</a>';
                        echo '<a href="eliminar_persona.php?id=' . $row["id"] . '" class="btn btn-danger">Eliminar</a>';
                        echo '<a href="ver_cuentas.php?id=' . $row["id"] . '" class="btn btn-info">Ver Cuentas</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-center">No se encontraron personas registradas.</p>';
                }
                $conn->close();
                ?>
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
