<?php 
$numsceance = intval($_GET['numsceance']);
Seance::supprimerSeance($numsceance);

// Récupère à nouveau la liste des séances après la suppression
$lesSeances = Seance::getLesSeances();
include "vues/listeSeance.php"; 


?>
