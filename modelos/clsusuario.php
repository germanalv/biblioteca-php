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

    /**
     * Class constructor.
     */
    public function __construct($pId, $pCi, $pNombre, $pApellido, $pMail, $pTel, $pDir){
        $this->id = $pId;
        $this->ci = $pCi;
        $this->nombre = $pNombre;
        $this->apellido = $pApellido;
        $this->mail = $pMail;
        $this->tel = $pTel;
        $this->dir = $pDir;
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


    public function getUsuarios(){

        try {
            $conn =  connDB();
            $sql = "SELECT * FROM usuarios";
            $resultado = $conn->query($sql);
            
            $listaUsuarios = array();

            while ($fila = $resultado->fetch_assoc()) {
                $usuario = new usuarios($fila['id'], $fila['ci'], $fila['nombre'], $fila['apellido'], $fila['mail'], $fila['tel'], $fila['dir']);
                $listaUsuarios[] = $usuario;
            }

            $conn->close();
            return $listaUsuarios;

            
        } catch (Exception $e) {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
        
    }
}

?>