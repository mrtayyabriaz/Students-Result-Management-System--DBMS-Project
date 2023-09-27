<?php
session_start();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['AddStudentToClassID'])) {

  $StudentID = test_input($_POST['AddStudentToClassID']);
  $ClassID = test_input($_POST['ClassID']);
  $TeacherID = $_SESSION['TID'];

  if ($StudentID == "") {
    echo "Select Student Name First.";
  }
  else {


//=============== check if is already added or not =============
$query = "SELECT StudentID FROM `studentcombination` WHERE StudentID = $StudentID && ClassID = $ClassID";
$result = mysqli_query($link,$query);
if(mysqli_num_rows($result) > 0){
  echo "Student Already Added";
  return ;
}
//=============== check if is already added or not =============


    $query = "INSERT INTO `studentcombination`(`No`, `StudentID`, `ClassID`, `TeacherID`) VALUES (NULL ,'$StudentID','$ClassID','$TeacherID')";
    if (mysqli_query($link, $query)) {



      $query = "SELECT `SubjectID`
      FROM `subjectcombination`
      WHERE ClassID = '$ClassID'";
      if ($result = mysqli_query($link, $query)) {
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {

            $CurrentSubjectID = $row['SubjectID'];
            $query = "INSERT INTO `studentresult`(`TotalMarks`, `Obtained`, `StudentID`, `SubjectID`, `ClassID`) VALUES ('100','0','$StudentID','$CurrentSubjectID','$ClassID')";
            if (mysqli_query($link, $query)) {
              // echo "Success" . $CurrentSubjectID;
            }
          }
        }
      }





      
      echo "Student Insert SUCCESS";
    }
  }
}



else
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DeletStudent'])) {
    $DeletStudent = test_input($_POST['DeletStudent']);
    $ClassID = test_input($_POST['ClassID']);

    $query = "DELETE FROM `studentcombination` WHERE `studentcombination`.`StudentID` = '$DeletStudent' && `ClassID` = '$ClassID'";
    if (mysqli_query($link, $query)) {
      echo "Delet Success";
    }
  }



  else
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DeletSubjectFromClass'])) {
      $DeletSubjectFromClass = test_input($_POST['DeletSubjectFromClass']);
      $ClassID =  test_input($_POST['ClassID']);
      $query = "DELETE FROM `subjectcombination` WHERE `subjectcombination`.`SubjectID` = $DeletSubjectFromClass && `subjectcombination`.`ClassID` = '$ClassID'";
      if (mysqli_query($link, $query)) {
        echo "Delet Success";
      }
    }
    else {
      echo "POST ERROR";
    }