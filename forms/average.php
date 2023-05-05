<?php
      // Include database connection
      require_once('../views/conn.php');

      // Query to get column data
      $sql = "SELECT english, math, filipino, science, logic FROM data_analytics";

      $result = $conn->query($sql);

      // Compute average for each column
      $english_total = 0;
      $math_total = 0;
      $filipino_total = 0;
      $science_total = 0;
      $logic_total = 0;
      $count = 0;

      while ($row = $result->fetch_assoc()) {
        $english_total += $row['english'];
        $math_total += $row['math'];
        $filipino_total += $row['filipino'];
        $science_total += $row['science'];
        $logic_total += $row['logic'];
        $count++;
      }

      $english_avg = $english_total / $count;
      $math_avg = $math_total / $count;
      $filipino_avg = $filipino_total / $count;
      $science_avg = $science_total / $count;
      $logic_avg = $logic_total / $count;

      // Close database connection
      $conn->close();

      // Return data as JSON
      $data = [
        'english' => $english_avg,
        'math' => $math_avg,
        'filipino' => $filipino_avg,
        'science' => $science_avg,
        'logic' => $logic_avg,
      ];
      echo json_encode($data);
      ?>
