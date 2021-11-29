<!DOCTYPE html>
<html>

<head>
  <title>3A_3DJV</title>
  <link rel="stylesheet" href="css.css">
  <meta charset="utf-8"/>
</head>


  <body>
    <div class="wrapper">


      <h1>Site 3A 3DJV V0.1</h1>
      <header>
      <p>Système de gestion des 3ème année 3DJV</p>
      <p>(Ce site est pour aider la classe 3A3DJV et est constament en cours de développement. Tu veux l'améliorer? demande à Marcel)</p>
    </header>


      <nav> 
        <H2>Fichiers de cours</H2>
        <!--
        <dt>Initation C++</dt>
          <?php //REQUETES FICHIERS DANS LE DIR
            foreach(glob('cours/init_cpp/*') as $fname){
              echo ' - ' . '<a href="' . $fname . '" download>' . substr($fname, 15) . ' </a> <br>'; 
            }?>
        <dt>Maths Pour L'infographie</dt>
            <?php //REQUETES FICHIERS DANS LE DIR
            foreach(glob('cours/math_info/*') as $fname){
              echo ' - ' . '<a href="' . $fname . '" download>' . substr($fname, 16) . ' </a> <br>'; 
            }?>
        <dt>Algo Avancée</dt>
            <?php //REQUETES FICHIERS DANS LE DIR
            foreach(glob('cours/algo_avan/*') as $fname){
              echo ' - ' . '<a href="' . $fname . '" download>' . substr($fname, 16) . ' </a> <br>'; 
            }?>
        <dt>Scripting Shell Python</dt>
            <?php //REQUETES FICHIERS DANS LE DIR
            foreach(glob('cours/scri_shel_pyth/*') as $fname){
              echo ' - ' . '<a href="' . $fname . '" download>' . substr($fname, 21) . ' </a> <br>'; 
            }?>
        <dt>Prog JV</dt>
            <?php //REQUETES FICHIERS DANS LE DIR
            foreach(glob('cours/prog_jv/*') as $fname){
              echo ' - ' . '<a href="' . $fname . '" download>' . substr($fname, 14) . ' </a> <br>'; 
            }?>
        <dt>Ro et IA</dt>
            <?php //REQUETES FICHIERS DANS LE DIR
            foreach(glob('cours/roet_ia/*') as $fname){
              echo ' - ' . '<a href="' . $fname . '" download>' . substr($fname, 14) . ' </a> <br>'; 
            }?>
        <dt>Projet Annuel</dt>
            <?php //REQUETES FICHIERS DANS LE DIR
            foreach(glob('cours/proj_annu/*') as $fname){
              echo ' - ' . '<a href="' . $fname . '" download>' . substr($fname, 16) . ' </a> <br>'; 
            }?>
        <dt>Game Design</dt>
            <?php //REQUETES FICHIERS DANS LE DIR
            foreach(glob('cours/game_desi/*') as $fname){
              echo ' - ' . '<a href="' . $fname . '" download>' . substr($fname, 16) . ' </a> <br>'; 
            }?>
        <dt>Modèle 3D</dt>
            <?php //REQUETES FICHIERS DANS LE DIR
            foreach(glob('cours/mode_3d/*') as $fname){
              echo ' - ' . '<a href="' . $fname . '" download>' . substr($fname, 14) . ' </a> <br>'; 
            }?>
        <dt>Gestion de Projet</dt>
            <?php //REQUETES FICHIERS DANS LE DIR
            foreach(glob('cours/gest_proj/*') as $fname){
              echo ' - ' . '<a href="' . $fname . '" download>' . substr($fname, 16) . ' </a> <br>';
            }?>
        -->
            <?php //REQUETES FICHIERS DANS LE DIR
            foreach(glob('cours/*') as $ffichier){
              echo '<dt>' . substr($ffichier, 6) . '</dt>';
              foreach(glob($ffichier.'/*') as $fname){
                echo ' - ' . '<a href="' . $fname . '" download>' . substr($fname, 16) . ' </a> <br>';
              }
            }
            ?>
          <br>
        <form action="FileUpload.php" method="post">
            <label>Ajouter un fichier:</label>
            <input type="file" name="browse" id="upload"><br/>
            <label for="cars">Cours:</label>
            <select>
              <option value="init_cpp">Initiation c++</option>
              <option value="math_info">Math p/ L'info</option>
              <option value="algo_avan">Algo Avancée</option>
              <option value="scri_shel_pyth">Scrip Shell & Python</option>
              <option value="prog_jv">Prog JV</option>
              <option value="roet_ia">RO & IA</option>
              <option value="proj_annu">Projet Annuel</option>
              <option value="game_desi">Game Design</option>
              <option value="mode_3d">Model 3D</option>
              <option value="gest_proj">Gestion Projet</option>
            </select>
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
        <form method='POST' action='Login.php'>
          <tr>
            <td>
              <font>Date </font>
            </td>
            <td><input type ='date' name='nom'/></td>
          </tr>
          <tr>
            <td>
              <font>Titre </font>
            </td>
            <td><input type ='text' name='titre'/></td>
          </tr>
          <tr>
          <tr>
            <td>
              <font>Description </font>
            </td>
            <td><input type ='text' name='description'/></td>
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