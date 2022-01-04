<?php require './php/connex.php';
require './php/functions.php';

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
            header('Location: ./php/inscription.php');
        } else if (password_verify($password, $user['pwd'])) {
            header('Location: ./php/home.php');
        } else if (password_verify($password, $user['pwd']) == false) {
            echo "Votre identifiant ou mot de passe est incorrect";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div id="home-indec-form">
        <form method="post" action="" align="center">
            <label for="id">Identifiant</label>
            <input type="text" id="id" name="identifiant"><br>
            <label for="pwd">Mot de passe</label>
            <input type="password" name="password"><br>
            <button type="submit" name="valider">Valider</button>
        </form>
        <a href="./php/inscription.php">S'inscrire ?</a>
    </div>

</body>

</html>