<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/bandeau.css">
  </head>

  <body>
    <?php
      include "./mep/menu.php";
     ?>
    <div id="bandeau">

      <form action="info_gene1.php" method="get">
        Chercher un gène : BC1G_<input type="text" name="id"
          value=<?php
            if($_SESSION['var']!=""){
              echo $_SESSION['var'];
            }else{
              echo "00001";}
          ?> maxlength="5" size="15">
        <input type="submit" value="Go !">

        <a class="bouton" href="info_gene.php"> &nbsp Gène &nbsp</a>
        <a class="bouton" href="info_prot.php">&nbsp Protéine &nbsp</a>
        <a class="bouton" href="blast.php">&nbsp Blast &nbsp</a>

      </form>

    </div>
  </body>

</html>