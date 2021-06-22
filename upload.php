<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('location: index.php');
    return false;
}

function formule(){
    if ($_SESSION['formule'] == 'mouette') {
        $formuleSize = '5';
    } elseif ($_SESSION['formule'] == 'goeland') {
        $formuleSize = '10';
    } elseif ($_SESSION['formule'] == 'albatros') {
        $formuleSize = '20';
    } else {
        $formuleSize = '1000';
    }
    $_SESSION['formuleSize'] = $formuleSize;
    $calc = ($_SESSION['size'] / 1000000);
    $phrase = "";
    $phrase = $calc . ' / ' . $formuleSize . ' Mo';
    return $phrase;
}

function store($tmp_name, $uid, $ext)
{
    move_uploaded_file($tmp_name, "./assets/img/" . $uid . "." . $ext);
}

// enregistre sur le server
function upload($img_file, $type = "image", $size = 1000000)
{
    if (!isset($_POST["submit"])) {
        return false;
    }

    $img_file = $_FILES[$img_file] ?? false; # on "identifie" $img_file
    $type = "/$type/"; # on prépare la regex
    $msgArray = []; # notre liste de messages

    if ($img_file && $img_file["error"] == 0) {
        if (!preg_match($type, mime_content_type($img_file["tmp_name"]))) { # si c'est pas une image
        $msgArray[] = "Votre fichier n'est pas une image";
        } elseif ($img_file["size"] > $size) { # si le fichier est plus grand que 1Mo
            var_dump($img_file["size"]);
            $msgArray[] = "Désolé, votre fichier doit faire moins de 1 Mo";
        }

        if (count($msgArray) != 0) { # si il y a un déjà message dans notre array
        $msgArray[] = "Votre fichier n'a pas été upload.";
        } else { # dans le cas ou tout est bon
            $uid = uniqid();
            $uid = $_SESSION['id'] . $uid;
            $ext = pathinfo($img_file["name"])["extension"];
            store($img_file["tmp_name"], $uid, $ext);
            $msgArray[] = "Le fichier " . $uid . "." . $ext . " a bien été uploadé.";
            $_SESSION['size'] = $_SESSION['size'] + $img_file["size"];
        }
    }

    if ($img_file["error"] == 4) {
        $msgArray[] = "Veuillez choisir un fichier.";
    }
    if (($_SESSION['size'] + $img_file["size"]) / 1000000 > $_SESSION['formuleSize']) {
        $msgArray[] = "Vous allez dépasser votre quotas de stockage.";
    }
    $res = "";
    foreach ($msgArray as $msg) {
        $res .= "<p>" . $msg . "</p>";
    }
    
    return $res;
}

$uploaded = upload("img");

$affiche = formule();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/style.css">
    <title>upload</title>
</head>

<body class="upload">
    <div class="container">
        <div class="row">
            <h1 class=" text-center my-3">Importer vos images</h1>
            <p class="text-center my-3">Vous avez utilisé <?= $affiche?></p>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="input-container flex-wrap text-center"">
                    <label for="fileToUpload" id="parcourir">Parcourir...</label>
                    <input name="img" type="file" id="fileToUpload" accept="image/png, image/jpg, image/jpeg">
                    <div class="input-text" id="msgError"><?=$uploaded?></div>
                    <img class="preview" src="" alt="" id="imgPreview">
                    <i id="i" class="<?=preg_match("/a bien été uploadé/", $uploaded) ? "bi bi-check2-circle validation-icon" : ""?>"></i>
                </div>
                <button class="btn btn-secondary mt-3" type="submit" name="submit">Envoyer</button>
            </form>
        </div>
    </div>
    <?php include "navbar.php"?>
    <script src="./assets/uploadPreview.js"></script>
</body>
</html>