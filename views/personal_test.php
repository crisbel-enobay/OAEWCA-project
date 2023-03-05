<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Fixed course data with personality traits, interests, skills, and career goals
  // $course_data = array(
  //   "bs_math" => array(
  //       "personality_traits" => array("logical", "analytical", "persistent"),
  //       "interests" => array("mathematics", "logic", "puzzles"),
  //       "skills" => array("problem-solving", "critical thinking", "mathematical analysis"),
  //       "career_goals" => array("research", "education", "finance")
  //   ),
  //   "bs_psychology" => array(
  //       "personality_traits" => array("empathetic", "inquisitive", "compassionate"),
  //       "interests" => array("human behavior", "mental health", "counseling"),
  //       "skills" => array("active listening", "research", "communication"),
  //       "career_goals" => array("clinical psychology", "education", "research")
  //   ),
  //   "bs_business" => array(
  //       "personality_traits" => array("entrepreneurial", "leadership", "persuasive"),
  //       "interests" => array("business strategy", "marketing", "finance"),
  //       "skills" => array("leadership", "management", "communication"),
  //       "career_goals" => array("management", "entrepreneurship", "finance")
  //   ),
  //   "bs_history" => array(
  //       "personality_traits" => array("observant", "detail-oriented", "inquisitive"),
  //       "interests" => array("historical events", "cultures", "politics"),
  //       "skills" => array("research", "writing", "critical thinking"),
  //       "career_goals" => array("education", "research", "public service")
  //   )
  // );

  include "../forms/database.php";
$query = "SELECT * FROM courses";
$result = $conn->query($query);

// Store fetched data in $course_data array
$course_data = array();
while ($row = $result->fetch_assoc()) {
    $course_data[$row['course']] = array(
        'personality_traits' => explode(',', $row['personality_traits']),
        'interests' => explode(',', $row['interests']),
        'skills' => explode(',', $row['skills']),
        'career_goals' => explode(',', $row['career_goals']),
    );
}

  // Retrieve user's input
  $traits = $_POST['traits'];
  $interests = $_POST['interests'];
  $skills = $_POST['skills'];
  $career_goals = $_POST['career_goals'];

  // Calculate match score for each course based on user's input
  $match_scores = array();
  foreach ($course_data as $course => $data) {
    $score = 0;
    foreach ($traits as $trait) {
      if (in_array($trait, $data['personality_traits'])) {
        $score++;
      }
    }
    if (in_array($interests, $data['interests'])) {
      $score++;
    }
    if (in_array($skills, $data['skills'])) {
      $score++;
    }
    if (in_array($career_goals, $data['career_goals'])) {
      $score++;
    }
    $match_scores[$course] = $score;
  }

  // Sort courses by match score and output top 3
  arsort($match_scores);
  $top_courses = array_slice($match_scores, 0, 3);

  echo "<h2>Top 3 Matching Courses:</h2>";
  foreach ($top_courses as $course => $score) {
    echo "<p>$course</p>";
  }
}
?>

<h1>Kurso-Nada</h1>
    <p>Please enter your information:</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="traits">Personality Traits:</label><br>
        <select id="traits" name="traits[]" multiple>
    <?php
       include "../forms/database.php";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // fetch distinct personality traits from the course table
        $sql = "SELECT DISTINCT personality_traits FROM courses";
        $result = $conn->query($sql);

        // populate the select options with the fetched traits
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              // split the traits by commas into an array
              $traits = explode(",", $row["personality_traits"]);
              // loop through the traits and create a row for each one
              foreach ($traits as $trait) {
                  echo "<option value=\"$trait\">$trait</option>";
              }
          }
      }

        $conn->close();
    ?>
</select>


  </div>
  <div class="form-group">
    <label for="interests">Interests:</label>
    <select class="form-control" id="interests" name="interests">
    <option value="">Select Interest</option>
    <?php
       include "../forms/database.php";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // fetch distinct personality traits from the course table
        $sql = "SELECT DISTINCT interests FROM courses";
        $result = $conn->query($sql);

        // populate the select options with the fetched traits
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              // split the traits by commas into an array
              $interests = explode(",", $row["interests"]);
              
              // loop through the traits and create a row for each one
              foreach ($interests as $interest) {
                  echo "<option value=\"$interest\">$interest</option>";
              }
          }
      }

        $conn->close();
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="skills">Skills:</label>
    <select class="form-control" id="skills" name="skills">
    <option value="">Select Skills</option>
    <?php
       include "../forms/database.php";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // fetch distinct personality traits from the course table
        $sql = "SELECT DISTINCT skills FROM courses";
        $result = $conn->query($sql);

        // populate the select options with the fetched traits
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              // split the traits by commas into an array
              $skills = explode(",", $row["skills"]);
              
              // loop through the traits and create a row for each one
              foreach ($skills as $skill) {
                  echo "<option value=\"$skill\">$skill</option>";
              }
          }
      }

        $conn->close();
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="career_goals">Career Goals:</label>
    <select class="form-control" id="career_goals" name="career_goals">
    <option value="">Select Career Goals</option>
    <?php
       include "../forms/database.php";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // fetch distinct personality traits from the course table
        $sql = "SELECT DISTINCT career_goals FROM courses";
        $result = $conn->query($sql);

        // populate the select options with the fetched traits
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              // split the traits by commas into an array
              $career_goals = explode(",", $row["career_goals"]);
              
              // loop through the traits and create a row for each one
              foreach ($career_goals as $career_goal) {
                  echo "<option value=\"$career_goal\">$career_goal</option>";
              }
          }
      }

        $conn->close();
    ?>
</select>

<button type="submit" class="btn btn-primary mt-3">Find Matching Courses</button>

</form>