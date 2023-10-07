<?php session_start();
if (isset($_SESSION['Login'])) {
  if (isset($_GET['status'])) {
    if ($_GET['status'] == "teacher") {
      echo '<script>
              window.location.assign("TeacherPanel.php");
            </script>';
    }
    if ($_GET['status'] == "student") {
      echo '<script>
              window.location.assign("StudentPanel.php");
            </script>';
    }
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

  $status = (isset($_GET['status'])) ? test_input($_GET["status"]) : 'student';
  $GLOBALS['status'] = $status;
  ?>





  <section class="loginsection pb-3 dark-theme">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11" style="margin-top:10px;padding-bottom: 10vh;">
          <?php
          if ($status == "student") {
            echo '<p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 loginname ">Student Login</p>';
          }
          else if ($status == "teacher") {
            echo '<p class="text-center text-success h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 loginname ">Teacher Login</p>';
          }
          else {
            echo '<p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 loginname ">Student Login</p>';
          }
          ?>
          <div class="card text-black mt-1 rounded-4">
            <!-- change style -->
            <div class="card-body p-md-5 rounded-4 dark-theme-light">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                  <div class="dflex">
                    <div id="login_status" style="width:100%"></div>
                  </div>



                  <form class="mx-1 mx-md-4" method="POST" id="login_form">
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <?php
                        if ($status == "student") {
                          echo '<label class=" form-label h5 fw-bold" for="StudentID">Student ID</label>
                          <div class="dflex">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw formicon"></i>
                          <input class="form-control dark-theme" autocomplete="on" type="number" id="StudentID"
                          name="StudentID" autofocus="autofocus" />
                          </div>';
                        }
                        else if ($status == "teacher") {
                          echo '<label class=" form-label h5 fw-bold" for="TeacherID">Teacher ID</label>
                                  <div class="dflex">
                                    <i class="fas fa-envelope fa-lg me-3 fa-fw formicon"></i>
                                    <input class="form-control dark-theme" autocomplete="on" type="number" id="TeacherID"
                                    name="TeacherID" autofocus="autofocus" />
                                  </div>';
                        }
                        else {
                          echo '<label class=" form-label h5 fw-bold" for="StudentID">Student ID</label>
                          <div class="dflex">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw formicon"></i>
                          <input class="form-control dark-theme" autocomplete="on" type="number" id="StudentID"
                          name="StudentID" autofocus="autofocus" />
                          </div>';
                        }
                        ?>

                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <!-- style="transform: translate(0px, 15px);" -->
                      <div class="form-outline flex-fill mb-0">
                        <div class="dflex" style="justify-content: space-between;">
                          <label class="form-label h5 fw-bold" for="password">Password</label>
                          <div class="pointer" style="color:#7d11f3">
                            <i class="fas fa-eye fa-solid" id="showicon"></i>
                            <div onclick="showpass(this)" class="btn"
                              style="color:#7d11f3;padding-left:0px;padding-top: 2px;padding-right:2px">show</div>
                          </div>
                        </div>
                        <div class="dflex">

                        <i class="fas fa-lock fa-lg me-3 fa-fw formicon"></i>
                          <input class="form-control dark-theme" autocomplete="on" type="Password" id="password"
                            name="Password" />
                        </div>
                      </div>
                    </div>


                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="button" onclick="login()" type="submit"
                        class="mybtn btn-primary btn-lg">Login</button>
                    </div>

                    <div style="text-align: center;width:100%;">
                      <?php echo '<div>Do not have an account? <a href="signup.php?status=' . $status . '" class="links">
                      Signup here</a></div>'; ?>

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>













  <script>
    status = "<?php echo $GLOBALS['status']; ?>";

    if (status == "student") {
      StudentTab = document.getElementById("StudentTab").classList.add('active');
    }
    else if (status == "teacher") {
      TeacherTab = document.getElementById("TeacherTab").classList.add('active');
    } else {
      HomeTab = document.getElementById("HomeTab");
    }

  </script>






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