<?php 
class SportController{

    private SportRepository $sportifRepository;
    public function __construct(){
        $this->sportifRepository = new SportRepository();

    }
    public function getAllSport(){
        $this->sportifRepository->getAllSports();
    }
}