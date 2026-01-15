<?php 
class Disponibilite{
    private $id_coach  ;
    private $id_disponibilite  ;
    private $date ;
    private $heure_debut ;
    private $heure_fin ;
    private PDO $db; 
    public function __construct($id_disponibilite,$id_coach,$date,$heure_debut,$heure_fin){
        $this->db = Database::getInstance()->getConnection();
        $this->id_coach = $id_coach;
        $this->id_disponibilite = $id_disponibilite;
        $this->date = $date;
        $this->heure_debut = $heure_debut;
        $this->heure_fin = $heure_fin;
    }
    public function setDate($newDate){
        $this->date = $newDate;
    }
    public function setHeureDebut($newHeureDebut){
        $this->heure_debut = $newHeureDebut;
    }
    public function setHeureFin($newHeureFin){
        $this->heure_fin = $newHeureFin;
    }
     public  function ajouterDisponibilite(){
        $stmtCheck  = $this->db->prepare("select * from disponibilite where id_coach = ? and date = ? and (?<heure_fin and  ?>heure_debut)");
        $stmtCheck->execute([$this->id_coach, $this->date , $this->heure_debut , $this->heure_fin]);
        $result = $stmtCheck->fetchAll(PDO::FETCH_ASSOC);
        if(!$result){
            $stmt = $this->db->prepare("insert into disponibilite (id_coach, date, heure_debut, heure_fin, isreserved) values ( ?,?,?,?,false)");
            if($stmt->execute([$this->id_coach , $this->date  , $this->heure_debut , $this->heure_fin])){
                return ['success' => true,'message' => 'Disponibilité ajoutee avec succès'];
            }else{
                return ['success' => false,'message' => 'erreur de ajout '];
            }
        }else{
            return ['success' => false,'message' => 'Créneau déjà existant ou chevauchement détecté'];
        }  
    }
    public function modifierDisponibilite(){
        $stmtCheck  = $this->db->prepare("select * from disponibilite where id_coach = ? and date = ? and (? <  heure_fin and  ? > heure_debut)");
        $stmtCheck->execute([$this->id_coach, $this->date , $this->heure_debut , $this->heure_fin]);
        $result = $stmtCheck->fetchAll(PDO::FETCH_ASSOC);
        if(!$result){
            $stmt = $this->db->prepare("update disponibilite set 
            date = ? , 
            heure_debut = ?,
            heure_fin = ? 
            where id_disponibilite = ?
            ");
            if($stmt->execute([$this->date  , $this->heure_debut , $this->heure_fin , $this->id_disponibilite])){
                return ['success' => true,'message' => 'Disponibilité ajoutee avec succès'];
            }else{
                return ['success' => false,'message' => 'erreur de ajout '];
            }
        }else{
            return ['success' => false,'message' => 'Créneau déjà existant ou chevauchement détecté'];
        }  
    }
    public function supprimerDisponibilite(){
        $stmtCheck  = $this->db->prepare("delete from disponibilite where id_disponibilite = ? ");
        if($stmtCheck->execute([$this->id_disponibilite])){
                return ['success' => true,'message' => 'Disponibilité supprimer avec succès'];
        }  
    }
    public static function getDisponibiliteById($id_disponibilite){
        $db = Database::getInstance()->getConnection();
        $stmtCheck  = $db->prepare("SELECT * from disponibilite where id_disponibilite = ? ");
        $stmtCheck->execute([$id_disponibilite]);
        return  $stmtCheck->fetch(PDO::FETCH_ASSOC);
    } 

}