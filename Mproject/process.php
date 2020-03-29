<?php
  //var_dump($_POST["username"]);
  require "functions.php";
  include_once "database.php";


  if(isset($_POST["login"])){
//echo "dsadsa";
    $username = $_POST["username"];
    $password = $_POST["password"];

    $validateUser = validateUser($username, $password);
    //$validateA101 = validateUser("A101", "abc");
    //validateUser($username, $password);
    if(mysqli_num_rows($validateUser) > 0){
      $userDetails = mysqli_fetch_assoc($validateUser);
      $_SESSION["currentUser"] = $userDetails;
      if($userDetails["userType"] == "a"){
        echo "ADMIN PAGE UNDER MAINTAINENCE";
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


?>
