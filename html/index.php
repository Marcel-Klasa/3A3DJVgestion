<!DOCTYPE html>
<html>

<head>
  <title>3Adazd_3DJV</title>
  <link rel="stylesheet" type="text/css" href="css/css.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap-grid.css">
  <meta charset="utf-8"/>
</head>


  <body>
    <div class="wrapper">

      <center>
        <h1>Site 3A 3DJV V0.4</h1>
      
      <header>

      <div class="row">
        <div class="col border opaque" style="max-width:50%;margin-left:25%">
          <p>Système de gestion des 3ème année 3DJV</p>
          <p>(Ce site est pour aider la classe 3A3DJV et est constament en cours de développement. Tu veux l'améliorer? demande à Marcel)</p>
          <p> /////// Si tu veux t'amuser à hacker/pirater/crash le système, je ne vais pas m'amuser à le réparer 10000000 fois ///////</p>
        </div>
      </div>
      </header>
      </center>
      <br><br>
      <div class="row"style=";margin-left:24%">
        <div class="col-3 border opaque"> 
          <center>
          <H2>Fichiers de cours :</H2>
	  <?php //REQUETES FICHIERS DANS LE DIR
          foreach(glob('cours/*') as $ffichier){
            echo '<dt>' . substr($ffichier, 6) . '</dt>';
            foreach(glob($ffichier.'/*') as $fname){
              echo ' - ' . '<a  style="color:white;text-decoration:underline;" href="' . $fname . '" download>' . substr($fname, 16) . ' </a> <br>';
            }
          }
          ?>
          <br>
	    <h2> Ajouter un fichier </h2>
            <h3>Cours:</h3>
              <div class="form-group">
                <select class="form-control form-control-sm" name="cours" form="fichier" style="max-width: 50%">
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
              </div>
          
          <form action="AjoutFichier.php" method="post" id="fichier" enctype="multipart/form-data">
              <h3>Ajouter un fichier:</h3>
              <input class="form-control" style="width:50%"type="file" name="the_file"><br/>

              <input class="btn btn-primary" style="width:20%" type="submit" name="upload" value="Send">
          </form>
        </center>
        </div>
      
        <div class="col-5 border opaque">
          <center>
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
          <h3> Ajouter un evenement: </h3>
          <form method='POST' action='AjoutEvent.php'>
            <tr>
              <td>
                <label>Date </label>
              </td>
              <td><input class="form-control" style="width:50%" type='date' placeholder="Date..." name='date_'/></td>
            </tr><br><br>
            <tr>
              <td>
                <label>Titre </label>
              </td>
              <td><input  class="form-control" style="width:50%" placeholder="Titre..." type='text' name='titre_'/></td>
            </tr><br><br>
            
            <tr>
              <td>
                <label>Description </label>
              </td>
              <td><input class="form-control" style="width:50%" placeholder="Description..." type='text' name='description_'/></td>
            </tr>
            <tr><br><br>
              <td colspan='2'>
                <input type="submit" class="btn btn-primary" style="width:20%" name='valid' value="Ajouter"/>
              </td>
            </tr>
          </form>
        </center>
          <!-- FIN FORMULAIRE -->
        </div>
      </div>
    </div>
  </body>
</html>
