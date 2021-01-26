<?php
session_start();

$servername = "tethys.cse.buffalo.edu:3306";
$username = "ashishav";
$password = "50337024";
$dbname = "cse442_542_2020_summer_teamh_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$course = $_POST['course'];

$que = 'INSERT INTO TA_records (`First_Name`, `Last_Name`, `Email`, `registration status`, `instructor type`) values ("$firstname","$lastname","$email","incomplete","TA")';
$result = mysqli_query($conn,$que);

$que = 'INSERT INTO faculty_course_mapping_table (`course_name`, `course_id`, `instructor_email`, `instructor_type`) values ("$course","542","$email","TA")';
$result = mysqli_query($conn,$que);

$_SESSION['message'] = "TA added successfully!";
$_SESSION['listTAs'] =  "success";
header("Location:./faculty_dashboard.php");

$conn = null;
?>