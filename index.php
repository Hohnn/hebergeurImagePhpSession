<?php include "phpIndex.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Logo Photo</title>
</head>
<body class="accueil">

    <h1 class="mb-1">WILDSTORAGE</h1>
    <h5>Près pour une nouvelle aventure ?</h5>
    <div class="myForm p-3">
        <form action="index.php" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Login</label>
            <input type="text" class="form-control" id="email" name="login" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
        </div>
        <button type="submit"id="btn">Log in</button>
        </form>
    </div>
</body>
</html>