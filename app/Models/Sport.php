<?php
class Sport{
    private $id_sport ;
    private $nom_sport ;
    public function __construct($id , $nom){
        $this->id_sport = $id;
        $this->nom_sport = $nom;
    }
    public function __get($name){
        return $this->$name;
    }
    public function __set($name , $value){
        $this->$name = $value;
    }
}