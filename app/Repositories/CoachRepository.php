<?php
class CoachRepository
{


    public function getConnectedCoach()
    {
        $db = Database::getInstance()->getConnection();
        $stmt1 = $db->prepare("select * from coach where id_utilisateur = ?");
        $stmt2 = $db->prepare("select * from utilisateur where id_utilisateur = ?");
        $stmt1->execute([$_SESSION["user_id"]]);
        $stmt2->execute([$_SESSION["user_id"]]);
        $user = $stmt2->fetch(PDO::FETCH_ASSOC);
        $coach = $stmt1->fetch(PDO::FETCH_ASSOC);
        return new Coach($user, $coach);
    }
    public  function getCoachById($id_coach){
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT c.*,u.img_utilisateur, u.nom, u.prenom, u.email, u.telephone, c.biographie, c.niveau,
               GROUP_CONCAT(DISTINCT s.nom_sport SEPARATOR ', ') as sports
            FROM coach c
            INNER JOIN utilisateur u ON c.id_utilisateur = u.id_utilisateur
            LEFT JOIN coach_sport cs ON c.id_coach = cs.id_coach
            LEFT JOIN sport s ON cs.id_sport = s.id_sport
            where c.id_coach = ?
            GROUP BY c.id_coach
            ORDER BY u.nom ASC
        ");
        $stmt->execute([$id_coach]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public  function getSportsCoach($id_coach){
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT s.id_sport, s.nom_sport FROM coach_sport cs
            JOIN sport s ON s.id_sport = cs.id_sport
            WHERE cs.id_coach = ?
        ");
        $stmt->execute([$id_coach]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public  function getExperiencesCoach($id_coach){
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT domaine, date_debut, date_fin, duree
            FROM experiences
            WHERE id_coach = ?
            ORDER BY date_debut DESC
        ");
        $stmt->execute([$id_coach]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public  function getdisponibiliteCoach($id_coach){
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT id_disponibilite ,DATE(date) AS date, TIME(heure_debut) AS heure_debut, TIME(heure_fin) AS heure_fin, isReserved
            FROM disponibilite
            WHERE id_coach = ?
            ORDER BY date, heure_debut
        ");
        $stmt->execute([$id_coach]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    



}

