<?php
session_start();
require '../db/connDB.php';
include ('../modelos/clslibro.php');
include ('../modelos/clsusuario.php');
include ('../modelos/clsprestamo.php');


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
    var_dump($objLibro);
    
    try {
        $conn =  connDB();
        $sql = "INSERT INTO libros (titulo, autor, genero, anio, cant_ejemplares) 
                VALUES('".$objLibro->getTitulo()."', '".$objLibro->getAutor()."', '".$objLibro->getGenero()."', 
                ".$objLibro->getAnio().", ".$objLibro->getCantEjemplares().")";
        echo $sql;
        if ($conn->query($sql) === TRUE) {
            $id = $conn->insert_id;

            $respuesta['estado'] = 1;
            $respuesta['resp'] = $id;

            $conn->close();
            return $respuesta;
        }else{  
            $conn->close();
            $respuesta['estado'] = 0;
            $respuesta['resp'] = "No se pudo ingresar el libro";
            return $respuesta;
        }

    } catch (Exception $e) {
        $respuesta['estado'] = 0;
        $respuesta['resp'] = "No se pudo ingresar el Libro<br>ERROR: ".$e->getMessage();
        return $respuesta;
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

function getLibro($idLibro){

    try {
        $conn =  connDB();
        $sql = "SELECT * FROM libros WHERE id = ".$idLibro;
        $resultado = $conn->query($sql);
        $fila = $resultado->fetch_assoc();
        //var_dump($fila);
        $conn->close();
        if( !empty($fila) ) { 
            $libro = new Libro($fila['id'], $fila['titulo'], $fila['autor'], $fila['genero'], $fila['anio'], $fila['cant_ejemplares']);
            return $libro;
        } else { 
            return NULL;
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
    
}

function setLibro($libro){
    try {
        $conn =  connDB();
        $sql = "UPDATE libros SET titulo = '".$libro->getTitulo()."', nombre = '".$libro->getAutor()."', apellido = '".$libro->getGenero()."', mail = '".$libro->getAnio()."', tel = '".$libro->getCantEjemplares()."' WHERE id = ".$libro->getId();

        if ($conn->query($sql) === TRUE) {
            $id = $conn->insert_id;

            $respuesta['estado'] = 1;
            $respuesta['resp'] = 'OK';

            $conn->close();
            return $respuesta;
        }else{  
            $conn->close();
            $respuesta['estado'] = 0;
            $respuesta['resp'] = "No se pudo actualizar el libro";
            return $respuesta;
        }
             
    } catch (Exception $e) {
        $respuesta['estado'] = 0;
        $respuesta['resp'] = "No se pudo actualizar el libro<br>ERROR: ".$e->getMessage();
        return $respuesta;
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

/* German 27/06/2023 */
function getUsuario($id){

    try {
        $conn =  connDB();
        $sql = "SELECT * FROM usuarios WHERE id = ".$id;
        $resultado = $conn->query($sql);
        $fila = $resultado->fetch_assoc();
        //var_dump($fila);
        $conn->close();
        if( !empty($fila) ) { 
            $usuario = new Usuario($fila['id'], $fila['ci'], $fila['nombre'], $fila['apellido'], $fila['mail'], $fila['tel'], $fila['dir']);
            return $usuario;
        } else { 
            return NULL;
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
    
}

/* $usu = getUsuarioByMail('german@mail.com');
var_dump($usu); */

/* German 27/06/2023 */
function getUsuarioByMail($mail){

    try {
        $conn =  connDB();
        $sql = "SELECT * FROM usuarios WHERE mail = '".$mail."'";
        $resultado = $conn->query($sql);
        $fila = $resultado->fetch_assoc();
        $conn->close();
        if( !empty($fila) ) { 
            $usuario = new Usuario($fila['id'], $fila['ci'], $fila['nombre'], $fila['apellido'], $fila['mail'], $fila['tel'], $fila['dir']);
            return $usuario;
        } else { 
            return NULL;
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
    
}

/* German 27/06/2023 */
function login($mail, $pass){
    try {
        $conn =  connDB();
        $sql = "SELECT * FROM usuarios WHERE mail = '".$mail."' AND  password = '".$pass."'";
        $resultado = $conn->query($sql);
        $fila = $resultado->fetch_assoc();
        $conn->close();
        if( !empty($fila) ) {
            $usu = getUsuarioByMail($mail);
            $_SESSION["nombre"] = $usu->getNombre();
            $_SESSION["apellido"] = $usu->getApellido();
            $_SESSION["mail"] = $usu->getMail();
            return true;
        } else { 
            return false;
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function checkLogin(){
    if ( empty($_SESSION['nombre']) ) {
        header("Location: login.php");
    }
}

function logout(){
    echo "Paso 3";
    session_destroy();
    echo "Paso 4";
    header("Location: login.php");
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
        $respuesta['resp'] = "No se pudo actualizar el usuario<br>ERROR: ".$e->getMessage();
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

function getPrestamos(){

    try {
        $conn =  connDB();
        $sql = "SELECT * FROM prestamo";
        $resultado = $conn->query($sql);
        
        $listaPrestamos = array();

        while ($fila = $resultado->fetch_assoc()) {
            $prestamo = new Prestamo ($fila['id'], $fila['id_libro'], $fila['id_usuario'], $fila['fecha_prestamo'], $fila['fecha_devolución'], $fila['estado']);
            $listaPrestamos[] = $prestamo;
        }

        $conn->close();
        return $listaPrestamos;

        
    } catch (Exception $e) {
        return 'Error: '.  $e->getMessage(). "\n";
    }
    
}

function addPrestamo($objPrestamo){
    //var_dump($objPrestamo);
    $respuesta = [];
    $fecha_actual = date("d-m-Y");
    $fecha_devolucion = strtotime($fecha_actual);
    $fecha_devolucion = strtotime("+7 day", $fecha_devolucion);
    try {
        $conn =  connDB();
        $sql = "INSERT INTO prestamo (id_libro, id_usuario, fecha_prestamo, fecha_devolución, estado) 
                VALUES('".$objPrestamo->getIdLibro()."', '".$objPrestamo->getIdUsuario()."', '$fecha_actual', 
                '".$fecha_devolucion."', '1')";
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
            $respuesta['resp'] = "No se pudo ingresar el préstamo";
            return $respuesta;
        }

    } catch (Exception $e) {
        $respuesta['estado'] = 0;
        $respuesta['resp'] = "No se pudo ingresar el préstamo<br>ERROR: ".$e->getMessage();
        return $respuesta;
    }
}





?>