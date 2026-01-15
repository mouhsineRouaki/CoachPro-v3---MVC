<?php
class DisponibiliteController{

    private DisponibiliteRepository $repo ; 
    public function __construct(){
        $this->repo = new DisponibiliteRepository();
    }
    public function ajouteDisponibilite(){
        $this->repo->ajouteDisponibilite();
    }
    public function modifierDisponibilite(){
        $this->repo->ModiferDisponibilite();
    }

    public function getdisponibilitiesCoach(){
        $coach = $this->repo->coachRepository->getConnectedCoach();
        $dispo = $coach->getDisponibilites();
        echo json_encode($dispo);
    }

}