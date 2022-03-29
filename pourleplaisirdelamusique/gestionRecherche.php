<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    session_start();

        try {
            $bdd=new PDO("mysql:host=localhost;dbname=pourleplaisirdelamusique","root","");
        }
        catch (Exception $e){
            die("Erreur de connection à la bdd !".$e->getMessage());
        }

        if (isset($_GET['recherche'])) {
            $recherche=(String) trim($_GET['recherche']);

            $req=$bdd->prepare('SELECT DISTINCT * FROM enregistrement WHERE PrenomEleve LIKE :recherche OR NomEleve LIKE :recherche OR titreEleve LIKE :recherche LIMIT 5');
            $tab=[
                'recherche'=>"%".$recherche."%"
            ];
            $req->execute($tab);
            
            $req = $req->fetchAll();

            
            foreach($req as $r){
                if ($req != "") {
                    ?><ul class="info_recherche">
                        <li><?php echo $r['PrenomEleve']." ".$r['NomEleve']; ?></li>
                        <li><?php echo $r['titreEleve'];?></li>
                    </ul>
                        <audio controls class="audio_recherche">
                            <source src="rec/<?php echo $r['titreTelecharge'];?>">
                        </audio><?php
                }

                

            
            }


        }



        

    ?>
    
    </body>
</html>