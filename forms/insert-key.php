<?php
 if(session_status() !== PHP_SESSION_ACTIVE) 
 {
  session_start();
 }

                                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    // Connect to the database
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "project";

                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);
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
                                      $expired_date = $row["exam_date"];
                                      if (time() < strtotime($expired_date)) {
                                        // Key is expired
                                        echo "Your key is expired.";
                                      } else {
                                        // Key is valid, redirect to other page
                                        echo "valid";
                                      }
                                    } else {
                                      // Key and email do not exist
                                      echo "Invalid key";
                                    }
                                    $_SESSION['key'] = $key;
                                    $_SESSION['subjectexam'] = 0;
                                    $_SESSION['topicexam'] = 0;
                                    mysqli_free_result($result);
                                     
                                  }
                                  ?>