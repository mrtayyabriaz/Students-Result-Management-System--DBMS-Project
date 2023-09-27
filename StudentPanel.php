<?php session_start();
if (isset($_SESSION['Login'])) {
  if (!isset($_SESSION['SID'])) {
    echo '<script>
              window.location.assign("TeacherPanel.php");
          </script>';
  }
}
else {
  echo '<script>
              window.location.assign("index.php");
          </script>';
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard | RMS</title>
  <!--====================== stylesheets ==========================-->
  <link rel="stylesheet" href="style/CSS/style.css">
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css" rel="stylesheet"> -->
  <!--====================== stylesheets ==========================-->
</head>
<body class="dark-theme">


  <?php include "nevbar.php"; ?>


  <?php


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // $status = (isset($_GET['status'])) ? test_input($_GET["status"]) : 'student';
  // $GLOBALS['status'] = $status;
  ?>





  <section class="TeacherClasses ">
    <h4>Dear
      <?php
      include 'submit/dbconnect.php';

      if (isset($_SESSION['Name'])) {
        echo "<a class='links' href='StudentPanel.php'>" . $_SESSION['Name'] . "</a> -> Classes";
      }
      else {
        echo "<a href='logout.php'>Login...</a>";
      } ?>
    </h4>
  </section>



  <div class="container dark-theme-light" style="padding: 2em 0px 2em 0px;border-radius: 10px;">
    <!-- <h2 class="YourClass">Your Classes</h2> -->
    <div class="Classlist">
      <ol id="classlist">

        <?php
        $StudentID = $_SESSION['SID'];
        include 'submit/dbconnect.php';

        $query = "SELECT `studentcombination`.`ClassID`,`class`.`Classname`
        FROM studentcombination
        INNER JOIN class
        ON `studentcombination`.`ClassID`=`class`.`ClassID`
        Where `studentcombination`.`StudentID` = '$StudentID';";
        if ($result = mysqli_query($link, $query)) {
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
              echo '<li class="row rounded" id="TheClass' . $row['ClassID'] . '">
                        <a href="StudentResult.php?ClassID=' . $row['ClassID'] . '">
                          <div class="subjectname">' . $row['Classname'] . '</div>
                        </a>
                        </li>';
                        // <button class="col-2 btn thebutton edit" type="button"><a href="edit.php?ClassID=' . $row['ClassID'] . '">Edit</a></button>
                        // <button  onclick="DeletClass(' . $row['ClassID'] . ')" class="col-2 btn thebutton delete" type="button">Delete</button>
            }
          }
          else {
            echo "No Class";
          }
        }
        ?>

      </ol>
    </div>
  </div>













  <!--========================== script files ======================================-->
  <script src="Javascript/script.js"></script>
  <script src="submit/submit.js"></script>
  <!-- bootstrap  -->
  <script src="bootstrap/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
  <!-- font-awesome -->
  <script src="https://kit.fontawesome.com/681a158138.js" crossorigin="anonymous"></script>
  <!--========================== script files ======================================-->

  <?php
  //========== Dark Theme on Load ===========
  if (isset($_COOKIE['theme'])) {
    if ($_COOKIE['theme'] == "Dark") {
      echo '<script>
      document.body.addEventListener("load", ChangeTheme("Dark"));
      </script>';
    }
  }
  //========== Dark Theme on Load ===========
  ?>

</body>
</html>