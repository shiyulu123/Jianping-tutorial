<?php
session_start();
include './Mail.php';
function send_email($email , $confirmation_code) {
    $host = "ssl://smtp.gmail.com";
    $username = "ubtaavailability@gmail.com";
    $password = "najy_sec123";
    $port = "465";
    $to = $email;
    $email_from = "ubtaavailability@gmail.com";
    $email_subject = "Verify your email" ;
    $email_body = "Your verification code:<br/><center><h2>".$confirmation_code."</h2></center><br/>Please enter above code to verify email section to get your account activated";
    $email_address = "ubtaavailability@gmail.com";
    $content_type = "text/html; charset=UTF-8";

    $headers = array ('From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address,'Content-type' => $content_type);
    $smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
    $mail = $smtp->send($to, $headers, $email_body);


    if (PEAR::isError($mail)) {
        $_SESSION['message'] = $mail->getMessage();
        $_SESSION['signup'] = $mail->getMessage();
    } else {
        $_SESSION['message'] = "Congratulations! Check your email for further instructions.";
        $_SESSION['verifyemail'] = $email;
    }

    if (PEAR::isError($mail)) {
        return "0";
    } else {
        return "1";
    }
}
?>