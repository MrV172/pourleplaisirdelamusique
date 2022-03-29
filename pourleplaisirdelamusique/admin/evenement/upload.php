<?php

// recupération des données
$titre=$_POST["titre"];
$description=$_POST["description"];

$nomFichier=$_FILES['fichier']["name"];
$size=$_FILES['fichier']["size"];
$type=$_FILES['fichier']["type"];
$nom_tmp=$_FILES['fichier']["tmp_name"];






                        // sauvegarde des donées dans la bdd

    try {
        $bdd=new PDO("mysql:host=localhost;dbname=pourleplaisirdelamusique","root","");
        // echo "bdd connectée ok !<br/>";
    }
    catch (Exception $e){
        die("Erreur de connection à la bdd !".$e->getMessage());
    }

    if ($titre!="") {
        if ($description!="") {
            if ($nomFichier!="") {
                $tab=[
                    'Commentaire'=>strtolower($description),
                    'TitreEvenement'=>strtolower($titre),
                    'TitreImage'=>strtolower($nomFichier)
                ];
            
            
                $reponse=$bdd->prepare('INSERT INTO evenement(id,TitreEvenement, Commentaire, TitreImage) VALUES (null,:TitreEvenement,:Commentaire,:TitreImage)');
            
                $reponse->execute($tab);
                $reponse->closeCursor();

                
                $nom_upload=$nomFichier;
                
                if ($nom_upload!="") {
                    if (move_uploaded_file($nom_tmp, "../../evenements/".$nom_upload)) {
                        echo "le fichier est bien transféré";
                    }
                    else {
                        echo "Une erreur";
                    }
                }
                else {
                    echo "Le type de fichier n'est pas valide";
                }

                    
            
                echo "ok";
            }
            else {
                echo "manque fichier";            
            }
        }
        else {
            echo "manque titre";    
        }
    }
    else {
        echo "manque nom";    

    }

   



?>