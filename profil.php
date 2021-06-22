<?php


session_start();

if (!isset($_SESSION['login'])) {
  header('location: index.php');
  return false;
}

if (isset($_POST['deconnexion'])) {
  session_unset ();
  session_destroy ();
  header ('location: index.php');
}
?>


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
  <title>love exigeant IDE</title>

  <style>
    body {
      background-color: rgb(207, 199, 188);
    }
  </style>




</head>

<body class="profil">
  <div class="container">
    <form class="row needs-validation " action="" method="post" enctype="multipart/form-data" novalidate>

      <h1 class="ms-4 text-white">Votre profil</h1>

        <div class="card mb-3 border border-2 border-white">
            <div class="col-12 ">
              <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Merci de nous faire confiance</h6>
                <div class="mb-3">
                  <input type="text" name="nom" id="nom" class="form-control" value="<?= $_SESSION['lastname']  ?>" placeholder="nom">
                </div>
                <div class="mb-3">
                  <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $_SESSION['firstname']  ?>" placeholder="Prénom">
                </div>
                <div class="mb-3">
                  <input type="text" id="lemail" name="lemail" class="form-control" value="<?= $_SESSION['mail']  ?>" placeholder="Adresse mail">
                </div>
                <div class="mb-3">
                  <input type="text" id="formule" name="formule" class="form-control" value="<?= $_SESSION['formule']  ?>" placeholder="formule">
                </div>
                <button class="btn btn-secondary" name="deconnexion" value="a" class="link-success"> Déconnexion</button>
              </div>
            </div>
        </div>
    </form>
    <?php include "navbar.php" ?>

</body>

</html>