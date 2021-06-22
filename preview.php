<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: index.php');
    return false;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include "meta.php" ?>
    <title>love exigeant IDE</title>
</head>

<body class="previewPage">
    <div class="container">
        <div class="row">
            <h5 class="my-4"><?= $_GET['name'] ?></h5>
            <img  src="assets/img/<?= $_GET['name'] ?>" class="card-img-top" alt="<?= $_GET['name'] ?>">
        </div>
    </div>
    <?php include "navbar.php" ?>
</body>

</html>