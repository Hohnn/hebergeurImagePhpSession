<?php include "phpGallery.php"?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include "meta.php"?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Image</title>
</head>

<body class="gallery">
    <div class="container">
        <div class="row">
            <h1 class="my-3"> <span>Bonjour</span>  <?= $_SESSION['firstname'] ?></h1>
        </div>
        <div class="row" data-masonry='{"percentPosition": true }'>
            <?= getImage() ?>
        </div>
    </div>
    <?php include "navbar.php"?>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
</body>
</html>