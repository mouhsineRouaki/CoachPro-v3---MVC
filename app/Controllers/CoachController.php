<?php
class CoachController{
    private CoachRepository $repo ;
    public function __construct(){
    $this->repo = new CoachRepository();
    }
    public function dashboard(){
        $coach = $this->repo->getConnectedCoach();
        $nextSession = $coach->getNextSportifSeance();
        $history = $coach->getHistoriqueReservation();
        require_once __DIR__."../../Views/coach/dashboard.php";
    }
    public function disponibility(){
        require_once __DIR__."../../Views/coach/disponibilityCoach.php";
    }
    public function getdisponibilitiesCoach(){
        $coach = $this->repo->getConnectedCoach();
        $dispo = $coach->getDisponibilites();
        echo json_encode($dispo);
    }
    public function ajouteDisponibilite(){
        $this->repo->ajouteDisponibilite();
    }
    

    public function logout() {
        session_destroy();
        header('Location: /');
    }
}