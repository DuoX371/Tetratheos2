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

function getStudentSubjects($studentID){
    global $database;
    $sql = "select * from enrollment join subject using (subjectID) where studentID = '$studentID'";
    $result = mysqli_query($database, $sql);
    return $result;
}

function getLecturerSubjects($lecturerID){
    global $database;
    $sql = "select * from enrollment join subject using (subjectID) where lecturerID = '$lecturerID'";
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

function findStudent(){
  global $database;
  $sql = "select * from user where userType = 's'";
  $result = mysqli_query($database, $sql);
  return $result;
}

function findLecturer(){
  global $database;
  $sql = "select * from user where userType = 'l'";
  $result = mysqli_query($database, $sql);
  return $result;
}

function findSubjects(){
  global $database;
  $sql = "select * from user,subject where user.userID = subject.lecturerID and userType = 'l'";
  $result = mysqli_query($database, $sql);
  return $result;
}


function updateUser($name, $email, $phoneNum, $userID){
  global $database;
  $sql = "update user set name = '$name', email = '$email', phoneNumber = '$phoneNum' where userID = '$userID'";
  mysqli_query($database, $sql);
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

/*Add/Remove Student*/
function addStudent($studentID,$studentName,$studentContact,$studentEmail){
  global $database;
  $sql = "insert into user(userID, name, phoneNumber, email, userType, password) Values('$studentID', '$studentName','$studentContact', '$studentEmail', 's', 'abc')";
  mysqli_query($database, $sql);
}
/*delete student/lecturer function */
function delStudentLecturer($userID){
  global $database;
  $sql = "delete from user where userID = '$userID'";
  mysqli_query($database, $sql);
}
//drop student subject
function dropStudentSub($studentID){
  global $database;
  $sql = "delete from enrollment where studentID ='$studentID'";
  mysqli_query($database, $sql);
}

/*Add/Remove Lecturer*/
function addLec($lecID,$lecName,$lecContact,$lecEmail){
  global $database;
  $sql = "insert into user(userID, name, phoneNumber, email, userType, password) Values('$lecID', '$lecName','$lecContact', '$lecEmail', 'l', 'abc')";
  mysqli_query($database, $sql);
}

/*ADD/REMOVE Subject*/
function addSub($subID,$subName,$subLecturer,$subEnrolKey,$subEnrolPass){
  global $database;
  $sql = "insert into subject(subjectID, subjectName, lecturerID, enrollmentKey, password) Values('$subID', '$subName','$subLecturer','$subEnrolKey', '$subEnrolPass')";
  mysqli_query($database, $sql);
}

function delSubject($subjectID){
  global $database;
  $sql = "delete from subject where subjectID = '$subjectID'";
  mysqli_query($database, $sql);
}

?>
