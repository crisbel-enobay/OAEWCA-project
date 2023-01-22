<?php
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
    <title>Category-Subject</title>
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
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/img/ucc.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="../views/admin.php">
            <img src="../assets/img/OAEWCA-LOGO copy.png" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="../views/admin.php"><img src="../assets/img/OAEWCA-LOGO copy.png" alt="logo" /></a>
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
            <li class="nav-item nav-category"><span class="nav-link">Exam Categories</span></li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin-courses.php">
                <span class="menu-title">Courses</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin-hobbies.php">
                <span class="menu-title">Hobbies</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Subjects</span>
                <i class="icon-chart menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../views/subject-english.php">English</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/subject-math.php">Math</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/subject-fil.php">Filipino</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../views/subject-science.php">Science</a></li>
                  <li class="nav-item"> <a class="nav-link active" href="../views/subject-logic.php">Logic</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">History</span></li>
            <li class="nav-item">
              <a class="nav-link" href="../views/admin-results.php">
                <span class="menu-title">Results</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
       <!-- partial -->
       <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">Questions List</li>
                <li class="breadcrumb-item"><a href="../views/archived_logic.php">Archives</a></li>
              </ol>
            </nav>
          </div>
          <!-- Quick Action Toolbar Starts-->
          <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Logic</h5>
                  </div>
                  <div class="table-responsive border rounded p-1">
                    <table class="table table-hover text-nowrap datatable">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">QUESTION</th>
                          <th scope="col">OPTION A</th>
                          <th scope="col">OPTION B</th>
                          <th scope="col">OPTION C</th>
                          <th scope="col">OPTION D</th>
                          <th scope="col">CORRECT ANSWER</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $rows = getLogic();
                        $i = 0;
                        while ($i < count($rows)) {   //Creates a loop to loop through results
                          $row = $rows[$i];
                          $id = $row['id'];
                          $question = $row['question'];
                          $optA = $row['optionA'];
                          $optB = $row['optionB'];
                          $optC = $row['optionC'];
                          $optD = $row['optionD'];
                          $right = $row['correctAnswer'];
                          echo "<tr>
                                    <td>" . $id . "</td>
                                    <td> <img src='".$row['question']."' alt='' > </td>
                                    <td> <img src='".$optA."' alt='' > </td>
                                    <td> <img src='".$optB."' alt='' > </td>
                                    <td> <img src='".$optC."' alt='' > </td>
                                    <td> <img src='".$optD."' alt='' > </td>
                                    <td> ".$right." </td>
                                    <td> " .
                            "<div class='d-flex '>
                              <form method='POST' action='../forms/delete_bus.php'>
                                        <button type='button' id='editButton' class = 'btn btn-primary mx-3 editbtn' data-bs-toggle='modal' data-bs-target='#editmodal' data-ID='$id' data-question='$question' data-optA='$optA' data-optB='$optB' data-optC='$optC' data-optD='$optD' data-right='$right' onClick='editCourse(this)'>EDIT</button>
                                      </form>" .
                            "<button type='submit' class='btn btn-danger delbtn' data-bs-toggle='modal' data-bs-target='#delmodal' data-courseid='$id' onClick='archiveCourse(this)'>ARCHIVE</button>" .
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
              <div>
                <button type="button" class="btn btn-primary my-4 py-2 px-4" id="add" data-bs-toggle="modal" data-bs-target="#transactionModal">Add Question</button>
              </div>

              <!-- Add Bus-->
              <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add a Question</h5>
                    </div>

                    <form method="POST" enctype="multipart/form-data">
                      <div class="modal-body p-5">
                        <div class="mb-3">
                          <label>Question</label>
                          <input type="file" name="nquestion" placeholder="Please Select an Image"/>
                        </div>
                        <div class="mb-3">
                          <label>Option A</label>
                          <input type="file"  name="nopta" id="eng" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Option B</label>
                          <input type="file"  name="noptb" id="mat" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Option C</label>
                          <input type="file"  name="noptc" id="fil" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Option D</label>
                          <input type="file"  name="noptd" id="sci" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Correct Answer</label>
                          <select name="right" class="form-control" id="right" required>
                            <option value="X">-Select a Letter-</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            
                          </select>
                        </div>
                        </div>
                      <div class="modal-footer">
                        <input type="submit" name="Add" class="btn btn-primary" id="btnAdd" value="Add"/>
                        <?php
                          if (isset($_POST['Add'])){
                          $url = 'localhost';
                          $username = 'root';
                          $password = '';
                          $conn = new mysqli($url, $username, $password, 'project');
                          if ($conn->connect_error) {
                            die("Connection failed!:" . $conn->connect_error);
                          }
                          $newQS = $_FILES['nquestion'] ['name'];                  
                          $newA = $_FILES['nopta'] ['name'];                  
                          $newB = $_FILES['noptb'] ['name'];                  
                          $newC = $_FILES['noptc'] ['name'];                  
                          $newD = $_FILES['noptd'] ['name'];                  
                          $newright = $_POST['right'];                 
                          $conn = new mysqli($url, $username, $password, 'project');
                          if ($conn->connect_error) {
                            die("Connection failed!:" . $conn->connect_error);
                        }
                      
                       $tmp_name=$_FILES['nquestion']['tmp_name'];
                       $file_name=$_FILES['nquestion']['name'];
                       $file_size=$_FILES['nquestion']['size'];
                       $file_location="folder/";
                       $file_to_uploadnewQS=$file_location.basename($newQS);
                       $file_to_uploadnewA=$file_location.basename($newA);
                       $file_to_uploadnewB=$file_location.basename($newB);
                       $file_to_uploadnewC=$file_location.basename($newC);
                       $file_to_uploadnewD=$file_location.basename($newD);
                      if($file_size>0){
                        if($file_size<=2400000){
                          $extname=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
                          if($extname=='png' || $extname=='jpg' || $extname=='jpeg' || $extname=='gif' || $extname=='bmp'){
                              if(move_uploaded_file($tmp_name,$file_to_uploadnewQS)){
                                move_uploaded_file($tmp_name,$file_to_uploadnewA);
                                move_uploaded_file($tmp_name,$file_to_uploadnewB);
                                move_uploaded_file($tmp_name,$file_to_uploadnewC);
                                move_uploaded_file($tmp_name,$file_to_uploadnewD);
                                
                                $sql = mysqli_query($conn,
                          "INSERT INTO logic_questionnaire(question, optionA, optionB, optionC, optionD, correctAnswer) VALUES ('$file_to_uploadnewQS','$file_to_uploadnewA', '$file_to_uploadnewB', '$file_to_uploadnewC', '$file_to_uploadnewD', '".$newright."')
                          ");
                          echo "<script> window.location = 'subject-logic.php' </script>";
                              }
                          }else{
                                $err_msg='Selected File is not an Image ';
                          }
                        }else{
                          $err_msg='Exceeds 24MB maximum file size';
                        }
                      }
                      
                      
                      
                      
                          

                            /*
                          if ($conn->connect_error) {
                              die("Connection failed!:" . $conn->connect_error);
                          }
                          $sql = mysqli_query($conn,
                          "INSERT INTO logic_questionnaire(question, optionA, optionB, optionC, optionD, correctAnswer) VALUES ('".$newQS."','".$newA."', '".$newB."', '".$newC."', '".$newD."', '".$newright."')
                          ");
                              echo "<script> window.location = 'subject-logic.php' </script>";
                              */
                          }
                        ?>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Add Bus-->

                <!-- Edit Modal-->
                <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                      </div>
                      <form method="POST">
                        <div class="modal-body">
                          <input type="hidden" name="edit_id" id="edit_id" />
                          <div class="mb-3">
                            <label>Question</label><br>
                            <img src="" alt="" id="edtquestion">
                            <input type="file" name="edtquestion" placeholder="Please Select an Image"/>
                        </div>
                        <div class="mb-3">
                          <label>Option A</label>
                          <img src="" alt="" id="edtA">
                            <input type="file"  name="edtopta" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Option B</label>
                          <img src="" alt="" id="edtB">
                          <input type="file"  name="edtoptb" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Option C</label>
                          <img src="" alt="" id="edtC">
                          <input type="file"  name="edtoptc" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Option D</label>
                          <img src="" alt="" id="edtD">
                          <input type="file"  name="edtoptd" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Correct Answer</label>
                          <select name="edtright" class="form-control" id="edtright" required>
                            <option value="X">-Select a Letter-</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            
                          </select>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" name="Update" class="btn btn-primary"/>
                          <?php
                          if (isset($_POST['Add'])){
                            $url = 'localhost';
                            $username = 'root';
                            $password = '';
                            $conn = new mysqli($url, $username, $password, 'project');
                            if ($conn->connect_error) {
                              die("Connection failed!:" . $conn->connect_error);
                            }
                            $edtQS = $_FILES['edtquestion'] ['name'];                  
                            $edtA = $_FILES['edtA'] ['name'];                  
                            $edtB = $_FILES['edtB'] ['name'];                  
                            $edtC = $_FILES['edtC'] ['name'];                  
                            $edtD = $_FILES['edtD'] ['name'];                  
                            $edtright = $_POST['edtright'];                 
                            $conn = new mysqli($url, $username, $password, 'project');
                            if ($conn->connect_error) {
                              die("Connection failed!:" . $conn->connect_error);
                          }
                        
                         $tmp_name=$_FILES['edtquestion']['tmp_name'];
                         $file_name=$_FILES['edtquestion']['name'];
                         $file_size=$_FILES['edtquestion']['size'];
                         $file_location="./folder/";
                         $file_to_uploadedtQS=$file_location.basename($edtQS);
                         $file_to_uploadedtA=$file_location.basename($edtA);
                         $file_to_uploadedtB=$file_location.basename($edtB);
                         $file_to_uploadedtC=$file_location.basename($edtC);
                         $file_to_uploadedtD=$file_location.basename($edtD);
                        if($file_size>0){
                          if($file_size<=2400000){
                            $extname=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
                            if($extname=='png' || $extname=='jpg' || $extname=='jpeg' || $extname=='gif' || $extname=='bmp'){
                                if(move_uploaded_file($tmp_name,$file_to_uploadedtQS)){
                                  move_uploaded_file($tmp_name,$file_to_uploadedtA);
                                  move_uploaded_file($tmp_name,$file_to_uploadedtB);
                                  move_uploaded_file($tmp_name,$file_to_uploadedtC);
                                  move_uploaded_file($tmp_name,$file_to_uploadedtD);
                                  
                                  $sql = mysqli_query($conn,
                            "UPDATE logic_questionnaire SET question='".$file_to_uploadedtQS."', optionA='".$file_to_uploadedtA."', optionB='".$file_to_uploadedtB."', optionC='".$file_to_uploadedtC."', optionD='".$file_to_uploadedtD."', correctAnswer='".$edtoption."' WHERE id= ".$edtid."
                            ");
                            echo "<script> window.location = 'subject-logic.php' </script>";
                                }
                            }else{
                                  $err_msg='Selected File is not an Image ';
                            }
                          }else{
                            $err_msg='Exceeds 24MB maximum file size';
                          }
                        }
                            }
                        ?>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Edit Modal -->

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
                          <h4>Are you sure you want to remove this??</h4>
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
                              $sql = mysqli_query($conn,
                              "DELETE FROM logic_questionnaire WHERE id = ".$delid."
                              ");
                              echo "<script> window.location = 'subject-logic.php' </script>";
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
    function editCourse(value) {
      let courseID = value.getAttribute("data-ID");
      let datquestion = value.getAttribute("data-question");
      let datA = value.getAttribute("data-optA");
      let datB = value.getAttribute("data-optB");
      let datC = value.getAttribute("data-optC");
      let datD = value.getAttribute("data-optD");
      let datRight = value.getAttribute("data-right");
      document.querySelector("#edit_id").value = courseID;
      document.querySelector("#edtquestion").src = datquestion;
      document.querySelector("#edtA").src = datA;
      document.querySelector("#edtB").src = datB;
      document.querySelector("#edtC").src = datC;
      document.querySelector("#edtD").src = datD;
      document.querySelector("#edtright").value = datRight;
    }

    function archiveCourse(value) {
      let courseID = value.getAttribute("data-courseid");
      document.querySelector("#course_id").value = courseID;
    }

    /* check duplicate similar values
    $(document).ready(function() {
      $('#check_plateNo').keyup(function(e) {
        var plateNum = $('#check_plateNo').val();
        $.ajax({
          type: "POST",
          url: "../forms/manage_bus.php",
          data: {
            "check_plateNo_btn": 1,
            "plateNo": plateNum,
          },
          success: function(response) {
            var jsonData = JSON.parse(response);
            $("#error_plateNo").removeClass();
            if (jsonData.success == "1") {
              $('#error_plateNo').text("Available");
              $("#error_plateNo").addClass("text-success");
              $("#btnAdd").prop('disabled', false);
            } else {
              $('#error_plateNo').text("Unavailable");
              $("#error_plateNo").addClass("text-danger");
              $("#btnAdd").prop('disabled', true);
            }
          },
          error: function() {
            alert('System Error. Calling ajax failed');
          }
        });
      });
    });*/
  </script>
  </body>
</html>