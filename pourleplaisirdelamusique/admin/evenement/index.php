<?php
    session_start();
    if (!isset($_SESSION['access'])) {
        header("Location: ../log.php");
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <form action="../index.php">
        <input type="submit" id="retourHome" value="Revenir au Menu">
    </form>
    

    <h1>Ajouter une affiche :</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            Nom de l'évenement : <input type="text" name="titre" id="titre">
            Description de l'évenement : <input type="text" name="description" id="description">
            <input type="file" name="fichier" id="fichier">
            <input type="submit">
        </fieldset>
    </form>
    
</body>
</html>