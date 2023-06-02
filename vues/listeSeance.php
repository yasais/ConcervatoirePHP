<?php include "vues/entete.php";?>

<!-- navbar bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Melodia Musique</a>
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

<br>
<div class="btn-container1">
 
<a class="btn1" href="index.php?uc=admin&action=ajouterSeance">Ajouter une seance</a>
</div>

<h1 class="text-center"> Voici la liste des séances </h1><br>


<br><br>
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
                        
                        <?php 
                        if($seance->getNb_eleve() != 0 ){
                          ?><form class="form" action="index.php?uc=pdf&action=creationPdf" target="_blank" method="POST" enctype= "multipart/form-data">

                            <input type="hidden" name="numsceance" value = <?php echo htmlspecialchars($seance->getNumSceance()); ?> class="form-control">

                            <button type="submit" class="bouttonPdf">Générer le PDF</button> <br><br>

                            </form>
                          <?php
                        }
                        else{
                          ?>
                          <p style="color:#791AD3 ; text-decoration: underline #FF3028;">Aucun élèves inscrit</p>
                          <?php
                        } ?>
                        <form action="index.php?uc=admin&action=infoSeance" method="POST" enctype="multipart/form-data">
                          
                          <button type="submit" class="btn" name="numsceance" value=<?php echo htmlspecialchars($seance->getNumSceance()); ?>  style="background-color: #BEF0C2; color:black;  border-radius: 0;">Plus d'informations </button>
                          

                        </form>
                        <br>
                        <a type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette séance ?');" href="index.php?uc=supprimerSeance&numsceance=<?php echo htmlspecialchars($seance->getNumSceance()); ?>" class="btn" role="button" style="background-color: #FF7676; border-color: #DADADA; border-radius: 0; color: black;">Supprimer la seance</a>                        

                        
                      
                      
                      
                      
                      
                      </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include "vues/piedpage.php";?>