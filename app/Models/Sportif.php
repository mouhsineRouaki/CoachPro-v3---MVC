<?php 

class Sportif extends User{
    private ?int$id_sportif = null ;
    private ?string $objectif = null ;
    private ?string$niveau= null ;
    
    public function __construct($user , $sportif){
        parent::__construct($user["id_utilisateur"],$user["nom"] , $user["prenom"] , $user["email"] , $user["mot_de_pass"], $user["telephone"] , $user["role"] ,$user["date_creation"] , $user["img_utilisateur"] );
        $this->id_sportif = $sportif["id_sportif"];
        $this->objectif = $sportif["objectif"] ;
        $this->niveau = $sportif["niveau"];
    }
    public function __get($name){
        return $this->$name ;
    }
    public function __set($name , $value){
        $this->$name = $value ;
    }

    public function updateInfoUser(){

    }
    
}