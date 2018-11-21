<?php

// Démarrage de la session pour récupérer l'id du gène
session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="info.css">
    <link rel="icon" href="../img/icon.png">
  </head>
  <!-- Nom de la page -->
  <script langage="java-script">
    document.title = 'Protéine | BotrytiXploreR';
  </script>

  <body>

<!-- code php base de données -->
    <?php
      $id = "BC1G_".$_SESSION['var'];
      if($id != ""){
        $bdd = new PDO('mysql:host=localhost;dbname=projetweb','barnadavy','fanfreluchedu91',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        // Recupérer la séquence et le profil d'hydrophobicité
        $requete = $bdd -> prepare // query() si pas de variable
        ('
          SELECT sequence, length
          FROM protein
          WHERE id_gene = ?
        ');

        $requete -> execute(array($id));

        // stocke la sequence dans une autre variable
        while ($donnees = $requete->fetch())
        {
          $sequence = $donnees['sequence'];
          $length = $donnees['length'];
        }
        if($_POST["fenetre"]!=""){
          $fenetre = $_POST["fenetre"];
        }else{
          $fenetre = 9;
        }
      }

      if (isset($sequence) AND isset($fenetre)) {
        // $seq = wordwrap($sequence, 75, "<br>", true);
        // echo $sequence;
        exec ("/usr/local/bin/Rscript /Users/agnesb/Sites/projet-web/Profil_hydro/profil_hydro.R $sequence $fenetre");
      }
    ?>


<!-- entete de la page -->
    <div id="entete">
     <a href="Accueil.php">
       <img src="../img/logo_log.png" alt="logo logiciel" height="80" width="320"/></a>
    </div>

    <div id="menu">
<!-- Bar de menu avec liens et formulaire -->
      <div id="bandeau">

        <form action="info_gene1.php" method="post">
          Chercher un autre gène : BC1G_<input type="text" name="id"
            value=<?php
              if($_SESSION['var']!=""){echo $_SESSION['var'];}else{echo "00001";}
            ?> maxlength="5" size="15">
          <input type="submit" value="Go !">

          <a href="info_gene.php">Le gène<img class="bulle gene" src="../img/bulle_gene.png" alt="Gène" /></a>
          <a href="info_prot.php">La protéine<img class="bulle prot" src="../img/bulle_prot.png" alt="Protéine" /></a>

        </form>

      </div>

      <hr>

<!-- Corps de la page -->
<!-- profil d'hydrophobicité -->
      <h1>La séquence protéique :</h1>
      <p id="sequence" wrap=wrap>
        <?php echo "Taille : $length acides aminées <br>$sequence";?></p>

       <h1>Le profil d'hydrophobicité :</h1>
       <form action="info_prot.php" method="post">
         <p style="text-align:center">
           Définir la fenetre : <input type="text" name="fenetre" value=
           <?php
             if($_POST["fenetre"]!=""){
               echo $_POST["fenetre"];
             }else{
               echo "9";
             } ?>
            maxlength="5" size="5">
            <input type="submit" value="Go">
         </p>
         <div id="hydro">
      				<img src="../img/rplot.jpg">
          </div>
        </form>

    </div>

    <div id="retour">
      <img src="../img/logo.png" alt="logo auteur" height="120" width="120" />
    </div>

  </body>

</html>
