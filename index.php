<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />

    <title>Mon IMC</title>
  </head>
  <body><div id="div-content-result">
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
          <label for="input-age" id="label-age">Age</label>
          <input type="number" id="input-age" name="age">
          <label for="input-poids" id="label-poids">Poids</label>
          <input type="number" placeholder="en kg" id="input-poids"  name="poids"/>
          <label for="select-sexe">Sexe</label>
          <select name="sexe" id="select-sexe">
            <option value="homme">Homme</option name="homme">
            <option value="femme">Femme</option name="femme">
            <option value="indifferent" name="indifferent">Indifférent</option>
          </select>
          <label for="input-taille" id="label-taille">Taille</label>
          <input type="number" id="input-taille" placeholder="en cm"  name="taille"/>
          <label for="input-name">Nom</label>
          <input type="text" id="input-name" name="nom">
          <input type="text" id="indice-hidden" name="indice">
          <input type="text" id="statut-hidden" name="statut">
          <input type="text" id="date-hidden" name="annee">
          <button type="submit" id="mon-boutton">
            calculer
          </button>
          <a href="./php/liste.php" id="ma-liste">Liste</a>
        </form>
      </div>
    </div>"
  </body>
  <script src="scripts/main.js"></script>
</html>