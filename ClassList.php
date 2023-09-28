<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RMS</title>
  <!--====================== stylesheets ==========================-->
  <link rel="stylesheet" href="style/CSS/style.min.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css" rel="stylesheet"> -->
  <!--====================== stylesheets ==========================-->
</head>
<body class="dark-theme">

  <?php include 'nevbar.php'; ?>










  <section class="ClassContainerBorder">
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
      
      <div class="container dark-theme-light">
        <!-- <h2 class="YourClass">Your Classes</h2> -->
        <div class="Classlist">
          <ol id="classlist">

            <?php
            $TeacherID = $_SESSION['TID'];
            include 'submit/dbconnect.php';

            $query = "SELECT * FROM class Where `TeacherID` = $TeacherID";
            if ($result = mysqli_query($link, $query)) {
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  // echo "<a href='SubjectList.php?ClassID=" . $row['ClassID'] . "'><li >" . $row['Classname'] . "</li></a>";
                  echo '<li class="row" id="TheClass' . $row['ClassID'] . '">
                        <a class="col-8 " href="SubjectList.php?ClassID=' . $row['ClassID'] . '">
                          <div class="subjectname">' . $row['Classname'] . '</div>
                        </a>
                        <button class="col-2 btn thebutton edit" type="button"><a href="edit.php?ClassID=' . $row['ClassID'] . '">Edit</a></button>
                        <button  onclick="DeletClass(' . $row['ClassID'] . ')" class="col-2 btn thebutton delete" type="button">Delete</button>
                      </li>
                  ';
                }
              }
              else {
                echo "No Class added";
              }
            }
            ?>
            <!-- <button class="col-2 btn thebutton delete" type="button">Delete</button> -->

          </ol>
        </div>
      </div>
    </section>
    <!--===================== your classes ================= -->

    <!--===================== Add Class status ================= -->
    <section class="TeacherClasses">
      <div class="container dark-theme-light">


        <div class="dflex">
          <div id="AddClassStatus" style="width:100%;display:none;">
            <p class=signsuccess>
              Class Added Successfully
              <span class=xmark onclick=hide(this.parentNode.parentNode)>
                <i class='fa-solid fa-xmark'></i>
              </span>
            <p>
          </div>
        </div>

        <!--===================== Add Class status ================= -->


        <!--===================== Add Class ================= -->

        <!-- <h2 class="YourClass">Add Class</h2> -->
        <form method="post" id="AddClassForm">
          <!-- <label for="AddClassName" class="pe-2">Class Name</label> -->
          <div class="input-group ">
            <input type="text" name="AddClassName" placeholder="Class Name"
              class="form-control w-50 AddClassInput dark-theme" id="AddClassName">
            <div class="input-group-append">
              <button class="btn mybtn text-white" type="button" onclick=AddClassfun()
                style="border-top-left-radius:0px;border-bottom-left-radius:0px;">Add</button>
            </div>
          </div>
        </form>

      </div>
    </section>

    <!--===================== Add Class ================= -->
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