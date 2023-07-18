<?php
session_start();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['AddClassName'])) {

  $ClassName = test_input($_POST['AddClassName']);
  $TeacherID = $_SESSION['TID'];

  if ($ClassName == "") {
    echo "Enter Class Name First";
  }
  else {
    $query = "INSERT INTO `class` (`ClassID`, `Classname`, `TeacherID`) VALUES (NULL, '$ClassName', '$TeacherID')";
    if (mysqli_query($link, $query)) {
      echo "success insert";
    }
  }
}
else {
  echo "Post Error";
}