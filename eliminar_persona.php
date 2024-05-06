<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <?php
        require_once 'database.php';
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $persona_id = $_GET['id'];
            $sql = "DELETE FROM Persona WHERE id = $persona_id";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Persona eliminada correctamente.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al eliminar la persona: ' . $conn->error . '</div>';
            }
        } else {
            echo '<div class="alert alert-warning" role="alert">ID de persona no especificado.</div>';
        }
        $conn->close();
        ?>
        <a href="index.php" class="btn btn-primary">Volver al Inicio</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
