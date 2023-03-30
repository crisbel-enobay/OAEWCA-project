<?php
            $id = $_POST["id"];
            $conn = mysqli_connect("localhost", "root", "", "project");
            $result = mysqli_query($conn, "SELECT * FROM results WHERE id = '$id'");
            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              echo "<p>Strand: </p>" . $row['strand'] . "";
              echo "<p>Preferred Course: </p>" . $row['pref_course'] . "";
              echo "<p>Personality Traits: </p>" . $row['traits'] . "";
              echo "<p>Interest: </p>" . $row['interest'] . "";
              echo "<p>Skills: </p>" . $row['skill'] . "";
              echo "<p>Career Goals: </p>" . $row['career_goal'] . "";
              echo "<p>Exam Key Created At: </p>" . $row['exam_key_created_at'] . "";
            }
        
          

?>