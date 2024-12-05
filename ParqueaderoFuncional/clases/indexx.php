<?php

require_once 'claseParqueadero.php';

$parqueadero = new Parqueadero();

$vehiculo1 = new Vehiculo("ABC123", "Toyota", "Rojo", "Sedán", "Corolla");
$cliente1 = new Cliente("Carlos Torres", "123456789", "555-1234", "Calle 1 # 2-3");
$parqueadero->agregarVehiculo($vehiculo1, $cliente1, date("Y-m-d H:i:s"));

$vehiculo2 = new Vehiculo("DEF456", "Honda", "Azul", "Sedán", "Civic");
$cliente2 = new Cliente("Luis Torres", "987654321", "555-5678", "Calle 2 # 4-5");
$parqueadero->agregarVehiculo($vehiculo2, $cliente2, date("Y-m-d H:i:s"));

$parqueadero->mostrarTodosVehiculos();

echo "Información de los vehículos:\n";
$parqueadero->imprimirInfoVehiculo("ABC123");
echo "\n";
$parqueadero->imprimirInfoVehiculo("DEF456");

$horaSalida = date("Y-m-d H:i:s");
$parqueadero->registrarSalida("ABC123", $horaSalida);

echo "\nInformación del vehículo después de registrar la salida:\n";
$parqueadero->imprimirInfoVehiculo("ABC123");

?>


