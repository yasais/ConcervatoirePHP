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
<h1 class="text-center"> Choisisez le professeur de la nouvelle séance </h1><br>
<br>
<div class="container">
    <div class="row">
        <?php foreach ($lesProfs as $prof) : ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($prof->getNom()) . " " . htmlspecialchars($prof->getPrenom()); ?></h5>
                        <p class="card-text">Téléphone : <?php echo htmlspecialchars($prof->getTel()); ?></p>
                        <p class="card-text">Email : <?php echo htmlspecialchars($prof->getMail()); ?></p>
                        <p class="card-text">Adresse : <?php echo htmlspecialchars($prof->getAdresse()); ?></p>
                        <p class="card-text">Instrument : <?php echo htmlspecialchars($prof->getInstru()); ?></p>

                        <form action="index.php?uc=admin&action=allerVersAjoutseance" method="POST" enctype="multipart/form-data">
                          
                          <button type="submit" class="btn" name="idProf" value=<?php echo htmlspecialchars($prof->getId()); ?>  style="background-color: #DADADA; color:#139B17;  border-radius: 0;">Ajouter une seance </button>
                          

                        </form>

                        <!-- <a class="btn" href="index.php?uc=admin&action=ajouterSeance" style="background-color: #DADADA; border-color: #DADADA; border-radius: 0;">Ajouter un cours</a> -->
                      </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include "vues/piedpage.php";?>