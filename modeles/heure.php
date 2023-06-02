<?php

class Heure{

    private $tranche;


    public function __construct($tranche){
        $this->tranche=$tranche;
    }

    public function getTranche(){
        return $this->tranche;
    }

    public function setTranche($tranche){
        $this->tranche=$tranche;
    }

    public static function allHoraire() {
        $stmt =  MonPdo::getInstance()->prepare("SELECT * FROM heure");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function trancheDispo($idProf, $jour, $heureDebut, $heureFin) {
        $stmt =  MonPdo::getInstance()->prepare(
        "SELECT COUNT(*) 
        FROM seance S 
        WHERE S.JOUR = :jour 
        AND S.IDPROF = :idProf 
        AND	( 
                ((SELECT SUBSTRING_INDEX(S.TRANCHE, 'h', 1))<=(SELECT CAST(:heureDebut AS INT)) 

                    AND( SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(S.TRANCHE, 'h', 2), '-', -1)) <= (SELECT CAST( :heureFin AS INT)) 
                    AND (SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(S.TRANCHE, 'h', 2), '-', -1)) > (SELECT CAST( :heureDebut AS INT))) 
                OR 
                ((SELECT SUBSTRING_INDEX(S.TRANCHE, 'h', 1))>=(SELECT CAST(:heureDebut AS INT)) 
                    AND( SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(S.TRANCHE, 'h', 2), '-', -1)) >= (SELECT CAST( :heureFin AS INT)) 
                    AND (SELECT SUBSTRING_INDEX(S.TRANCHE, 'h', 1)) < (SELECT CAST( :heureFin AS INT)))  
                 OR 

                 ((SELECT SUBSTRING_INDEX(S.TRANCHE, 'h', 1))<=(SELECT CAST(:heureDebut AS INT)) 
                   AND( SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(S.TRANCHE, 'h', 2), '-', -1)) >= (SELECT CAST( :heureFin AS INT))) 


                 OR 

                 ((SELECT SUBSTRING_INDEX(S.TRANCHE, 'h', 1))>=(SELECT CAST(:heureDebut AS INT)) 
                   AND( SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(S.TRANCHE, 'h', 2), '-', -1))<= (SELECT CAST( :heureFin AS INT))) 
              )");
        $stmt->bindParam(':idProf', $idProf);
        $stmt->bindParam(':jour', $jour);
        $stmt->bindParam(':heureDebut', $heureDebut);
        $stmt->bindParam(':heureFin', $heureFin);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>