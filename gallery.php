<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
    function getImage(){
        $size = 0;
        $storedImage = preg_grep('/^([^.])/', scandir('./assets/img'));
        foreach($storedImage as $imageName){
            $imageId = substr($imageName, 0, 2);
            if ($imageId == $_SESSION['id'] && $_SESSION['id'] != 'demo') {
                $size = $size + filesize('./assets/img/' . $imageName);
            ?>
                <div class="card col-md-6 col-sm-12 col-lg-4 p-2 border-0 bg-transparent" width="100%">
                    <a class="border border-1 border-white" href="preview.php?name=<?= $imageName ?>">
                        <img  src="./assets/img/<?= $imageName ?>" class="card-img-top" alt="<?= $imageName ?>">
                    </a>
                </div>
            <?php
            } elseif ($_SESSION['id'] == 'demo') {
                $size = $size + filesize('./assets/img/' . $imageName);
                ?>
                <div class="card col-md-6 col-sm-12 col-lg-4 p-2 border-0 bg-transparent" width="100%">
                    <a class="border border-1 border-white" href="preview.php?name=<?= $imageName ?>">
                        <img src="./assets/img/<?= $imageName ?>" class="card-img-top" name="$imageName" alt="<?= $imageName ?>">
                    </a>    
                </div>
                <?php
            }
        }
        $_SESSION['size'] = $size;
    }
} else {
    header('location: index.php');
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
    <link rel="stylesheet" href="./assets/style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>love exigeant IDE</title>
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