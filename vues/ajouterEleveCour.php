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

<h1 class="text-center"> Les élèves disponibles </h1><br><br>

<div class="container">
    <div class="row">
        <?php foreach ($lesElevesTotal as $eleve) : ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($eleve->getPrenom()) . " " . htmlspecialchars($eleve->getNom()); ?></h5>
                        <p class="card-text">Téléphone : <?php echo htmlspecialchars($eleve->getTel()); ?></p>
                        <p class="card-text">Email : <?php echo htmlspecialchars($eleve->getMail()); ?></p>
                        <p class="card-text">Adresse : <?php echo htmlspecialchars($eleve->getAdresse()); ?></p>
                        <form action="index.php?uc=admin&action=insertionEleve" method="post">
                            <input type="hidden" name="idEleve" value="<?php echo htmlspecialchars($eleve->getId()); ?>">
                            <input type="hidden" name="numseance" value="<?php echo htmlspecialchars($numseance); ?>">
                            <input type="hidden" name="idProf" value="<?php echo htmlspecialchars($idProf); ?>">
                            <button type="submit" class="btn"  style="background-color: #DADADA; border-color: #DADADA; border-radius: 0; color:#139B17;">Ajouter cet élève </button>
                        </form>
                        
                       
                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<h1 class="text-center"> Les élèves indisponibles </h1><br><br>

<div class="container">
    <div class="row">
        <?php foreach ($lesElevesExclus as $eleve) : ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($eleve->getPrenom()) . " " . htmlspecialchars($eleve->getNom()); ?></h5>
                        <p class="card-text">Téléphone : <?php echo htmlspecialchars($eleve->getTel()); ?></p>
                        <p class="card-text">Email : <?php echo htmlspecialchars($eleve->getMail()); ?></p>
                        <p class="card-text">Adresse : <?php echo htmlspecialchars($eleve->getAdresse()); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include "vues/piedpage.php";?>