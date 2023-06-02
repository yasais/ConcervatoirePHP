<?php

include "modeles/monPdo.php";
include "modeles/admin.php";
include "modeles/personne.php";
include "modeles/eleve.php";
include "modeles/Prof.class.php";
include "modeles/seance.php";
include "modeles/generationPdf.php";
include "modeles/heure.php";


if(empty($_GET["uc"])){
    $uc="accueil";
}else{
    $uc=$_GET["uc"];
}


switch($uc){
    case "accueil";
        include "vues/accueil.php";
    break;
    
    case "admin";
        include "controleurs/controleurAdmin.php";
    break;

    case "supprimerSeance":
        include "controleurs/controleurSeance.php"; 
    break;

    case "pdf":
        include "controleurs/controleurPDF.php";
        break;
    
    
}







?>