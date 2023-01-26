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
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Admin!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
               <span class="font-weight-normal"> Admin admin </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <p class="mb-1 mt-3">Admin admin</p>
                  <p class="font-weight-light text-muted mb-0">admin@gmail.com</p>
                </div>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
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
                  <p class="profile-name">Admin admin</p>
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
              <a class="nav-link" href="../views/admin-questions.php">
                <span class="menu-title">Questions</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="../views/admin-answer.php">
                <span class="menu-title">Answer</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">History</span></li>
            <li class="nav-item">
            <a class="nav-link" href="../views/admin-schedule.php">
                <span class="menu-title">Exam Schedule</span>
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
                <li class="breadcrumb-item active">True or False</li>
                <li class="breadcrumb-item active"><a href="../views/admin-answer.php">Multiple Choice</a></li>
              </ol>
            </nav>
          </div>
          <!-- Quick Action Toolbar Starts-->
          <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">True or False Type</h5>
                  </div>
                  <div class="table-responsive border rounded p-1">
                    <table class="table">
                      <thead>
                        <tr>
<<<<<<< Updated upstream:views/subject-science.php
                          <th class="font-weight-bold">ID</th>
                          <th class="font-weight-bold">Question</th>
                          <th class="font-weight-bold">Option A</th>
                          <th class="font-weight-bold">Option B</th>
                          <th class="font-weight-bold">Option C</th>
                          <th class="font-weight-bold">Right Answer</th>
                          <th class="font-weight-bold">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>Question 1</td>
                          <td>Sample</td>
                          <td>Sample</td>
                          <td>Sample</td>
                          <td>Sample</td>
                          <td>
                            <div class="btn btn-primary">Edit</div>
                            <div class="btn btn-danger">Del</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>Question 2</td>
                          <td>Sample</td>
                          <td>Sample</td>
                          <td>Sample</td>
                          <td>Sample</td>
                          <td>
                            <div class="btn btn-primary">Edit</div>
                            <div class="btn btn-danger">Del</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            3
                          </td>
                          <td>Question 3</td>
                          <td>Sample</td>
                          <td>Sample</td>
                          <td>Sample</td>
                          <td>Sample</td>
                          <td>
                            <div class="btn btn-primary">Edit</div>
                            <div class="btn btn-danger">Del</div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            4
                          </td>
                          <td>Question 4</td>
                          <td>Sample</td>
                          <td>Sample</td>
                          <td>Sample</td>
                          <td>Sample</td>
                          <td>
                            <div class="btn btn-primary">Edit</div>
                            <div class="btn btn-danger">Del</div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="d-flex mt-4 flex-wrap">
                    <p class="text-muted">Showing 1 to 10 of 57 entries</p>
                    <nav class="ml-auto">
                      <ul class="pagination separated pagination-info">
                        <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
                      </ul>
                    </nav>
