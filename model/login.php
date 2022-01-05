<?php

require 'connex.php';
require 'functions.php';

$errors = array();

if (isset($_POST['valider'])) {
    $password = htmlspecialchars($_POST['password']);
    $identifiant = htmlspecialchars($_POST['identifiant']);

    if (empty($password) && empty($identifiant)) {
        $errors['login_error'] = "Vous devez remplir tous les champs";
    } else {
        $req = $conn->prepare('SELECT * FROM users WHERE  username = :username OR mail = :username');
        $req->execute(['username' => $identifiant]);
        $user = $req->fetch();
        if (!$user) {
            header('Location: ./view/inscription.php');
        } else if (password_verify($password, $user['pwd'])) {
            header('Location: ./view/homeView.php');
        } else if (password_verify($password, $user['pwd']) == false) {
            echo "Votre identifiant ou mot de passe est incorrect";
        }
    }
}
