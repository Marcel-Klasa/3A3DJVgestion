<?php
  $titre = $_POST['titre_'];
  $date = $_POST['date_'];
  $description = $_POST['description_'];

  $con = mysqli_connect("localhost","root","root","3A_3DJV");

  $Freq = "INSERT INTO events (Date,Titre,Description)
            VALUES ('$date','$titre','$description')";

  $Fresult = mysqli_query($con, $Freq);

   if (!$Fresult) {
    echo 'Could not run query: ' . mysqli_error($con);
    exit; };
    
  mysqli_free_result($Fresult);
  mysqli_close($con);

  header("Location: index.php");
?>