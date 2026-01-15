<?php
class DisponibiliteRepository{
     private CoachRepository $coachRepository;
    public function __construct(){
        $this->coachRepository= new CoachRepository();
    }

    public function __get($name){
        return $this->$name;
    }

    public function ajouteDisponibilite()
    {
        $coach = $this->coachRepository->getConnectedCoach();
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

    public function ModiferDisponibilite()
    {
        $coach = $this->coachRepository->getConnectedCoach();
        $id_coach = $coach->id_coach;
        
        $id = $_POST['id'] ?? null;
        $date = $_POST['date'] ?? null;
        $start = $_POST['startTime'] ?? null;
        $end = $_POST['endTime'] ?? null;

        $heure_debut = $start;
        $heure_fin = $end;

        if (!$id || !$id_coach || !$date || !$start || !$end) {
            echo json_encode([
                'success' => false,
                'message' => 'Données manquantes'
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
        $disponibiliteGet = Disponibilite::getDisponibiliteById($id);
        $disponibilites = new Disponibilite($disponibiliteGet['id_disponibilite'], $disponibiliteGet['id_coach'], $disponibiliteGet['date'], $disponibiliteGet['heure_debut'], $disponibiliteGet['heure_fin']);
        $disponibilites->setDate($date);
        $disponibilites->setHeureDebut($heure_debut);
        $disponibilites->setHeureFin($heure_fin);
        $update = $disponibilites->modifierDisponibilite();
        echo json_encode($update);
    }

}

