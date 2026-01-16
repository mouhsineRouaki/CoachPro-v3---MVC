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

}

