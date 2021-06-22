<?php
$members = file_get_contents('./assets/members.json');
$membersList = json_decode($members)->membres;
$mypass = "123";

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    foreach($membersList as $member) {
        if ($login == $member->mail && password_verify($password, $member->password)) {
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['pwd'] = $password;
            $_SESSION['id'] = $member->id;
            $_SESSION['mail'] = $member->mail;
            $_SESSION['lastname'] = $member->nom;
            $_SESSION['firstname'] = $member->prenom;
            $_SESSION['formule'] = $member->formule;
            $_SESSION['image'] = $member->image;
            header('location: gallery.php');
        } else {
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        }
    }
}
?>