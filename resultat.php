<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APOTHEOSE 2023</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="resultat.css">
</head>
<body>
    <head>
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
    </head>
    <h1>Felicitaions</h1>
        <p class="message">Vous avez voté
            <span>
                <?php
                    session_start();
                    $nom = $_SESSION["nom"];
                    echo $nom;
                ?>
            </span>
        </p>
        <p class="quitter">Veuiller quitter la page manuellement</p>
        <script>
    // Empêcher la navigation arrière depuis la page de résultat
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(0);
    };
</script>


    <script src="vote.js"></script>
</body>
</html>