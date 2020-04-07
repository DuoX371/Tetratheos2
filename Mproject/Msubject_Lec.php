<?php
  require "functions.php";
  include_once "database.php";
  include_once "session_checker.php";

  $subjects = findSubjectLec($_SESSION["currentUser"]["userID"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Tetratheos - SubjectL</title>
  <link rel="icon" href="tIcon.png">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  <!-- Custom styles for this template-->
  <link href="sb-admin-2.min.css" rel="stylesheet">
  <link href="selfcss.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Mproject_Lec.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="tIcon.png">
        </div>
        <div class="sidebar-brand-text mx-3">Tetratheos</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="Mproject_Lec.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Submission Received
      </div>

      <!-- Nav Item - Pages Collapse Menu -->



      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span>Subject</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Subject-list:</h6>
            <?php

            if(mysqli_num_rows($subjects)>0){
              while($record = mysqli_fetch_assoc($subjects)){
                if($record["assignmentType"] == "a")
                {
                  echo '<a class="collapse-item" href="Msubject_Lec.php">' . $record["subjectID"] . '</a>';
                }
              }
            }

             ?>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="Massign_Lec.php">
          <i class="fas fa-cogs"></i>
            Subject Assign
        </a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="Mmarking_Lec.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Marking</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">



    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts --><!--
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts --> <!---------------Database---------->
                <!--<span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <!-- Dropdown - Alerts -->
              <!--
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>-->


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["currentUser"]["name"]; ?></span>
                <img class="img-profile rounded-circle" src="kurumi.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="Mprofile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php
          $lecturerSubject = getLecturerSubjects($_SESSION["currentUser"]["userID"]);
          while($record = mysqli_fetch_assoc($lecturerSubject)){
            //var_dump($record);
            $assignments = getAssignments($record["subjectID"]);
            echo '<div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800" id="' . $record["subjectID"] . 'header">' . $record["subjectID"] . " " . $record["subjectName"] . '</h1>
            </div>';

            $counter = 1;
            while($row = mysqli_fetch_assoc($assignments)){
              $dueDate = new DateTime($row["dueDate"]);
              $dueDateDisplay = $dueDate->format("D, d F Y h:i A");

              if($row["assignmentType"] != "-"){
                echo '<div class="accordion" id="accordionExample">
                  <div class="card" style="margin-bottom:50px;">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#' . $row["assignmentID"] . '" aria-expanded="true" aria-controls="' . $row["assignmentID"] . '">
                          Assignment ' . $counter . '
                        </button>
                      </h2>
                    </div>

                    <div id="' . $row["assignmentID"] . '" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                      <table style="line-height: 4;">
                        <tr class="mscardindv">
                          <td class="mslcardwidth">
                            Datetime
                          </td>
                          <td class="mslcardwidth2">
                            Submitted by
                          </td>
                          <td class="mslcardwidth3">
                            File
                          </td>
                        </tr>';


                $viewSubmissions = viewSubmissions($_SESSION["currentUser"]["userID"],$row["assignmentID"]);
                while($read = mysqli_fetch_assoc($viewSubmissions)){
                  $submitDate = new DateTime($read["submissionDateTime"]);
                  $submitDateDayDisplay = $submitDate->format("l, j M Y");
                  $submitTime = new DateTime($read["submissionDateTime"]);
                  $submitTimeDisplay = $submitTime->format("g:sa");


                  $submitStudentName = submittedStudentName($read['studentID']);
                  while($rad = mysqli_fetch_assoc($submitStudentName)){
                  echo '
                          <tr class="mscardindv2">
                            <td class="mslcardwidth">
                              <a>' . $submitDateDayDisplay . '</a><br>
                              <a>' . $submitTimeDisplay . '</a>
                            </td>
                            <td class="mslcardwidth2">
                              ' . $rad["name"] . '
                            </td>
                            <td class="mslcardwidth3">
                              <a target="_blank" href="download.php?id=' . $read["submissionID"] . '">' . $read["submissionFileName"] . '</a>
                            </td>
                          </tr>';

                    }
                  }
                  echo '
                  </table>
                  </div>
                </div>

              </div>
            </div>';
                }
                else {
                  echo 'There are no assignments for this subject.';
                }
              }
            }
          ?>


          <!--Main Content-->
          <!--
          <div class="msdropdown" >
            <div class="mscard eXpand" onclick="show_hide()">
              <div>
                Assignment 1
                <span class='fas fa-angle-down msleft'></span>
              </div>
            </div>

            <div id="drop-content" class="mscardin" style="padding:0%;">
              <table>
                <tr class="mscardindv">
                  <td class="mslcardwidth">
                    Datetime
                  </td>
                  <td class="mslcardwidth2">
                    Submitted by
                  </td>
                  <td class="mslcardwidth3">
                    File
                  </td>
                </tr>
                <tr class="mscardindv2">
                  <td class="mslcardwidth">
                    <a>Thursday, 21 Mac 2020</a><br>
                    <a>10:34a.m.</a>
                  </td>
                  <td class="mslcardwidth2">
                    Johann
                  </td>
                  <td class="mslcardwidth3">
                    RenaiCirculation.mp3
                  </td>
                </tr>
                <tr class="mscardindv2">
                  <td class="mslcardwidth">
                    <a>Friday, 22 Mac 2020</a><br>
                    <a>10:35p.m.</a>
                  </td>
                  <td class="mslcardwidth2">
                    Jia Le
                  </td>
                  <td class="mslcardwidth3">
                    kurumi.png
                  </td>
                </tr>
              </table>

            </div>
          </div> -->



        </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white msftop">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form method="post" action="process.php">
            <button class="btn btn-primary" name="logout" type="submit">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- assignmentdropdown -->
  <script>
    function show_hide(){
      var click = document.getElementById("drop-content");
      if(click.style.display =="none"){
        click.style.display ="block";
      }else{
        click.style.display ="none";
      }
    }

    function show_hide2(){
      var click = document.getElementById("drop-content2");
      if(click.style.display =="none"){
        click.style.display ="block";
      }else{
        click.style.display ="none";
      }
    }

  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <!--Assignment submit button-->
  <script type="text/javascript">
  const realAddBtn = document.getElementById("realadd")
  const fakeAddBtn = document.getElementById("fakeadd")

  fakeAddBtn.addEventListener("click",function(){
    realAddBtn.click();
  });

  const realSaveBtn = document.getElementById("realsave")
  const fakeSaveBtn = document.getElementById("fakesave")

  fakeSaveBtn.addEventListener("click",function(){
    realSaveBtn.click();
  });

  const realAddBtn2 = document.getElementById("realadd2")
  const fakeAddBtn2 = document.getElementById("fakeadd2")

  fakeAddBtn2.addEventListener("click",function(){
    realAddBtn2.click();
  });

  const realSaveBtn2 = document.getElementById("realsave2")
  const fakeSaveBtn2 = document.getElementById("fakesave2")

  fakeSaveBtn2.addEventListener("click",function(){
    realSaveBtn2.click();
  });

  </script>

</body>

</html>
