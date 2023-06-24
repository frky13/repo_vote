<?php
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
    $filiere = isset($_POST["filiere"]) ? $_POST["filiere"] : "";

    // Vérifier si l'utilisateur a déjà voté
   

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "acefamily";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion à la base de données
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données: " . $conn->connect_error);
    }

    // Récupérer le numéro de téléphone de l'utilisateur à partir de la session
    $telephone = $_SESSION["telephone"];

    // Mettre à jour l'attribut "nbrs_vote" dans la table "candidat"
    $sql = "UPDATE candidat SET nbrs_vote = nbrs_vote + 1 WHERE filiere = '$filiere'";
    $vote = "UPDATE user SET vote = 1 WHERE telephone = '$telephone'";

    if ($conn->query($sql) === TRUE && $conn->query($vote) === TRUE) {
        // Enregistrer le nom du candidat dans la session
        $_SESSION["nom"] = $nom;
        $_SESSION["vote"] = 1; // Mettre à jour la valeur de vote dans la session
        header("Location: resultat.html");
        exit();
    } else {
        echo "Erreur lors de l'enregistrement du vote: " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}

?>
