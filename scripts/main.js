const indice = document.getElementById("indice-hidden");

const statut = document.getElementById("statut-hidden");

const time = document.getElementById("date-hidden");

const myButton = document.getElementById("mon-boutton");



function getImc() {
  const getPoids = document.getElementById("input-poids").value;

  const getTaille = document.getElementById("input-taille").value;

  const age = document.getElementById("input-age").value;
  const sexe = document.getElementById("select-sexe").value;  
  
  if (getPoids < 1 || getTaille < 1) {
    alert("Vous devez entrer des valeurs positives");
  } else if (age == "" || sexe == "") {
    alert("Vous devez renseigner tous les champs");
  } else if (getTaille < 40 || getTaille > 280) {
    alert("Entrez une valeur réelle de taille");
  } else if (getPoids > 350) {
    alert("Entrez une valeur réelle de poids");
  } else if (getPoids >= 30 && getTaille < 50) {
    alert("Entrez des valeurs réelles");
  } else {
    let taille = getTaille * 0.01;
    let imc = (getPoids / taille ** 2).toFixed(2);
    return imc;
  }
}

function printResultat(imc) {
  const span = document.getElementById("span-text-resultat");
  const cercle = document.getElementById("cercle-resultat");

  if (imc < 18.5) {
    span.innerHTML = "Vous êtes en insuffisance pondérale";
    cercle.style.backgroundColor = "#FF7A00";
  } else if (imc >= 18.5 && imc <= 25) {
    span.innerHTML = "Vous êtes en corpulence normale";
    cercle.style.backgroundColor = "#00cd52";
  } else if (imc > 25 && imc <= 30) {
    span.innerHTML = "Vous êtes en surpoids";
    cercle.style.backgroundColor = "#FF7A00";
  } else if (imc > 30 && imc <= 35) {
    span.innerHTML = "Vous êtes en obésité modérée";
    cercle.style.backgroundColor = "red";
  } else if (imc > 35 && imc <= 40) {
    span.innerHTML = "Vous êtes en obésité sévere";
    cercle.style.backgroundColor = "red";
  } else if (imc > 40) {
    span.innerHTML = "Vous êtes en obésité morbide";
    cercle.style.backgroundColor = "red";
  }
}

function getIndice() {
  let heure = new Date();
  let paragraph = document.getElementById("span-resultat");
  const myMessage = document.getElementById("welcome-message");
  let span = document.getElementById("span-text-resultat");

  const imc = getImc();
  indice.value = imc;

  myMessage.style.display = "none";

  if (imc != undefined) {
    paragraph.innerHTML = imc;
  }

  printResultat(imc);

  statut.value = span.textContent;
  time.value = heure.getFullYear();
}

function printResult() {
  let req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
     console.log(this.responseText);
    }
  };
  req.open("post", "./php/data.php", true);
  req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  req.send(`indice=${getImc()}`);
}


myButton.addEventListener("click", function (e) {
  getIndice();
  printResult();
});
// e.preventDefault();
