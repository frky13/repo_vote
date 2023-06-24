<?php
    // Démarrer la session
    session_start();

    // Vérifier si l'utilisateur a déjà voté

    // Initialiser la variable du message d'erreur
    $erreur_message = "";

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Récupérer les valeurs du formulaire
      $telephone = $_POST["telephone"];
      $mdp = $_POST["mdp"];

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

      // Vérifier les informations d'identification de l'utilisateur
      $query = "SELECT * FROM user WHERE telephone = '$telephone' AND mdp = '$mdp'";
      $result = $conn->query($query);
      $erreur_message = "";
      if ($result->num_rows > 0) {
        // Les informations d'identification sont valides
        // Créer une session avec le numéro de téléphone de l'utilisateur
        $_SESSION["telephone"] = $telephone;
    
        $verif = "SELECT vote FROM user WHERE telephone = '$telephone' AND mdp = '$mdp'";
        $res = $conn->query($verif);
    
        $row = $res->fetch_assoc();
        $vote = $row["vote"];
    
        if ($vote == 1) {
            // L'utilisateur a déjà voté
            $erreur_message = "Vous avez deja voté";
        } else {
            // L'utilisateur n'a pas encore voté
            

            header("Location: vote.php");
            exit();
        }
    } else {
        // Les informations d'identification sont incorrectes
        $erreur_message = "Numéro de téléphone invalide <br>ou <br>mot de passe incorrect!";
    }
    

      // Fermer la connexion à la base de données
      $conn->close();
    }
    ?>
