<?php
class Vehiculo {
    private $placa;
    private $marca;
    private $color;
    private $tipo;
    private $modelo;

    public function __construct($placa, $marca, $color, $tipo, $modelo) {
        $this->placa = $placa;
        $this->marca = $marca;
        $this->color = $color;
        $this->tipo = $tipo;
        $this->modelo = $modelo;
    }

    public function __toString() {
        return "Placa: $this->placa, Marca: $this->marca, Color: $this->color, Tipo: $this->tipo, Modelo: $this->modelo";
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getColor() {
        return $this->color;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getModelo() {
        return $this->modelo;
    }
}
