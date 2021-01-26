<?php
session_start();
include './send_mail.php';

$servername = "tethys.cse.buffalo.edu:3306";
$username = "ashishav";
$password = "50337024";
$dbname = "cse442_542_2020_summer_teamh_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$f_name = $_POST['firstname'];
$l_name = $_POST['lastname'];
$email = $_POST['signup_email'];
$password = $_POST['signup_password'];
$confirmation_code = rand(1000,9999);
$que = "SELECT * FROM TA_records WHERE Email = '$email'";
$result = mysqli_query($conn,$que);

$row = mysqli_fetch_array($result);
$num = mysqli_num_rows($result);
if($num > 0)
{
    if($row['registration status'] === 'registered') {
        $_SESSION["message"] = "User already registered! Check your email for further instructions.";
        $_SESSION['verifyemail'] = $_POST['signup_email'];
    } else if($row['registration status'] === 'verified') {
        $_SESSION["message"] = "User already have verified account!";
        $_SESSION['signup'] = "User already have verified account!";
    } else {
        $current_timestamp = $_SERVER['REQUEST_TIME'];
        $ta_records_update = "UPDATE TA_records SET `First_Name`='$f_name',`Last_Name`='$l_name',`password`='$password',`confirmation code`='$confirmation_code', `timestamp` = '$current_timestamp', `registration status`='registered' WHERE `Email`='$email' ";
        $result = mysqli_query($conn,$ta_records_update);

        var send_result = send_email($email,$confirmation_code);

        if (send_result === "0") {
            $_SESSION['message'] = "Oops! something went wrong.";
            $ta_records_update = "UPDATE TA_records SET `registration status`='incomplete' WHERE `Email`='$email' ";
            $result = mysqli_query($conn,$ta_records_update);
            $_SESSION['signup'] = "Oops! something went wrong.";
        } else {
            $_SESSION['message'] = "Congratulations! Check your email for further instructions.";
            $_SESSION['verifyemail'] = $email;
        }


    }
} else{
    $_SESSION["message"] = "Sorry, You are not authorised to sign up as TA!";
}
header("Location:./index.php");
$conn = null;
?>