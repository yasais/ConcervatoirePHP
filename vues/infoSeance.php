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

<br><br>

<div class="container">
    <div class="row">
    <?php
    foreach ($Seanceinfo as $seance) :
        ?>
            <div class="cardInfo" style="border: 8px solid #DFE3E6; width: 25%; padding-top: 2%; padding-left: 2%; margin-left: auto; margin-right: auto;">
                        <h5 class="card-title">Séance #<?php echo htmlspecialchars($seance->getNumSceance()); ?></h5>
                        <p class="card-text">Professeur : <?php echo htmlspecialchars($seance->getProf_nom()) . " " . htmlspecialchars($seance->getProf_prenom()); ?></p>
                        <p class="card-text">Instrument : <?php echo htmlspecialchars($seance->getInstrument()); ?></p>
                        <p class="card-text">Jour : <?php echo htmlspecialchars($seance->getJour()); ?></p>
                        <p class="card-text">Tranche horaire : <?php echo htmlspecialchars($seance->getTranche()); ?></p>
                        <p class="card-text">Niveau : <?php echo htmlspecialchars($seance->getNiveau()); ?></p>
                        <p class="card-text">Capacité : <?php echo htmlspecialchars($seance->getCapacite()); ?></p>
                        <p class="card-text">Nombre d'élève inscrit : <?php echo htmlspecialchars($seance->getNb_eleve()); ?></p>

                        <form action="index.php?uc=admin&action=ajouterEleveCour" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="tranche" value=<?php echo htmlspecialchars($seance->getTranche()); ?>>
                        <input type="hidden" name="numseance" value=<?php echo htmlspecialchars($seance->getNumSceance()); ?>>
                        <input type="hidden" name="idProf" value=<?php echo htmlspecialchars($seance->getId()); ?>>
                        <?php
                        if($seance->getCapacite() == $seance->getNb_eleve()){
                          ?>
                          <p style="color:red;">Le cours est complet !</p>
                          <button hidden type="text" class="btn" name="jour" value=<?php echo htmlspecialchars($seance->getJour()); ?>  style="background-color: #DADADA; border-color: #DADADA; border-radius: 0; color:red;">Ajouter des élèves </button>
                          <?php
                        }
                        else{
                          ?>
                          <button type="submit" class="btn" name="jour" value=<?php echo htmlspecialchars($seance->getJour()); ?>  style="background-color: #BEF0C2; color:black; border-radius: 0;">Ajouter des élèves </button> <br><br>
                        <?php
                        }
                        ?>
                        
                    </form>    

                
    </div>
    <?php endforeach; ?>
    
</div>
</div>
<br><br>

<h1 class="text-center">La liste des élèves du cours</h1><br>

<div class="container">
    <div class="row">
        <?php foreach ($SeanceEleve as $eleve) : ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($eleve->getPrenom()) . " " . htmlspecialchars($eleve->getNom()); ?></h5>
                        <p class="card-text">Téléphone : <?php echo htmlspecialchars($eleve->getTel()); ?></p>
                        <p class="card-text">Email : <?php echo htmlspecialchars($eleve->getMail()); ?></p>
                        <p class="card-text">Adresse : <?php echo htmlspecialchars($eleve->getAdresse()); ?></p>
                        
                        <form action="index.php?uc=admin&action=suppEleveSeance" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="id" value="<?php echo htmlspecialchars($eleve->getId()); ?>">
                          <button type="submit" class="btn" name="numsceance" value=<?php echo htmlspecialchars($seance->getNumSceance()); ?>  style="background-color: #FF7676; border-color: #DADADA; border-radius: 0; color:black;">Supprimer l'élève du cours </button>
                          

                        </form>
                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include "vues/piedpage.php";?>