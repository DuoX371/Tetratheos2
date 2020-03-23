<?php
  //var_dump($_POST["username"]);
  include_once "database.php";
  require "functions.php";


  if(isset($_POST["login"])){
//echo "dsadsa";
    $username = $_POST["username"];
    $password = $_POST["password"];

    $validateUser = validateUser($username, $password);
    //$validateA101 = validateUser("A101", "abc");
    //validateUser($username, $password);
    if(mysqli_num_rows($validateUser) > 0){
      $userDetails = mysqli_fetch_assoc($validateUser);
      if($userDetails["userType"] == "a"){
        echo "ADMIN PAGE UNDER MAINTAINENCE";
      }
      elseif($userDetails["userType"] == "s"){
        gopage("Mprofile.php");
      }
      elseif($userDetails["userType"] == "l"){
        echo "STUDENT PAGE AND ADMIN PAGE UNDER MAINTAINENCE, LECTURER PAGE NO NEED ASK LA";
      }

    } else {
      jsalert("Please enter a valide User ID or password");
      gopage("Mlogin.php");
    }


  }
?>
