<?php 

require 'connex.php';
require 'functions.php';

$errors = array();

if (isset($_POST['valider'])) {
    $username = htmlspecialchars($_POST['username']);
    $mail = htmlspecialchars($_POST['mail']);
    $birthDate = htmlspecialchars($_POST['birthDate']);
    $gender = htmlspecialchars($_POST['gender']);
    $password = htmlspecialchars($_POST['password']);

    if (empty($username) || !preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $errors['username'] = "Vous devez entrer un nom d'utilisateur valide";
    } else {
        $req = $conn->prepare("SELECT * FROM users WHERE username  = ?");
        $req->execute([$username]);
        $user = $req->fetch();
        if ($user) {
            $errors['username'] = "Ce nom d'utilisateur est deja pris";
        }
    }

    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = "Votre email n'est pas valide";
    } else {
        $req = $conn->prepare("SELECT * FROM users WHERE mail  = ?");
        $req->execute([$mail]);
        $user = $req->fetch();
        if ($user) {
            $errors['mail'] = "Cet email est deja pris";
        }
    }

    if (empty($password) || strlen($password) < 8) {
        $errors['password'] = "Vous devez entrer un mot de passe valide et superieur à 8 caractères";
    }

    if (empty($errors)) {
        $req = $conn->prepare("INSERT INTO users SET username = ?, mail = ?, birth_date = ?, pwd = ?, gender = ?");
        $password = password_hash($password, PASSWORD_BCRYPT);
        $req->execute([$username, $mail, $birthDate, $password, $gender]);
        header('Location: ../view/homeView.php');
    } else {
        debug(($errors));
    }
}
$conn = null;
