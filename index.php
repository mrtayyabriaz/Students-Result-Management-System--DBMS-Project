<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RMS</title>
  <!--====================== stylesheets ==========================-->
  <link rel="stylesheet" href="style/CSS/style.css">
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--====================== stylesheets ==========================-->
</head>


<body class="dark-theme">
  <?php include "nevbar.php"; ?>


  <section class="dark-theme">
    <div class="container mycontainer dark-theme-light">
      <div class="row w-100 fw-bold fs-4 select_status">Select your status</div>
      <div class="row selectioncontainer ">
        <!-- <a href="login.html" class="col-5 student">Student</a> -->
        <!-- <a href="login.html" class="col-5 teacher">Teacher</a> -->
        <a href="login.php?status=student" class="col-5 student">Student</a>
        <a href="login.php?status=teacher" class="col-5 teacher">Teacher</a>
      </div>
    </div>
  </section>


  <section class="dark-theme">
    <div class="container mycontainer dark-theme-light">
      <div class="row w-100 fw-bold fs-4 select_status">See Desktop Application Project</div>
      <div class="row DownloadProject">
        <div class="col-2" style="width: max-content;">
          <div class="mybtn">
            <a download href="project/Tayyab Riaz F21-BSSE-1049.zip">Download</a>
          </div>
        </div>
        <div class="col-9">
          <a download href="project/Tayyab Riaz F21-BSSE-1049.zip">Tayyab Riaz F21-BSSE-1049.zip (1.07 MB)</a>
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

<!-- 
  <script>
    document.body.addEventListener("load", ChangeTheme("Dark"));
  </script> -->
  
  
    <?php
    //========== Dark Theme on Load ===========
    if (isset($_COOKIE['theme'])) {
      if ($_COOKIE['theme'] == "Dark") {
        echo '<script>
        document.body.addEventListener("load", ChangeTheme("Dark"));
        </script>';
      }else{
        
      }
    }
    //========== Dark Theme on Load ===========
    ?>

</body>
</html>