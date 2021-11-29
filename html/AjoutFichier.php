<?php
    $currentDirectory = getcwd();
    $uploadDirectory = "/cours/";
    $uploadClass = $_POST["cours"];

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png','txt','svg','pdf']; // These will be the only file extensions allowed 

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . $uploadClass . "/" . basename($fileName); 

    if (isset($_POST['cours'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a jpeg/jpg,png,txt,svg,pdf file";
      }

      if ($fileSize > 30000000) {
        $errors[] = "File exceeds maximum size (30MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        echo $uploadClass;
        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded";
        } else {
          echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" . "\n";
        }
      }

    }

    header("Location: index.php");
?>