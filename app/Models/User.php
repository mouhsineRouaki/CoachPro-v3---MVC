<?php 
abstract class User{
    protected ?int $id_user ;
    protected ?string $nom_user;
    protected ?string $prenom_user;
    protected ?string $email_user;
    protected ?string $password_user;
    protected ?string $passwordHashe_user;
    protected ?string $phone_user;
    protected ?string $role ;
    
    public function __construct($id ,$nom , $prenom , $email , $password , $phone , $role){
        $this->id_user = $id;
        $this->nom_user= $nom;
        $this->prenom_user= $prenom;
        $this->email_user= $email;
        $this->password_user= $password;
        $this->phone_user= $phone;
        $this->role= $role;
        $this->passwordHashe_user= password_hash($password,PASSWORD_DEFAULT);
    }
    

    
}