<?php
class SportifController{

    private SportifRepository $repo ; 
    private SportRepository $sportRepository;
    public function __construct(){
        $this->repo = new SportifRepository();
        $this->sportRepository = new SportRepository();
    }

    public function dashboard(){
        $sportif = $this->repo->getConnectedSportif();
        $coachDispo = $this->repo->getCoachsDisponible();
        $sc = $this->repo->getNombreReservationByStatus("confirmee");
        $sen = $this->repo->getNombreReservationByStatus("en_attente");
        $st = $this->repo->getNombreReservationByStatus("terminee");
        $nextSession = $sportif->getNextSeance();
        $fotbal = $this->sportRepository->getNombreCoachParSport("Football");
        $tennis = $this->sportRepository->getNombreCoachParSport("Tennis");
        $natation = $this->sportRepository->getNombreCoachParSport("Natation");
        $fitness = $this->sportRepository->getNombreCoachParSport("Fitness");

        require_once __DIR__."../../Views/sportif/dashboard.php";
    }

    public function logout() {
        session_destroy();
        header('Location: /');
    }
}