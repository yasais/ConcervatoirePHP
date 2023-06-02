<?php
$action=$_GET['action'];

switch($action){
    case"creationPdf":

        $numsceance = $_POST["numsceance"];
        $recuperationInfosSeance = seance::getInfoSeance($numsceance);
        $listeEleveSeance = generationPdf::recupEleveSeance($numsceance);
        include ("vues/pdf.php");
        break;      
}
?>