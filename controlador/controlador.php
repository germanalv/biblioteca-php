<?php
require '../db/connDB.php';
include ('../modelos/clslibro.php');
include ('../modelos/clsusuario.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


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
            return -1;
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
        return 'Error: '.  $e->getMessage(). "\n";
    }
    
}

function getUsuario($id){

    try {
        $conn =  connDB();
        $sql = "SELECT * FROM usuarios WHERE id = ".$id;
        $resultado = $conn->query($sql);
        $fila = $resultado->fetch_assoc();
        $usuario = new Usuario($fila['id'], $fila['ci'], $fila['nombre'], $fila['apellido'], $fila['mail'], $fila['tel'], $fila['dir']);
        $conn->close();
        
        return $usuario;        
    } catch (Exception $e) {
        return $e->getMessage();
    }
    
}


function setUsuario($usuario){
    try {
        $conn =  connDB();
        $sql = "UPDATE usuarios SET ci = '".$usuario->getCi()."', nombre = '".$usuario->getNombre()."', apellido = '".$usuario->getApellido()."', mail = '".$usuario->getMail()."', tel = '".$usuario->getTel()."', dir = '".$usuario->getDir()."' WHERE id = ".$usuario->getId();

        if ($conn->query($sql) === TRUE) {
            $id = $conn->insert_id;

            $respuesta['estado'] = 1;
            $respuesta['resp'] = 'OK';

            $conn->close();
            return $respuesta;
        }else{  
            $conn->close();
            $respuesta['estado'] = 0;
            $respuesta['resp'] = "No se pudo actualizar el usuario";
            return $respuesta;
        }
             
    } catch (Exception $e) {
        $respuesta['estado'] = 0;
        $respuesta['resp'] = "No se pudo actualiazr el usuario<br>ERROR: ".$e->getMessage();
        return $respuesta;
    }
}



function addUsuario($objUsuario){
    //var_dump($objUsuario);
    $respuesta = [];
    try {
        $conn =  connDB();
        $sql = "INSERT INTO usuarios (ci, nombre, apellido, mail, tel, dir, password) 
                VALUES('".$objUsuario->getCi()."', '".$objUsuario->getNombre()."', '".$objUsuario->getApellido()."', 
                '".$objUsuario->getMail()."', '".$objUsuario->getTel()."', '".$objUsuario->getDir()."', '123456')";
        //echo $sql;
        if ($conn->query($sql) === TRUE) {
            $id = $conn->insert_id;

            $respuesta['estado'] = 1;
            $respuesta['resp'] = $id;

            $conn->close();
            return $respuesta;
        }else{  
            $conn->close();
            $respuesta['estado'] = 0;
            $respuesta['resp'] = "No se pudo ingresar el usuario";
            return $respuesta;
        }

    } catch (Exception $e) {
        $respuesta['estado'] = 0;
        $respuesta['resp'] = "No se pudo ingresar el usuario<br>ERROR: ".$e->getMessage();
        return $respuesta;
    }
}


/***********************************************************/
/******************* Funciones Prestamos *******************/
/***********************************************************/

?>