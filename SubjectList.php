<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RMS</title>
  <!--======================= favicon =========================-->
  <link rel="apple-touch-icon" sizes="180x180" href="images/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon_io/favicon-16x16.png">
  <link rel="manifest" href="images/favicon_io/site.webmanifest">
  <link rel="shortcut icon" href="images/favicon_io/favicon.ico" type="image/x-icon">
  <!--======================= favicon =========================-->
  <!--====================== stylesheets ==========================-->
  <link rel="stylesheet" href="style/CSS/style.min.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css" rel="stylesheet"> -->
  <!-- font-awesome -->
  <script src="https://kit.fontawesome.com/681a158138.js" crossorigin="anonymous"></script>
  <!--====================== stylesheets ==========================-->
</head>

<body class="dark-theme">
  <?php include 'nevbar.php'; ?>
  <section class="SubjectContainerBorder">
    <!--======================= Teacher Name Start ===================-->
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
                  echo "<a class='links' href='ClassList.php'>" . $row['Classname'] . "</a> -> Subjects";
                  $ClassName = $row['Classname'];
                }
              }
            }
          } else {
            echo "All Subjects";
          }
        } else {
          echo "<a href='logout.php'>Login...</a>";
        } ?>
      </h4>
      <!--======================= Teacher Name End===================-->
      <!--===================== add subject to class start =========================-->
      <div class="container dark-theme-light">
        <div class="Classlist">
          <ol id="SubjectList" class="px-3">
            <?php
            if (isset($_GET['ClassID'])) {
              $TeacherID = $_SESSION['TID'];
              function test_input($data)
              {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
              $ClassID = test_input($_GET['ClassID']);

              //====================== get class subjects start =====================
              $query = "SELECT * FROM `subjectcombination` Where `ClassID` = $ClassID";
              if ($result = mysqli_query($link, $query)) {
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_array($result)) {

                    //======= getting name from subject ID start ===========
                    $CurrentSubjectID = $row['SubjectID'];
                    $query = "SELECT * FROM `subjects` Where `SubjectID` = $CurrentSubjectID";
                    if ($nameresult = mysqli_query($link, $query)) {
                      if (mysqli_num_rows($nameresult) > 0) {
                        while ($namerow = mysqli_fetch_array($nameresult)) {
                          ?>
                          <li class="row" id="TheSubject<?php echo $namerow['SubjectID']; ?>">
                            <a href="#" class="col-8">
                              <div class="ObjectBackground">
                                <div class=" subjectname">
                                  <i class="fas fa-book fa-lg fa-fw" style="-webkit-text-fill-color: #ad40ff;"></i>
                                  <?php echo $namerow['SubjectName']; ?>
                                </div>
                              </div>
                            </a>
                            <button class="col-2 btn thebutton edit" type="button">
                              <a href="edit.php?SubjectID=<?php echo $namerow['SubjectID']; ?>">Edit</a></button>
                            <button onclick="DeletSubjectFromClass(<?php echo $namerow['SubjectID']; ?>,<?php echo $ClassID; ?>)"
                              class="col-2 btn thebutton delete" type="button">Delete</button>
                          </li>
                          <?php
                        }
                      }
                    }
                    //========= getting name from subject ID end ============
                  }
                } else {
                  echo "<em>No Subject Added.</em>";
                }
              }
              //=============== get class subjects end ============
            

            } else {

















              //====================== ADD over all subjects start ========================
              if (isset($_SESSION['TID'])) {
                $TeacherID = $_SESSION['TID'];
              } else {
                $TeacherID = "Login...";
              }
              function test_input($data)
              {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
              include 'submit/dbconnect.php';
              $query = "SELECT * FROM `subjects` WHERE TeacherID = '$TeacherID'";
              if ($result = mysqli_query($link, $query)) {
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_array($result)) {
                    // echo "<a href='#'><li>" . $row['SubjectName'] . "</li></a>";
                    echo '<li class="row" id="TheSubject' . $row['SubjectID'] . '">
                  <a href="#" class="col-8">
                  <div class="ObjectBackground">
                  <div class=" subjectname">' . $row['SubjectName'] . '</div>
                  </div>
                  </a>
                  <button class="col-2 btn thebutton edit" type="button"><a href="edit.php?SubjectID=' . $row['SubjectID'] . '">Edit</a></button>
                  <button onclick="DeletSubject(' . $row['SubjectID'] . ')" class="col-2 btn thebutton delete" type="button">Delete</button>
                  </li>';
                  }
                } else {
                  echo "No Subject added";
                }
              }
              //====================== Add over all subjects end========================
            }
            ?>
          </ol>
        </div>
      </div>
    </section>
    <!--===================== add subject to class end =========================-->
    <!--========================= Class Adding  status ================= -->
    <section class="TeacherClasses">
      <div class="container dark-theme-light">
        <div class="dflex">
          <div id="AddSubjectStatus" style="width:100%;display:none;">
            <p class=signsuccess> Subject Added Successfully <span class=xmark onclick=hide(this.parentNode.parentNode)>
                <i class='fa-solid fa-xmark'></i>
              </span>
            <p>
          </div>
        </div>
        <!--========================= Class Adding  status ================= -->
        <!--=============== add subject form =========== -->
        <form method="post" id="AddSubjectForm" style="display: none;">
          <!-- <label for="AddSubjectName" class="pe-2">Subject Name</label> -->
          <div class="input-group justify-input">
            <input type="text" name="AddSubjectName" placeholder="Subject Name"
              class="form-control w-50 AddClassInput dark-theme" id="AddSubjectName">
            <div class="input-group-append">
              <button class="btn mybtn text-white" type="button" onclick=AddSubjectfun()
                style="border-top-left-radius:0px;border-bottom-left-radius:0px;">Add</button>
            </div>
          </div>
        </form>
        <!--=============== add subject form =========== -->
        <!--=================== add subject to class form ==============-->
        <form method="post" id="AddSubjectToClassForm" style="display: none;">
          <div class="input-group justify-input">
            <select id="AddSubjectToClassID" name="AddSubjectToClassID"
              class="form-select w-50 AddClassInput dark-theme" aria-label="Default select example">
              <option selected>Select Subject</option>
              <?php $query = "SELECT * FROM `subjects` WHERE TeacherID = '$TeacherID'";
              if ($result = mysqli_query($link, $query)) {
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['SubjectID'] . "'>" . $row['SubjectName'] . "</option>";
                  }
                } else {
                  echo "No Class added";
                }
              } ?>
            </select>
            <input type="hidden" name="ClassID" value="<?php echo $ClassID; ?>" id="ClassID">
            <div class="input-group-append">
              <button class="btn mybtn text-white" type="button" onclick=AddSubjectToClassfun()
                style="border-top-left-radius:0px;border-bottom-left-radius:0px;">Add Subject</button>
            </div>
          </div>
        </form>
        <!--=================== add subject to class form ==============-->
      </div>
    </section>
    <!--===================== Add Class ================= -->
    <!--===================== show form ================= -->
    <?php
    if (isset($_GET['ClassID'])) {
      echo '<script>
        let AddSubjectToClassForm = document.getElementById("AddSubjectToClassForm");
                AddSubjectToClassForm.style.display = "block";
              </script>';
    } else {
      echo '<script>
    let AddSubjectForm = document.getElementById("AddSubjectForm");
    AddSubjectForm.style.display = "block";
    </script>';
    } ?>
    <!--===================== show form ================= -->
  </section>
  <!--===============================================================================================
  ===================================== Student start ===============================================
  ================================================================================================-->
  <section class="StudentContainerBorder" id="StudentContainerBorder">
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
                  echo "<a class='links' href='ClassList.php'>" . $row['Classname'] . "</a> -> Students";
                  $ClassName = $row['Classname'];
                }
              }
            }
          } else {
            echo "All Students";
          }
        } else {
          echo "<a href='logout.php'>Login...</a>";
        } ?>
      </h4>
      <div class="container dark-theme-light">
        <!--================== Students Name end ================-->
        <!--===================== add Student to class start =========================-->
        <div class="Classlist">
          <ol id="StudentList">
            <?php
            include 'submit/dbconnect.php';
            $query = "SELECT `student_login`.`Name`, `studentcombination`.`StudentID`
                      FROM `student_login`
                      INNER JOIN `studentcombination`
                      ON `studentcombination`.`StudentID`=`student_login`.`StudentID`
                      WHERE TeacherID = '$TeacherID' && ClassID = '$ClassID'";
            if ($result = mysqli_query($link, $query)) {
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  //====== show each student =======
                  ?>
                  <li class="row" id="TheStudent<?php echo $row['StudentID']; ?>">
                    <a href="<?php echo "StudentData.php?StudentID=" . $row['StudentID'] . "&ClassID=" . $ClassID ?>"
                      class="col-8">
                      <div class="ObjectBackground">
                        <div class="subjectname">
                        <i class="fas fa-user fa-lg fa-fw" style="-webkit-text-fill-color: #19bd68;"></i>
                          <?php echo $row['Name']; ?>
                        </div>
                      </div>
                    </a>
                    <button class="col-2 btn thebutton edit" type="button"><a
                        href="<?php echo "StudentData.php?StudentID=" . $row['StudentID'] . "&ClassID=" . $ClassID ?>">Edit</a></button>
                    <button onclick="DeletStudent(<?php echo $row['StudentID'] . ',' . $ClassID ?>)"
                      class="col-2 btn thebutton delete" type="button">Delete</button>
                  </li>
                  <?php
                  //====== show each student =======
                }
              } else {
                echo "No Students added";
              }
            }

            ?>
          </ol>
        </div>
      </div>
    </section>
    <!--=========================== Show Students end ========================-->
    <!--========================= Student Adding  status ================= -->
    <section class="TeacherClasses">
      <div class="container dark-theme-light">
        <div class="dflex">
          <div id="AddStudentStatus" style="width:100%;display:none;">
            <p class=signsuccess> Student Added Successfully <span class=xmark onclick=hide(this.parentNode.parentNode)>
                <i class='fa-solid fa-xmark'></i>
              </span>
            <p>
          </div>
        </div>
        <!--========================= Student Adding  status ================= -->
        <!--=================== add Student to class form ==============-->
        <form method="post" id="AddStudentToClassForm">
          <!-- <label for="AddStudentToClassID" class="pe-2">Student Name</label> -->
          <div class="input-group justify-input" style="width: 96%!important;padding-left: 2rem;">
            <select id="AddStudentToClassID" name="AddStudentToClassID"
              class="form-select w-50 AddClassInput dark-theme" aria-label="Default select example">
              <option value="" selected>Select Student</option>
              <?php $query = "SELECT * FROM `student_login`";
              if ($result = mysqli_query($link, $query)) {
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['StudentID'] . "'>" . $row['Name'] . "</option>";
                  }
                } else {
                  echo "No Class added";
                }
              } ?>
            </select>
            <input type="hidden" name="ClassID" value="<?php echo $ClassID; ?>" id="ClassID">
            <div class="input-group-append">
              <button class="btn mybtn text-white" type="button" onclick=AddStudentToClassfun()
                style="border-top-left-radius:0px;border-bottom-left-radius:0px;">Add Student</button>
            </div>
          </div>
        </form>
        <!--=================== add Student to class form ==============-->
      </div>
    </section>
  </section>
  <!--========================= script to hide or show section ======================== -->
  <?php
  if (isset($_GET['ClassID'])) {
    echo '<script>
        let StudentContainerBorder = document.getElementById("StudentContainerBorder");
        StudentContainerBorder.style.display = "block"; 
              </script>';
  } else {
    echo '<script>
    let StudentContainerBorder = document.getElementById("StudentContainerBorder");
    StudentContainerBorder.style.display = "none";
    </script>';
  } ?>
  <!--========================= script to hide or show section ======================== -->
  <!-- INSERT INTO `studentresult` (`No`, `TotalMarks`, `Obtained`, `StudentID`, `SubjectID`, `ClassID`) VALUES ('1', '100', '85', '1111', '30', '64'); -->
  <!--===============================================================================================
===================================== Students End ================================================
================================================================================================-->
  <!--========================== script files ======================================-->
  <script src="Javascript/script.js"></script>
  <script src="submit/submit.js"></script>
  <!-- bootstrap  -->
  <script src="bootstrap/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
  <!-- font-awesome -->
  <!-- <script src="https://kit.fontawesome.com/681a158138.js" crossorigin="anonymous"></script> -->
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