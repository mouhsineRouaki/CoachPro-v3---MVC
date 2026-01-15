<?php 
class Coach extends User{
    private ?int$id_coach = null ;
    private ?string $biographie= null ;
    private ?string $niveau= null ; 
    private $annee_exp= null ;
    private PDO $db; 
    
    public function __construct($user, $coach ){
        parent::__construct($user["id_utilisateur"],$user["nom"] , $user["prenom"] , $user["email"] , $user["mot_de_pass"], $user["telephone"] , $user["role"] , $user["img_utilisateur"] );
        $this->db = Database::getInstance()->getConnection();
        $this->id_coach = $coach["id_coach"];
        $this->biographie = $coach["biographie"] ;
        $this->niveau = $coach["niveau"];
        $this->annee_exp = $coach["annee_experience"];
    }


    public function __get($name){
        return $this->$name;
    }
    public function __set($name , $value){
        $this->$name = $value;
    }
    public function getNextSportifSeance(){
        $stmt = $this->db->prepare("select u.nom , u.prenom , u.img_utilisateur , d.date , s.nom_sport , d.heure_debut , d.heure_fin from reservation r
            INNER JOIN sportif sf on sf.id_sportif = r.id_sportif 
            INNER JOIN utilisateur u on u.id_utilisateur = sf.id_utilisateur 
            Inner join disponibilite d on d.id_disponibilite = r.id_disponibilite 
            INNER JOIN sport s on s.id_sport = r.id_sport
            INNER JOIN coach c on u.id_utilisateur = c.id_utilisateur 
            where c.id_coach = ? and r.status = 'confirmee'
            order by d.date desc 
            limit 1 
        ");
        $id_coach = Coach::getConnectedCoach()["id_coach"];
        $stmt->execute([$id_coach]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getNombreReservationByStatus($status){
        $stmt = $this->db->prepare("select count(*) as total from reservation r 
        INNER JOIN coach c on r.id_coach = c.id_coach
        Where status = ?
        ");
        $stmt->execute([$status]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result["total"];
    }
    public function getHistoriqueReservation(){
        $stmt = $this->db->prepare("select r.* , d.date,d.heure_debut,d.heure_fin , u.nom , prenom , s.nom_sport from reservation r 
            INNER JOIN sportif sp on r.id_sportif = sp.id_sportif
            INNER JOIN utilisateur u on u.id_utilisateur = sp.id_utilisateur
            INNER JOIN disponibilite d on d.id_disponibilite = r.id_disponibilite
            INNER JOIN sport s on s.id_sport = r.id_sport 
            where r.id_coach =  ?
            order by d.date desc
        ");
        $id_coach = new CoachRepository()->getConnectedCoach()["id_coach"];
        $stmt->execute([$id_coach]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getReservations(){
        $id_coach =  Coach::getConnectedCoach()["id_coach"];
        $stmt = $this->db->prepare("SELECT r.id_reservation,d.date ,d.id_disponibilite,d.heure_debut,d.heure_fin,s.nom_sport,u.nom,u.prenom,u.img_utilisateur , r.status,u.telephone FROM reservation r
            INNER JOIN sportif sp on sp.id_sportif = r.id_sportif 
            INNER JOIN utilisateur u on u.id_utilisateur = sp.id_utilisateur 
            Inner join disponibilite d on d.id_disponibilite = r.id_disponibilite 
            INNER JOIN sport s  on s.id_sport = r.id_sport 
            WHERE r.id_coach = ?
            order by d.date
        ");
        $stmt->execute([$id_coach]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function confirmReservation($id_reservation, $id_disponibilite){
        $stmt = $this->db->prepare(
            "UPDATE reservation 
             SET status = 'confirmee' 
             WHERE id_reservation = ?"
        );
        $stmt->execute([$id_reservation]);

        $stmt2 = $this->db->prepare(
            "UPDATE disponibilite 
             SET isReserved = 1 
             WHERE id_disponibilite = ?"
        );
        return $stmt2->execute([$id_disponibilite]);

}




}