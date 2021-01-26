<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ta_system";
$em = $_SESSION['email'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
$que = "UPDATE ta_records SET Is_available = 'false' where Email = '$em' ";
$jugy = "SELECT Is_available from ta_records where Email='$em'";


$result2 = mysqli_query($conn,$jugy);

while($row = mysqli_fetch_array($result2))
{
  $flag = $row['Is_available'];
}

if($flag === "false"){
	$_SESSION["message"] =  "Office hours has already ended!";
}else{
	$result = mysqli_query($conn,$que);
	$_SESSION["message"] =  "Office hours ended!";
}

header("Location:./TA_dashboard.php");

?>