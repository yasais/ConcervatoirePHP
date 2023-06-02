
<?php include "vues/entete.php";?>

<!-- bouton retour à l'accueil 
<div class="container1">
    <div class="row1">
        <div class="col1">
        <a href='index.php?uc=admin&action=accueilAdmin'>Retour à l'accueil</a>

        </div>
    </div>-->

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


 

<div class="container" >
    <div class="row justify-content-center">
        <div class="col">
            <h1 class="text-center">Inscription Adhérent</h1>
                <br>
                <div class="container2">
                    <div class="row2">
                        <div class="col2">
                            <h1 class="" style="font-family: 'Lora', serif; font-size: 24px; text-align: center;"> Confirmation de votre ajout pour l'élève 
                                <?php
                                    echo $_POST['prenom']; 
                                    echo "&nbsp";
                                    echo $_POST['nom'];
                                ?> 
                            </h1>
                        </div>
                    </div>
                </div> <br>
            <div class='card mx-auto p-4'  style='width: 30rem;'>

                <form   action="index.php?uc=admin&action=inscri" method="POST" enctype= "multipart/form-data" >

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" aria-describedby="loginH">
                </div>
                <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" aria-describedby="loginH">
                </div>

                <div class="form-group">
                    <label for="tel">Telephone</label>
                    <input type="text" name="tel" class="form-control" id="tel" aria-describedby="loginH">
                </div>
                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input type="text" name="mail" class="form-control" id="mail" aria-describedby="loginH">
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" class="form-control" id="adresse" aria-describedby="loginH">
                </div>
                <div class="form-group">
                    <label for="adresse">Bourse</label>
                    <input type="text" name="bourse" class="form-control" id="bourse" aria-describedby="loginH">
                </div>

                <div class="input-group mt-2">
                    <button class="btn btn-outline-dark"   type="submit" name="id">Inscrire l'élève</button>
                </div>

                </form>

                <!--<a href='index.php?uc=admin&action=accueilAdmin'>Retour à l'accueil</a>-->

            </div> 
 
        </div>

    </div>

</div>
<?php include "vues/piedpage.php";?>