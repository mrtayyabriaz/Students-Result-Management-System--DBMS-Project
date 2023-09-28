<?php
session_start();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['StudentID'])) {
  $StudentID = test_input($_POST['StudentID']);
  $ClassID = test_input($_POST['ClassID']);
  $TeacherID = $_SESSION['TID'];
  // echo "StudentID:" . $StudentID;
  // echo "ClassID:" . $ClassID;
  // echo "TeacherID:" . $TeacherID . "<br>";



  $query = "SELECT studentresult.`No`,`studentresult`.`TotalMarks`,`studentresult`.`obtained`,`studentresult`.`SubjectID`,`studentresult`.`ClassID`
            FROM `studentresult` 
            WHERE ClassID = '$ClassID' && StudentID = '$StudentID';";

  if ($result = mysqli_query($link, $query)) {
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        // $CurrentTotal = $row['TotalMarks'];
        // $CurrentObtained = $row['obtained'];
        $CurrentSubjectID = $row['SubjectID'];
        $CurrentClassID = $row['ClassID'];
        $CurrentResultNo = $row['No'];
        // echo $CurrentResultNo;

        $POSTSubjectObtained = 'SubjectObtained' . $CurrentSubjectID;
        $POSTSubjectObtained = $_POST[$POSTSubjectObtained];

        $POSTSubjectTotal = 'SubjectTotal' . $CurrentSubjectID;
        $POSTSubjectTotal = $_POST[$POSTSubjectTotal];






        // echo "POSTSubjectObtained: " . $POSTSubjectObtained . "<br>";
        // echo "POSTSubjectTotal: " . $POSTSubjectTotal . "<br>";

$query = "UPDATE `studentresult`
 SET `No`='[value-1]',`TotalMarks`='[value-2]',`Obtained`='[value-3]',`StudentID`='[value-4]',`SubjectID`='[value-5]',`ClassID`='[value-6]',`DateInsert`='[value-7]'
  WHERE 1";
        $query = "UPDATE `studentresult`
                SET `TotalMarks` = $POSTSubjectTotal , `obtained` = $POSTSubjectObtained
                WHERE ClassID = '$ClassID' && StudentID = '$StudentID' && SubjectID = '$CurrentSubjectID';";
              // WHERE `No` = '$CurrentResultNo'";
        if (mysqli_query($link, $query)) {
          echo "Saved success";
        }
      }
    }
  }
  // echo "OK";
}