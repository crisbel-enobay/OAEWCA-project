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

$traits_query = "SELECT personality_trait FROM personality_traits";
$traits_result = $conn->query($traits_query);

// create an empty array to store the traits
$traits_array = array();

// loop through the fetched rows and add the traits to the array
if ($traits_result->num_rows > 0) {
    while ($row = $traits_result->fetch_assoc()) {
        $traits = $row["personality_trait"];
        array_push($traits_array, $traits);
    }
}
// Initialize variables to store top 3 courses
$first_course = '';
$second_course = '';
$third_course = '';
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
        if (in_array($trait, $traits_array)) {
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
        $score+=2;
    }
    // Add the score to an array for the current course
    $match_scores[$course] = array(
        'score' => $score,
        'personality_traits' => $data['personality_traits']
    );
}

// Sort courses by match score and output top 3
arsort($match_scores);
$top_courses = array_slice($match_scores, 0, 3);

echo "<h2>Top 3 Matching Courses:</h2>";
foreach ($top_courses as $course => $data) {
    $score = $data['score'];
    echo "<p>$course (Score: $score)</p>";
    
    // Store top 3 courses in separate variables
    if ($score > 0 && $first_course == '') {
        $first_course = $course;
    } elseif ($score > 0 && $second_course == '') {
        $second_course = $course;
    } elseif ($score > 0 && $third_course == '') {
        $third_course = $course;
    }
}

// Output top 3 courses stored in variables
echo "<h2>Top 3 Matching Courses (Stored in Variables):</h2>";
echo "<p>1. $first_course</p>";
echo "<p>2. $second_course</p>";
echo "<p>3. $third_course</p>";
}
?>

<h1>Kurso-Nada</h1>
<div>
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
    $sql = "SELECT interest FROM interests ORDER BY interest ASC";
    $result = $conn->query($sql);

    // loop through the results and create an option for each interest
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $interest = $row["interest"];
            echo "<option value=\"$interest\">$interest</option>";
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

        $sql = "SELECT skill FROM skills ORDER BY skill ASC";
    $result = $conn->query($sql);

    // loop through the results and create an option for each interest
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $skill = $row["skill"];
            echo "<option value=\"$skill\">$skill</option>";
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
 
         $sql = "SELECT career_goal FROM career_goals ORDER BY career_goal ASC";
     $result = $conn->query($sql);
 
     // loop through the results and create an option for each interest
     if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
             $career_goal = $row["career_goal"];
             echo "<option value=\"$career_goal\">$career_goal</option>";
         }
     }
 
     $conn->close();
    ?>
</select>

<button type="submit" class="btn btn-primary mt-3">Find Matching Courses</button>

</form>