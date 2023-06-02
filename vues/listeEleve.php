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
<!-- le ajouter une eleve ici -->
<div class="btn-container1">
<a class="btn1" href="index.php?uc=admin&action=inscription">Inscription d'un élève</a>
</div>

<h1 class="text-center"> Voici la liste des élèves </h1><br>


<br><br><br>

<div class="container">
    <div class="row">
        <?php foreach ($lesEleves as $key => $eleve) : ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($eleve["prenom"]) . " " . htmlspecialchars($eleve["nom"]); ?></h5>
                        <p class="card-text">Téléphone : <?php echo htmlspecialchars($eleve["tel"]); ?></p>
                        <p class="card-text">Email : <?php echo htmlspecialchars($eleve["mail"]); ?></p>
                        <p class="card-text">Adresse : <?php echo htmlspecialchars($eleve["adresse"]); ?></p>
                        <p class="card-text">Bourse : <?php echo htmlspecialchars($eleve["bourse"]); ?></p>
                        <a onclick="return confirm('Voulez-vous vraiment supprimer cet élève ?');" href="index.php?uc=admin&action=supprimerEleve&id=<?php echo $eleve["id"]; ?>" class="btn" role="button" style="background-color: #FF7676; border-color: #DADADA; border-radius: 0; color:black;">Supprimer</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include "vues/piedpage.php";?>