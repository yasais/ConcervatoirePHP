<?php 

class generationPdf{

    private $nom;
    private $prenom;
    private $dateinscription;

    public function __constructGenerationPdf($nom, $prenom, $dateinscription){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateinscription = $dateinscription;
    }
    public function __construct() {
        $args = func_get_args();
        call_user_func_array(array($this, '__constructGenerationPdf'), $args);
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getDate_inscription(){
        return $this->dateinscription;
    }

    public static function recupEleveSeance($numsceance){
        $stmt = MonPdo::getInstance()->prepare(
            "SELECT p.nom, p.prenom, i.DATEINSCRIPTION
            FROM eleve e
            JOIN personne p ON e.IDELEVE = p.ID
            JOIN inscription i ON i.IDELEVE = p.ID
            WHERE i.NUMSEANCE = :numsceance"
        );

        $stmt->bindParam(':numsceance', $numsceance, PDO::PARAM_INT);
        $stmt->execute();
        $lesResultats = $stmt->fetchAll(PDO::FETCH_FUNC, function ( $nom, $prenom, $dateinscription) {
            return new generationPdf( $nom, $prenom, $dateinscription);
        });
        return $lesResultats;
    }



}



?>