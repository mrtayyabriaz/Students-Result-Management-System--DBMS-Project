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
// echo"AddSubjectName";
  $SubjectName = test_input($_POST['AddSubjectName']);
  $TeacherID = $_SESSION['TID'];
// echo  "SubjectName";
  if ($SubjectName == "") {
    echo "Enter Subject Name First";
  }
  else {
    $query = "INSERT INTO `subjects` (`SubjectID`, `Subjectname`,`TeacherID`) VALUES (NULL, '$SubjectName', '$TeacherID')";
    if (mysqli_query($link, $query)) {
      echo "success insert";
    }else {
      echo "insert query error";
    }
  }
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['AddSubjectToClassID'])) {

  $SubjectID = test_input($_POST['AddSubjectToClassID']);
  $ClassID = test_input($_POST['ClassID']);
  $TeacherID = $_SESSION['TID'];

  if ($SubjectID == "") {
    echo "Enter Subject Name First";
    return;
  }
  if ($ClassID == "") {
    echo "No Class ID";
    return;
  }
  else {




    //=============== check if is already added or not =============
    $query = "SELECT SubjectID FROM `subjectcombination` WHERE `SubjectID` = $SubjectID && `ClassID` = $ClassID";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
      echo "SUBJECT Already Added";
      return;
    }
    //=============== check if is already added or not =============


    // $query = "INSERT INTO `Subjects` (`SubjectID`, `SubjectID`) VALUES (NULL, '$SubjectID')";
    $query = "INSERT INTO `subjectcombination` (`No`, `SubjectID`, `ClassID`) VALUES ('0', '$SubjectID', '$ClassID');";
    if (mysqli_query($link, $query)) {

//======= insert students result combinations =========
$query = "SELECT StudentID FROM `studentcombination`
                Where `ClassID` = '$ClassID'";
      if ($result = mysqli_query($link, $query)) {
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {

            $CurrentStudentID = $row['StudentID'];
            $query = "INSERT INTO `studentresult`(`TotalMarks`, `Obtained`, `StudentID`, `SubjectID`, `ClassID`) VALUES ('100','0','$CurrentStudentID','$SubjectID','$ClassID')";
            if (mysqli_query($link, $query)) {
              // echo "Success" . $CurrentStudentID;
            }
          }
        }
      }
      //======= insert students result combinations =========


      
      echo "success insert";
    }

  }
}
else
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DeletSubject'])) {
    $DeletSubject = test_input($_POST['DeletSubject']);

    $query = "DELETE FROM `subjects` WHERE `subjects`.`SubjectID` = $DeletSubject";
    if (mysqli_query($link, $query)) {
      echo "Delet Success";
    }
  }
  else
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DeletSubjectFromClass'])) {
      $DeletSubjectFromClass = test_input($_POST['DeletSubjectFromClass']);
      $ClassID = test_input($_POST['ClassID']);
      $query = "DELETE FROM `subjectcombination` WHERE `subjectcombination`.`SubjectID` = $DeletSubjectFromClass && `subjectcombination`.`ClassID` = '$ClassID'";
      if (mysqli_query($link, $query)) {
        
        
        // now delete all students result combination with that subject and class

        $query = "DELETE FROM `studentresult` WHERE ClassID = '$ClassID' && SubjectID = '$DeletSubjectFromClass'";
        if (mysqli_query($link, $query)) {
          echo "Delet Success";
        }

        // now delete all students result combination with that subject and class

      }
    }
    else {
      echo "Post Error";
    }