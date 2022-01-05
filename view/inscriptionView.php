<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
</head>

<body>
    <form action="../model/registerUser.php" method="POST" align="center">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" autocomplete="off"><br><br>
        <label for="mail">Email</label>
        <input type="email" name="mail" id="mail" autocomplete="off"><br><br>
        <label for="birthDate">Date de naissance</label>
        <input type="date" min="1950-01-01" name="birthDate"><br><br>
        <label for="gender" >Genre</label>
        <select name="gender" id="gender">
            <option value="man">Homme</option>
            <option value="woman">Femme</option>
        </select><br><br>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" ><br><br>
        <button type="submit" name="valider">Valider</button>
    </form>

</body>

</html>