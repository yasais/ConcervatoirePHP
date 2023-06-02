

<?php include "vues/entete.php";?>

<!-- navbar bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" >Melodia Musique</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php?uc=admin&action=accueilAdmin">Accueil</a>
        <a class="nav-link" href="index.php?uc=admin&action=listeProf">Professeurs</a>
        <a class="nav-link" href="index.php?uc=admin&action=listeEleve">Eleves</a>
        <a class="nav-link" href="index.php?uc=admin&action=listeSeance">Les Séances</a>
        <a class="nav-link" href="index.php?uc=admin&action=inscription">Inscription d'adhérent</a>
        <a class="nav-link" href="index.php?uc=admin&action=ajouterunProf">Inscription d'un professeur</a>
        <!--<a class="nav-link" href="index.php?uc=admin&action=supprimer">Supprimer</a>-->
      </div>
    </div>
  </div>
</nav>


</nav>

<br>
<div class="btn-container1">
  <a href="index.php?uc=admin&action=deconnexion" class="btn1" role="button">Déconnexion Admin</a>
</div>

<div class="welcome-banner">
    <h1>Bienvenue</h1>
</div>

<h1 class="text-center"> Voici la liste des séances </h1><br>

<div class="container">
    <div class="row">
        <?php
        // Tri des séances par numéro de séance croissant
        usort($lesSeances, function ($a, $b) {
            return $a->getNumSceance() - $b->getNumSceance();
        });
        
        foreach ($lesSeances as $seance) :
        ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Séance #<?php echo htmlspecialchars($seance->getNumSceance()); ?></h5>
                        <p class="card-text">Professeur : <?php echo htmlspecialchars($seance->getProf_nom()) . " " . htmlspecialchars($seance->getProf_prenom()); ?></p>
                        <p class="card-text">Instrument : <?php echo htmlspecialchars($seance->getInstrument()); ?></p>
                        <p class="card-text">Jour : <?php echo htmlspecialchars($seance->getJour()); ?></p>
                        <p class="card-text">Tranche horaire : <?php echo htmlspecialchars($seance->getTranche()); ?></p>
                        <p class="card-text">Niveau : <?php echo htmlspecialchars($seance->getNiveau()); ?></p>
                        <p class="card-text">Capacité : <?php echo htmlspecialchars($seance->getCapacite()); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php include "vues/piedpage.php";?>



