<?php
class SportifController{

    private SportifRepository $repo ; 
    private SportRepository $sportRepository;
    private CoachRepository $coachRepository;
    public function __construct(){
        $this->repo = new SportifRepository();
        $this->sportRepository = new SportRepository();
        $this->coachRepository = new CoachRepository();
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
    public function createCoachCard($coach) {
        $img = !empty($coach['img_utilisateur']) ? $coach['img_utilisateur'] : 'https://placehold.net/avatar.svg';

        $disciplinesHtml = '';
        if (!empty($coach['disciplines']) && is_array($coach['disciplines'])) {
            foreach ($coach['disciplines'] as $d) {
                $disciplinesHtml .= '<span class="px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">'.$d.'</span>';
            }
        }

        return '
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition-all duration-300 p-6 transform hover:-translate-y-1">
            <img src="'.$img.'" 
                alt="'.$coach['nom'].' '.$coach['prenom'].'" 
                class="w-full h-48 object-cover rounded-lg mb-4">
            <h3 class="text-xl font-bold text-gray-800">'.$coach['nom'].' '.$coach['prenom'].'</h3>
            <p class="text-purple-600 font-semibold text-sm mb-2">1 ans d\'expérience</p>
            <div class="flex flex-wrap gap-2 mb-4">'.$disciplinesHtml.'</div>
            <button class="w-full py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition">
                <a href="coach/'.$coach['id_coach'].'">Voir le profil</a>
            </button>
        </div>';
    }

    public function Coaches(){
        $coaches = self::getCoachess();
        require_once __DIR__."../../Views/sportif/decouvrirCoach.php";
    }
    public function getCoaches(){
        $coaches = $this->repo->getCoach();
        $html = "";
        foreach($coaches as $c){
            $html.= self::createCoachCard($c);
        }
        echo $html;
    }

    public function detailsCoatch($id){
        $sportif = $this->repo->getConnectedSportif();
        $id_sportif =  $sportif->id_sportif;
        $coach = $this->coachRepository->getCoachById($id);
        $sports = $this->coachRepository->getSportsCoach($id);
        $experiences = $this->coachRepository->getExperiencesCoach($id);
        $disponibilites = $this->coachRepository->getdisponibiliteCoach($id);
        require_once __DIR__."../../Views/sportif/detailsCoach.php";


        


    }
    public function getCoachess(){
        $coaches = $this->repo->getCoach();
        $html = "";
        foreach($coaches as $c){
            $html.= self::createCoachCard($c);
        }
        return $html;
    }



    public function logout() {
        session_destroy();
        header('Location: /');
    }
}