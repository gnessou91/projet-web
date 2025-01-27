<?php

// Démarrage de la session pour récupérer l'id du gène
session_start();

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/info_prot.css">
    <link rel="icon" href="../img/icon.png">
    <title>Protéine | BotrytiXploreR</title>
  </head>

  <body>

    <?php
      include "./scripts/sql_prot.php";
      include "./mep/bandeau.php";
    ?>

    <div id="menu">

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

        <h1>Informations sur les domaines (source : Pfam) :</h1>

        <?php include "./scripts/table_pfam.php"; ?>

    </div>

  </body>

</html>
