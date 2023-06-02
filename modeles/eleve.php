<?php


class Eleve extends Personne{

    protected $bourse;
    
    
    public function __constructEleve($nom, $prenom, $tel, $mail, $id, $adresse, $bourse) {
        parent::__construct($nom, $prenom, $tel, $mail, $adresse, $id);
       
        $this->bourse = $bourse;
    }
    
    
    /**
	 * @return mixed
	 */
	public function getBourse() {
		return $this->bourse;
	}
	
	/**
	 * @param mixed $bourse 
	 * @return self
	 */
	public function setBourse($bourse): self {
		$this->bourse = $bourse;
		return $this;
	}

    public static function ajouterEleve() {
        //$idPersonne = parent::ajouterPersonne($this->nom, $this->prenom, $this->tel, $this->mail, $this->adresse);

        $req = MonPdo::getInstance()->prepare("INSERT INTO eleve (IDELEVE, BOURSE) VALUES (:id, :bourse)");
        $req->bindParam(':id', $_SESSION['id']);
        $req->bindParam(':bourse', $_POST['bourse']);
        $req->execute();
    }

    public static function getLesEleves() {
        $stmt =  MonPdo::getInstance()->prepare("SELECT p.ID as id, nom, prenom, tel, mail, adresse, bourse FROM eleve JOIN personne p ON eleve.IDELEVE = p.ID");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //supprimer un eleve
    public static function supprimerEleve($id) {
        $req = MonPdo::getInstance()->prepare("DELETE e, p FROM eleve e JOIN personne p ON e.IDELEVE = p.ID WHERE e.IDELEVE = :id");
        $req->bindParam(':id', $id);
        $req->execute();
    }

    //Qwr4HYJ5nqePhF


	
}











?>