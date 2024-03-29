<?php
session_start();
require '../db/connDB.php';
include ('../modelos/clslibro.php');
include ('../modelos/clsusuario.php');
include ('../modelos/clsprestamo.php');

require('../general/vizualizar_errores.php');

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
        $sql = "INSERT INTO libros (titulo, autor, genero, anio) 
                VALUES('".$objLibro->getTitulo()."', '".$objLibro->getAutor()."', '".$objLibro->getGenero()."', 
                ".$objLibro->getAnio().")";
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
            $libro = new Libro($fila['id'], $fila['titulo'], $fila['autor'], $fila['genero'], $fila['anio']);
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
            $libro = new Libro($fila['id'], $fila['titulo'], $fila['autor'], $fila['genero'], $fila['anio']);
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
        $sql = "UPDATE libros SET titulo = '".$libro->getTitulo()."', autor = '".$libro->getAutor()."', genero = '".$libro->getGenero()."', anio = '".$libro->getAnio()."' WHERE id = ".$libro->getId();

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

function eliminarLibro($id){
    try {
        $conn =  connDB();
        $sql = "DELETE FROM libros WHERE id = ".$id;

        if ($conn->query($sql) === TRUE) {
            return "OK";
        } else {
            return "No fue posible eliminar el libro";
        }
    } catch (Exception $e) {
        if($e->getCode() == 1451){
            return "No fue posible eliminar el libros: Existen prestamos asociados"; 
        }else{
            return $e->getMessage();
        }
    }
}

