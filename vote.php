
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APOTHEOSE 2023</title>
    <link rel="stylesheet" href="vote.css">
    <link rel="stylesheet" href="header.css">
</head>
<body>
    <header>
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
    </header>
    
    <section>
        <h2 class="title">VOTEZ VOTRE CANDIDAT</h2>
    
        <div class="candidat">
            <div class="image">
                <img src="candidat1.jpg" alt="" width="70%">
            </div>
            <div class="nom_candidat">ZOGOTE DAN ELIE</div>
            <div class="filiere_candidat">SRIT 1E</div>
            <button class="voter" onclick="voter(0)">Voter</button>
        </div>
  
        <div class="candidat">
            <div class="image">
                <img src="ezeckias.png" alt="" width="70%">
            </div>
            <div class="nom_candidat">N'GUESSAN EZECKIAS</div>
            <div class="filiere_candidat">TWIN 1</div>
            <button class="voter" onclick="voter(1)">Voter</button>
        </div>
 
        <form action="traitement.php" method="post" class="cacher">
            <div class="none">
                <input type="hidden" id="nom" name="nom">
                <input type="hidden" id="filiere" name="filiere">
            </div>
            <button type="submit" id="confirmer" value="Confirmer le vote" class="disabled-button" disabled>Confirmer le vote</button>
        </form>

        <a href="connexion.php"><button class="retour">Retour</button></a>
    </section>

    <script src="vote.js"></script>
</body>
</html>