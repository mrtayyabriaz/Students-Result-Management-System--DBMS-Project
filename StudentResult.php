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
<body>


  <?php include "nevbar.php"; ?>


  <?php


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>

















  <section class="TeacherClasses dark-theme">
    <h4>Dear
      <?php
      include 'submit/dbconnect.php';

      if (isset($_SESSION['Name'])) {
        echo "<a class='links' href='StudentPanel.php'>" . $_SESSION['Name'] . "</a>";
      }
      else {
        echo "<a href='logout.php'>Login...</a>";
      } ?>
    </h4>
  </section>





  <section class="loginsection pb-3 dark-theme">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11" style="margin-top:10px;padding-bottom: 10vh;">
          <!-- <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 loginname ">Students -> Name</p> -->


          <div class="card text-black mt-1 rounded-4">
            <!-- change style -->
            <div class="card-body p-md-5 rounded-4 dark-theme-light StudentResultform"
              style="box-shadow: #8fff8fcf 0px 0px 9px inset;border: 2px solid #22eb83 !important;">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">



                  <?php
                  if (isset($_GET['ClassID']) && isset($_SESSION['SID']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
                    $ClassID = test_input($_GET['ClassID']);
                    $StudentID = test_input($_SESSION['SID']);
                    ?>
                    <!-- list of subjects  -->
                    <div class="d-flex flex-row align-items-center mb-2">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw formicon"></i>
                      <div class="form-outline flex-fill mb-0 SResultinputdiv">
                        <label class=" form-label h5 fw-bold" for="StudentID">Class Name</label>
                        <input class="form-control dark-theme" autocomplete="on" type="number" name="StudentID" disabled
                          value="<?php echo $StudentID ?>" />
                      </div>
                    </div>
                    <!-- list of subjects  -->

                    <?php
                    include 'submit/dbconnect.php';
                    $query = "SELECT `subjects`.`SubjectName`,`studentresult`.`TotalMarks`,`studentresult`.`obtained`,`studentresult`.`SubjectID`,`studentresult`.`ClassID`
                    FROM `studentresult` 
                    INNER JOIN `subjects`
                    on `studentresult`.`SubjectID` = `subjects`.`SubjectID`
                    WHERE ClassID = '$ClassID' && StudentID = '$StudentID';";


                    if ($result = mysqli_query($link, $query)) {
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                          ?>
                          <div class="d-flex flex-row align-items-center  StudentDiv">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw formicon"></i>
                            <div class="form-outline flex-fill mb-0 SResultinputdiv">
                              <label class=" form-label h5 fw-bold" for="StudentID">
                                <?php echo $row['SubjectName'] ?>
                              </label>
                              <div class="dflex">
                                <input disabled style="text-align: right;"
                                  class="form-control studentInputText dark-theme-light thestudentlog obtainedmark studentresultinput"
                                  autocomplete="on" type="number" id="SubjectObtained<?php echo $row['SubjectID']; ?>"
                                  name="SubjectObtained<?php echo $row['SubjectID']; ?>"
                                  value="<?php echo $row['obtained']; ?>" />

                                <span class="totalmarks">
                                  <span style="padding-right:5px;">/</span>
                                  <input disabled class="form-control studentInputText thestudentlog dark-theme-light  totalmark studentresultinput"
                                    autocomplete="on" type="number" id="SubjectTotal<?php echo $row['SubjectID']; ?>"
                                    name="SubjectTotal<?php echo $row['SubjectID']; ?>"
                                    value="<?php echo $row['TotalMarks']; ?>" />
                                </span>
                              </div>
                            </div>
                          </div>
                          <?php
                        }
                      }
                    }
                  }
                  ?>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>























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