<?php


class Personne{
  

    protected $nom;
    protected $prenom;
    protected $tel;
    protected $mail;
    protected $adresse;

	protected $id;



	public function __construct($nom,$prenom,$tel,$mail,$adresse,$id){
     $this->nom=$nom;
     $this->prenom=$prenom;
     $this->tel=$tel;
     $this->mail=$mail;
     $this->adresse=$adresse;
	 $this->id=$id;
    
    }

	/**
	 * @return mixed
	 */
	public function getMail() {
		return $this->mail;
	}
	
	/**
	 * @param mixed $mail 
	 * @return self
	 */
	public function setMail($mail): self {
		$this->mail = $mail;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAdresse() {
		return $this->adresse;
	}
	
	/**
	 * @param mixed $adresse 
	 * @return self
	 */
	public function setAdresse($adresse): self {
		$this->adresse = $adresse;
		return $this;
	}

	/**
	 * @return mixed
	 */


	/**
	 * @return mixed
	 */
	public function getNom() {
		return $this->nom;
	}

	/**
	 * @param mixed $nom 
	 * @return self
	 */
	public function setNom($nom): self {
		$this->nom = $nom;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPrenom() {
		return $this->prenom;
	}

	/**
	 * @param mixed $prenom 
	 * @return self
	 */
	public function setPrenom($prenom): self {
		$this->prenom = $prenom;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTel() {
		return $this->tel;
	}

	/**
	 * @param mixed $tel 
	 * @return self
	 */
	public function setTel($tel): self {
		$this->tel = $tel;
		return $this;
	}
	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}





    public static function ajouterPersonne($nom,$prenom,$tel,$mail,$adresse){
        $req=MonPdo::getInstance()->prepare("insert into personne (nom,prenom,tel,mail,adresse) values (:nom,:prenom,:tel,:mail,:adresse)");
     
        $req->bindParam('nom',$nom);
        $req->bindParam('prenom',$prenom);
        $req->bindParam('tel',$tel);
        $req->bindParam('mail',$mail);
        $req->bindParam('adresse',$adresse);
        $req->execute();

        $id = MonPdo::getInstance()->lastInsertId();

        $_SESSION['id'] = $id; // Stocker l'ID dans une variable de session
    
        return $id;
    }



    




}






?>