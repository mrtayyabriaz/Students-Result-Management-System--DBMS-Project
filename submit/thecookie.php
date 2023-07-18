<?php
session_start();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Change'])){
//   echo 'cookie set';
// }else{
  //   echo "error";
  // }
  
  
  if (isset($_POST['Dark'])) {
    
    $Dark = test_input($_POST['Dark']); // true or false
    
    if (isset($_COOKIE['theme'])) {  
      $oldtheme = $_COOKIE['theme'];
    }

    if ($Dark == 'true') {
      if (setcookie("theme", "Dark", time() + 86400 * 365, "/")) {
        echo 'Dark Theme Set';
      }
      else {
        echo "Dark Cookie Error";
      }
    }
    else if($Dark == 'false'){
      if (setcookie("theme", "Light", time() + 86400 * 365, "/")) {
        echo 'Light theme Set';
      }
      else {
        echo "Light cookie Error";
      }
    }
    // else
    // echo  "Cookie Get Error";
}
else {
  echo "Server Error";
}