<?php

class Prestamo{

    private $id;
    private $idLibro;
    private $idUsuario;
    private $fecha_prestamo;
    private $fecha_devolucion;
    private $estado;

    /**
     * Class constructor.
     */
    public function __construct($pId, $pIdLibro, $pIdUsuario, $pFecha_prestamo, $pFecha_devolucion, $pEstado){
        $this->id = $pId;
        $this->idLibro = $pIdLibro;
        $this->idUsuario = $pIdUsuario;
        $this->fecha_devolucion = $pFecha_prestamo;
        $this->fecha_prestamo = $pFecha_devolucion;
        $this->estado = $pEstado;
    }

    /**********
     * Getters.
     **********/
    public function getId(){
        return $this->id;
    }
    public function getIdLibro(){
        return $this->idLibro;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function getFecha_prestamo(){
        return $this->fecha_prestamo;
    }
    public function getFecha_devolucion(){
        return $this->fecha_devolucion;
    }
    public function getEstado(){
        return $this->estado;
    }

    /**********
     * Setters.
     **********/

    public function setIdLibro($pIdLibro){
        $this->idLibro = $pIdLibro;
    }
    public function setIdUsuario($pIdUsuario){
        $this->idUsuario = $pIdUsuario;
    }
    public function setFecha_prestamo($pFecha_prestamo){
        $this->fecha_prestamo = $pFecha_prestamo;
    }
    public function setFecha_devolucion($pFecha_devolucion){
        $this->fecha_devolucion = $pFecha_devolucion;
    }
    public function setEstado($pEstado){
        $this->estado = $pEstado;
    }

}

?>