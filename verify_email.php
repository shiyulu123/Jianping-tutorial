<?php
session_start();
include './send_mail.php';

$servername = "tethys.cse.buffalo.edu:3306";
$username = "ashishav";
$password = "50337024";
$dbname = "cse442_542_2020_summer_teamh_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$confirmation_code = $_POST['verication_code'];
$email = $_POST['verify_email'];

$que = "SELECT * FROM TA_records WHERE Email = '$email'";
$result = mysqli_query($conn,$que);

$row = mysqli_fetch_array($result);
$num = mysqli_num_rows($result);
if($num > 0)
{
    if($row['registration status'] === 'verified') {
        $_SESSION["message"] = "User already have verified account!";
        $_SESSION['signup'] = "User already have verified account!";
    } else if($row['registration status'] === 'incomplete') {
        $_SESSION["message"] = "User does not exist please register your self first!";
        $_SESSION['signup'] = "User does not exist please register your self first!";
    } else {
        $actual_code = $row['confirmation code'];
        if($confirmation_code === $actual_code) {
            $current_timestamp = $_SERVER['REQUEST_TIME'];

            if($current_timestamp - $row['timestamp'] < 900) {
                $ta_records_update = "UPDATE TA_records SET `registration status` = 'verified' WHERE `Email`='$email' ";
                $result = mysqli_query($conn,$ta_records_update);
                $_SESSION['message'] = "Congratulations! Your email has been verified.";
            } else {
                $new_code = rand(1000,9999);
                $ta_records_update = "UPDATE TA_records SET `confirmation code` = '$new_code', `timestamp` = $current_timestamp WHERE `Email`='$email' ";
                $result = mysqli_query($conn,$ta_records_update);

                var send_result = send_email($email,$confirmation_code);

                if (send_result === "0") {
                    $ta_records_update = "UPDATE TA_records SET `confirmation code` = '$actual_code' WHERE `Email`='$email' ";
                    $result = mysqli_query($conn,$ta_records_update);
                    $_SESSION['message'] = "Oops! something went wrong.";
                    $_SESSION['signup'] = "Oops! something went wrong.";
                } else {
                    $_SESSION['message'] =  "This verification code has been expired! we have sent you a new code on your mail";
                    $_SESSION['verifyemail'] = $email;
                }
            }

        } else {
            $_SESSION['message'] = "Oops! wrong verification code";
            $_SESSION['verifyemail'] = $email;
        }

    }
} else{
    $_SESSION["message"] = "User not a TA!";
}
header("Location:./index.php");
$conn = null;
?>