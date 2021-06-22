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
body{
  background-color: rgb(207, 199, 188);
}
</style>

</head>
<body>
     
    <div class="container">

   <div class="row">
   <h5 class="mt-4 text-white">Nom de l'image</h5>
   <div class="card bg-transparent mt-3" width="100%">
 
   
   <img class="border border-1 border-white" src="assets/img/<?= $_GET['name']?>" class="card-img-top" alt="...">
</div>

   </div>
   <?php include "navbar.php"?>
    </div>
    </form>

    <script>

</script>
</body>
</html>