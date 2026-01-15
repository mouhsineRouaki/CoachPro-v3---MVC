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


}