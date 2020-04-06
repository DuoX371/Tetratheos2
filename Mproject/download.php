<?php
  require "functions.php";
  include_once "database.php";

  if (isset($_GET['id'])){
     $id = $_GET['id'];
     $query = "SELECT * FROM submission WHERE submissionID = '$id'";
     $result = mysqli_query($database,$query);

     list($id,$dateTime,$fileName,$content,$size,$type,$studentID,$subjectID, $assignmentID) = mysqli_fetch_array($result);

     header("Content-length: $size");
		 header("Content-type: $type");
		 header("Content-Disposition: attachment; filename=$fileName");

     //$content = base64_decode($content);
     ob_clean();
     flush();
     $content = base64_decode($content);
     //var_dump($content);
     //$content = stripslashes($content);
     echo $content;
     //$content = base64_decode($content);
   }


 ?>
