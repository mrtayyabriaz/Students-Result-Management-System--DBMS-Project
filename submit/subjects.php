<?php
session_start();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['AddSubjectName'])) {

  $SubjectName = test_input($_POST['AddSubjectName']);
  $TeacherID = $_SESSION['TID'];
  
  if ($SubjectName == "") {
    echo "Enter Subject Name First";
  }
  else {
    $query = "INSERT INTO `Subjects` (`SubjectID`, `Subjectname`) VALUES (NULL, '$SubjectName')";
    if (mysqli_query($link, $query)) {
      echo "success insert";
    }
  }
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ClassID'])) {
  
  $SubjectID = test_input($_POST['AddSubjectToClassID']);
  $ClassID = test_input($_POST['ClassID']);
  $TeacherID = $_SESSION['TID'];

  if ($SubjectID == "") {
    echo "Enter Subject Name First";
  }
  if ($ClassID == "") {
    echo "No Class ID";
  }
  else {
    // $query = "INSERT INTO `Subjects` (`SubjectID`, `SubjectID`) VALUES (NULL, '$SubjectID')";
    $query = "INSERT INTO `subjectcombination` (`No`, `SubjectID`, `ClassID`) VALUES ('0', '$SubjectID', '$ClassID');";
    if (mysqli_query($link, $query)) {
      echo "success insert";
    }
  }
}
else {
  echo "Post Error";
}