<?php
session_start();
$action=$_GET['action'];

switch($action){
    case"creationPdf":
        if($_SESSION["authorisation"]!="OK"){
            include("vues/formAdmin.php");
        }
        else{

        $numsceance = $_POST["numsceance"];
        $recuperationInfosSeance = seance::getInfoSeance($numsceance);
        $listeEleveSeance = generationPdf::recupEleveSeance($numsceance);
        include ("vues/pdf.php");
    }
        break;      
}
?>