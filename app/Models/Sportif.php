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

    public function getNextSeance(){

        $stmt=  $this->db->prepare("
            SELECT r.*, c.biographie, u.nom, u.prenom, s.nom_sport,
                d.date, d.heure_debut, d.heure_fin
            FROM reservation r
            INNER JOIN coach c ON r.id_coach = c.id_coach
            INNER JOIN utilisateur u ON c.id_utilisateur = u.id_utilisateur
            INNER JOIN sport s ON r.id_sport = s.id_sport
            INNER JOIN disponibilite d on d.id_disponibilite = r.id_disponibilite
            WHERE r.id_sportif = ? 
            AND r.status = 'confirmee'
            AND d.date >= Now()
            ORDER BY d.date ASC, d.heure_debut ASC
            LIMIT 1
        ");
        $stmt->execute([$this->id_sportif]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}