<?php
session_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RMS</title>
  <!--====================== stylesheets ==========================-->
  <link rel="stylesheet" href="style/CSS/style.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css" rel="stylesheet"> -->
  <!--====================== stylesheets ==========================-->
</head>
<body class="dark-theme">

  <?php include 'nevbar.php'; ?>

  <!--===================== your classes ================= -->
  <section class="TeacherClasses">
    <h4>Teacher
      <?php
      include 'submit/dbconnect.php';

      if (isset($_SESSION['Name'])) {
        echo "<a class='links' href='TeacherPanel.php'>" . $_SESSION['Name'] . "</a> -> ";

        // show class name 
        if (isset($_GET['ClassID'])) {
          $ClassID = $_GET['ClassID'];
          $query = "SELECT Classname FROM class WHERE ClassID = '$ClassID'";
          if ($result = mysqli_query($link, $query)) {
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
                echo $row['Classname'];
              }
            }
          }
        }
        else {
          echo "Classes";
        }
        // show class name 
      }
      else {
        echo "<a href='logout.php'>Login...</a>";
      } ?>
    </h4>











    <section class="loginsection pb-3 dark-theme" style="background:white;">
      <div class="container-fluid h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11" style="margin-top:10px;padding-bottom: 10vh;">

            <div class="card text-black mt-1 rounded-4" style="background:#d9d9d9bd;">
              <!-- change style -->
              <div class="card-body p-md-5 rounded-4 dark-theme-light">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-xl-8 order-2 order-lg-1">


                    <div class="dflex">
                      <div id="login_status" style="width:100%"></div>
                    </div>

                    <?php if (isset($_POST['ClassID'])) {
                      $ClassName = test_input($_POST['ClassName']);
                      $ClassID = test_input($_POST['ClassID']);
                      // $query = "UPDATE `Class` SET Classname = '$ClassName' WHERE ClassID = '$ClassID'";
                      $query = "UPDATE `class` SET `Classname` = '$ClassName' WHERE `class`.`ClassID` = '$ClassID'";
                      if (mysqli_query($link, $query)) {
                        echo 'Class Name Changed.';
                      }
                    }
                    else if (isset($_POST['SubjectID'])) {
                      $SubjectName = test_input($_POST['SubjectName']);
                      $SubjectID = test_input($_POST['SubjectID']);
                      // ;
                      $query = "UPDATE `subjects` SET `SubjectName` = '$SubjectName' WHERE `subjects`.`SubjectID` = '$SubjectID'";
                      if (mysqli_query($link, $query)) {
                        echo 'Subject Name Changed.';
                      }
                    } ?>

                    <form class="mx-1 mx-md-4" method="POST" id="EditClassForm"
                      action="<?php echo $_SERVER['PHP_SELF']; ?>">


                      <?php
                      if (isset($_GET['ClassID'])) {
                        $ClassID = $_GET['ClassID'];
                        $query = "SELECT Classname FROM class WHERE ClassID = '$ClassID'";
                        if ($result = mysqli_query($link, $query)) {
                          if (mysqli_num_rows($result) == 1) {
                            while ($row = mysqli_fetch_array($result)) {
                              $ClassName = $row['Classname'];
                            }
                          }
                        }

                        echo '
                            <div class="d-flex flex-row align-items-center mb-4">
                              <i class="fas fa-envelope fa-lg me-3 fa-fw formicon"></i>
                              <div class="form-outline flex-fill">
                              <label class=" form-label h5 fw-bold" for="TeacherID">Edit Class Name</label>';
                        echo '<input class="form-control dark-theme" autocomplete="on" type="text" id="TeacherID" value="' . $ClassName . '" name="ClassName" autofocus="autofocus" />';
                        echo '<input type="hidden" name="ClassID" value="' . $ClassID . '">';
                        // edit button 
                        echo '<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" onclick="EditClass()" type="submit"
                              class="mybtn btn-primary btn-lg">Edit</button>
                          </div>';
                      }
                      else if (isset($_GET['SubjectID'])) {

                        $SubjectID = $_GET['SubjectID'];
                        $query = "SELECT SubjectName FROM subjects WHERE SubjectID = '$SubjectID'";
                        if ($result = mysqli_query($link, $query)) {
                          if (mysqli_num_rows($result) == 1) {
                            while ($row = mysqli_fetch_array($result)) {
                              $SubjectName = $row['SubjectName'];
                            }
                          }
                        }

                        echo '
                              <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-envelope fa-lg me-3 fa-fw formicon"></i>
                              <div class="form-outline flex-fill">
                              <label class=" form-label h5 fw-bold" for="TeacherID">Edit Subject Name</label>';
                        echo '<input class="form-control dark-theme" autocomplete="on" type="text" id="SubjectName" value="' . $SubjectName . '" name="SubjectName" autofocus="autofocus" />';
                        echo '<input type="hidden" name="SubjectID" value="' . $SubjectID . '">';
                        echo '
                              </div>
                              </div>';
                        // edit button 
                        echo '<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                              <button type="submit" onclick="EditClass()" type="submit"
                                class="mybtn btn-primary btn-lg">Edit</button>
                            </div>';
                      }
                      ?>




                    </form>
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