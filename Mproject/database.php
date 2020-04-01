<?php

  $database = mysqli_connect("localhost","root","","tetratheos");

function validateUser($username, $password)
{
  global $database;
  $sql = "select * from user where userID = '$username' and password = '$password'";
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

function findUser($userID){
  global $database;
  $sql = "select * from user where userID = '$userID'";
  $result = mysqli_query($database, $sql);
  return $result;
}

function validateEnrolKey($enrolmentKey, $enrolmentPass){
  global $database;
  $sql = "select * from subject where enrollmentKey = '$enrolmentKey' and password ='$enrolmentPass'";
  $result = mysqli_query($database, $sql);
  return $result;
}


function subjectEnrol($subjectID, $userID){
  global $database;
  $sql = "insert into enrollment(subjectID, studentID) Values('$subjectID', '$userID')";
  mysqli_query($database, $sql);
}

function validateDupSubject($subjectID,$userID){
  global $database;
  $sql = "select * from enrollment where subjectID = '$subjectID' and studentID = '$userID'";
  $result = mysqli_query($database, $sql);
  return $result;
}




?>
