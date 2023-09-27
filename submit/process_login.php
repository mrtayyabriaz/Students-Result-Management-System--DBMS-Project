<?php
session_start();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
include 'dbconnect.php';






if (isset($_POST['TeacherID'])) {

  $TID = test_input($_POST['TeacherID']);
  $pass = test_input($_POST['Password']);

  if ($TID == "") {
    echo "<p class=signerror onclick=remove(this)>Please Enter <strong>Student ID</strong><span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
    return;
  }
  if ($pass == "") {
    echo "<p class=signerror onclick=remove(this)>Enter <strong>Password</strong><span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
    return;
  }

  $query = "SELECT * FROM teacher_login WHERE `TeacherID` = $TID";
  $result = mysqli_query($link, $query);
  if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_array($result);

    if ($pass === $row['Password']) {

      $_SESSION['TID'] = $row['TeacherID'];
      $_SESSION['Name'] = $row['Name'];
      $_SESSION['Contact'] = $row['Contact'];
      $_SESSION['Login'] = TRUE;


      echo "<p class=signsuccess>
      Login Success <a href='TeacherPanel.php' class='links'>Dashboard</a>
      <span class=xmark onclick=remove(this.parentNode)>
        <i class='fa-solid fa-xmark'></i>
      </span>
    <p>";




    }
    else {
      echo "<p class=signerror onclick=remove(this)>Enter correct Password<span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
    }
  }
  else {
    echo "<p class=signerror onclick=remove(this)>Invalid student ID<span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
  }

}














if (isset($_POST['StudentID'])) {

  $SID = test_input($_POST['StudentID']);
  $pass = test_input($_POST['Password']);

  if ($SID == "") {
    echo "<p class=signerror onclick=remove(this)>Please Enter <strong>Student ID</strong><span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
    return;
  }
  if ($pass == "") {
    echo "<p class=signerror onclick=remove(this)>Enter <strong>Password</strong><span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
    return;
  }



  $query = "SELECT * FROM student_login WHERE `StudentID` = $SID";
  $result = mysqli_query($link, $query);
  if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_array($result);

    if ($pass === $row['Password']) {

      $_SESSION['SID'] = $row['StudentID'];
      $_SESSION['Name'] = $row['Name'];
      $_SESSION['Contact'] = $row['Contact'];
      $_SESSION['Login'] = TRUE;
      

      echo "<p class=signsuccess>
              Login Success <a href='StudentPanel.php' class='links'>Dashboard</a>
              <span class=xmark onclick=remove(this.parentNode)>
                <i class='fa-solid fa-xmark'></i>
              </span>
            <p>";




    }
    else {
      echo "<p class=signerror onclick=remove(this)>Enter correct Password<span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
    }
  }
  else {
    echo "<p class=signerror onclick=remove(this)>Invalid student ID<span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
  }
}








?>