<?php
$action = $_GET["action"];

switch($action){
    case "formulaire":
        include("vues/formAdmin.php");
    break;

    case "verif":
        $rep=Admin::verifier($_POST["login"],$_POST["mdp"]);

        if ($rep==true){
            $_SESSION["authorisation"]="OK";
           
            $lesEleves=Eleve::getLesEleves();
            
            $lesSeances = Seance::getLesSeances();
           
            include ("vues/accueilAdmin.php");
        }
        else
        {
            include ("vues/echecRecherche.php");
        }
    break;

    case "deconnexion":
        include("vues/accueil.php");
    break;

    case "inscription":
        include("vues/inscription.php");
    break;

    case "inscri":
        $NOM = $_POST['nom'];
        $PRENOM = $_POST['prenom'];
        $TEL = $_POST['tel'];
        $MAIL = $_POST['mail'];
        $ADRESSE = $_POST['adresse'];
        $BOURSE = $_POST['bourse'];

       //echo $BOURSE;
    
        // appel de la méthode ajouterPersonne de la classe Personne pour ajouter la personne
        $idPersonne = Personne::ajouterPersonne($NOM, $PRENOM, $TEL, $MAIL, $ADRESSE);
        $eleve= Eleve::ajouterEleve($idPersonne, $BOURSE);
        // création d'un objet Eleve avec l'ID de la personne et la bourse
        //$eleve = new Eleve($idPersonne, $BOURSE);
        // appel de la méthode ajouterEleve de la classe Eleve pour ajouter l'élève
       // $eleve->ajouterEleve();
    
        // Afficher une vue pour confirmer l'ajout de l'adhérent
        include 'vues/confirmation.php';
    break;

    case "accueilAdmin";
        $lesSeances = Seance::getLesSeances();
        include "vues/accueilAdmin.php";
    break;

    case "listeEleve";
        $lesEleves=Eleve::getLesEleves();
        include "vues/listeEleve.php";
    break;

    case "supprimerEleve":
        $id = intval($_GET['id']);
        Eleve::supprimerEleve($id);
        $lesEleves=Eleve::getLesEleves();
        include "vues/listeEleve.php";
    break;

    case "listeProf";
        $lesProfs=Prof::getLesProfs();
        include "vues/listeProf.php";
    break;

    case"ajouterunProf";
        include "vues/ajouterProf.php";
    break;

    case "ajouterProf";
        $NOM = $_POST['nom'];
        $PRENOM = $_POST['prenom'];
        $TEL = $_POST['tel'];
        $MAIL = $_POST['mail'];
        $ADRESSE = $_POST['adresse'];
        $instru = $_POST['instru'];
        $salaire = $_POST['salaire'];

        $idPersonne = Personne::ajouterPersonne($NOM, $PRENOM, $TEL, $MAIL, $ADRESSE);
        $prof= Prof::ajouterProf($idPersonne, $instru, $salaire);




        include "vues/confirmationProf.php";
    break;

    //getLesSeances
    case "listeSeance";
        $lesSeances=Seance::getLesSeances();
        include "vues/listeSeance.php";
    break;

    case "supprimerProf":
        $id = intval($_GET['id']);
        Prof::supprimerProf($id);
        $lesProfs = Prof::getLesProfs(); // Assumant que vous avez une méthode pour récupérer la liste des professeurs
        include "vues/listeProf.php";
    break;


    case "supprimerSeance":
        $numsceance = intval($_GET['numsceance']);
        Seance::supprimerSeance($numsceance);
            
        // Récupère à nouveau la liste des séances après la suppression
        $lesSeances = Seance::getLesSeances();
        include "vues/listeSeance.php";
    break;


        //utiliser ajouterEleveDansUneSeance
    case "ajouterEleveCour":
        $jour = $_POST["jour"];
        $tranche = $_POST["tranche"];
        $idProf = $_POST["idProf"];
        $numseance = $_POST["numseance"];
        $traiterTranche = explode("h", $tranche);
        $heureDebut = $traiterTranche[0];
        $traiterTrancheFin = explode("-",$traiterTranche[1]);
        $heureFin=$traiterTrancheFin[1];
        $lesElevesExclus = Seance::ElevesExclus($jour, $heureDebut, $heureFin);
        $lesEleves = Seance::getLesEleves();
        $lesElevesTotal = array();
        foreach($lesEleves as $unEleve){

            $compteur = 0;
            foreach($lesElevesExclus as $unEleveExclus){
                if($unEleve->getId() != $unEleveExclus->getId()){
                    $compteur++;
                }

            }
            if($compteur == count($lesElevesExclus)){
                array_push($lesElevesTotal, $unEleve); 
            }
        }


        include "vues/ajouterEleveCour.php";
    break;

    //ajouter une seance
    case "ajouteruneSeance":
        // Récupérer les données du formulaire
        $idProf = $_POST["idProf"];
        $numSeance = $_POST["numSeance"];
        $tranche = $_POST["tranche"];
        $jour = $_POST["jour"];
        $niveau = $_POST["niveau"];
        $capacite = $_POST["capacite"];

        // Appeler la méthode pour ajouter la séance
       Seance::ajouterSeance($idProf, $numSeance, $tranche, $jour, $niveau, $capacite);

        // Rediriger vers une page de confirmation ou une autre action
        include "vues/listeSeance.php";
    break;

    case"allerVersAjoutseance":
        $idProf = $_POST["idProf"];
        $lesProfs=Prof::getLesProfs();
        include "vues/ajouterUneSeanceDuProf.php";
    break;

    case"ajouterSeance";
        $lesProfs=Prof::getLesProfs();
            include "vues/ajouterUneSeance.php";
    break;

    case"infoSeance";

        $numsceance = $_POST["numsceance"]; 
        $Seanceinfo=Seance::getInfoSeance($numsceance);
        $SeanceEleve=Seance::recupEleveSeance($numsceance);
        include "vues/infoSeance.php";

    break;

    case"suppEleveSeance";
        $numsceance = $_POST["numsceance"]; 
        $id = $_POST["id"]; 
        Seance::suppEleveSeance($id, $numsceance);
        $Seanceinfo=Seance::getInfoSeance($numsceance);
        $SeanceEleve=Seance::recupEleveSeance($numsceance);
        include "vues/infoSeance.php";
    break;

    //ajouter un eleve dans une seance
    case"insertionEleve";
        $numseance = $_POST["numseance"]; 
        $idEleve = $_POST["idEleve"];
        $idProf = $_POST["idProf"]; 
        Seance::insertionEleveDansUneSeance($idProf, $idEleve, $numseance);
        $Seanceinfo=Seance::getInfoSeance($numseance);
        $SeanceEleve=Seance::recupEleveSeance($numseance);
        include "vues/infoSeance.php";
    break;

    case"lesTranchesHoraires";
        $jour = $_POST["jour"];
        $tranche = $_POST["tranche"];
        $idProf = $_POST["idProf"];
        $traiterTranche = explode("h", $tranche);
        $heureDebut = $traiterTranche[0];
        $traiterTrancheFin = explode("-",$traiterTranche[1]);
        $heureFin=$traiterTrancheFin[1];
        $lesTranchesHoraires = heure::allHoraire();
        $lesTranchesHorairesExclus = heure::trancheDispo($idProf, $jour, $heureDebut, $heureFin);
        $lesTranchesHorairesTotal = array();
        foreach($lesTranchesHoraires as $uneTranche){
            $compteur = 0;
            foreach($lesTranchesHorairesExclus as $uneTrancheExclus){

                if($uneTranche->getHoraire() != $uneTrancheExclus->getHoraire()){
                    $compteur++;
                }
            }
            if($compteur == count($lesTranchesHorairesExclus)){

                array_push($lesTranchesHorairesTotal, $uneTranche); 

            }
            }
        break;
        
        case "ajouterTrancheDesSeances":
                $jour = $_POST["jour"];
                $idProf = $_POST["idProf"];
                $lesTranchesHoraires = heure::allHoraire();
                $lesTranchesHorairesDisponibles = array();
                
                foreach($lesTranchesHoraires as $trancheArray){
                    $uneTranche = $trancheArray['TRANCHE'];
                    $traiterTranche = explode("h", $uneTranche);
                    $heureDebut = $traiterTranche[0];
                    $traiterTrancheFin = explode("-",$traiterTranche[1]);
                    $heureFin=$traiterTrancheFin[1];
                    $lesTranchesHorairesExclus = heure::trancheDispo($idProf, $jour, $heureDebut, $heureFin);
                    $count = $lesTranchesHorairesExclus[0]['COUNT(*)'];
                    if($count == 0){

                        array_push($lesTranchesHorairesDisponibles, $uneTranche); 

                    }
                }
                
                    

            include "vues/ajouterTrancheProfSeance.php";
        break;

            
        case "validerNouvelleSeance":
            $idProf = $_POST["idProf"];
            $jour = $_POST["jour"];
            $tranche = $_POST["tranche"];
            $niveau = $_POST["niveau"];
            $capacite = $_POST["capacite"];
            $numSeance = Seance::getLastSeanceId(); // récupérer le dernier ID et ajouter 1
            Seance::ajouterSeance($idProf, $numSeance, $tranche, $jour, $niveau, $capacite);
            $lesSeances = Seance::getLesSeances(); // ajouter cette ligne pour récupérer la nouvelle liste des séances
            include "vues/listeSeance.php";
        break;    
}
?>