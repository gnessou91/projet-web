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
    <title>Blast | BotrytiXploreR</title>
  </head>

  <body>

    <?php
      include "./bandeau_blast.php";
      include "./blast_connect.php";
    ?>

    <div id="menu">
      <hr>

      <h1>Recherche de séquence par Blast</h1>
      <p>Résultat de votre recherche sur la base des gènes de
        <i>Botrytis cinerea</i>. </p>

      <?php include "./table_blast.php"; ?>

      <form action="blast.php" method="post" style="margin-bottom:10px">
        <input type="submit" value="Etape précédente">
      </form>

    </div>

  </body>
</html>