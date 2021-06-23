<?php include "phpProfil.php" ?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="assets/style.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/20d2be1b89.js" crossorigin="anonymous"></script>
  <title>Profil</title>
</head>

<body class="profil">
  <div class="container myCenter">
    <img class="imageprofil mx-auto" src="<?=$_SESSION['image']?>"/>
    <div class="info mydark text-white text-center">
      <h1 class="text-center">Votre profil</h1>
      <h6 class="card-subtitle mb-4 text-center">Merci de nous faire confiance</h6>
      <div class="desc py-2"><?= $_SESSION['lastname'] ?></div>
      <div class="desc py-2"><?= $_SESSION['firstname'] ?></div>
      <div class="desc py-2"><?= $_SESSION['mail'] ?></div>
      <div class="desc py-2"><?= $_SESSION['formule'] ?></div>
      <form class="my-4" method="post">
        <button class="bouton btn btn-success" name="deconnexion" value="a" class="link-success"> Déconnexion</button>
      </form>
    </div>
  </div>
  <?php include "navbar.php" ?>
</body>
</html>
