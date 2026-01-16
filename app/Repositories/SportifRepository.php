<?php
class SportifRepository
{


    public function getConnectedSportif()
    {
        $db = Database::getInstance()->getConnection();
        $stmt1 = $db->prepare("select * from sportif where id_utilisateur = ?");
        $stmt2 = $db->prepare("select * from utilisateur where id_utilisateur = ?");
        $stmt1->execute([$_SESSION["user_id"]]);
        $stmt2->execute([$_SESSION["user_id"]]);
        $user = $stmt2->fetch(PDO::FETCH_ASSOC);
        $sportif =  $stmt1->fetch(PDO::FETCH_ASSOC);
        return new Sportif($user,$sportif );
    }
    public  function getCoachsDisponible(){
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("select count(*) as total from coach " );
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["total"];
    }
    public function getNombreReservationByStatus($status){
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("select count(*) as total from reservation r 
        INNER JOIN sportif s on r.id_sportif = s.id_sportif
        Where status = ?
        ");
        $stmt->execute([$status]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result["total"];
    }
    public  function getCoach($queryR = ""){
        $db = Database::getInstance()->getConnection();
        $query = "%".$queryR."%";
        if(empty($queryR)){
        $stmt = $db->prepare("
            SELECT c.*, u.nom,u.img_utilisateur, u.prenom, u.email, u.telephone, c.biographie, c.niveau,
               GROUP_CONCAT(DISTINCT s.nom_sport SEPARATOR ', ') as sports
            FROM coach c
            INNER JOIN utilisateur u ON c.id_utilisateur = u.id_utilisateur
            LEFT JOIN coach_sport cs ON c.id_coach = cs.id_coach
            LEFT JOIN sport s ON cs.id_sport = s.id_sport
            GROUP BY c.id_coach
            ORDER BY u.nom ASC
        ");
        $stmt->execute();
        }else{
            $stmt = $db->prepare("
            SELECT c.*, u.nom, u.prenom, u.email, u.telephone, c.biographie, c.niveau,
               GROUP_CONCAT(DISTINCT s.nom_sport SEPARATOR ', ') as sports
            FROM coach c
            INNER JOIN utilisateur u ON c.id_utilisateur = u.id_utilisateur
            LEFT JOIN coach_sport cs ON c.id_coach = cs.id_coach
            LEFT JOIN sport s ON cs.id_sport = s.id_sport
            where u.nom like ? or u.prenom like ?
            GROUP BY c.id_coach
            ORDER BY u.nom ASC
        ");
        $stmt->execute([$query,$query]);
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}

