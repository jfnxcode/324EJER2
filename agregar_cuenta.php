<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se enviaron los datos del formulario
    if(isset($_POST['persona_id'], $_POST['nroCuenta'], $_POST['tipo_cuenta'])) {
        $persona_id = $_POST['persona_id'];
        $nroCuenta = $_POST['nroCuenta'];
        $tipo_cuenta = $_POST['tipo_cuenta'];
        $saldo = $_POST['saldo'];

        // Insertar nueva cuenta bancaria en la base de datos
        $sql = "INSERT INTO CuentaBancaria (persona_id, nroCuenta, tipo_cuenta,saldo) VALUES ('$persona_id', '$nroCuenta', '$tipo_cuenta','$saldo')";
        if ($conn->query($sql) === TRUE) {
            // Redirigir al usuario de vuelta a la página de ver cuentas con el ID de la persona
            header("Location: ver_cuentas.php?id=$persona_id");
            exit();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al agregar la cuenta bancaria: ' . $conn->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Falta información del formulario.</div>';
    }
}

// Verificar si se proporcionó el ID de la persona en la URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $persona_id = $_GET['id'];
} else {
    echo '<div class="alert alert-danger" role="alert">ID de persona no especificado.</div>';
    exit(); // Terminar la ejecución del script si no se proporciona el ID de la persona
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cuenta Bancaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Agregar Cuenta Bancaria</h1>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="persona_id" value="<?php echo $persona_id; ?>">
                    <div class="mb-3">
                        <label for="nroCuenta" class="form-label">Número de Cuenta</label>
                        <input type="text" class="form-control" id="nroCuenta" name="nroCuenta" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_cuenta" class="form-label">Tipo de Cuenta</label>
                        <input type="text" class="form-control" id="tipo_cuenta" name="tipo_cuenta" required>
                    </div>
                    <div class="mb-3">
                        <label for="saldo" class="form-label">Saldo</label>
                        <input type="text" class="form-control" id="saldo" name="saldo" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Cuenta Bancaria</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
