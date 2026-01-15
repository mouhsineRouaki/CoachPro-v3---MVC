<?php 
class ReservationController{

    private ReservationRepository $reservationRepository;

    public function __construct(){
        $this->reservationRepository = new ReservationRepository();
    }

    public function getReservations(){
        $this->reservationRepository->getReservationsCoach();
    }
    public function reservations(){
        require_once __DIR__ . "/../Views/coach/reservationCoach.php";
    }

    public function confirmReservation(){
        $this->reservationRepository->confirmReservation();
    }
    public function cancelReservation(){
        $this->reservationRepository->cancelReservation();
    }

}