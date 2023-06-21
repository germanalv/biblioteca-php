<?php
include ('../modelos/clslibro.php');


/*********************************************************/
/******************* Funciones Libros ********************/
/*********************************************************/

function getLibros(){

    try {
        $conn =  connDB();
        $sql = "SELECT * FROM libros";
        $resultado = $conn->query($sql);
        $listaLibros = array();
        while ($fila = $resultado->fetch_assoc()) {
            $libro = new Libro($fila['id'], $fila['titulo'], $fila['autor'], $fila['genero'], $fila['anio'], $fila['cant_ejemplares']);
            $listaLibros[] = $libro;
        }
        $conn->close();
        return $listaLibros;
    } catch (Exception $e) {
        echo 'Error: ',  $e->getMessage(), "\n";
    }
    
}

/***********************************************************/
/******************* Funciones Usuarios ********************/
/***********************************************************/


/***********************************************************/
/******************* Funciones Prestamos *******************/
/***********************************************************/

?>