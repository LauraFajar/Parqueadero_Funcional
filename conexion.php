<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parqueadero";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $placa_vehiculo = $_POST['placa_vehiculo'];
    $marca_vehiculo = $_POST['marca_vehiculo'];
    $color_vehiculo = $_POST['color_vehiculo'];
    $hora_ingreso = $_POST['hora_ingreso'];

    $stmt = $conn->prepare("INSERT INTO clientes (nombres, tipo_documento, numero_documento, placa_vehiculo, marca_vehiculo, color_vehiculo, hora_ingreso)
    VALUES ('$nombres', '$tipo_documento', '$numero_documento', '$placa_vehiculo', '$marca_vehiculo', '$color_vehiculo', '$hora_ingreso')");
    $stmt->bind_param("sssssss", $nombres, $tipo_documento, $numero_documento, $placa_vehiculo, $marca_vehiculo, $color_vehiculo, $hora_ingreso);

    if ($stmt->execute()) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
