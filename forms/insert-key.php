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
  
                                  // Check if the key and email exist in the database
                                  $sql = "SELECT * FROM generated_codes WHERE exam_key='$key' AND email='$email'";
                                  $result = $conn->query($sql);
                                  if ($result->num_rows > 0) {
                                    // Key and email exist, check if the key is expired
                                    $row = $result->fetch_assoc();
                                    $status = $row['status'];
                                    $exam_date = $row["exam_date"];
                                    if (date('Y-m-d') > date('Y-m-d', strtotime($exam_date))) {
                                      // Key is expired
                                      echo "Your key is expired.";}
                                      else{
                                      // Key is valid, check if the status is approved
                                      if ($status == "approved") {
                                        // Status is approved
                                        echo "Your key is valid this date and has been approved. you can take the exam";
                                      } else {
                                        // Status is not approved
                                        echo "Your key is valid but it has not been approved yet.";
                                      }
                                    } 
                                  } else {
                                    // Key and email do not exist
                                    echo "Invalid key";
                                  }
                                
                                  mysqli_free_result($result);
                                   
                                
                                  ?>