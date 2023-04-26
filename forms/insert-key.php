<?php
 if(session_status() !== PHP_SESSION_ACTIVE) 
 {
  session_start();
 }
                                  // Create connection
                                  $conn = new mysqli('localhost', 'root', '', 'project');
                                  // Check connection
                                  if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                  }
  
                                  $key = $_POST["inputkey"];
                                  $email = ($_SESSION['email']);
  
                                 // Create connection
                                  $conn = new mysqli('localhost', 'root', '', 'project');
                                  // Check connection
                                  if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                  }
  
                                  $key = $_POST["inputkey"];
                                  $email = ($_SESSION['email']);
  
                                // Check if the key and email exist in the database
                                $sql = "SELECT * FROM generated_codes WHERE exam_key='$key' AND email='$email'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                  // Key and email exist, check if the key is expired
                                  date_default_timezone_set('Asia/Manila');
                                  $row = $result->fetch_assoc();
                                  $status = $row['status'];
                                  $exam_date = $row['exam_date'];
                                  $exam_start_time = ($row["exam_time"]);
                                  $exam_end_time = ($row["exam_time_end"]);
                                  $current_date = date('Y-m-d');
                                  $current_time = date('H:i:s');
                                  
                                  // Check if the exam is available for the current date and time
                                  if ($current_date === $exam_date) {
                                    if ($current_time < $exam_start_time) {
                                      // Exam date is today but the exam is not started yet
                                      echo  "started";
                                    } else if ($current_time >= $exam_start_time && $current_time <= $exam_end_time) {
                                      // Exam is available
                                      if ($status == "active") {
                                        // Status is approved
                                        echo "valid";
                                      } else if ($status == "finished"){
                                        echo "finishedexam";
                                      }
                                      else{
                                         // Status is not approved
                                         echo "pending";
                                      }
                                    } else {
                                      // Exam is over
                                      echo 'ended';
                                    }
                                  } else {
                                    // Exam is not available
                                    echo "invaliddate";
                                  }
                                } else {
                                  // Key and email do not exist
                                  echo "invalid";
                                }
                                $_SESSION['key'] = $key;
                                $_SESSION['subjectexam'] = 0;
                                $_SESSION['topicexam'] = 0;
                                $_SESSION['topicvalue'] = 1;
<<<<<<< HEAD
                                //$_SESSION['english'] = 0;
                                //$_SESSION['science'] = 0;
                                //$_SESSION['math'] = 0;
                                //$_SESSION['logic'] = 0;
=======
                                $_SESSION['english'] = 0;
                                $_SESSION['science'] = 0;
                                $_SESSION['math'] = 0;
                                $_SESSION['logic'] = 0;
>>>>>>> parent of 055baa9 (adds)
                                mysqli_free_result($result);
                              
                                   
                                // //  else if (time() < $exam_start_time && $current_date_time == $exam_date){
                                // //         echo "Exam still not going";
                                // //       }
                                // //       else if (time() >  $exam_end_time){
                                // //         echo "Exam has been finished";
                                // //       }
                                  ?>
                                   