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
}