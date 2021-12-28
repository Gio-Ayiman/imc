const indiceInput = document.getElementById("indice-hidden");

const statutInput = document.getElementById("statut-hidden");

const buttonInput = document.getElementById("mon-boutton");

const nameInput = document.getElementById("input-name");

const poidsInput = document.getElementById("input-poids");

const tailleInput = document.getElementById("input-taille");

const ageInput = document.getElementById("input-age");

const sexeInput = document.getElementById("select-sexe");

const span = document.getElementById("span-text-resultat");

const cercle = document.getElementById("cercle-resultat");

const paragraph = document.getElementById("span-resultat");

const myMessage = document.getElementById("welcome-message");

const myPopup = document.getElementById("popup");

const myPopupText = document.getElementById("popupText");

const myButtonClearLine = document.getElementsByClassName("clear-line");

const myTable = document.getElementById("myTable");

const myTbody = document.getElementById("tbody");

function calcImc() {
  poids = poidsInput.value;
  taille = tailleInput.value;
  age = ageInput.value;
  sexe = sexeInput.value;

  if (poids < 1 || taille < 1) {
    alert("Vous devez entrer des valeurs positives");
  } else if (age == "" || sexe == "") {
    alert("Vous devez renseigner tous les champs");
  } else if (taille < 40 || taille > 280) {
    alert("Entrez une valeur réelle de taille");
  } else if (poids > 350) {
    alert("Entrez une valeur réelle de poids");
  } else if (poids >= 30 && taille < 50) {
    alert("Entrez des valeurs réelles");
  } else {
    let Taille = taille * 0.01;
    let imc = (poids / Taille ** 2).toFixed(2);
    return imc;
  }
}

function printStatut(imc) {
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

function getIndice(imc) {
  indiceInput.value = imc;
  myMessage.style.display = "none";

  if (imc != undefined) {
    paragraph.innerHTML = imc;
  }

  printStatut(imc);

  statutInput.value = span.textContent;
  printPopup();
}

function sendData(imc) {
  let indication = statutInput.value;
  let name = nameInput.value;

  const data = new FormData();
  let req = new XMLHttpRequest();

  data.append("nom", `${name}`);
  data.append("indice", `${imc}`);
  data.append("statut", `${indication}`);

  req.open("post", "./php/insert.php", true);
  req.send(data);
}

function emptyField() {
  ageInput.value = " ";
  poidsInput.value = " ";
  tailleInput.value = " ";
  nameInput.value = " ";
  cercle.value = "";
  span.value = "";
}

const printPopup = () => {
  myPopup.classList.add("show");
};

const clearPopup = () => {
  myPopup.classList.remove("show");
};

buttonInput.addEventListener("click", function () {
  const imc = calcImc();
  getIndice(imc);
  sendData(imc);
  setTimeout(clearPopup, 2000);
});

const dropData = (id) => {
  let xhr = new XMLHttpRequest();

  xhr.onload = () => {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.ResponseText);
    }
  };

  xhr.open("GET", "../php/delete.php?q="+id);
  xhr.send();
};

for(let i = 0; i < myButtonClearLine.length; i++){
  myButtonClearLine[i].onclick = (e) => {
    dropData(e.target.id);
  }
}
