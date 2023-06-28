<?php
require('../controlador/controlador.php');

if(isset($_POST['btnEliminar'])){
    $id = $_POST['id'];
    if(eliminarUsuario($id)){
        header("Location: usuarios.php");
    } else {
        
    }
}

?>