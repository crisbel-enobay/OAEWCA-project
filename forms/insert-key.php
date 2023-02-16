<?php
 if(session_status() !== PHP_SESSION_ACTIVE) 
 {
  session_start();
 }
  // Create connection
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
                                  $row = $result->fetch_assoc();
                                  $status = $row['status'];
                                  $exam_date = date('Y-m-d', strtotime($row['exam_date']));
                                  $exam_start_time = strtotime($row["exam_time"]);
                                  $exam_end_time = strtotime($row["exam_time_end"]);
                                  $current_date_time = date('Y-m-d H:i:s'); // Include time in the current date
                                  $current_date = date('Y-m-d');
                                  $current_time = date('H:i:s');

                                  // Check if the exam is available for the current date and time
                                  if ($current_date === $exam_date) {
                                    if ($current_time < date('H:i:s', $exam_start_time)) {
                                      // Exam is not yet available
                                      echo "Your key is not valid at this time. Please wait until the exam starts.";
                                    } else if ($current_time >= date('H:i:s', $exam_start_time) && $current_time <= date('H:i:s', $exam_end_time)) {
                                      // Exam is available
                                      if ($status == "approved") {
                                        // Status is approved
                                        echo "Your key is valid this date and has been approved. you can take the exam";
                                      } else {
                                        // Status is not approved
                                        echo "Your key is valid but it has not been approved yet.";
                                      }
                                    } else {
                                      // Exam is over
                                      echo "Your key is not valid at this time. The exam has already ended.";
                                    }
                                  } else {
                                    // Exam is not available
                                    echo "Your key is not valid at this time.";
                                  }
                                } else {
                                  // Key and email do not exist
                                  echo "Invalid key";
                                }

                                
                                  mysqli_free_result($result);
                                   
                                 // else if (time() < $exam_start_time && $current_date_time == $exam_date){
                                      //   echo "Exam still not going";
                                      // }
                                      // else if (time() >  $exam_end_time){
                                      //   echo "Exam has been finished";
                                      // }
                                  ?>
                                   