<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LMS</title>
  <!--====================== stylesheets ==========================-->
  <link rel="stylesheet" href="style/CSS/style.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css" rel="stylesheet"> -->
  <!--====================== stylesheets ==========================-->
</head>
<body class="dark-theme">

  <?php include 'nevbar.php'; ?>



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
          echo "All Subjects";
        }
        // show class name 
      }
      else {
        echo "<a href='logout.php'>Login...</a>";
      } ?>
    </h4>
    <div class="container">
      <h2 class="YourClass">
        <?php if (isset($_GET['ClassID'])) {
          echo "Class Subjects";
        }
        else {
          echo "All Subjects";
        } ?>
      </h2>
      <div class="Classlist">
        <ol id="classlist">

          <?php



          if (isset($_GET['ClassID'])) {
            $TeacherID = $_SESSION['TID'];
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
            $ClassID = test_input($_GET['ClassID']);

            //=============== get class subjects ============
            $query = "SELECT * FROM `subjectcombination` Where `ClassID` = $ClassID";
            if ($result = mysqli_query($link, $query)) {
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  echo "<a href='#'><li>";

                  // getting name from subject ID 
                  $CurrentSubjectID = $row['SubjectID'];
                  $query = "SELECT `SubjectName` FROM `subjects` Where `SubjectID` = $CurrentSubjectID";
                  if ($nameresult = mysqli_query($link, $query)) {
                    if (mysqli_num_rows($nameresult) > 0) {
                      while ($namerow = mysqli_fetch_array($nameresult)) {
                        echo $namerow['SubjectName'];
                      }
                    }
                  }
                  // getting name from subject ID 
                  echo "</li></a>";
                }
              }
              else {
                echo "<em>No Subject found</em>";
              }
            }
            //=============== get class subjects ============
          }
          else {
            $TeacherID = $_SESSION['TID'];
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
            include 'submit/dbconnect.php';
            $query = "SELECT * FROM `subjects`";
            if ($result = mysqli_query($link, $query)) {
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  echo "<a href='#'><li>" . $row['SubjectName'] . "</li></a>";
                }
              }
              else {
                echo "No Class added";
              }
            }
          }
          ?>
        </ol>
      </div>
    </div>
  </section>






  <!--===================== Add Class status ================= -->
  <section class="TeacherClasses">
    <div class="container">


      <div class="dflex">
        <div id="AddSubjectStatus" style="width:100%;display:none;">
          <p class=signsuccess>
            Subject Added Successfully
            <span class=xmark onclick=hide(this.parentNode.parentNode)>
              <i class='fa-solid fa-xmark'></i>
            </span>
          <p>
        </div>
      </div>

      <!--===================== Add Class status ================= -->


      <!--===================== Add Class ================= -->

      <h2 class="YourClass">
        <?php if (isset($_GET['ClassID'])) {
          echo "Add Subject To Class";
        }
        else {
          echo "Add Subject";
        } ?>
      </h2>


      <form method="post" id="AddSubjectForm" style="display: none;">
        <label for="AddSubjectName" class="pe-2">Subject Name</label>
        <div class="input-group w-75">
          <input type="text" name="AddSubjectName" placeholder="Subject Name"
            class="form-control w-50 AddClassInput dark-theme" id="AddSubjectName">
          <div class="input-group-append">
            <button class="btn mybtn text-white" type="button" onclick=AddSubjectfun()
              style="border-top-left-radius:0px;border-bottom-left-radius:0px;">Add</button>
          </div>
        </div>
      </form>

      <form method="post" id="AddSubjectToClassForm" style="display: none;">
        <label for="AddSubjectToClassID" class="pe-2">Subject Name</label>
        <div class="input-group w-75">
          <select id="AddSubjectToClassID" name="AddSubjectToClassID" class="form-select w-50 AddClassInput dark-theme"
            aria-label="Default select example">
            <option selected>Open this select menu</option>
            <?php $query = "SELECT * FROM `subjects`";
            if ($result = mysqli_query($link, $query)) {
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  echo "<option value='" . $row['SubjectID'] . "'>" . $row['SubjectName'] . "</option>";
                }
              }
              else {
                echo "No Class added";
              }
            } ?>
          </select>
          <input type="hidden" name="ClassID" value="<?php echo $ClassID; ?>" id="ClassID">
          <div class="input-group-append">
            <button class="btn mybtn text-white" type="button" onclick=AddSubjectToClassfun()
              style="border-top-left-radius:0px;border-bottom-left-radius:0px;">Add</button>
          </div>
        </div>
      </form>


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
  }
  else {
    echo '<script>
                let AddSubjectForm = document.getElementById("AddSubjectForm");
                AddSubjectForm.style.display = "block";
              </script>';
  } ?>
  <!--===================== show form ================= -->

























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