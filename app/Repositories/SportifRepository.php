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
    public function getCoach($queryR = "")
{
    $db = Database::getInstance()->getConnection();
    $query = "%".$queryR."%";

    $sql = "
        SELECT 
            c.id_coach,
            c.biographie,
            c.niveau,
            u.nom,
            u.prenom,
            u.email,
            u.telephone,
            u.img_utilisateur,
            STRING_AGG(DISTINCT s.nom_sport, ', ') AS sports
        FROM coach c
        INNER JOIN utilisateur u ON c.id_utilisateur = u.id_utilisateur
        LEFT JOIN coach_sport cs ON c.id_coach = cs.id_coach
        LEFT JOIN sport s ON cs.id_sport = s.id_sport
    ";

    if (!empty($queryR)) {
        $sql .= " WHERE u.nom ILIKE ? OR u.prenom ILIKE ? ";
    }

    $sql .= "
        GROUP BY 
            c.id_coach,
            c.biographie,
            c.niveau,
            u.nom,
            u.prenom,
            u.email,
            u.telephone,
            u.img_utilisateur
        ORDER BY u.nom ASC
    ";

    $stmt = $db->prepare($sql);

    if (!empty($queryR)) {
        $stmt->execute([$query, $query]);
    } else {
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

     public function insererReservation($id_coach,$id_sportif,$id_disponibilite,$id_sport,$status){
        $db = Database::getInstance()->getConnection();
        $stmt  = $db->prepare("INSERT INTO reservation 
            (id_sportif, id_coach, id_sport,id_disponibilite,status,date_reservation)
            VALUES (?,?,?,?,?,NOW())");
        $stmt->execute([$id_sportif,$id_coach,$id_sport,$id_disponibilite,$status]);
    }
    public function reserverDisponibiliteByid($id_disponibilite){
        $db = Database::getInstance()->getConnection();
        $stmt  = $db->prepare("UPDATE disponibilite
            SET isreserved = true
            WHERE id_disponibilite = ?");
        $stmt->execute([$id_disponibilite]);
    }

}

