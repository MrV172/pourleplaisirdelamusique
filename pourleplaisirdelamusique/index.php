<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" href="admin/img/logo-0.png" type="image/x-icon">
    <title>Document</title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <?php
        try {
            $bdd=new PDO("mysql:host=localhost;dbname=pourleplaisirdelamusique","root","");
        }
        catch (Exception $e){
            die("Erreur de connection à la bdd !".$e->getMessage());
        }

    ?>
   
  <nav>
  <ul id="piano">
        
        <li class="black b1"></li>
        <li class="white w1"></li>
        <a href="#accueil"><li class="black b2 menu" id="soldiez"><span>Accueil</span> </li></a>
        <li class="white w2"></li>
        <li class="black b3"></li>
        <li class="white w3"></li>
        <li class="white w4"></li>
  
        <a href="#actualite"> <li class="black b4 menu" id="rediez"><span>Actualités</span>
            </li></a>
            <li class="white w5"></li>
  
            <a  href="#contact"><li class="black b5 menu" id="dodiez"><span>Contact</span>
              
            </li></a>
  
            <li class="white w6"></li>
            <li class="white w7"></li>
            <a href="#production"> <li class="black b6 menu" id="ladiez"><span>Productions</span>
              
            </li></a>
  
            <li class="white w8"></li>
            <li class="black b7"></li>
            <li class="white w9"></li>
            <li class="black b8 ">
              <a href=""></a>
            </li>
  
            <li class="white w10"></li>
      </ul>
  </nav> 
    

  <header>   
        <div class="contain">
    <nav class="navbar">
      <a href="#accueil"><img class="nav-branding" src="logo-0.png" alt=""></a>
        <ul id="menuResponsive">
            <li> <a href="#accueil">Accueil</a> </li>
            <li> <a href="#actualite">Actualités</a> </li>
            <li> <a href="#contact">Contact</a> </li>
            <li> <a href="#production">Productions</a> </li>
          </ul> 

          <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>

    </nav>
</div>
</header> 

<a href="#accueil"><img id="logo" src="admin/img/logo-0.png" alt=""></a>


<section>
  <div id="accueil">

    <h1 id="titre">Pour le plaisir de la musique</h1>
    <h2 class="titre2" >VANESSA GELAN</h2>
    <p id="description_accueil">Chanteuse, professeur de piano, de chant et intervenante musique agréée en milieu scolaire, je désire transmettre ma passion et mes connaissances. <br/>
Je propose notamment des cours de piano mais aussi des leçons de pratique et de coaching vocale en individuel ou en collectif. Vous pouvez également rejoindre notre chorale adulte ou enfant. <br/>
Choisissez de suivre vos enseignements dans mon école à La Vacherie ou directement chez vous, je me déplace à domicile ! 
</p>

    <iframe id="video1"
src="https://www.youtube.com/embed/8LMbpm8hWfY">
</iframe>

  </div>

  <div id="actualite">

    <div id="concert">

      <h1> Concert </h1>
      <?php
            $reponse=$bdd->query('SELECT * FROM evenement ORDER BY id DESC LIMIT 1');
            
            

            while ($data= $reponse-> fetch()){
                ?><h2 class="titre2"><?php echo $data['TitreEvenement']?></h2>
                <img id="affiches" src="evenements/<?php echo $data['TitreImage']?>" alt="">
                <p id="description_concert"><?php echo $data['Commentaire'] ?></p>
                

            <?php }
        ?>

      
      

    </div>

    <div id="nouveaute">

      <h1> Nouveautés </h1>
      <h2 class="titre2">Découvrez les derniers enregistrements des éléves : </h2>
        <?php
            $reponse=$bdd->query('SELECT * FROM enregistrement ORDER BY id DESC LIMIT 4');
            
            

            while ($data= $reponse-> fetch()){
                ?><ul class="eleve_audio">
                    <li><?php echo $data['PrenomEleve']." ".$data['NomEleve'] ?></li>
                    <li><?php echo $data['titreEleve']?></li>
                </ul>
                    <audio controls>
                        <source src="rec/<?php echo $data['titreTelecharge']?>">
                    </audio>
                

            <?php }
        ?>
     

      <button id="bouton1"><a href="#production">VOIR PLUS</a></button>

    </div>

    

    <div id="contact">

        <h1>Partager-moi vos remarques ou vos questions</h1>
        <p id="description_contact">Retrouvez aussi l’école « Pour le plaire de la musique » à La Vacherie grâce au plan ci-dessous. 
N’hésitez plus et venez nous rejoindre ! 
</p>

        <div id="formulaire">
          <div id="form1">
            <h2>Contactez-moi : </h2>
           
               <p> <i class="material-icons md-36" >phone</i> +33 06 25 25 58 26</p>
               <p> <i class="material-icons md-36"> mail</i> vn.gelan@gmail.com</p>
               <p> <i class="material-icons md-36">location_searching</i> 21 route d'Emalleville, <span>27400 La Vacherie</span> </p>
           
          </div>


          
          <iframe id="form2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2611.84994836823!2d1.134243515963568!3d49.108490991017554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e13952fafcacd7%3A0x24046a53cea8ebfd!2s21%20Rte%20d&#39;Emalleville%2C%2027400%20La%20Vacherie!5e0!3m2!1sfr!2sfr!4v1648504139280!5m2!1sfr!2sfr" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


        </div>

    </div>
    <div id="production">

      <h1>Productions musicales des éléves</h1>
      <p id="description_contact">Découvrez ici différents morceaux interprétés par les élèves. Ils peuvent être fiers de leurs productions ! </p>



      
        <form>
            <input type="text" id="recherche" name="recherche" placeholder="Rechercher">
        </form>

        <div id="resultat"></div>

      <div id="prod1">

      <?php
            $reponse=$bdd->query('SELECT * FROM enregistrement WHERE (id % 2 ) = 0 ORDER BY id DESC LIMIT 4');
            
            

            while ($data= $reponse-> fetch()){
                ?><ul class="eleve_audio">
                    <li><?php echo $data['PrenomEleve']." ".$data['NomEleve'] ?></li>
                    <li><?php echo $data['titreEleve']?></li>
                </ul>
                    <audio controls>
                        <source src="rec/<?php echo $data['titreTelecharge']?>">
                    </audio>
                

            <?php }
        ?>

    </div>

    <div id="prod2">
        <?php
            $reponse=$bdd->query('SELECT * FROM enregistrement WHERE (id % 2 ) = 1 ORDER BY id DESC LIMIT 4');
            
            

            while ($data= $reponse-> fetch()){
                ?><ul class="eleve_audio">
                    <li><?php echo $data['PrenomEleve']." ".$data['NomEleve'] ?></li>
                    <li><?php echo $data['titreEleve']?></li>
                </ul>
                    <audio controls>
                        <source src="rec/<?php echo $data['titreTelecharge']?>">
                    </audio>
                

            <?php }
        ?>
    </div>

    </div>

  </div>


</section>

<!-- notes de musique -->

<audio src="Note/do_diez.mp3" id="noteDoDiez"></audio>
<audio src="Note/la diez.mp3" id="noteLaDiez"></audio>
<audio src="Note/fa diez.mp3" id="noteFaDiez"></audio>
<audio src="Note/ré diez.mp3" id="noteReDiez"></audio>
<audio src="Note/sol diez.mp3" id="noteSolDiez"></audio>

</body>


<script src="humburger.js"></script>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="script.js"></script>

</html>

