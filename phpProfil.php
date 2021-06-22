<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('location: index.php');
    return false;
}

if (isset($_POST['deconnexion'])) {
    session_unset();
    session_destroy();
    header('location: index.php');
}
