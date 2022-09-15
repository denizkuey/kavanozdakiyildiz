<?php

if (isset($_POST['submit'])) {

  $newFileName = $_POST['filename'];
  if (empty($newFileName)) {
    $newFileName = "podcast";
  } else {
    $newFileName = strtolower(str_replace(" ", "-", $newFileName));
  }
  $audioTitle = $_POST['filetitle'];
  $audioDesc = $_POST['filedesc'];

  $file = $_FILES['file'];

  $fileName = $file["name"];
  $fileType = $file["type"];
  $fileTempName = $file["tmp_name"];
  $fileError = $file["error"];
  $fileSize = $file["size"];

  $fileExt = explode(".", $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array("mp3");

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 1000000000000) {
        $audioFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
        $fileDestination = "../audio/" . $audioFullName;

        include_once "dbh.inc.php";

        if (empty($audioTitle) || empty($audioDesc)) {
          header("Location: ../encrypted.html?upload=empty");
          exit();
        } else {
          $sql = "SELECT * FROM podcasts;";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed!";
          } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $rowCount = mysqli_num_rows($result);
            $setaudioOrder = $rowCount + 1;

            $sql = "INSERT INTO podcasts (titlePodcast, descPodcast, audioFullNamePodcast, orderPodcast) VALUES (?, ?, ?, ?);";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed!";
            } else {
              mysqli_stmt_bind_param($stmt, "ssss", $audioTitle, $audioDesc, $audioFullName, $setaudioOrder);
              mysqli_stmt_execute($stmt);

              move_uploaded_file($fileTempName, $fileDestination);

              header("Location: ../episodes.php?upload=success");
            }
          }
        }
      } else {
        echo "File size is too big!";
        exit();
      }
    } else {
      echo "You had an error!";
      exit();
    }
  } else {
    echo "You need to upload a proper file type!";
    exit();
  }

}
