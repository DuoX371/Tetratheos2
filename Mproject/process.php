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

/*---Student---*/
  //update profile
  if(isset($_POST["updateProfBtnStu"])){
    //var_dump($_POST);
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phoneNum = $_POST["phone"];
    $password = $_POST["password"];

    updateUser($username, $email, $phoneNum, $password, $_SESSION["currentUser"]["userID"]);
    jsalert("You have succesfully update your profile!");
    gopage("Mprofile.php");


  }

  //enrol subject
  if(isset($_POST["enrolBtn"])){

    $enrolmentKey = $_POST["enrolmentKey"];
    $enrolmentPass = $_POST["enrolPass"];

    $validateEnrolKey = validateEnrolKey($enrolmentKey, $enrolmentPass);

    if(mysqli_num_rows($validateEnrolKey) > 0){
      $enrolDetails = mysqli_fetch_assoc($validateEnrolKey);

      $validateDupSub = validateDupSubject($enrolDetails["subjectID"],$_SESSION["currentUser"]["userID"]);
      //echo 'aa';

      if(mysqli_num_rows($validateDupSub) != 0){
        jsalert("You have already enroled this subject!");
        gopage("Menrol.php");
      }
      else
      {
        subjectEnrol($enrolDetails["subjectID"], $_SESSION["currentUser"]["userID"]);
        //var_dump($_SESSION["currentUser"]);
        jsalert("You have succesfully enroled!");
        gopage("Menrol.php");
      }
    }

    else
      {
        jsalert("Wrong enrolment key or password. Please try again.");
        gopage("Menrol.php");
      }
  }

//student upload assignment
if(isset($_POST["uploadFile"])){
  var_dump($_POST);
  $submissionID = $_POST["submissionID"];
  $name = $_FILES['myfile']['name'];
  $submissionFile = file_get_contents($_FILES['myfile']['tmp_name']);
  $type = $_FILES['myfile']['type'];
  $subjectID = $_POST["subjectID"];
  $assignmentID = $_POST["assignmentID"];
  var_dump($_FILES);

  //uploadAssignmentUpdate($submissionFile, $submissionID);
  uploadAssignmentInsert($submissionID, $name, $submissionFile, $type, $_SESSION["currentUser"]["userID"], $subjectID, $assignmentID);

  $subjectName = $_POST["subjectName"];
  jsalert("You have uploaded file for assignment $subjectName.");
  //gopage("Msubject.php");
}

  /*$selectSubmissions = selectSubmissions($_SESSION["currentUser"]["userID"], $row["assignmentID"]);
  while ($read = mysqli_fetch_assoc($selectSubmissions)){
    $submitDate = new DateTime($read["submissionDateTime"]);
    $submitDateDisplay = $submitDate->format("D, d F Y h:i A");

    echo $read['submissionDateTime'];
    echo $read[]
  }*/

//lecturer view assignment


//lecturer
if(isset($_POST["updateProfBtnLec"])){
  //var_dump($_POST);
  $username = $_POST["username"];
  $email = $_POST["email"];
  $phoneNum = $_POST["phone"];
  $password = $_POST["password"];

  updateUser($username, $email, $phoneNum, $password, $_SESSION["currentUser"]["userID"]);
  jsalert("You have succesfully update your profile!");
  gopage("Mprofile_Lec.php");


}


//admin add student profile
if(isset($_POST['addStudentProf'])){

  $studentID = $_POST["addStudentID"];
  $studentName = $_POST["addStudentName"];
  $studentContact = $_POST["addStudentContact"];
  $studentEmail = $_POST["addStudentEmail"];

  addStudent($studentID,$studentName,$studentContact,$studentEmail);
  jsalert("You have succesfully added user profile $studentID!");
  gopage("Maccount_adm.php");

}

//admin remove student profile
if(isset($_POST['removeStudentProf'])){

  $studentID = $_POST["studentID"];
  delStudentLecturer($studentID);
  dropStudentSub($studentID);
  jsalert("You have succesfully deleted student profile $studentID!");
  gopage("Maccount_adm.php");
}

//admin add lecturer profile
if(isset($_POST['addLecProf'])){

  $lecID = $_POST["addLecID"];
  $lecName = $_POST["addLecName"];
  $lecContact = $_POST["addLecContact"];
  $lecEmail = $_POST["addLecEmail"];

  addLec($lecID,$lecName,$lecContact,$lecEmail);
  jsalert("You have succesfully added user profile $lecID!");
  gopage("Maccount_adm.php");

}
//admin delete lecturer profile
if(isset($_POST['removeLecProf'])){

  $lecID = $_POST["lecID"];
  delStudentLecturer($lecID);
  //dropStudentSub($studentID);
  jsalert("You have succesfully deleted lecturer profile $lecID!");
  gopage("Maccount_adm.php");
}

