<?php
    class Prof
    {
        private $IDPROF;
        private $nom;
        private $prenom;
        private $tel;
        private $mail;
        private $adresse;
        private $instrument;
        private $salaire;

        public function __constructProf($id, $nom, $prenom, $tel, $mail, $adresse, $instrument, $salaire)
        {
            $this->IDPROF = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->tel = $tel;
            $this->mail = $mail;
            $this->adresse = $adresse;
            $this->instrument = $instrument;
            $this->salaire = $salaire;
        }

        //getters et setters
        public function getId()
        {
            return $this->IDPROF;
        }


        public function getNom()
        {
            return $this->nom;
        }

        

        public function getPrenom()
        {
            return $this->prenom;
        }

       
        public function getTel()
        {
            return $this->tel;
        }



        public function getMail()
        {
            return $this->mail;
        }

   

        public function getAdresse()
        {
            return $this->adresse;
        }


        public function getInstru()
        {
            return $this->instrument;
        }

    
        public function getSalaire()
        {
            return $this->salaire;
        }



        //fonctions

        public static function getLesProfs()
        {
            $stmt =  MonPdo::getInstance()->prepare("SELECT IDPROF, nom, prenom, tel, mail, adresse, instrument, salaire FROM prof JOIN personne ON prof.IDPROF = personne.ID");
            $stmt-> setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Prof');
            $stmt->execute();
            $lesResultats=$stmt->fetchAll();
            return $lesResultats;
        }



        public static function ajouterProf()
        {

            $idPersonne = MonPdo::getInstance()->lastInsertId();

            $req = MonPdo::getInstance()->prepare("INSERT INTO prof (IDPROF, INSTRUMENT, SALAIRE) VALUES (:id, :instru, :salaire)");
            $req->bindParam(':id', $idPersonne);
            $req->bindParam(':instru', $_POST['instru']);
            $req->bindParam(':salaire', $_POST['salaire']);
            $req->execute();
        }

        public static function getInstruments() {
            $req = MonPdo::getInstance()->prepare("SELECT libelle FROM instrument");
            $req->execute();
            $instruments = $req->fetchAll(PDO::FETCH_COLUMN);
            return $instruments;
        }

        public static function supprimerProf($id) {
            $req = MonPdo::getInstance()->prepare("DELETE p, pr FROM prof pr JOIN personne p ON pr.IDPROF = p.ID WHERE pr.IDPROF = :id");
            $req->bindParam(':id', $id);
            $req->execute();
        }

        public static function modifierProf($id) {
            $req = MonPdo::getInstance()->prepare("UPDATE personne SET nom = :nom, prenom = :prenom, tel = :tel, mail = :mail, adresse = :adresse WHERE ID = :id");
            $req->bindParam(':id', $id);
            $req->bindParam(':nom', $_POST['nom']);
            $req->bindParam(':prenom', $_POST['prenom']);
            $req->bindParam(':tel', $_POST['tel']);
            $req->bindParam(':mail', $_POST['mail']);
            $req->bindParam(':adresse', $_POST['adresse']);
            $req->execute();

            $req = MonPdo::getInstance()->prepare("UPDATE prof SET instrument = :instru, salaire = :salaire WHERE IDPROF = :id");
            $req->bindParam(':id', $id);
            $req->bindParam(':instru', $_POST['instru']);
            $req->bindParam(':salaire', $_POST['salaire']);
            $req->execute();
        }

    }
?>

