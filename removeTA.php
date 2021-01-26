<!DOCTYPE html>
<?php
$servername = "tethys.cse.buffalo.edu:3306";
$username = "ashishav";
$password = "50337024";
$dbname = "cse442_542_2020_summer_teamh_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$em = $_POST['rmTA'];
$selectTA = "SELECT Email FROM TA_records WHERE Email='$em'";
$result = $conn->query($selectTA);

if($result->num_rows > 0){
	mysqli_query($conn,"DELETE FROM TA_Records WHERE Email='$em'");
    mysqli_close();
    $_SESSION['message'] = "TA removed successfully!";
    $_SESSION['listTAs'] =  "success";
} else{
    $_SESSION['message'] = "Failed! This user is not in TA list. Please check the email you entered.";
    $_SESSION['removeTA'] =  "success";
}
header("Location:./faculty_dashboard.php");
$conn = null;
?>