<?php 

class Coach extends User{
    private ?int$id_sportif = null ;
    private ?string $objectif = null ;
    private ?string$niveau= null ;
    private PDO $db; 
    
    public function __construct(string $nom, string $prenom, string $email, string $password, string $telephone, string $role, ?string $image , ?string $id_sportif,?string $objectif , ?string $niveau ){
        parent::__construct($nom , $prenom , $email , $password, $telephone , $role , $image );
        $this->db = Database::getInstance()->getConnection();
        $this->id_sportif = $id_sportif;
        $this->objectif = $objectif ;
        $this->niveau = $niveau;
    }
    public static function getConnectedSportif(){
        session_start();
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("select * from sportif where id_utilisateur = ?");
        if($stmt->execute([$_SESSION["user_id"]])){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null ; 
    }
}