//admin add subject
if(isset($_POST['addSubjectBtn'])){

  $subID = $_POST["addSubjectID"];
  $subName = $_POST["addSubjectName"];
  $subLecturer = $_POST["addSubjectLec"];
  $subEnrolKey = $_POST["addSubjectEnrolKey"];
  $subEnrolPass = $_POST["addSubjectEnrolPass"];

  addSub($subID,$subName,$subLecturer,$subEnrolKey,$subEnrolPass);
  jsalert("You have succesfully added user profile $subID!");
  gopage("Maccount_adm.php");

}
//delete subject
if(isset($_POST['removeSubject'])){

  $subjectID = $_POST["subjectID"];
  delSubject($subjectID);
  jsalert("You have succesfully deleted subject ID $subjectID!");
  gopage("Maccount_adm.php");
}

//announcement
if(isset($_POST['announcementSaveBtn'])){

  $announcementContent = $_POST['announmentAdmin'];

  addAnnouncementContent($announcementContent,$_SESSION["currentUser"]["userID"]);
  jsalert("Successfully updated announment!");
  gopage("Mproject_Adm.php");

}
if(isset($_POST['noteSaveBtn'])){

  $noteContent = $_POST['noteContent'];

  addNoteContent($noteContent,$_SESSION["currentUser"]["userID"]);
  jsalert("Successfully updated note!");
  gopage("Mproject_Adm.php");

}

if(isset($_POST['selectSubject'])){

  $lecturerStudent = lecturerStudent($_SESSION["currentUser"]["userID"],$_POST['subjectID']);
  $students = array();
  while ($record = mysqli_fetch_assoc($lecturerStudent)){
    $optionStudent = optionStudentDisplay($record['studentID']);
    $studentDetails = mysqli_fetch_assoc($optionStudent);

    //$record["name"] = $studentDetails['name'];
    array_push($record, $studentDetails['name']);
    array_push($students, $record);
  }
  echo json_encode($students);

  //echo $_POST['subjectID'];
}
if(isset($_POST['subjectNameDisplay'])){
  $displaySubject = displaySubject($_POST['subjectID']);
  $record = mysqli_fetch_assoc($displaySubject);

  echo $record['subjectName'];
}

if(isset($_POST['saveMarksBtn'])){

  $subjectID = $_POST['subjectID'];
  $studentID = $_POST['studentID'];

  $mark1 = $_POST['a'];
  $assignmentID1 = $subjectID.'a';
  //insertMarks($mark1,$assignmentID1,$studentID);
  updateMarks($mark1,$assignmentID1,$studentID);

  $mark2 = $_POST['b'];
  $assignmentID2 = $subjectID.'b';
  //insertMarks($mark2,$assignmentID2,$studentID);
  updateMarks($mark2,$assignmentID2,$studentID);

  $mark3 = $_POST['c'];
  $assignmentID3 = $subjectID.'c';
  //insertMarks($mark2,$assignmentID2,$studentID);
  updateMarks($mark3,$assignmentID3,$studentID);

  jsalert("Successfully updated marks");
  gopage("Mmarking_Lec.php");

}
if(isset($_POST['saveAssignmentDateBtn'])){
  //var_dump($_POST);

  if($_POST['a']!=""){
    $subjectID = $_POST['subjectID'];
    $dueDate1 = $_POST['a'];
    $assignmentID1 = $subjectID.'a';
    $assignmentType1 = 'a';
    //insertDueDate($assignmentID1,$dueDate1,$assignmentType1,$subjectID);
    updateDueDate($assignmentID1,$dueDate1,$assignmentType1,$subjectID);
  }

  if($_POST['b']!=""){
  $subjectID = $_POST['subjectID'];
  $dueDate2 = $_POST['b'];
  $assignmentID2 = $subjectID.'b';
  $assignmentType2 = 'b';
  //insertDueDate($assignmentID2,$dueDate2,$assignmentType2,$subjectID);
  updateDueDate($assignmentID2,$dueDate2,$assignmentType2,$subjectID);
}

  if($_POST['c']!=""){
  $subjectID = $_POST['subjectID'];
  $dueDate3 = $_POST['c'];
  $assignmentID3 = $subjectID.'c';
  $assignmentType3 = 'c';
  //insertDueDate($assignmentID3,$dueDate3,$assignmentType3,$subjectID);
  updateDueDate($assignmentID3,$dueDate3,$assignmentType3,$subjectID);
}

  jsalert("Successfully updated assignment due date.");
  gopage("Massign_Lec.php");

}




?>
