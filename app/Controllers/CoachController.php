<?php
class CoachController
{
    private CoachRepository $repo;
    public function __construct()
    {
        $this->repo = new CoachRepository();
    }
    public function dashboard()
    {
        $coach = $this->repo->getConnectedCoach();
        $nextSession = $coach->getNextSportifSeance();
        $history = $coach->getHistoriqueReservation();
        require_once __DIR__ . "../../Views/coach/dashboard.php";
    }
    public function disponibility()
    {
        require_once __DIR__ . "../../Views/coach/disponibilityCoach.php";
    }
    public function profil()
    {
        $coach = $this->repo->getConnectedCoach();
        $sportRepo = new SportRepository();
        $sports = $sportRepo->getAllSports();
        require_once __DIR__ . "../../Views/coach/profilCoach.php";
    }


    public function updateProfil()
    {
        $action = $_POST['action'] ?? null;
        $coach = $this->repo->getConnectedCoach();
        $id_coach = $coach->id_coach;

        if (!$id_coach || !$action) {
            echo json_encode(['success' => false, 'message' => "Accès refusé"]);
            exit;
        }

        $data = $_POST;

        switch ($action) {
            case 'get':
                echo json_encode($coach);
                break;

            case 'updateInfo':
                $coach->setNom($data["nom"]);
                $coach->setPrenom($data["prenom"]);
                $coach->setEmail("email");
                $coach->niveau = $data["niveau"];
                $coach->setTelephone($data["telephone"]);
                echo json_encode($coach->updateInfo());
                break;

            case 'updateBio':
                $coach->biographie = $data["biographie"];
                echo json_encode($coach->updateInfo());
                break;

            case 'addSport':
                echo json_encode($coach->addSport($data["id_sport"]));
                break;

            case 'addExperience':
                echo json_encode($coach->addExperience($data["domaine"], $data["duree"], $data["date_debut"], $data["date_fin"]));
                break;

            case 'deleteSport':
                echo json_encode($coach->deleteSport($data["id_sport"]));
                break;

            case 'deleteExperience':
                echo json_encode($coach->deleteExperience($data["id_sport"]));
                break;

            case 'getSportsCoach':
                echo json_encode(['data' => $coach->getSportCoachConnected()]);
                break;

            case 'getExperiences':
                echo json_encode(['data' => $coach->getExperienceCoachConnected()]);
                break;

            default:
                echo json_encode(['success' => false, 'message' => "Action inconnue"]);
        }
    }




    public function logout()
    {
        session_destroy();
        header('Location: /');
    }
}