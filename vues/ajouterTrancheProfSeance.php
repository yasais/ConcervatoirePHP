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

<div class="container" >
    <div class="row justify-content-center">
        <div class="col">
            <h1 class="text-center">Choisisez la tranche horaire, <br> le niveau et la capacité du cours</h1>
                <br>
            <div class='card mx-auto p-5'  style='width: 30rem;'>

                <form   action="index.php?uc=admin&action=validerNouvelleSeance" method="POST" enctype= "multipart/form-data" >
                  <div class="form-group">
                      <label for="tranche">Tranche</label><br>
                      <select name="tranche" id="tranche">
                          <?php foreach ($lesTranchesHorairesDisponibles as $tranche): ?>
                              <option value="<?php echo $tranche; ?>"><?php echo $tranche; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <br>   

                  <div class="form-group">
                      <label for="niveau">Niveau</label><br>
                      <select name="niveau" id="niveau">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                      </select>
                  </div>
                  <br>
                  <div class="form-group">
                      <label for="capacite">Capacité</label><br>
                      <input type="number" id="capacite" name="capacite" min="1" required>
                  </div>
                  <input type="hidden" name="jour" value="<?php echo htmlspecialchars($jour) ?>"></input>
                  <input type="hidden" name="idProf" value="<?php echo htmlspecialchars($idProf) ?>"></input>
                  <br>
                  <button type="submit" class="btn" style="background-color: #ECECEC; border-color:#248AE3; color:#248AE3;  border-radius: 0;" >Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>




<?php include "vues/piedpage.php";?>