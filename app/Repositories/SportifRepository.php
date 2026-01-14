<?php
class CoachRepository
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

}

