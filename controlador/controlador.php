<?php
include ('../modelos/clslibro.php');

include ('../modelos/clsusuario.php');




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

function getUsuarios(){

    try {
        $conn =  connDB();
        $sql = "SELECT * FROM usuarios";
        $resultado = $conn->query($sql);
        
        $listaUsuarios = array();

        while ($fila = $resultado->fetch_assoc()) {
            $usuario = new Usuario($fila['id'], $fila['ci'], $fila['nombre'], $fila['apellido'], $fila['mail'], $fila['tel'], $fila['dir']);
            $listaUsuarios[] = $usuario;
        }

        $conn->close();
        return $listaUsuarios;

        
    } catch (Exception $e) {
        echo 'Error: ',  $e->getMessage(), "\n";
    }
    
}

function addUsuario($objUsuario){
    // var_dump($objUsuario);
    
    try {
        $conn =  connDB();
        $sql = "INSERT INTO usuarios (ci, nombre, apellido, mail, tel, dir) 
                VALUES('".$objUsuario->getCi()."', '".$objUsuario->getNombre()."', '".$objUsuario->getApellido()."', 
                ".$objUsuario->getMail().", ".$objUsuario->getTel().", ".$objUsuario->getDir().")";
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


/***********************************************************/
/******************* Funciones Prestamos *******************/
/***********************************************************/

?>