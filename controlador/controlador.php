<?php
include ('../modelos/clslibro.php');


/*********************************************************/
/******************* Funciones Libros ********************/
/*********************************************************/
function addLibro($objLibro){
    // var_dump($objLibro);
    
    try {
        $conn =  connDB();
        $sql = "INSERT INTO libros (titulo, autor, genero, anio, cant_ejemplares) 
                VALUES('".$objLibro->getTitulo()."', '".$objLibro->getAutor()."', '".$objLibro->getGenero()."', 
                ".$objLibro->getAnio().", ".$objLibro->getCantEjemplares().")";
        //echo $sql;
        if ($conn->query($sql) === TRUE) {
            $id = $conn->insert_id;
            $conn->close();
            return $id;
        }else{  
            $conn->close();
            return false;
        }

    } catch (Exception $e) {
        return $e->getMessage();
    }
}


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
        return $e->getMessage();
    }
    
}

/***********************************************************/
/******************* Funciones Usuarios ********************/
/***********************************************************/


/***********************************************************/
/******************* Funciones Prestamos *******************/
/***********************************************************/

?>