<?php 
//class seance
class Seance{

        private $id;
        private $numsceance;
        private $tranche;
        private $jour;
        private $niveau;
        private $capacite;
        private $prof_nom;
        private $prof_prenom;
        private $instrument;
        private $nb_eleve;

        public function __constructSeance($id,$numsceance,$tranche,$jour,$niveau,$capacite,$prof_nom,$prof_prenom,$instrument,$nb_eleve){
            $this->id=$id;
            $this->numsceance=$numsceance;
            $this->tranche=$tranche;
            $this->jour=$jour;
            $this->niveau=$niveau;
            $this->capacite=$capacite;
            $this->prof_nom=$prof_nom;
            $this->prof_prenom=$prof_prenom;
            $this->instrument=$instrument;
            $this->nb_eleve=$nb_eleve;
        }

        

        public function __construct() {
            $args = func_get_args();
            call_user_func_array(array($this, '__constructSeance'), $args);
        }
        

        public function getId(){
            return $this->id;
        }

        public function getNumSceance(){
            return $this->numsceance;
        }

        public function getTranche(){
            return $this->tranche;
        }

        public function getJour(){
            return $this->jour;
        }

        public function getNiveau(){
            return $this->niveau;
        }

        public function getCapacite(){
            return $this->capacite;
        }

        public function setId($id){
            $this->id=$id;
        }

        public function setNumSceance($numsceance){
            $this->numsceance=$numsceance;
        }

        public function setTranche($tranche){
            $this->tranche=$tranche;
        }

        public function setJour($jour){
            $this->jour=$jour;
        }

        public function setNiveau($niveau){
            $this->niveau=$niveau;
        }



        public function setCapacite($capacite){
            $this->capacite=$capacite;
        }

        public function getProf_nom(){
            return $this->prof_nom;
        }

        public function getProf_prenom(){
            return $this->prof_prenom;
        }

        public function setProf_nom($prof_nom){
            $this->prof_nom=$prof_nom;
        }

        public function setProf_prenom($prof_prenom){
            $this->prof_prenom=$prof_prenom;
        }

        public function getInstrument(){
            return $this->instrument;
        }

        public function setInstrument($instrument){
            $this->instrument=$instrument;
        }

        public function getNb_eleve(){
            return $this->nb_eleve;
        }

        public function setNb_eleve($nb_eleve){
            $this->nb_eleve=$nb_eleve;
        }

        
        //methode afficher les seances
        public static function getLesSeances()
        {
            $stmt = MonPdo::getInstance()->prepare(
                "SELECT seance.*, personne.NOM, personne.PRENOM, instrument.LIBELLE, COUNT(inscription.NUMSEANCE) AS nb_eleve
                FROM seance
                LEFT JOIN inscription ON seance.NUMSEANCE = inscription.NUMSEANCE
                LEFT JOIN prof ON seance.IDPROF = prof.IDPROF
                LEFT JOIN personne ON prof.IDPROF = personne.ID
                LEFT JOIN instrument ON prof.INSTRUMENT = instrument.LIBELLE
                GROUP BY seance.numseance"
            );

            $stmt->execute();

            // Utilisez une fonction anonyme pour instancier chaque objet Seance avec les données de la requête
            $lesResultats = $stmt->fetchAll(PDO::FETCH_FUNC, function ($id, $numsceance, $tranche, $jour, $niveau, $capacite, $nom, $prenom, $libelle, $nb_eleve) {
                return new Seance($id, $numsceance, $tranche, $jour, $niveau, $capacite, $nom, $prenom, $libelle, $nb_eleve);
            });

            return $lesResultats;
        }

        public static function supprimerSeance($numsceance)
        {
            
                $stmt = MonPdo::getInstance()->prepare("DELETE FROM seance WHERE NUMSEANCE = :numsceance");
                $stmt->bindParam(':numsceance', $numsceance, PDO::PARAM_INT);
                
                $result = $stmt->execute();
           
        }

        //ajouter un eleve a une seance
        public static function ajouterEleveDansUneSeance($idprof, $ideleve, $numseance,)
        {
           
                $stmt = MonPdo::getInstance()->prepare("INSERT INTO inscription (IDPROF, IDELEVE, NUMSEANCE, DATEINSCRIPTION) VALUES (:idprof, :ideleve, :numsceance, NOW())");
                $stmt->bindParam(':numseance', $numseance, PDO::PARAM_INT);
                $stmt->bindParam(':ideleve', $ideleve, PDO::PARAM_INT);
                $stmt->bindParam(':idprof', $idprof, PDO::PARAM_INT);
                
                $result = $stmt->execute();
                
            

        }

        


        //afficher les seances info
        
        public static function getInfoSeance($numsceance){
            $stmt = MonPdo::getInstance()->prepare(
                "SELECT S.IDPROF, S.NUMSEANCE, S.TRANCHE, S.JOUR, S.NIVEAU, S.CAPACITE, P.NOM, P.PRENOM, PR.INSTRUMENT,  COUNT(I.NUMSEANCE) AS nb_eleve
                FROM seance S
                LEFT JOIN inscription I
                ON S.NUMSEANCE = I.NUMSEANCE
                LEFT JOIN personne P
                ON S.IDPROF = P.ID
                LEFT JOIN prof PR
                ON S.IDPROF = PR.IDPROF
                WHERE S.NUMSEANCE = :numsceance"
            );

            $stmt->bindParam(':numsceance', $numsceance, PDO::PARAM_INT);
            $stmt->execute();
            $lesResultats = $stmt->fetchAll(PDO::FETCH_FUNC, function ($id, $numsceance, $tranche, $jour, $niveau, $capacite, $nom, $prenom, $libelle, $nb_eleve) {
                return new Seance($id, $numsceance, $tranche, $jour, $niveau, $capacite, $nom, $prenom, $libelle, $nb_eleve);
            });
            return $lesResultats;
        }

