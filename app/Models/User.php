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

    public static function login(string $email, string $password): array {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['mot_de_pass'])) {
            return [
                "success" => false,
                "message" => "Email ou mot de passe incorrect"
            ];
        }

        session_start();
        $_SESSION['user_id'] = $user['id_utilisateur'];
        $_SESSION['role'] = $user['role'];

        return [
            "success" => true,
            "message" => "Connexion réussie",
            "user" => $user
        ];
    }

}