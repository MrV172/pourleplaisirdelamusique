<?php
session_start();
if (isset($_SESSION['access'])) {
    header("Location: index.html");
}

$id=$_POST['identifiant'];
$mdp=$_POST['mdp'];


try {
    $bdd=new PDO("mysql:host=localhost;dbname=pourleplaisirdelamusique","root","");
    // echo "bdd connectée ok !<br/>";
}
catch (Exception $e){
    die("Erreur de connection à la bdd !".$e->getMessage());
}

$tab=[
    'identifiant'=>$id
];


$reponse=$bdd->prepare('SELECT motDePasse FROM connexion WHERE Identifiant = :identifiant');

$reponse->execute($tab);


while ($donnees=$reponse->fetch()){
        
        if (password_verify($mdp, $donnees['motDePasse'])==1) {
            $oui=1;
        }


}

$reponse->closeCursor();

if (isset($oui)) {
    $_SESSION['access']=1;
    header("Location: index.php");
}
else{
    header("Location: redirection.php");
}



?>