        public static function recupEleveSeance($numsceance){
            $stmt = MonPdo::getInstance()->prepare(
                "SELECT p.nom, p.prenom, p.tel, p.mail, p.adresse, e.IDELEVE
                FROM eleve e
                JOIN personne p ON e.IDELEVE = p.ID
                JOIN inscription i ON i.IDELEVE = p.ID
                WHERE i.NUMSEANCE = :numsceance"
            );

            $stmt->bindParam(':numsceance', $numsceance, PDO::PARAM_INT);
            $stmt->execute();
            $lesResultats = $stmt->fetchAll(PDO::FETCH_FUNC, function ( $nom, $prenom, $tel, $mail, $adresse, $ideleve) {
                return new Eleve( $nom, $prenom, $tel, $mail, $adresse, $ideleve);
            });
            return $lesResultats;
        }
        public static function suppEleveSeance($idEleve, $numsceance)
        {
            
                $stmt = MonPdo::getInstance()->prepare("DELETE FROM inscription WHERE IDELEVE = :ideleve AND NUMSEANCE = :numsceance");
                $stmt->bindParam(':ideleve', $idEleve, PDO::PARAM_INT);
                $stmt->bindParam(':numsceance', $numsceance, PDO::PARAM_INT);
                $stmt->execute();
                
                
        }

        public static function ElevesExclus($jour, $heureDebut, $heureFin){
            $stmt = MonPdo::getInstance()->prepare(
                "SELECT P.NOM, P.PRENOM, P.TEL, P.MAIL, P.ADRESSE,P.ID
                FROM inscription I 
                INNER JOIN seance S ON I.NUMSEANCE = S.NUMSEANCE 
                INNER JOIN personne P ON I.IDELEVE = P.ID 
                WHERE S.jour = :jour 
                AND( 
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
                      )"
            );

            $stmt->bindParam(':jour', $jour, PDO::PARAM_STR);
            $stmt->bindParam(':heureDebut', $heureDebut, PDO::PARAM_STR);
            $stmt->bindParam(':heureFin', $heureFin, PDO::PARAM_STR);
            $stmt->execute();
            $lesResultats = $stmt->fetchAll(PDO::FETCH_FUNC, function ( $nom, $prenom, $tel, $mail, $adresse, $ideleve) {
                return new Eleve( $nom, $prenom, $tel, $mail, $adresse, $ideleve);
            });
            return $lesResultats;
        }

        public static function getLesEleves() {
            $stmt =  MonPdo::getInstance()->prepare("SELECT nom, prenom, tel, mail, adresse, ID FROM personne INNER JOIN eleve ON personne.ID = eleve.IDELEVE");
            $stmt->execute();
            $lesResultats = $stmt->fetchAll(PDO::FETCH_FUNC, function ( $nom, $prenom, $tel, $mail, $adresse, $ideleve) {
                return new Eleve( $nom, $prenom, $tel, $mail, $adresse, $ideleve);
            });
            return $lesResultats;
        }
        public static function insertionEleveDansUneSeance($idProf, $idEleve, $numSeance) {
            //$idPersonne = parent::ajouterPersonne($this->nom, $this->prenom, $this->tel, $this->mail, $this->adresse);
    
            $req = MonPdo::getInstance()->prepare("INSERT INTO `inscription`(`IDPROF`, `IDELEVE`, `NUMSEANCE`, `DATEINSCRIPTION`) VALUES (:idProf, :idEleve, :numSeance, NOW())");
            $req->bindParam(':idProf', $idProf, PDO::PARAM_INT);
            $req->bindParam(':idEleve', $idEleve, PDO::PARAM_INT);
            $req->bindParam(':numSeance', $numSeance, PDO::PARAM_INT);
            $req->execute();
        }
        public static function getLastSeanceId() {
            $req = MonPdo::getInstance()->prepare("SELECT MAX(NUMSEANCE) as maxId FROM seance");
            $req->execute();
            $row = $req->fetch(PDO::FETCH_ASSOC);
            return $row['maxId'] + 1;
        }
        
        public static function ajouterSeance($idProf, $numSeance, $tranche, $jour, $niveau, $capacite) {
            $req = MonPdo::getInstance()->prepare("INSERT INTO `seance`(`IDPROF`, `NUMSEANCE`, `TRANCHE`, `JOUR`, `NIVEAU`, `CAPACITE`) VALUES (:idProf, :numSeance, :tranche, :jour, :niveau, :capacite)");
            $req->bindParam(':idProf', $idProf, PDO::PARAM_INT);
            $req->bindParam(':numSeance', $numSeance, PDO::PARAM_INT);
            $req->bindParam(':tranche', $tranche, PDO::PARAM_STR);
            $req->bindParam(':jour', $jour, PDO::PARAM_STR);
            $req->bindParam(':niveau', $niveau, PDO::PARAM_INT);
            $req->bindParam(':capacite', $capacite, PDO::PARAM_INT);
            $req->execute();
        }
        
        









}



?>
