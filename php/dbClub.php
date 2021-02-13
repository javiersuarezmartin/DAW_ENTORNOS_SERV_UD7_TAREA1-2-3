<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Consulta MySQL</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
</head>
<body>
    <div class="container"> 
        
        <?php

            // Incluimos el archivo con el código de funciones relacionada con la creación de la BBDD.
            include './dbConfig.php';
            include './bbdd.php';
    
            // Creamos un nuevo objeto para manejar la BBDD
            $conn = new dbConfig();
    
            // Mostramos si la conexión ha sido exitosa o errónea
            if ($conn->hayError()) {
                echo ('<p>Fallo al conectar a MySQL: ( ' . $conn->msgError() . ' )</p>');
                echo('<br><a href="../html/index.html" class="btn">Volver</a>');
            } else { 
                echo ('<p>Conexi&oacute;n exitosa</p>');
                
                // Si la conexión es exitosa mostramos los datos.
                echo('<br><a href="../html/index.html" class="btn">Volver</a>');                    
               
                // Comprobamos si hemos obtenido resultados o no.
                if (crearEstructuraBBDD($conn)) {

                    // Realizamos consulta a la BBDD
                    $resultado = $conn->obtenerDatos('jugadores');
                    
                    // Imprimir tabla de datos.                                
                    if ($resultado != null) {
                        echo ('<h1>Tabla Jugadores</h1>');
                        echo ('<table><thead><tr><th>ID</th><th>Nombre</th><th>Posici&oacute;n</th><th>N&uacute;mero</th><th>Edad</th></tr></thead><tbody>');
                        
                        foreach ($resultado as $jugador) {                    
                            echo ('<tr>');
                            echo ('<td>' . $jugador['id'] . '</td>');
                            echo ('<td>' . $jugador['nombreJugador'] . '</td>');
                            echo ('<td>' . $jugador['posicion'] . '</td>');
                            echo ('<td>' . $jugador['numero'] . '</td>');
                            echo ('<td>' . $jugador['edad'] . '</td>');
                            echo ('</tr>');
                        };
                        
                        echo ('</tbody></table>');
                    
                    } else {
                        echo('<p>Sin resultados</p>');
                    };

                } else {
                    echo ('<p>Error en la creación de tablas o llenado de datos de BBDD</p>');
                };
                
            };    
        ?>
       
    </div>
</body>
</html>