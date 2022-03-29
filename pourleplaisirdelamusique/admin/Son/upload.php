<?php

// recupération des données
$prenom=$_POST["prenomEleve"];
$nom=$_POST["nomEleve"];
$titre=$_POST["titreEleve"];

$nomFichier=$_FILES['fichier']["name"];
$size=$_FILES['fichier']["size"];
$type=$_FILES['fichier']["type"];
$nom_tmp=$_FILES['fichier']["tmp_name"];




?>

<?php


                        // sauvegarde des donées dans la bdd

    try {
        $bdd=new PDO("mysql:host=localhost;dbname=pourleplaisirdelamusique","root","");
        // echo "bdd connectée ok !<br/>";
    }
    catch (Exception $e){
        die("Erreur de connection à la bdd !".$e->getMessage());
    }

    if ($prenom!="") {
        if ($nom!="") {
            if ($titre!="") {
                if ($nomFichier!="") {
                    $tab=[
                        'prenomEleve'=> strtolower($prenom),
                        'nomEleve'=>strtolower($nom),
                        'titreEleve'=>strtolower($titre),
                        'titreTelecharge'=>strtolower($nomFichier)
                    ];
            
            
                    $reponse=$bdd->prepare('INSERT INTO enregistrement(id,prenomEleve,nomEleve,titreEleve,titreTelecharge) VALUES (null,:prenomEleve,:nomEleve,:titreEleve,:titreTelecharge)');
            
                    $reponse->execute($tab);
                    $reponse->closeCursor();
                    



                
                
                
                    // switch ($type){
                    //     case 'audio/wav':
                    //         // ici faudra remplacer les nom des fichiers par ce qu'aura remplit vanessa
                    //         $nom_upload="audio".time().".wav";
                    //         break;
                    //     case 'audio/mp3':
                    //         $nom_upload="audio".time().".mp3";
                    //         break;
                    //     case 'audio/mp4':
                    //         $nom_upload="audio".time().".mp4";
                    //         break;
                    //     case 'audio/mp4':
                    //         $nom_upload="audio".time().".mp4";
                    //         break;
                    //     default:
                    //         $nom_upload="";
                    //         break;
                    // };
                
                    $nom_upload=$nomFichier;
                
                    if ($nom_upload!="") {
                        if (move_uploaded_file($nom_tmp, "../../rec/".$nom_upload)) {
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
    }
    else {
        echo "manque prenom";    

    }



?>