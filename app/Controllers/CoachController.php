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
    

    public function logout() {
        session_destroy();
        header('Location: /');
    }
}