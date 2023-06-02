<?php include "vues/entete.php";?>

<div class="container connexion-bg">
  <div class="row justify-content-center">
    <div class="col">
      <br>
      <h1 class="text-center">Connexion</h1>
      <br>
      <br>
      <br>
      <div class='card mx-auto p-4' style='width: 18rem;'>

        <form action="index.php?uc=admin&action=verif" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label for="login">Identifiants</label>
            <input type="text" name="login" class="form-control" id="Examplelogin" aria-describedby="loginH">
            <small id="login" class="form-text text-muted">Veuillez ne pas partager vos identifiants.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" name="mdp" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="input-group mt-3">
            <button class="btn btn-outline-secondary" type="submit" name="id">Connexion</button>
          </div>

        </form>

      </div>

    </div>
  </div>
</div>
<?php include "vues/piedpage.php";?>