function getLibrosDisponibles(){

    try {
        $conn =  connDB();
        $sql = "SELECT * FROM libros WHERE id NOT IN (SELECT id_libro FROM prestamo WHERE estado = 1)";
        $resultado = $conn->query($sql);
        $listaLibrosDisponibles = array();
        while ($fila = $resultado->fetch_assoc()) {
            $libro = new Libro($fila['id'], $fila['titulo'], $fila['autor'], $fila['genero'], $fila['anio']);
            $listaLibrosDisponibles[] = $libro;
        }
        $conn->close();
        return $listaLibrosDisponibles;
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
            $usuario = new Usuario($fila['id'], $fila['ci'], $fila['nombre'], $fila['apellido'], $fila['mail'], $fila['tel'], $fila['dir'], $fila['rol'], $fila['password']);
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
            $usuario = new Usuario($fila['id'], $fila['ci'], $fila['nombre'], $fila['apellido'], $fila['mail'], $fila['tel'], $fila['dir'], $fila['rol'], $fila['password']);
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
            $usuario = new Usuario($fila['id'], $fila['ci'], $fila['nombre'], $fila['apellido'], $fila['mail'], $fila['tel'], $fila['dir'], $fila['rol'], $fila['password']);
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
            $_SESSION["rol"] = $usu->getRol();
            return true;
        } else { 
            return false;
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function checkRolAdmin(){
    if ( $_SESSION['rol'] != "1" ) {
        header("Location: index.php");
    }
}

function checkLogin(){
    if ( empty($_SESSION['nombre']) ) {
        header("Location: login.php");
    }
}

function logout(){
    //echo "Paso 3";
    session_destroy();
    //echo "Paso 4";
    header("Location: login.php");
}


function setUsuario($usuario){
    try {
        $conn =  connDB();
        $sql = "UPDATE usuarios SET ci = '".$usuario->getCi()."', nombre = '".$usuario->getNombre()."', 
        apellido = '".$usuario->getApellido()."', mail = '".$usuario->getMail()."', 
        tel = '".$usuario->getTel()."', dir = '".$usuario->getDir()."', 
        rol = ".$usuario->getRol().", password = '".$usuario->getPass()."' WHERE id = ".$usuario->getId();

        if ($conn->query($sql) === TRUE) {
            $rows = $conn->affected_rows;

            $respuesta['estado'] = 1;
            $respuesta['resp'] = $rows;

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
        $sql = "INSERT INTO usuarios (ci, nombre, apellido, mail, tel, dir, password, rol) 
                VALUES('".$objUsuario->getCi()."', '".$objUsuario->getNombre()."', '".$objUsuario->getApellido()."', 
                '".$objUsuario->getMail()."', '".$objUsuario->getTel()."', '".$objUsuario->getDir()."', '".$objUsuario->getPass()."', ".$objUsuario->getRol().")";
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

//eliminarUsuario(1);
function eliminarUsuario($id){
    try {
        $conn =  connDB();
        $sql = "DELETE FROM usuarios WHERE id = ".$id;        
        
        if ($conn->query($sql) === TRUE) {
            return "OK";
        } else {
            return "No fue posible eliminae el usuario";
        } 
        
    } catch (Exception $e) {
        if($e->getCode() == 1451){
            return "No fue posible eliminar el usuario: El usuario tiene prestamos asociados"; 
        }else{
            return $e->getMessage();
        }
    }
}


/***********************************************************/
/******************* Funciones Prestamos *******************/
/***********************************************************/

function getPrestamos($filtro){

    try {
        $conn =  connDB();
        if($filtro == 0){
            $sql = "SELECT * FROM prestamo";
        } elseif ($filtro == 1){
            $sql = "SELECT * FROM prestamo WHERE estado = 1";
        } else {
            $sql = "SELECT * FROM prestamo WHERE estado = 2";
        }
        
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
    //Estado 1 es prestado
    $respuesta = [];
    try {
        $conn =  connDB();
        $sql = "INSERT INTO prestamo (id_libro, id_usuario, fecha_prestamo, estado) 
                VALUES('".$objPrestamo->getIdLibro()."', '".$objPrestamo->getIdUsuario()."', '".$objPrestamo->getFecha_prestamo()."', 1)";
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

function getPrestamo($idPrestamo){

    try {
        $conn =  connDB();
        $sql = "SELECT * FROM prestamo WHERE id = ".$idPrestamo;
        $resultado = $conn->query($sql);
        $fila = $resultado->fetch_assoc();
        //var_dump($fila);
        $conn->close();
        if( !empty($fila) ) { 
            $prestamo = new Prestamo($fila['id'], $fila['id_libro'], $fila['id_usuario'], $fila['fecha_prestamo'], $fila['fecha_devolucion'], $fila['estado']);
            return $prestamo;
        } else { 
            return NULL;
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
    
}

function setPrestamo($prestamo){
    try {
        $conn =  connDB();
        $sql = "UPDATE prestamo SET id_libro = '".$prestamo->getIdLibro()."', id_usuario = '".$prestamo->getIdUsuario()."', fecha_prestamo = '".$prestamo->getFecha_prestamo()."', fecha_devolucion = '".$prestamo->getFecha_devolucion()."', estado = '".$prestamo->getEstado()."' WHERE id = ".$prestamo->getEstado();

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

function devolverPrestamo($iDprestamo, $fecha_devolucion){
    try {
        $conn =  connDB();
        $sql = "UPDATE prestamo SET fecha_devolución = '".$fecha_devolucion."', estado = 2 WHERE id = ".$iDprestamo;

        if ($conn->query($sql) === TRUE) {
            $rows = $conn->affected_rows;

            $respuesta['estado'] = 1;
            $respuesta['resp'] = 'OK';

            $conn->close();
            return $respuesta;
        }else{  
            $conn->close();
            $respuesta['estado'] = 0;
            $respuesta['resp'] = "No se pudo devolver el prestamo";
            return $respuesta;
        }
             
    } catch (Exception $e) {
        $respuesta['estado'] = 0;
        $respuesta['resp'] = "No se pudo actualizar el libro<br>ERROR: ".$e->getMessage();
        return $respuesta;
    }
}

function eliminarPrestamo($id){
    try {
        $conn =  connDB();
        $sql = "DELETE FROM prestamo WHERE id = ".$id;

        if ($conn->query($sql) === TRUE) {
            return "OK";
        } else {
            return "No fue posible eliminar el prestamo";
        }
    } catch (Exception $e) {
        /* if($e->getCode() == 1451){
            return "No fue posible eliminar el libros: Existen prestamos asociados"; 
        }else{
            return $e->getMessage();
        } */
        return $e->getMessage();
    }
}

?>