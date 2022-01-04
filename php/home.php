<?php 
//     session_start();

//     if(!$_SESSION['id'] AND !$_SESSION['mdp']){
//         header('Location: ../index.php');
//     }
// ?>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/ico/favicon.ico" type="image/x-icon">

    <title>Mon IMC</title>
</head>

<body id="index-body">
    <div id="div-content-result">
        <a href="logout.php">Se deconnecter</a>
        <div id="cercle-resultat">
            <span id="span-resultat">00.00</span>
        </div>
        <div id="div-paragraph">
            <p id="paragraph-text">
                <span id="welcome-message">Veuillez entrer vos informations</span>
                <span id="span-text-resultat"></span>
            </p>
        </div>
    </div>
    <div id="div-content-form">
        <div id="div-form">
            <form action="" method="post" id="mon-formulaire">
                <label for="input-poids" id="label-poids">Poids</label>
                <input type="number" placeholder="en kg" id="input-poids" name="poids"  required/>
                <label for="input-taille" id="label-taille">Taille</label>
                <input type="number" id="input-taille" placeholder="en cm" name="taille" required />
                <input type="hidden" id="indice-hidden" name="indice">
                <input type="hidden" id="statut-hidden" name="statut">
                <div id="div-sur-boutton">
                    <div id="div-boutton">
                        <button type="submit" id="mon-boutton" class="button" onclick="validForm()">
                            calculer
                        </button>
                        <a href="./php/liste.php" id="ma-liste" class="button">Lister</a>
                    </div>
                </div>
            </form>
        </div>
        <div id="popup" class="popup">
            <span class="popupText" id="popupText">Vos données ont bien été enregistrées</span>
        </div>
    </div>
</body>
<script src="../javascript/main.js"></script>

</html>