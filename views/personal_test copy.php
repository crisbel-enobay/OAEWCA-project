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
  $loop_counter = 0;  // initialize loop counter
foreach ($course_data as $course => $data) {
    $score = 0;
    if (is_array($data['personality_traits'])) {
      foreach ($traits as $trait) {
          foreach ($data['personality_traits'] as $value) {
              if ($value == $trait) {
                  $score++;
              }
          }
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
    $match_scores["match_score_" . $loop_counter][$course] = $score;
    $loop_counter++;  // increment loop counter
}

// Sort courses by match score and output top 3 for each set of matches
for ($i = 0; $i < $loop_counter; $i++) {
    arsort($match_scores["match_score_" . $i]);
    $top_courses = array_slice($match_scores["match_score_" . $i], 0, 3);
    echo "<h2>Top 3 Matching Courses (Match Set $i):</h2>";
    foreach ($top_courses as $course => $score) {
        echo "<p>$course: $score</p>";
    }
}

}
?>

<h1>Kurso-Nada</h1>
    <p>Please enter your information:</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="traits">Personality Traits:</label><br>
        <select id="traits" name="traits[]" class="form-control" multiple>
    <?php
       include "../forms/database.php";
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

                  // fetch distinct personality traits from the course table
            $sql = "SELECT personality_trait FROM personality_traits";
            $result = $conn->query($sql);

            // create an empty array to store the traits
            $traits_array = array();

            // loop through the fetched rows and add the traits to the array
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $traits = $row["personality_trait"];
                array_push($traits_array, $traits);
              }
            }

            // sort the traits alphabetically
            sort($traits_array);

            // remove duplicates and create select options
            $unique_traits = array_unique($traits_array);
            foreach ($unique_traits as $trait) {
              echo "<option value=\"$trait\">$trait</option>";
            }
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

       // fetch distinct interests from the course table
          $sql = "SELECT DISTINCT interests FROM courses";
          $result = $conn->query($sql);

          // create an empty array to store interests
          $interests_array = array();

          // loop through the results and add interests to the array
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  $interests = explode(",", $row["interests"]);
                  $interests_array = array_merge($interests_array, $interests);
              }
          }

          // remove duplicates from the array and sort alphabetically
          $interests_array = array_unique($interests_array);
          sort($interests_array);

          // loop through the sorted array and create an option for each interest
          foreach ($interests_array as $interest) {
              echo "<option value=\"$interest\">$interest</option>";
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

        // fetch distinct skills from the course table
          $sql = "SELECT DISTINCT skills FROM courses";
          $result = $conn->query($sql);

          // create an array to store all the skills
          $allSkills = array();

          // loop through the results and add each skill to the array
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  $skills = explode(",", $row["skills"]);

                  foreach ($skills as $skill) {
                      array_push($allSkills, trim($skill));
                  }
              }
          }

          // sort the array and remove duplicates
          $allSkills = array_unique($allSkills);
          sort($allSkills);

          // populate the select options with the fetched skills
          foreach ($allSkills as $skill) {
              echo "<option value=\"$skill\">$skill</option>";
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

        // fetch distinct career goals from the course table
        $sql = "SELECT DISTINCT career_goals FROM courses";
        $result = $conn->query($sql);

        // create an array to store all the career goals
        $allCareerGoals = array();

        // loop through the results and add each career goal to the array
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $careerGoals = explode(",", $row["career_goals"]);

                foreach ($careerGoals as $goal) {
                    array_push($allCareerGoals, trim($goal));
                }
            }
        }

        // sort the array and remove duplicates
        $allCareerGoals = array_unique($allCareerGoals);
        sort($allCareerGoals);

        // populate the select options with the fetched career goals
        foreach ($allCareerGoals as $goal) {
            echo "<option value=\"$goal\">$goal</option>";
        }

        $conn->close();

    ?>
</select>

<button type="submit" class="btn btn-primary mt-3">Find Matching Courses</button>

</form>