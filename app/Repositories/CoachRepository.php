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




    public function ajouteDisponibilite()
    {
        $coach = self::getConnectedCoach();
        $id_coach = $coach->id_coach;

        $date = $_POST['date'];
        $start = $_POST['startTime'];
        $end = $_POST['endTime'];


        if (!$date || !$start || !$end) {
            echo json_encode([
                'success' => false,
                'message' => 'Donnees manquantes'
            ]);
            exit;
        }
        if ($start < "08:00" || $end > "18:00" || $start >= $end) {
            echo json_encode([
                'success' => false,
                'message' => 'Heures hors du temps de travail (08:00 - 18:00)'
            ]);
            exit;
        }
        $disponibilite = new Disponibilite(null, $id_coach, $date, $start, $end);
        echo json_encode($disponibilite->ajouterDisponibilite());
    }

}

