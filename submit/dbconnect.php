<?php
$localhost = "localhost";
$username = "root";
$password = "";
$database = "student_rms";

$link = mysqli_connect($localhost, $username, $password, $database);
if ($link->connect_errno) {
    echo "Database_Connection_Error";
    die(mysqli_connect_error());
    // exit();
}
else{
    // echo "connection success";
}