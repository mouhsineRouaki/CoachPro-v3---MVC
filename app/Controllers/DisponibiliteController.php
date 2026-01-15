<?php
class DisponibiliteController{



    public function ajouteDisponibilite(){
        $this->repo->ajouteDisponibilite();
    }

    public function getdisponibilitiesCoach(){
        $coach = $this->repo->getConnectedCoach();
        $dispo = $coach->getDisponibilites();
        echo json_encode($dispo);
    }

}