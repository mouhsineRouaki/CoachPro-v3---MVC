<?php
class ReservationRepository{
    private CoachRepository $coachRepository ;
    private SportifRepository $sportifRepository ;
    public function __construct(){
        $this->coachRepository = new CoachRepository();
        $this->sportifRepository = new SportifRepository();
    }
    public function getReservationsCoach(){
        $coach = $this->coachRepository->getConnectedCoach();
        echo json_encode($coach->getReservations());
    }
    public function confirmReservation(){
        $coach = $this->coachRepository->getConnectedCoach();
        $id_reservation = $_POST['id_reservation'];
        $id_disponibilite = $_POST['id_disponibilite'];
        if($coach->confirmReservation($id_reservation,$id_disponibilite)){
            echo json_encode(["success" => true]);
        }else{
            echo json_encode(["success" => false]);
        }
    }
    public function cancelReservation(){
        $coach = $this->coachRepository->getConnectedCoach();
        $id_reservation = $_POST['id_reservation'];
        $id_disponibilite = $_POST['id_disponibilite'];

        if($coach->annullerResevation($id_reservation,$id_disponibilite)){
            echo json_encode(["success" => true]);
        }else{
            echo json_encode(["success" => false]);

        }
    }


}