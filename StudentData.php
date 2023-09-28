<?php session_start();
if (isset($_SESSION['Login'])) {
  if (!isset($_SESSION['TID'])) {
    echo '<script>
              window.location.assign("StudentPanel.php");
          </script>';
  }
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student Records | RMS</title>
  <!--====================== stylesheets ==========================-->
  <link rel="stylesheet" href="style/CSS/style.min.css">
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

  // $status = (isset($_GET['status'])) ? test_input($_GET["status"]) : 'student';
  // $GLOBALS['status'] = $status;
  ?>





  <section class="loginsection pb-3 dark-theme">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11" style="margin-top:10px;padding-bottom: 10vh;">
          <!-- <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 loginname ">Students -> Name</p> -->
          
          <section class="TeacherClasses">
            <h4>Teacher
              <?php
              include 'submit/dbconnect.php';

              if (isset($_SESSION['Name'])) {
                echo "<a class='links' href='TeacherPanel.php'>" . $_SESSION['Name'] . "</a> -> ";

                // show class name 
                if (isset($_GET['ClassID'])) {
                  $ClassID = $_GET['ClassID'];
                  if( isset($_GET['StudentID'])){
                    $StudentID = $_GET['StudentID'];
                  }
                  //============ getting class name ============
                  $query = "SELECT Classname FROM class WHERE ClassID = '$ClassID'";
                  if ($result = mysqli_query($link, $query)) {
                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result)) {
                        $ClassName = $row['Classname'];
                        $CN = TRUE;
                      }
                    }
                  }
                  //============ getting class name ============

                  //============ getting student name ============
                  $query = "SELECT `Name` FROM `student_login` WHERE `StudentID` = '$StudentID'";
                  if ($result = mysqli_query($link, $query)) {
                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result)) {
                        $StudentName = $row['Name'];
                        $SN = TRUE;
                      }
                    }
                  }
                  //============ getting Student name ============
                  if($CN && $SN){
                    echo "<a class='links' href='ClassList.php'>" . $ClassName . "</a> -> $StudentName";
                  }
                }
                else {
                  echo "All Subjects";
                }
              }
              else {
                echo "<a href='logout.php'>Login...</a>";
              } ?>
            </h4>
          </section>







          <div class="card boxshadow rounded-4" style="border: 0px;">
            <!-- change style -->
            <div class="card-body p-md-5 rounded-3 dark-theme-light">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                  <div class="dflex bg-success text-white rounded p-2 my-2" style="display:none">
                    <div id="SaveResultStatus" style="width:100%"></div>
                  </div>

                  <form class="mx-1 mx-md-4" method="POST" id="SaveStudentResult">

                    <?php
                    if (isset($_GET['ClassID']) && isset($_GET['StudentID']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
                      $ClassID = test_input($_GET['ClassID']);
                      $StudentID = test_input($_GET['StudentID']);
                      $TeacherID = $_SESSION['TID'];
                      ?>

                      <div class="d-flex flex-row align-items-center mb-2">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw formicon"></i>
                        <div class="form-outline flex-fill mb-0">
                          <label class=" form-label h5 fw-bold" for="StudentID">Student ID</label>
                          <input class="form-control dark-theme" style="display:none" autocomplete="on" type="number" 
                            name="StudentID" value="<?php echo $StudentID ?>" autofocus="autofocus" />
                          <input class="form-control dark-theme" style="display:none" autocomplete="on" type="number" 
                            name="ClassID" value="<?php echo $ClassID ?>" autofocus="autofocus" />
                          <input class="form-control dark-theme border-0" type="number" 
                            disabled value="<?php echo $StudentID ?>" />
                        </div>
                      </div>

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
                              <div class="form-outline flex-fill mb-0">
                                <label class=" form-label h5 fw-bold" for="StudentID">
                                  <?php echo $row['SubjectName'] ?>
                                </label>
                                <div class="dflex">
                                  <input style="text-align:right;width:69%" class="form-control border-0 dark-theme studentresultinput" autocomplete="on" type="number"
                                    id="SubjectObtained<?php echo $row['SubjectID']; ?>" name="SubjectObtained<?php echo $row['SubjectID']; ?>" value="<?php echo $row['obtained']; ?>"
                                    autofocus="autofocus" />
                                  <span class="totalmarksTeacher">
                                    <span style="padding-right:5px;">/</span>
                                  <input style="padding-left: 21px;" class="form-control border-0 dark-theme studentresultinput" autocomplete="on" type="number"
                                    id="SubjectTotal<?php echo $row['SubjectID']; ?>" name="SubjectTotal<?php echo $row['SubjectID']; ?>" value="<?php echo $row['TotalMarks']; ?>"
                                    autofocus="autofocus" />
                                    
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



                    <div class="d-flex justify-content-center m-3 mb-lg-4">
                      <button type="button" onclick="SaveStudentResult()" type="submit"
                        class="mybtn btn-primary btn-lg">Save Result</button>
                    </div>
                </div>
                </form>
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