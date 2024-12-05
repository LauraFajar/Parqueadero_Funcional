<?php
$servername = "localhost";
$username = "lau_fajar";
$password = "lau123";
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
    $hora_salida = $_POST['hora_salida'];
    $piso_parqueadero = $_POST['piso_parqueadero'];
    $espacios_piso = $_POST['espacios_piso'];

    $stmt = $conn->prepare("INSERT INTO clientes (nombres, tipo_documento, numero_documento, placa_vehiculo, marca_vehiculo, color_vehiculo, hora_ingreso, hora_salida, piso_parqueadero, espacios_piso)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssssii", $nombres, $tipo_documento, $numero_documento, $placa_vehiculo, $marca_vehiculo, $color_vehiculo, $hora_ingreso, $hora_salida, $piso_parqueadero, $espacios_piso);

    if ($stmt->execute()) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

