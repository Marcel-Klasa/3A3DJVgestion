<!DOCTYPE html>
<html>

<head>
  <title>3A_3DJV</title>
  <link rel="stylesheet" href="css.css">
  <meta charset="utf-8"/>
</head>


  <body>
    <div class="wrapper">


      <h1>Site 3A 3DJV V0.4</h1>
      <header>
      <p>Système de gestion des 3ème année 3DJV</p>
      <p>(Ce site est pour aider la classe 3A3DJV et est constament en cours de développement. Tu veux l'améliorer? demande à Marcel)</p>
      <p> /////// Si tu veux t'amuser à hacker/pirater/crash le système, je ne vais pas m'amuser à le réparer 10000000 fois ///////
    </header>


      <nav> 
        <H2>Fichiers de cours</H2>
        <?php //REQUETES FICHIERS DANS LE DIR
        foreach(glob('cours/*') as $ffichier){
          echo '<dt>' . substr($ffichier, 6) . '</dt>';
          foreach(glob($ffichier.'/*') as $fname){
            echo ' - ' . '<a href="' . $fname . '" download>' . substr($fname, 16) . ' </a> <br>';
          }
        }
        ?>
        <br>
        <label>Cours:</label>
        <select name="cours" form="fichier">
          <option value="algo_avan">Algo Avancée</option>
          <option value="game_desi">Game Design</option>
          <option value="gest_proj">Gestion Projet</option>
          <option value="init_cpp_">Initiation c++</option>
          <option value="math_info">Math p/ L'info</option>
          <option value="mode_3d__">Model 3D</option>
          <option value="prog_jv__">Prog JV</option>
          <option value="proj_annu">Projet Annuel</option>
          <option value="roet_ia__">RO & IA</option>
          <option value="scsh_pyth">Scrip Shell & Python</option>
        </select>
        <form action="AjoutFichier.php" method="post" id="fichier" enctype="multipart/form-data">
            <label>Ajouter un fichier:</label>
            <input type="file" name="the_file"><br/>
            <input type="submit" name="upload" value="Send">
        </form>
      </nav>


      <section>
        <H2>Evenements</H2>

        <!-- PARTIE PHP REQUETE BDD EVENTS -->
        <?php
          $con = mysqli_connect("localhost","root","root","3A_3DJV");

          $Freq = "SELECT
                            ID,
                            Titre,
                            Date,
                            Description
                    FROM events";

          $Fresult = mysqli_query($con, $Freq);

          if (!$Fresult) {
            echo 'Could not run query: ' . mysqli_error($con);
            exit; };

            // Affichage des différents produits
            while($row = mysqli_fetch_row($Fresult)) {

              echo "
                <p> - " . $row[2] . " / " . $row[1] . " / " . $row[3] . "</p> <br>";
            }
            
          mysqli_free_result($Fresult);
          mysqli_close($con);

        ?>
        <!-- FIN PARTIE PHP REQUETE BDD EVENTS -->



        <!-- FORMULAIRE POST POUR AJOUTER UN EVENEMENT -->
        <p> Ajouter un evenement: </p>
        <form method='POST' action='AjoutEvent.php'>
          <tr>
            <td>
              <font>Date </font>
            </td>
            <td><input type ='date' name='date_'/></td>
          </tr>
          <tr>
            <td>
              <font>Titre </font>
            </td>
            <td><input type ='text' name='titre_'/></td>
          </tr>
          <tr>
          <tr>
            <td>
              <font>Description </font>
            </td>
            <td><input type ='text' name='description_'/></td>
          </tr>
          <tr>
            <td colspan='2'>
              <input type="submit" name='valid' value="Ajouter"/>
            </td>
          </tr>
        </form>
        <!-- FIN FORMULAIRE -->
      </section>


    </div>
  </body>
</html>