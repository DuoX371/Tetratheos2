<?php
  require "functions.php";
  include_once "database.php";


  if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $validateUser = validateUser($username, $password);

    if(mysqli_num_rows($validateUser) > 0){
      $userDetails = mysqli_fetch_assoc($validateUser);
      $_SESSION["currentUser"] = $userDetails;
      if($userDetails["userType"] == "a"){
        gopage("Mproject_Adm.php");
      }
      elseif($userDetails["userType"] == "s"){
        gopage("Mproject.php");
      }
      elseif($userDetails["userType"] == "l"){
        gopage("Mproject_Lec.php");
      }

    } else {
      jsalert("Please enter a valide User ID or password");
      gopage("Mlogin.php");
    }


  }

  if(isset($_POST["logout"])){
    unset($_SESSION["currentUser"]);
    gopage("Mlogin.php");
  }

  if(isset($_POST["enrolBtn"])){
    
    $enrolmentKey = $_POST["enrolmentKey"];
    $enrolmentPass = $_POST["enrolPass"];

    $validateEnrolKey = validateEnrolKey($enrolmentKey, $enrolmentPass);

    if(mysqli_num_rows($validateEnrolKey) > 0){
      $enrolDetails = mysqli_fetch_assoc($validateEnrolKey);

      $a = validateDupSubject($enrolDetails["subjectID"],$_SESSION["currentUser"]["userID"]);
      //echo 'aa';

      if(mysqli_num_rows($a) != 0){
        jsalert("Duplicate");
        gopage("Menrol.php");
      }
      else
      {
        subjectEnrol($enrolDetails["subjectID"], $_SESSION["currentUser"]["userID"]);
        //var_dump($_SESSION["currentUser"]);
        jsalert("Enrolment succesfull!");
        gopage("Menrol.php");
      }
    }


    else
      {
        jsalert("Wrong enrolment key or password. Please try again.");
        gopage("Menrol.php");
      }
  }

?>
