<?php 
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  require_once __DIR__. "/templates/header.php";
  require_once __DIR__. "/lib/pdo.php";
  require_once __DIR__. "/lib/user.php";

  //echo password_hash("Prout", PASSWORD_DEFAULT); (transformation du mot de passe en hash)
  
  
  $errors = [];

  if (isset($_POST['loginUser'])) {
    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);

    if($user) {
      // on va le connecter => session
      var_dump($user['email']);
    } else { 
      // afficher une erreur
      $errors[] = "email ou mot de passe incorrect";
    }
  }
?>

<div class="container col-xxl-8 px-4 py-5">
    <h1>Se connecter</h1>

    <?php
      foreach ($errors as $error) { ?>
      <div class="alert alert-danger" role="alert">
        <?=$error; ?>
      </div>
      <?php }
    ?>

    <form action="" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>

      <input type="submit" name="loginUser" value="connexion" class="btn btn-primary">
    </form>
</div>


<?php require_once __DIR__."/templates/footer.php";?>