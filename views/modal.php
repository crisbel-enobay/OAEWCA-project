<html>
  <head>
    <style>
      .card {
        width: 300px;
        height: 200px;
        background-color: lightblue;
        margin: 20px auto;
        text-align: center;
        padding: 30px;
        box-shadow: 0px 0px 10px #888888;
      }
    </style>
  </head>
  <body>
    <div class="card">
      <form method="post">
        <?php
          // Store all pages in an array
          $pages = array("Page 1", "Page 2", "Page 3", "Page 4", "Page 5");

          // Keep track of which pages have been displayed
          session_start();
          if (!isset($_SESSION["displayed_pages"])) {
            $_SESSION["displayed_pages"] = array();
          }

          // Display the current page
          if (isset($_POST["next"])) {
            // Randomize the next page
            do {
              $next_page = $pages[array_rand($pages)];
            } while (in_array($next_page, $_SESSION["displayed_pages"]));

            $_SESSION["displayed_pages"][] = $next_page;
            $_SESSION["current_page"] = $next_page;
          } elseif (isset($_POST["previous"])) {
            // Go back to the previous page
            array_pop($_SESSION["displayed_pages"]);
            $_SESSION["current_page"] = end($_SESSION["displayed_pages"]);
          } else {
            // Display the first page
            $_SESSION["current_page"] = $pages[0];
            $_SESSION["displayed_pages"][] = $pages[0];
          }

          echo "<h1>" . $_SESSION["current_page"] . "</h1>";

          // Display the "Previous" button if there is a previous page
          if (count($_SESSION["displayed_pages"]) > 1) {
            echo "<button type='submit' name='previous'>Previous</button>";
          }

          // Display the "Next" button if there are more pages to display
          if (count($_SESSION["displayed_pages"]) < count($pages)) {
            echo "<button type='submit' name='next'>Next</button>";
          } elseif (count($_SESSION["displayed_pages"]) == count($pages)) {
            // All pages have been displayed, show an alert
            echo "<script>alert('All pages have been viewed.');</script>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
