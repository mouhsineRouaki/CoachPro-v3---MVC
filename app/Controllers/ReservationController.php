<?php 
class ReservationController{

    private ReservationRepository $reservationRepository;

    public function __construct(){
        $this->reservationRepository = new ReservationRepository();
    }

    public function getReservations(){
        $this->reservationRepository->getReservationsCoach();
    }

}