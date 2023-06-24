var table = [
  { nom: "ZOGOTE DAN ELIE", filiere: "SRIT 1E", votes: 0 },
  { nom: "N'GUESSAN EZECKIAS", filiere: "TWIN 1", votes: 0 },
];

function voter(numCand) {
  var candidat = table[numCand];
  var nom = candidat.nom;
  var filiere = candidat.filiere;
  document.getElementById("confirmer").style.display = "flex";
  candidat.votes++;
  document.getElementById('nom').value = nom;
  document.getElementById('filiere').value = filiere;
  alert('Vous avez voté pour ' + nom + ' (' + filiere + ')');
  document.getElementById("confirmer").removeAttribute("disabled");
}
