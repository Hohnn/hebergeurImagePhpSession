<?php include "phpUpload.php"?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include "meta.php"?>
    <title>upload</title>
</head>

<body class="upload">
    <div class="container mycontainer mydark">
        <div class="row">
            <h1 class=" text-center my-3">Importer vos images</h1>
            <p class="text-center my-1">Vous avez utilisé <?= $calc?>% / <?= $affiche?> Mo</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?= $calc ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
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