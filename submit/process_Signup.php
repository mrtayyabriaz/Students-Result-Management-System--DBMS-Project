<?php
session_start();

function TestInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

include 'dbconnect.php';














if (isset($_POST['TeacherID'])) {

  $TID = TestInput($_POST['TeacherID']);
  $pass = TestInput($_POST['Password']);
  $name = TestInput($_POST['Name']);
  $contact = TestInput($_POST['Contact']);

  if ($name == "") {
    echo "<p class=signerror onclick=remove(this)>Enter <strong>Teacher ID</strong><span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
    return;
  }
  else
    if ($contact == "") {
      echo "<p class=signerror onclick=remove(this)>Enter <strong>Contact Detail</strong><span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
      return;
    }
    else
      if ($TID == "") {
        echo "<p class=signerror onclick=remove(this)>Enter <strong>Teacher ID</strong><span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
        return;
      }
      else
        if ($pass == "") {
          echo "<p class=signerror onclick=remove(this)>Enter <strong>Password</strong><span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
          return;
        }


// ==================== insert Teacher data ==================

$query = "INSERT INTO `teacher_login` (`Name`, `TeacherID`, `Contact`, `Password`) VALUES ('$name', '$TID', '$contact', '$pass');";
if (mysqli_query($link, $query)) {
  echo "<p class=signsuccess onclick=remove(this)>Account created Successfully.<br> You Can Now 
          <strong>Login <a href='login.php?status=teacher'>here</a></strong>
          <span class=xmark>
            <i class='fa-solid fa-xmark'></i>
          </span>
        <p>";
}
else {
  echo "<p class=signerror onclick=remove(this)>DataBase Connection Error<span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
}

// ==================== insert Teacher data ==================

}










if (isset($_POST['StudentID'])) {
  $SID = TestInput($_POST['StudentID']);
  $pass = TestInput($_POST['Password']);
  $name = TestInput($_POST['Name']);
  $contact = TestInput($_POST['Contact']);

  if ($name == "") {
    echo "<p class=signerror onclick=remove(this)>Enter <strong>Teacher ID</strong><span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
    return;
  }
  else if ($contact == "") {
    echo "<p class=signerror onclick=remove(this)>Enter <strong>Teacher ID</strong><span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
    return;
  }
  else if ($SID == "") {
    echo "<p class=signerror onclick=remove(this)>Enter <strong>Student ID</strong><span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
    return;
  }
  else if ($pass == "") {
    echo "<p class=signerror onclick=remove(this)>Enter <strong>Password</strong><span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
    return;
  }
  else {



    $query = "INSERT INTO `student_login` (`Name`, `StudentID`, `Contact`, `Password`) VALUES ('$name', '$SID', '$contact', '$pass');";
    if (mysqli_query($link, $query)) {
       echo "<p class=signsuccess onclick=remove(this)>Account created Successfully.<br>
      <strong><a href='login.php?status=student'>Login</a></strong>
      <span class=xmark>
        <i class='fa-solid fa-xmark'></i>
      </span>
    <p>";
    }
    else {
      echo "<p class=signerror onclick=remove(this)>DataBase Connection Error<span class=xmark><i class='fa-solid fa-xmark'></i></span><p>";
    }
  }
}else{
  echo 'error';
}


?>