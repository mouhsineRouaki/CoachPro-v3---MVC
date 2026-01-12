<?php 
class Coach extends User{
    
    public function __construct($id ,$nom , $prenom , $email , $password , $phone , $role){
        parent::__construct($id, $nom , $prenom , $email , $password , $phone , $role);
    }

}