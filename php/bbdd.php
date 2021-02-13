<?php
    require_once './Jugador.php';

    // Funcion para crear la BBDD

    // Funcion para crear la tabla de la BBDD.
    function crearTablaBBDD ($conexion) {
        $sql_creacion_tabla = 'CREATE TABLE IF NOT EXISTS jugadores(
            id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            nombreJugador VARCHAR(100) NOT NULL,
            posicion VARCHAR(45) NOT NULL,
            numero VARCHAR(3) NOT NULL,      
            edad INT(3)                   
        );';

        $result = $conexion->consulta($sql_creacion_tabla);
        
        if ($result != null) {
            return true;
        } else {
            return false;
        };      
    };

    // Funcion para llenar la BBDD
    function llenarTablaBBDD($tabla, $conexion) {

        $conexion->consulta('USE '.$tabla.';');
        
        // Para comprobar si la tabla está vacia calculamos.        
        
        if ($conexion->obtenerDatos($tabla) == null) {
            // Si la tabla está vacia la llenamos con los datos.

            // Declaramos 5 nuevos objetos Jugador

            $jugador1 = new Jugador ('Nicolás Laprovittola', 'Base', 8, 31);
            $jugador2 = new Jugador ('Sergio Llull', 'Base-Escolta', 23, 33);
            $jugador3 = new Jugador ('Jaycee Carroll', 'Escolta', 20, 37);
            $jugador4 = new Jugador ('Rudy Fernández', 'Alero', 5, 35);
            $jugador5 = new Jugador ('Felipe Reyes', 'Ala-Pívot', 9, 40);
            
            // Los incluimos en un array

            $arr_jugadores = array();
            
            array_push($arr_jugadores, $jugador1);
            array_push($arr_jugadores, $jugador2);
            array_push($arr_jugadores, $jugador3);
            array_push($arr_jugadores, $jugador4);
            array_push($arr_jugadores, $jugador5);

           // Añadimos los jugadores        
            for ($i = 0; $i < count($arr_jugadores); $i++) {
                $sql_llenar = 'INSERT INTO jugadores VALUES (NULL, "' . $arr_jugadores[$i]->getNombre() . '", "' . $arr_jugadores[$i]->getPosicion() . '", ' . $arr_jugadores[$i]->getNumero() . ', ' . $arr_jugadores[$i]->getEdad() . ');';
                $res = $conexion->consulta($sql_llenar);
                
                // Comprobamos si hemos tenido algun fallo en las inserciones.
                if ($res == null) {
                    $i = count($arr_jugadores); // Forzamos salida del for
                };
            };

            return $res;
        } else {
            return true; // Ya esta llena
        };
        
    };

    function crearEstructuraBBDD($conexion) {
        if(crearTablaBBDD($conexion)) {
            if(llenarTablaBBDD('jugadores', $conexion) == null) {
                return false; // Error en el llenado de tablas.
            } else {
                return true;
            };
        } else {
            return false; // Error en la creación de tablas.
        };
    };

?>