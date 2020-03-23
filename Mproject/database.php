<?php

  $database = mysqli_connect("localhost","root","","tetratheos");

function validateUser($username, $password)
{
  global $database;
  $sql = "select * from user where userID = '$username' and password = '$password'";
  //var_dump($sql);
  $result = mysqli_query($database, $sql);
  return $result;
}

?>
