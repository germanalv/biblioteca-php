<?php

//require '../db/connDB.php';

class Usuario{

    private $id;
    private $ci;
    private $nombre;
    private $apellido;
    private $mail;
    private $tel;
    private $dir;
    private $rol;/* Roles => 1 - Administrador - 2 - General */
    private $pass;

    /**
     * Class constructor.
     */
    public function __construct($pId, $pCi, $pNombre, $pApellido, $pMail, $pTel, $pDir, $pRol, $pPass){
        $this->id = $pId;
        $this->ci = $pCi;
        $this->nombre = $pNombre;
        $this->apellido = $pApellido;
        $this->mail = $pMail;
        $this->tel = $pTel;
        $this->dir = $pDir;
        $this->rol = $pRol;
        $this->pass = $pPass;
        
    }

    /**********
     * Getters.
     **********/
    public function getId(){
        return $this->id;
    }
    public function getCi(){
        return $this->ci;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getTel(){
        return $this->tel;
    }
    public function getDir(){
        return $this->dir;
    }
    public function getRol(){
        return $this->rol;
    }
    public function getPass(){
        return $this->pass;
    }

    /**********
     * Setters.
     **********/

     public function setCi($pCi){
        $this->ci = $pCi;
    }
    public function setNombre($pNombre){
        $this->nombre = $pNombre;
    }
    public function setApellido($pApellido){
        $this->apellido = $pApellido;
    }
    public function setMail($pMail){
        $this->mail = $pMail;
    }
    public function setTel($pTel){
        $this->tel = $pTel;
    }
    public function setDir($pDir){
        $this->dir = $pDir;
    }
    public function setRol($pRol){
        $this->rol = $pRol;
    }
    public function setPass($pPass){
        $this->pass = $pPass;
    }

}

?>