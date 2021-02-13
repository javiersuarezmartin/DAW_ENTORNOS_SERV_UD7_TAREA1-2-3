<?php
    class Jugador {
        
	    private $nombre ='';
	    private $posicion = 0;
        private $numero = 0;
        private $edad = 0;

        // Constructor

        public function __construct($nombre, $posicion, $numero, $edad) {
            $this->nombre = $nombre;
	        $this->posicion = $posicion;
	        $this->numero = $numero;
            $this->edad = $edad;
        }

        // Métodos Get

        public function getNombre() {
            return $this->nombre;
        }

        public function getPosicion() {
            return $this->posicion;
        }

        public function getNumero() {
            return $this->numero;
        }

        public function getEdad() {
            return $this->edad;
        }

        // Métodos Set

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setPosicion($posicion) {
            $this->posicion = $posicion;
        }

        public function setNumero($numero) {
            $this->numero = $numero;
        }

        public function setEdad($edad) {
            $this->edad = $edad;
        }
        
        // Otros métodos

    };
?>