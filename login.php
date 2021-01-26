<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ta_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$que = "SELECT * FROM TA_records WHERE Email = '".$_POST['login_email']."' AND password='".$_POST['login_pwd']."'";
$result = mysqli_query($conn,$que);

$row = mysqli_fetch_array($result);
$num = mysqli_num_rows($result);
if($num > 0)
{
    if($row['registration status'] === "verified") {
        $_SESSION["fname"] = $row['First_Name'];
        $_SESSION["lname"] = $row['Last_Name'];
        $_SESSION["email"] = $row['Email'];
        if($row['instructor type']==='faculty') {
            header("Location:./faculty_dashboard.php");
        } else {

            header("Location:./TA_dashboard.php");
        }
    } else {
        $_SESSION['message'] = "Oops! You do not have verified account. Check your mail for verification code";
        $_SESSION['verifyemail'] = $email;
        header("Location:./index.php");
    }

}
else{
    $_SESSION["message"] = "Invalid credentials!!";
    header("Location:./index.php");
}
$conn = null;
?>