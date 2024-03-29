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


  <!--===================== Teacher Name ================= -->
  <section class="TeacherClasses">
    <h4>Teacher
      <?php if (isset($_SESSION['Name'])) {
        echo $_SESSION['Name'];
      }
      else {
        echo "<a href='logout.php'>Login...</a>";
      } ?>
    </h4>
  </section>
  <!--===================== Teacher Name ================= -->


  <!--===================== Manage Subject ================= -->
  <section class="TeacherClasses">
    <div class="container dark-theme-light">
      <!--====== Manage calsses ======= -->
      <div class="ManageContainer">
        <a href='ClassList.php'>
          <div class="ObjectBackground">
            
            <div class="ManageSubject">
              <i class="fa-solid fa-house-chimney-user h3 m-0" style="padding: 0px 6px;-webkit-text-fill-color: #5093ff;"></i>
             All Classes
            </div>
          </div>
        </a>
      </div>
      <!--====== Manage calsses ======= -->


      <!--====== Manage Subject ======= -->
      <div class="ManageContainer">
        <a href='SubjectList.php'>
        <div class="ObjectBackground">
          <div class="ManageSubject">
          <i class="fas fa-book fa-fw h3 m-0" style="margin: 0px 5px !important;-webkit-text-fill-color: #ad40ff;" aria-hidden="true"></i>
            All Subjects
          </div>
        </div>
        </a>
      </div>
      <!--====== Manage Subject ======= -->
    </div>
  </section>
  <!--===================== Manage Subject ================= -->






  <!--========================== script files ======================================-->
  <script src="Javascript/script.js"></script>
  <script src="submit/submit.js"></script>
  <!-- bootstrap  -->
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
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