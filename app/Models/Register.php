<?php
class Register{
    private ?int $id = null;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $password;
    private string $telephone;
    private string $role;
    private string $image;

    private PDO $db;

    public function __construct(string $nom,string $prenom,string $email,string $password,string $telephone,string $role,?string $image = null) {
        $this->db =  Database::getInstance()->getConnection();
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->telephone = $telephone;
        $this->role = $role;
        $this->image = $image;
    }
    public function register(): array {

        $check = $this->db->prepare("SELECT id_utilisateur FROM utilisateur WHERE email = ?");
        $check->execute([$this->email]);
        if ($check->fetch()) {
            return [
                "success" => false,
                "message" => "Email deja utilise"
            ];
        }
        $stmt = $this->db->prepare("INSERT INTO utilisateur(nom, prenom, email, mot_de_pass, telephone, role, img_utilisateur, date_creation) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$this->nom,$this->prenom,$this->email,$this->password,$this->telephone,$this->role,$this->image]);
        $this->id = $this->db->lastInsertId();
        if($this->role === "coach"){
            $stmtC = $this->db->prepare("INSERT INTO coach(id_utilisateur) values (?)");
            $stmtC->execute([$this->id]);
        }else{
            $stmtC = $this->db->prepare("INSERT INTO sportif(id_utilisateur) values (?)");
            $stmtC->execute([$this->id]);
        }
        return [
            "success" => true,
            "message" => "Inscription réussie",
            "id_utilisateur" => $this->id
        ];
    }
}