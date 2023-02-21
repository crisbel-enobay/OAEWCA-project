<?php
            $id = $_POST["id"];
            $conn = mysqli_connect("localhost", "root", "", "project");
            $result = mysqli_query($conn, "SELECT * FROM generated_codes WHERE id = '$id'");
            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              echo "<p>Preferred Course: </p>" . $row['pref_course'] . "";
              echo "<p>Second Preferred Course: </p>" . $row['pref_secondary_course'] . "";
              echo "<p>Third Preferred Course: </p>" . $row['pref_tertiary_course'] . "";
              echo "<p>Hobby: </p>" . $row['hobby'] . "";
              echo "<p>Second Hobby: </p>" . $row['secondary_hobby'] . "";
              echo "<p>Third Hobby: </p>" . $row['tertiary_hobby'] . "";
              echo "<p>Exam Key Created At: </p>" . $row['exam_key_created_at'] . "";
            }
        
          

?>