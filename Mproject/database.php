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

function findSubjectAssignment($studentID)
{
  global $database;
  $sql = "select * from enrollment join subject using (subjectID) join assignment using (subjectID) where studentID = '$studentID'";
  $result = mysqli_query($database, $sql);
  return $result;
}

function getAssignments($subjectID)
{
  global $database;
  $sql = "select * from assignment where subjectID = '$subjectID'";
  $result = mysqli_query($database, $sql);
  return $result;
}

function findSubjectLec($lecturerID){
  global $database;
  $sql = "select * from subject join assignment using (subjectID) where lecturerID = '$lecturerID'";
  $result = mysqli_query($database, $sql);
  return $result;
}












?>
