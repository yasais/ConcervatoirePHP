
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

<br>

<!--  form nouvelle seance pour le jour  -->
<div class="container" >
    <div class="row justify-content-center">
        <div class="col">
            <h1 class="text-center">Sélectionnez un jour</h1>
                <br>
            <div class='card mx-auto'  style='width: 20rem; padding: 2rem 1rem 4rem 0rem;'>

                <form  action="index.php?uc=admin&action=ajouterTrancheDesSeances" method="POST" enctype= "multipart/form-data" class="text-center" >
                  
                  <div class="form-group">
                      <label for="jour">Jour</label><br>
                      <select name="jour" id="jour">
                          <option value="lundi">Lundi</option>
                          <option value="mardi">Mardi</option>
                          <option value="mercredi">Mercredi</option>
                          <option value="jeudi">Jeudi</option>
                          <option value="vendredi">Vendredi</option>
                          <option value="samedi">Samedi</option>
                      </select>
                  </div><br>   

                  <input type="hidden" name="idProf"  value="<?php echo htmlspecialchars($idProf) ?>"></input>
                  <button type="submit" class="btn btn-primary" style="background-color: #ECECEC; border-color:#248AE3; color:#248AE3;  border-radius: 0;" >Valider</button>
                
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "vues/piedpage.php";?>