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

    <div>
        <h1>Ajouter un enregistrement :</h1>

        <form  method="POST" action="upload.php" enctype="multipart/form-data">
            <fieldset>
                Prenom de l'élève : <input type="text" id="prenomEleve" name="prenomEleve">

                Nom de l'élève : <input type="text" id="nomEleve" name="nomEleve">

                Titre joué : <input type="text" id="titreEleve" name="titreEleve">

                <input type="file" name="fichier" id="fichier">

                <input id="submitAjout" type="submit" value="Uploader" >
            </fieldset>
        </form>
    </div>
</body>
</html>