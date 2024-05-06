<?php
require_once 'database.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $cuenta_id = $_GET['id'];

    // Eliminar la cuenta bancaria de la base de datos
    $sql = "DELETE FROM CuentaBancaria WHERE id = $cuenta_id";

    if ($conn->query($sql) === TRUE) {
        // Redirigir de vuelta a la página anterior (o a donde desees)
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al eliminar la cuenta bancaria: ' . $conn->error . '</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">ID de cuenta bancaria no especificado.</div>';
}

$conn->close();
?>
