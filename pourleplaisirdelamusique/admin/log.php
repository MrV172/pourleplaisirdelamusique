<?php
    session_start();
    if (isset($_SESSION['access'])) {
        header("Location: index.php");
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <form action="../index.php">
        <input type="submit" value="Revenir sur le site">
    </form>
    <h1>Veillez vous connecter</h1>

    <form action="gestionLog.php" method="post">
        <fieldset>
            Identifiant :<input type="text" id="identifiant" name="identifiant">
            Mot de Passe :<input type="text" id="mdp" name="mdp">
            <input type="submit" value="Connexion">
        </fieldset>
    </form>
    
</body>
</html>