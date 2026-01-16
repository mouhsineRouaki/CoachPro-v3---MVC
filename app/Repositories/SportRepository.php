<?php 
class SportRepository{

    public function __construct(){

    }

    public function getAllSports(){
        $db  = Database::getInstance()->getConnection();
        $stmt = $db->prepare("select * from sport");
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        $list = [];
        foreach($result as $s){
            $list[] = new Sport($s["id_sport"] , $s["nom_sport"]);
        }
        return $list;
    }
    public  function getNombreCoachParSport($sport){
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT count(*) as total  FROM coach c
            INNER JOIN coach_sport cs ON c.id_coach = cs.id_coach
            INNER JOIN sport s on s.id_sport = cs.id_sport 
            WHERE s.nom_sport = ?");
        $stmt->execute([$sport]);
        return  $stmt->fetch(PDO::FETCH_ASSOC)["total"];
    }
    public  function getSportById($id_sport){
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT count(*) as total  FROM coach c
            INNER JOIN coach_sport cs ON c.id_coach = cs.id_coach
            INNER JOIN sport s on s.id_sport = cs.id_sport 
            WHERE s.nom_sport = ?");
        $stmt->execute([$id_sport]);
        return  $stmt->fetch(PDO::FETCH_ASSOC)["total"];
    }
}