=======
                          <th scope="col">ID</th>
                          <th scope="col">QUESTION</th>
                          <th scope="col">CORRECT ANSWER</th>
                          <th scope="col">DATE MODIFIED</th>
                          <th scope="col">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $rows = getAnsTF();
                        $i = 0;
                        while ($i < count($rows)) {   //Creates a loop to loop through results
                          $row = $rows[$i];
                          $id = $row['a_id'];
                          $question = $row['question'];
                          $right = $row['correct_answer'];
                          $date = $row['date_modified'];
                          echo "<tr>
                                    <td>" . $id . "</td>
                                    <td>" . $question . "</td>
                                    <td>" . $right . "</td>
                                    <td>" . $date . "</td>
                                    <td>" .
                            "<div class='d-flex '>
                              <form method='POST' action='../forms/delete_bus.php'>
                                        <button type='button' id='editButton' class = 'btn btn-primary mx-3 editbtn' data-bs-toggle='modal' data-bs-target='#editmodal' data-ID='$id' data-question='$question'  data-right='$right' onClick='editCourse(this)'>EDIT</button>
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
                <button type="button" class="btn btn-primary my-4 py-2 px-4" id="add" data-bs-toggle="modal"  data-bs-target="#transactionModal" style="display: none;">Add Question</button>
              </div>

              <!-- Add Bus-->
              <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add a Question</h5>
                    </div>

                    <form method="POST">
                      <div class="modal-body p-5">
                        <div class="mb-3">
                          <label>Question</label>
                          <textarea name="nquestion" class="form-control" id="question" rows="5" cols="45" required> </textarea>
                        </div>
                        <div class="mb-3">
                          <label>Option A</label>
                          <input type="text" name="nopta" class="form-control" id="eng" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Option B</label>
                          <input type="text" name="noptb" class="form-control" id="mat" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Option C</label>
                          <input type="text" name="noptc" class="form-control" id="fil" placeholder="Enter an option" required  />
                        </div>
                        <div class="mb-3">
                          <label>Option D</label>
                          <input type="text" name="noptd" class="form-control" id="sci" placeholder="Enter an option" required  />
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
                          $newQS = $_POST['nquestion'];                      
                          $newA= $_POST['nopta'];                      
                          $newB = $_POST['noptb'];                      
                          $newC = $_POST['noptc'];                      
                          $newD = $_POST['noptd'];                      
                          $newright = $_POST['right'];                  
                          $conn = new mysqli($url, $username, $password, 'project');
                          if ($conn->connect_error) {
                              die("Connection failed!:" . $conn->connect_error);
                          }
                          $sql = mysqli_query($conn,
                          "INSERT INTO english_questionnaire(question, optionA, optionB, optionC, optionD, correctAnswer) VALUES ('".$newQS."','".$newA."', '".$newB."', '".$newC."', '".$newD."', '".$newright."')
                          ");
                              echo "<script> window.location = 'subject-english.php' </script>";
                          }
                        ?>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </form>
                    </div>
>>>>>>> Stashed changes:views/admin_answertf.php
                  </div>
                  <button type="button" id="add" class="btn btn-primary my-4 py-2 px-4" data-bs-toggle="modal" data-bs-target="#transactionModal" style="display: flex;">Add Question</button>
                </div>
              </div>
<<<<<<< Updated upstream:views/subject-science.php
            </div>
          
=======
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
                            <label>Question</label>
                          <textarea name="edtquestion" class="form-control" id="edtquestion" rows="5" cols="45" readonly> </textarea>
                          </div>
                          <div class="mb-3">
                            <label>Option A</label>
                            <input type="text" name="edtA" id="edtA" class="form-control" required />
                          </div>
                          <div class="mb-3">
                            <label>Option B</label>
                            <input type="text" name="edtB" id="edtB" class="form-control" required />
                          </div>
                          <div class="mb-3">
                            <label>Option C</label>
                            <input type="text" name="edtC" id="edtC" class="form-control" required />
                          </div>
                          <div class="mb-3">
                            <label>Option D</label>
                            <input type="text" name="edtD" id="edtD" class="form-control" required />
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
                          if (isset($_POST['Update'])){
                          $url = 'localhost';
                          $username = 'root';
                          $password = '';                     
                          $edtid = $_POST['edit_id'];                      
                          $edtQuestion = $_POST['edtquestion'];                
                          $edtoptionA = $_POST['edtA'];                
                          $edtoptionB = $_POST['edtB'];                
                          $edtoptionC = $_POST['edtC'];                
                          $edtoptionD = $_POST['edtD'];                
                          $edtrightoption = $_POST['edtright'];                
                          $conn = new mysqli($url, $username, $password, 'project');
                          if ($conn->connect_error) {
                              die("Connection failed!:" . $conn->connect_error);
                          }
                            $sql = mysqli_query($conn,
                          "UPDATE answerss_mc SET optionA='".$edtoptionA."', optionB='".$edtoptionB."', optionC='".$edtoptionC."', optionD='".$edtoptionD."', correct_answer='".$edtrightoption."', date_modified=now() WHERE a_id= ".$edtid."
                          ");
                              echo "<script> window.location = 'admin-answer.php' </script>";
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
                              "DELETE FROM english_questionnaire WHERE id = ".$delid."
                              ");
                              echo "<script> window.location = 'subject-english.php' </script>";
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
>>>>>>> Stashed changes:views/admin_answertf.php
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
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>