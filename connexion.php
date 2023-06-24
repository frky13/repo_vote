<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APOTHEOSE 2023</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="connexion.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="logo.jpg" alt="logo" width="100px">
        </div>
        <div class="apotheose">
            <div class="APOTHEOSE_1">
                APOTHEOSE 2023
            </div>
            <div class="acefamily_1">
                Ace Family 
            </div>
        </div>
    </div>

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

    <form id="connexion-form" method="post" class="connexion">
      <h1>Connexion</h1>
      <div class="div_formulaire">
        <label for="telephone" class="form_label">Numéro de téléphone</label>
        <input type="text" class="form_input" id="telephone" name="telephone" width="10" required>
        <p id="telephone-error"></p>
      </div>

      <div class="div_formulaire">
        <label for="mdp" class="form_label">Mot de passe</label>
        <input type="password" class="form_input" id="mdp" name="mdp" required>
        <p id="mdp-error"></p>
    </div>

      <button type="submit" id="submit" class="submit">Se connecter</button>

        <p id="error-message"><?php echo $erreur_message; ?></p>
    </form>
  
    <a href="accueil.php"><button class='retour'>Retour</button></a>
    

</body>
</html>
