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
    $sql = "select * from subject where lecturerID = '$lecturerID'";
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


function updateUser($name, $email, $phoneNum, $password, $userID){
  global $database;
  $sql = "update user set name = '$name', email = '$email', phoneNumber = '$phoneNum', password = '$password' where userID = '$userID'";
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

//admin announcement
function addAnnouncementContent($announcementContent,$adminID){
  global $database;
  $sql = "update announcement set announcementInfo = '$announcementContent' where adminID = '$adminID'";
  mysqli_query($database, $sql);
}
function selectAnnouncement(){
  global $database;
  $sql = "select * from announcement";
  $result = mysqli_query($database, $sql);
  return $result;
}
function addNoteContent($announcementContent,$adminID){
  global $database;
  $sql = "update announcement set announcementNote = '$announcementContent' where adminID = '$adminID'";
  mysqli_query($database, $sql);
}

//upload assignment
function uploadAssignmentInsert($submissionID, $submissionFile, $studentID, $subjectID, $assignmentID){
  global $database;
  $sql = "insert into submission(submissionID,	submissionDateTime,	submissionFile,	studentID,	subjectID,	assignmentID)
          Values ('$submissionID', current_timestamp(), '$submissionFile', '$studentID', '$subjectID', '$assignmentID')";
  mysqli_query($database, $sql);
}
function uploadAssignmentUpdate($submissionFile, $submissionID){
  global $database;
  $sql = "update submission set submissionDateTime = current_timestamp(), submissionFile='$submissionFile' where submissionID = '$submissionID' ";
  mysqli_query($database, $sql);
}
function getAssignmentSubmissions($subjectID){
  global $database;
  $sql = "select * from submission,assignment where submission.subjectID = assignment.subjectID and subject.subjectID = '$subjectID'";
  $result = mysqli_query($database, $sql);
  return $result;
}
//
function selectSubmissions($userID,$assignmentID){
  global $database;
  $sql = "select * from submission where studentID = '$userID' and assignmentID = '$assignmentID'";
  $result = mysqli_query($database, $sql);
  return $result;
}
//view submission lecturer
function viewSubmissions($lecturerID,$assignmentID){
  global $database;
  $sql = "select * from submission join subject using (subjectID) where lecturerID='$lecturerID' and assignmentID = '$assignmentID'";
  $result = mysqli_query($database, $sql);
  return $result;
}
function submittedStudentName($studentID){
  global $database;
  $sql = "select * from user where userID = '$studentID'";
  $result = mysqli_query($database, $sql);
  return $result;
}

/*Marking page*/
//admin marking find lecturer studentID
function lecturerStudent($lecturerID,$subjectID){
  global $database;
  $sql = "select * from enrollment join subject using (subjectID) where lecturerID = '$lecturerID' and subjectID = '$subjectID'";
  $result = mysqli_query($database, $sql);
  return $result;
}
function optionStudentDisplay($studentID){
  global $database;
  $sql = "select * from user where userID = '$studentID'";
  $result = mysqli_query($database, $sql);
  return $result;
}
function displaySubject($subjectID){
  global $database;
  $sql = "select * from subject where subjectID='$subjectID'";
  $result = mysqli_query($database, $sql);
  return $result;
}
function updateMarks($assigmentID,$studentID){
  global $database;
  $sql = "update assignmentmark set mark = '$mark' where assignmentID = '$assigmentID' and studentID = '$studentID'";
  $result = mysqli_query($database, $sql);
}



?>
