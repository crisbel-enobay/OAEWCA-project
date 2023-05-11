<?php
    include '../file/session_start.php';
    include '../forms/adminQueries.php';
    include "admin-checker.php";
    include '../file/logout-function.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage Questions</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style-admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/img/ucc.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="../views/admin.php">
            <img src="../assets/img/Kursonada.png" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="../views/admin.php"><img src="../assets/img/Kursonada-mini.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome <?php echo ($_SESSION['fullname']); ?>!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
               <span class="font-weight-normal"> <?php echo ($_SESSION['fullname']); ?> </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <p class="mb-1 mt-3"><?php echo ($_SESSION['fullname']); ?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo ($_SESSION['email']); ?></p>
                </div>
                <a href="?log=out" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo ($_SESSION['fullname']); ?></p>
                  <p class="designation">Administrator</p>
                </div>
                <div class="icon-container">
                  <i class="icon-user"></i>
                  <div class="dot-indicator bg-success"></div>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Admin Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin-courses.php">
                <span class="menu-title">Courses</span>
                <i class="icon-list menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-subjects" aria-expanded="false" aria-controls="ui-subjects">
                <span class="menu-title">Subjects</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-subjects">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../views/manage-subjects.php">Manage Subjects</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/new-subject.php">New Subject</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item active">
              <a class="nav-link" data-toggle="collapse" href="#ui-topics" aria-expanded="false" aria-controls="ui-topics">
                <span class="menu-title">Topics</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-topics">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../views/manage-topics.php">Manage Topics</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/new-topic.php">New Topic</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin-schedule.php">
                <span class="menu-title">Schedule</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-applicants" aria-expanded="false" aria-controls="ui-applicants">
                <span class="menu-title">Applicants</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-applicants">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../views/results.php">Results</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/examiners.php">Examiners</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/unverified.php">Unverified Applicants</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">Topics listing</li>
                <li class="breadcrumb-item"><a href="../views/manage-topics.php">Manage Topics</a></li>
               <!-- <li class="breadcrumb-item"><a href="../views/admin-duration.php">Durations</a></li>-->
                <!-- <li class="breadcrumb-item"><a href="../views/archived_topic.php">Archives</a></li> -->
              </ol>
            </nav>
          </div>
          <!-- Quick Action Toolbar Starts-->
          <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <p class="lead mb-0 ">
                      <?php
                      include 'conn.php';
                      $tile = mysqli_query($conn,
                      "SELECT subj_name
                      FROM tbl_exam_subjects where subj_id = 1
                      ");
                      $title = $tile->fetch_assoc();
                      echo $title['subj_name'];
                      ?>

                    </p>
                  </div>
                  <div class="table-responsive border rounded p-1">
                    <table class="table table-hover datatable">
                      <thead>
                        <tr>
                          <th scope="col">QUESTIONS</th>
                          <th scope="col">ANSWERS</th>
                          <th scope="col">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include 'conn.php';
                        $sql = mysqli_query($conn,
                        "SELECT *
                        FROM tbl_topic_questions INNER JOIN tbl_exam_topics ON tbl_topic_questions.que_topic =  tbl_exam_topics.topic_id where topic_subj = ".$_SESSION['quest_sub'].";
                        ");
                        $sqlrows = mysqli_fetch_all($sql, MYSQLI_ASSOC);
                        $rows = $sqlrows;
                        $i = 0;
                        while ($i < count($rows)) {   //Creates a loop to loop through results
                          $row = $rows[$i];
                          $id = $row['que_id'];
                          $name = $row['que_desc'];
                          $ansID = array();
                          $answers = array();
                          
                          include 'conn.php';
                          $answersql = "select * from tbl_que_answers where que_id = '".$id."'";
                          $result = $conn->query($answersql);
                          while ($check = $result->fetch_assoc()){
                            array_push($ansID, $check['ans_id']);
                            array_push($answers, $check['ans_desc']);
                          }

                          echo "<tr>
                                    <td>" . $name . "</td>
                                    <td>" .
                            "<div class='d-flex '>
                                <form method='POST'>
                                <button type='button' id='addbutton' class = 'btn btn-primary editbtn' data-bs-toggle='modal' data-bs-target='#addModal' data-editid='$id'";
                                echo 'data-editName="'.$name.'"';
                                
                                echo " data-optA_id='".$ansID[0]."' data-optB_id='".$ansID[1]."' 
                                data-optC_id='".$ansID[2]."' data-optD_id='".$ansID[3]."' 
                                data-optA='".$answers[0]."' data-optB='".$answers[1]."' 
                                data-optC='".$answers[2]."' data-optD='".$answers[3]."' 
                                onClick='addQuestion(this)'>
                                Manage Answers
                               </button>
                               ";
                          echo "</form>" .
                            "</div>" .
                            "</td>" .
                            "<td>" .
                            "<div class='d-flex '>
                                <form method='POST'>
                                
                            <button type='button' class='btn btn-danger delbtn' data-bs-toggle='modal' data-bs-target='#delmodal' data-courseid='$id'";
                            echo 'data-question="'.$name.'"' ;
                             echo "onClick='archiveCourse(this)'><i class='fa fa-trash-o'></i></button> </form>" .
                            "</div>" .
                            "</td>" .
                            "</td>
                                  </tr>";  //$row['index'] the index here is a field name
                          $i++; 
                        }
                        ?>
                      </tbody>
                    </table>
                      </div>
                  </div>
              </div>

              <!-- Add Bus-->
              <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="addModalLabel">Add a Question</h5>
                    </div>

                    <form method="POST">
                          <input type="hidden" name="edt_id" id="edt_id" />
                          <input type="hidden" name="optA_id" id="optA_id" />
                          <input type="hidden" name="optB_id" id="optB_id" />
                          <input type="hidden" name="optC_id" id="optC_id" />
                          <input type="hidden" name="optD_id" id="optD_id" />
                      <div class="modal-body p-5">
                        <div class="mb-3">
                          <label>Question</label>
                          <textarea name="question" class="form-control" id="question" rows="5" cols="45" required> </textarea>
                        </div>
                        <div class="mb-3">
                          <label>Option A</label>
                          <input type="text" name="opta" class="form-control" id="optA" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Option B</label>
                          <input type="text" name="optb" class="form-control" id="optB" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Option C</label>
                          <input type="text" name="optc" class="form-control" id="optC" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Option D</label>
                          <input type="text" name="optd" class="form-control" id="optD" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Correct Answer</label>
                          <select name="rightopt" class="form-control" id="rightopt" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            
                          </select>
                        </div>
                        </div>
                      <div class="modal-footer">
                        <input type="submit" name="Add" class="btn btn-primary" id="btnAdd" value="Update"/>
                        <?php
                          
                          if (isset($_POST['Add'])){
                          include 'conn.php';
                          $qId = $_POST['edt_id'];
                          $edtQS = mysqli_real_escape_string($conn, $_POST['question']);           
                          $edtA = mysqli_real_escape_string($conn, $_POST['opta']);                      
                          $edtB = mysqli_real_escape_string($conn, $_POST['optb']);                      
                          $edtC = mysqli_real_escape_string($conn, $_POST['optc']);                      
                          $edtD = mysqli_real_escape_string($conn, $_POST['optd']);
                          $edtAId= $_POST['optA_id'];                      
                          $edtBId = $_POST['optB_id'];                      
                          $edtCId = $_POST['optC_id'];                      
                          $edtDId = $_POST['optD_id'];                       
                          $edtright = $_POST['rightopt'];                  
                          
                          $addQuestion = mysqli_query($conn,
                          "UPDATE tbl_topic_questions SET que_desc = '".$edtQS."' 
                          WHERE que_id = ".$qId."
                          ");
                          $search = mysqli_query($conn,
                          "select * from tbl_topic_questions where que_desc='".$edtQS."'
                          ");
                          while($row = $search->fetch_assoc()) {
                            $qidd = $row['que_id'];
                          }
                          $aright = 0; $bright = 0; $cright = 0; $dright = 0;
                          if ($edtright == "A") {$aright = 1;}
                          else if ($edtright == "B") {$bright = 1;}
                          else if ($edtright == "C") {$cright = 1;}
                          else if ($edtright == "D") {$dright = 1;}
                          $addA = mysqli_query($conn,
                          "update tbl_que_answers SET ans_desc='".$edtA."', correct=".$aright." 
                          WHERE ans_id=".$edtAId."
                          ");
                          $addB = mysqli_query($conn,
                          "update tbl_que_answers SET ans_desc='".$edtB."', correct=".$bright." 
                          WHERE ans_id=".$edtBId."
                          ");
                          $addC = mysqli_query($conn,
                          "update tbl_que_answers SET ans_desc='".$edtC."', correct=".$cright." 
                          WHERE ans_id=".$edtCId."
                          ");
                          $addD = mysqli_query($conn,
                          "update tbl_que_answers SET ans_desc='".$edtD."', correct=".$dright." 
                          WHERE ans_id=".$edtDId."
                          ");
                              echo "<script> window.location = 'manage-question.php' </script>";
                          }
                        ?>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Add Bus-->

                <!-- Archive Modal -->
                <div class="modal fade" id="delmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Remove</h5>
                      </div>
                      <form  method="POST">
                        <div class="modal-body">
                          <input type="hidden" name="rem_course_id" id="course_id" />
                          <h4 id = "rem_name">Are you sure you want to remove this??</h4>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" name="Archive" class="btn btn-danger" value="Yes" />
                          <?php
                            if (isset($_POST['Archive'])){
                              $url = 'localhost';
                              $username = 'root';
                              $password = '';                     
                              $delid = $_POST['rem_course_id'];                   
                              $conn = new mysqli($url, $username, $password, 'project');
                              if ($conn->connect_error) {
                                  die("Connection failed!:" . $conn->connect_error);
                              }
                              $deleteque = mysqli_query($conn,
                              "DELETE FROM tbl_topic_questions WHERE que_id = ".$delid."
                              ");
                              $deleteans = mysqli_query($conn,
                              "DELETE FROM tbl_que_answers WHERE que_id = ".$delid."
                              ");
                              echo "<script> window.location = 'manage-question.php' </script>";
                              }
                          ?>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Archive Modal -->

              
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright BSCS4B Group 3</span>
          </div>
        </footer>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <script src="../vendors/moment/moment.min.js"></script>
    <script src="../vendors/daterangepicker/daterangepicker.js"></script>
    <script src="../vendors/chartist/chartist.min.js"></script>
     <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <!-- Template Main JS File -->
    <script src="../assets/js/main2.js"></script>

    <!-- Other JS Files -->
    <script>
        <?php include '../assets/js/jquery.js' ?>
    </script>
    
    <script>
            // A function that hides or shows a selected element
            function hideOrShow() {
                
                // Select the element with id "theDIV"
                var x = document.getElementById("theDIV");
                
                // If selected element is hidden
                if (x.style.display === "none") {
                
                // Show the hidden element
                x.style.display = "block";
                
                // Else if the selected element is shown
                } else {
                
                // Hide the element
                x.style.display = "none";
                }
            }
    </script>

    <script>
            function toggleDiv(value) {
                const box = document.getElementById('multiChoice');
                const box1 = document.getElementById('TF');
                const box2 = document.getElementById('multipleChoice');
                const box3 = document.getElementById('TrueFalse');
                box.style.display = value == 1 ? 'block' : 'none';
                box1.style.display = value == 2 ? 'block' : 'none';
                box2.style.display = value == 3 ? 'block' : 'none';
                box3.style.display = value == 4 ? 'block' : 'none';
            }
        </script>

    <script>
    function addQuestion(value) {
      const topname = document.getElementById("addModalLabel");
      let edtid = value.getAttribute("data-editid");
      let name = value.getAttribute("data-editName");
      let optionA_id = value.getAttribute("data-optA_id");
      let optionB_id = value.getAttribute("data-optB_id");
      let optionC_id = value.getAttribute("data-optC_id");
      let optionD_id = value.getAttribute("data-optD_id");
      let optionA = value.getAttribute("data-optA");
      let optionB = value.getAttribute("data-optB");
      let optionC = value.getAttribute("data-optC");
      let optionD = value.getAttribute("data-optD");

      topname.innerHTML = 'Manage Content';
      document.querySelector("#edt_id").value = edtid;
      document.querySelector("#optA_id").value = optionA_id;
      document.querySelector("#optB_id").value = optionB_id;
      document.querySelector("#optC_id").value = optionC_id;
      document.querySelector("#optD_id").value = optionD_id;
      document.querySelector("#question").value = name;
      document.querySelector("#optA").value = optionA;
      document.querySelector("#optB").value = optionB;
      document.querySelector("#optC").value = optionC;
      document.querySelector("#optD").value = optionD;

    }

    function editSubject(value) {
      let edtid = value.getAttribute("data-editid");
      let subject = value.getAttribute("data-editName");
      let desc = value.getAttribute("data-description");
      let dura = value.getAttribute("data-dura");
      
      document.querySelector("#edit_id").value = edtid;
      document.querySelector("#edtquestion").value = subject;
      document.querySelector("#edtA").value = desc;
      document.querySelector("#edtB").value = parseInt(dura);
    }


    function archiveCourse(value) {
      const element = document.getElementById("rem_name");
      let courseID = value.getAttribute("data-courseid");
      let name = value.getAttribute("data-question");
      document.querySelector("#course_id").value = courseID;
      element.innerHTML = 'Are you sure you want to remove '+ '"' + name + '"' + '?';
    }

  </script>
  </body>
</html>