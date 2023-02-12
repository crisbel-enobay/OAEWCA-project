<html>
  <head>
    <style>
      .card {
        width: 300px;
        height: 200px;
        background-color: #2C3E50;
        margin: 20px auto;
        text-align: center;
        padding: 30px;
        box-shadow: 0px 0px 10px #888888;
        border-radius: 10px;
        color: white;
      }
      button {
        background-color: #16A085;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        font-weight: bold;
        margin: 20px;
      }
    </style>
    <!-- Include the SweetAlert2 library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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

      echo "<h1 style='font-size: 24px;'>" . $_SESSION["current_page"] . "</h1>";

      // Display the "Previous" button if there is a previous page
      if (count($_SESSION["displayed_pages"]) > 1) {
        echo "<button type='submit' name='previous'>Previous</button>";
      }

      // Display the "Next" button if there are more pages to display
      if (count($_SESSION["displayed_pages"]) < count($pages)) {
        echo "<button type='submit' name='next'>Next</button>";
      } elseif (count($_SESSION["displayed_pages"]) == count($pages)) {
        echo "<script>
          setTimeout(function() {
            Swal.fire({
              title: 'All pages have been viewed',
              text: 'Congratulations, you have reached the end of the pages!',
              icon: 'success',
              confirmButtonText: 'Awesome'
              });
              }, 2000);
              </script>";
              }
              ?>
              
                </form>
              </div>
              </body>
              </html>