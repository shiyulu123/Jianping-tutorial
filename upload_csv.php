<!DOCTYPE html>
<?php
session_start();
$servername = "tethys.cse.buffalo.edu:3306";
$username = "ashishav";
$password = "50337024";
$dbname = "cse442_542_2020_summer_teamh_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ( isset($_FILES["picpath"])) {
       //if there was an error uploading the file
        if ($_FILES["picpath"]["error"] > 0) {
              echo '<script type="text/javascript">alert("Return Code: " '. $_FILES["picpath"]["error"].')</script>';
        } else {
              $handle = fopen($_FILES['picpath']['tmp_name'], "r");
              $headers = fgetcsv($handle, ",");
			  $row_count = 0;
              $success_count = 0;
              $failure_count = 0;
              while (($data = fgetcsv($handle, ",")) !== FALSE)
              {
                    if($data[2]==null) {
                        $failure_count++;
                    }
                    else {
                        $success_count++;
                        $que = 'INSERT INTO TA_records (`First_Name`, `Last_Name`, `Email`, `registration status`, `instructor type`) values ("'.$data[0].'","'.$data[1].'","'.$data[2].'","incomplete","TA")';
                        $result = mysqli_query($conn,$que);

						$que = 'INSERT INTO faculty_course_mapping_table (`course_name`, `course_id`, `instructor_email`, `instructor_type`) values ("'.$data[3].'","542","'.$data[2].'","TA")';
                        $result = mysqli_query($conn,$que);
                    }
					$row_count++;
              }
			  if($row_count == 0){
				$_SESSION['message']= "Oops! Details in the CSV file should not be empty";
			  }else{
                    $msg = $_FILES["picpath"]["name"].' successfully uploaded and '.$success_count.' TAs added to course ';
                    if($failure_count > 0){
                        $msg =   $msg .' and '. $failure_count.' failed to add because of insufficient data';
                    }
                    $_SESSION['message'] =  $msg;
			  }

              fclose($handle);
              $_SESSION['listTAs'] =  "success";
              header("Location:./faculty_dashboard.php");
        }
} else {
     $_SESSION['message'] = "No File selected";
     header("Location:./faculty_dashboard.php");
}
$conn = null;
?>