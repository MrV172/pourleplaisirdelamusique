<?php
    session_start();
    if (!isset($_SESSION['access'])) {
        header("Location: log.php");
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

<h1>Bienvenue sur la page d'admin</h1>

<p>Ici, vous pourrez ajouter de nouveaux enregistrements et affiches.</p>

<div id="redirection">
    <a href="Son/index.php" class="lienRec"><img src="img/micro.png" alt="Cliquer ici pour ajouter un enregistrement"></a>
    <a href="evenement/index.php" class="lienEvent"><img src="img/event.png" alt="Cliquer ici pour ajouter une nouvelle affiche"></a>
</div>


</body>
</html>