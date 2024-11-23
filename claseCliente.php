<?php
class Cliente {
    private $nombre;
    private $documento;
    private $telefono;
    private $direccion;

    public function __construct($nombre, $documento, $telefono, $direccion) {
        $this->nombre = $nombre;
        $this->documento = $documento;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
    }

    public function __toString() {
        return "Nombre: $this->nombre, Documento: $this->documento, Teléfono: $this->telefono, Dirección: $this->direccion";
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDocumento() {
        return $this->documento;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getDireccion() {
        return $this->direccion;
    }
}

