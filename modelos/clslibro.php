<?php



class Libro{

    private $id;
    private $titulo;
    private $autor;
    private $genero;
    private $anio;
    private $cant_ejemplares ;

    /**
     * Class constructor.
     */
    public function __construct($pId, $pTitulo, $pAutor, $pGenero, $pAnio, $pCant_ejemplares){
        $this->id = $pId;
        $this->titulo = $pTitulo;
        $this->autor = $pAutor;
        $this->genero = $pGenero;
        $this->anio = $pAnio;
        $this->cant_ejemplares = $pCant_ejemplares;
    }

    /**********
     * Getters.
     **********/
    public function getId(){
        return $this->id;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getAutor(){
        return $this->autor;
    }
    public function getGenero(){
        return $this->genero;
    }
    public function getAnio(){
        return $this->anio;
    }
    public function getCantEjemplares(){
        return $this->cant_ejemplares;
    }
    
    /**********
     * Setters.
     **********/

    public function setTitulo($pTitulo){
        $this->titulo = $pTitulo;
    }
    public function setAutor($pAutor){
        $this->autor = $pAutor;
    }
    public function setGenero($pGenero){
        $this->genero = $pGenero;
    }
    public function setAnio($pAnio){
        $this->anio = $pAnio;
    }
    public function setCantEjemplares($pCantEjemplares){
        $this->cant_ejemplares = $pCantEjemplares;
    }

}


?>