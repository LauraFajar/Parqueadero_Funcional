<?php
require_once 'claseVehiculo.php';
require_once 'claseCliente.php';

class Parqueadero {
    private $vehiculos = array();

    public function agregarVehiculo(Vehiculo $vehiculo, Cliente $cliente, $horaIngreso) {
        $this->vehiculos[] = array("vehiculo" => $vehiculo, "cliente" => $cliente, "horaIngreso" => $horaIngreso, "horaSalida" => null);
    }

    public function buscarVehiculo($placa) {
        foreach ($this->vehiculos as $vehiculo) {
            if ($vehiculo["vehiculo"]->getPlaca() == $placa) {
                return $vehiculo;
            }
        }
        return null;
    }

    public function registrarSalida($placa, $horaSalida) {
        $vehiculo = $this->buscarVehiculo($placa);
        if ($vehiculo) {
            $vehiculo["horaSalida"] = $horaSalida;
            $this->calcularValorPagar($vehiculo);
            foreach ($this->vehiculos as &$v) {
                if ($v["vehiculo"]->getPlaca() == $placa) {
                    $v = $vehiculo;
                }
            }
            return $vehiculo;
        }
        return null;
    }

    public function calcularValorPagar($vehiculo) {
        $horaIngreso = strtotime($vehiculo["horaIngreso"]);
        $horaSalida = strtotime($vehiculo["horaSalida"]);
        $tiempoEstadia = ($horaSalida - $horaIngreso) / 3600;
        $valorPagar = $tiempoEstadia * 2; 
        $vehiculo["valorPagar"] = $valorPagar;
    }

    public function eliminarVehiculo($placa) {
        foreach ($this->vehiculos as $key => $vehiculo) {
            if ($vehiculo["vehiculo"]->getPlaca() == $placa) {
                unset($this->vehiculos[$key]);
                return true;
            }
        }
        return false;
    }

    public function mostrarTodosVehiculos() {
        foreach ($this->vehiculos as $vehiculo) {
            $this->imprimirInfoVehiculo($vehiculo["vehiculo"]->getPlaca());
            echo "\n";
        }
    }

    public function imprimirInfoVehiculo($placa) {
        $vehiculo = $this->buscarVehiculo($placa);
        if ($vehiculo) {
            echo "Placa: " . $vehiculo["vehiculo"]->getPlaca() . "\n";
            echo "Marca: " . $vehiculo["vehiculo"]->getMarca() . "\n";
            echo "Color: " . $vehiculo["vehiculo"]->getColor() . "\n";
            echo "Tipo: " . $vehiculo["vehiculo"]->getTipo() . "\n";
            echo "Modelo: " . $vehiculo["vehiculo"]->getModelo() . "\n";
            echo "Nombre del cliente: " . $vehiculo["cliente"]->getNombre() . "\n";
            echo "Documento del cliente: " . $vehiculo["cliente"]->getDocumento() . "\n";
            echo "Hora de ingreso: " . $vehiculo["horaIngreso"] . "\n";
            echo "Hora de salida: " . $vehiculo["horaSalida"] . "\n";
            echo "Valor a pagar: $" . $vehiculo["valorPagar"] . "\n";
        } else {
            echo "Vehículo no encontrado\n";
        }
    }
}


$parqueadero = new Parqueadero();

$vehiculo1 = new Vehiculo("ABC123", "Toyota", "Rojo", "Sedán", "Corolla");
$cliente1 = new Cliente("Juan Pérez", "123456789", "555-1234", "Calle 1 # 2-3");
$parqueadero->agregarVehiculo($vehiculo1, $cliente1, date("Y-m-d H:i:s"));

$vehiculo2 = new Vehiculo("DEF456", "Honda", "Azul", "Sedán", "Civic");
$cliente2 = new Cliente("María García", "987654321", "555-5678", "Calle 2 # 4-5");
$parqueadero->agregarVehiculo($vehiculo2, $cliente2, date("Y-m-d H:i:s"));

$parqueadero->mostrarTodosVehiculos();

$parqueadero->registrarSalida("ABC123", date("Y-m-d H:i:s"));

$parqueadero->mostrarTodosVehiculos();

$parqueadero->eliminarVehiculo("DEF456");

$parqueadero->mostrarTodosVehiculos();

$parqueadero->imprimirInfoVehiculo("ABC123");

?>