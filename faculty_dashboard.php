<?php
session_start();
if (isset($_SESSION['message'])) {
    echo '<script type="text/javascript">alert("' . $_SESSION['message'] . '");</script>';
    unset($_SESSION['message']);
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="tab.css">
  <script type="text/javascript">
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}


</script>
<style>
body {font-family: Arial;}
<style>
* {
  box-sizing: border-box;
}

body {
  
  background-image:url('campus.jpg');
    background-repeat:repeat-x;
    background-size: cover;

}

/* 头部样式 */
.header {
  background-color: #f1f1f1;
  padding: 5px;
  
}
.topnav {

  overflow: visible;
    background-color: #f1f1f1;
  border: 0px solid #ccc;
    padding: 0px;
    
}
/* 创建三个相等的列 */
.column {
  float: left;
  padding: 10px;
}

/* 中间区域宽度 */
.column.middle {
  width: 50%;
}

/* 列后面清除浮动 */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* 响应式布局 - 宽度小于600px时设置上下布局 */
@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}

/* 底部样式 */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
  width: 100%;
  bottom: 0;
  position:absolute;
  

}

#center {
    margin: auto;
  width: 60%;
    border: 0px solid #73AD21;
    padding: 20px
}
.alignleft { 
    display: inline; 
    float: left; 
    } 
.alignright { 
    display: inline; 
    float: right; 
    } 
 #floatleft{
  float: left;
 }
#border {border-style:groove; width: 300px;;
        Background-color: rgba(0,0,0,0.7);
      border-style: solid;
      border-radius: 15px;}
.thick {font-weight:bold;
		color:#0000ff;
		}




/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border-top: none;
}
</style>
</head>
<body>
  <div align="center" class="header">

  <img src="icon.png"  style="vertical-align:middle" width="180" height="120">
    <h1>TA System</h1>
</div>
<div class="topnav">
<div class="tabbed">
      <ul>
      	<li onclick="openCity(event,'TAlist')" class="tablinks">List of TA</li>
      	<li onclick="openCity(event,'photo')" class="tablinks">Upload photo for TA</li>
        <li onclick="openCity(event,'remove')" class="tablinks">Remove TA</li>
        <li onclick="openCity(event,'add')" class="tablinks">Add TA</li>
        <li onclick="openCity(event,'cvs')" class="tablinks active">Upload CSV</li>
      </ul>
</div>
</div>

<div id="center" class="row">
<div class="column middle" id="center">
  <!-- Upload cvs page -->
          <div id="cvs" class="tabcontent" style= "display:block";>
            <div id='border' class="container">
            <br>
            <form name="form2" action="upload_csv.php" method="post" enctype="multipart/form-data">
  
			  <p class="thick">Upload the CVS:</p>
			  
			　<input type="file" name="picpath" id="picpath" style="display:none;" onChange="document.form2.path.value=this.value.replace('C:\\fakepath\\', '')" required>　
			　<input id="floatleft" type="button" class="btn btn-primary" value="Upload CSV" onclick="document.form2.picpath.click()"> 
			<br>
			<br>
			  <input name="path" readonly>
			  <br>
			  <br>
			  <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit file">
			 
			</form>
			<br>
          </div>
          
          </div>
    <!--Add TA-->


<div id="add" class="tabcontent">
  	<div id='border' class="container">

    <br>
            <form name="form3" action="addTA_file.php" method="post" enctype="multipart/form-data">
  			  <label class="thick">Firstname :</label>
  			  <br>
  			  <input id="floatleft" type="text" name="firstname" placeholder="Enter TA's firstname" required>
  			  <br>
  			  <br>
  			  <label class="thick">Lastname :</label>
  			  <br>
  			  <input id="floatleft" type="text" name="lastname" placeholder="Enter TA's lastname" required>
  			  <br>
  			  <br>
			  <lable class="thick">Enter the TAs email :</lable>
			  <br>
			　<input id="floatleft" type="email" name="email" placeholder="Enter TA's email" required>
			  <br>
			  <br>
			  <lable class="thick">Enter course name :</lable>
			  <br>
			  <input id="floatleft" type="text" name="course" placeholder="Enter TA's course" required>
			  <br>
			  <br>
			  <input type="submit" class="btn btn-primary" name="submit" value="Add">
			 
			</form>
			<br>
	</div>
	<br>
</div>
<!--Remove TA-->

<div id="remove" class="tabcontent">
	<div id='border' class="container">
  
    <br>
            <br>
            <form name="form4" action="removeTA.php" method="post" enctype="multipart/form-data">
  
			  <lable class="thick">Enter the TAs email:</lable>
			  <br>
			　<input id="floatleft" type="email" name="rmTA" placeholder="Enter TA's email" required>
			  <br>

			  
			  <br>
			  <input type="submit" class="btn btn-primary" name="submit" value="Remove">
			 
			</form>
			<br>
			<br>
    </div>
    <br>
    <br>
</div>
<!--upload photo-->
<div id="photo" class="tabcontent">
	<div id='border' class="container">
		<form name="form1" action="upload_photo.php" method="post" enctype="multipart/form-data">
  			<br>
  			
		  <lable class="thick">Upload TAs Photo:</lable>
		  <br>
		　<input type="file" name="picpath" id="picpath" style="display:none;" onChange="document.form1.path.value=this.value.replace('C:\\fakepath\\', '')" required>
		　<input id="floatleft" type="button" class="btn btn-primary" value="Upload photo" onclick="document.form1.picpath.click()"> 
		  <br>
		  <br>
		  <input name="path" readonly>
		  <br>
		  <br>
		  <lable class="thick">Enter the TAs email:</lable>
			  <br>
			  
			　<input id="floatleft" type="email" name="email" placeholder="Enter TA's email" required>
			  <br>
			  <br>
		  <input type="submit" class="btn-primary btn-sm" name="submit" value="Submit photo">
		  
		</form>
		<br>
	</div>
	<br>
    
</div>
<!--List of TA-->
<div id="TAlist" class="tabcontent">
	<div id='border' class="container">
		<table class="table">
	
   <thead>
      <tr>
         <th class="thick">TA</th>
         <th class="thick">Course</th>
      </tr>
   </thead>
   <tbody>
   <?php
    $servername = "tethys.cse.buffalo.edu:3306";
    $username = "ashishav";
    $password = "50337024";
    $dbname = "cse442_542_2020_summer_teamh_db";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $loggedin_user = $_SESSION["email"];
    $que = "SELECT * FROM faculty_course_mapping_table WHERE `course_name` IN (select course_name from faculty_course_mapping_table where `instructor_email` = '$loggedin_user')";
    $result = mysqli_query($conn,$que);

    $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result))
    {
        ?>
      <tr>
         <td class="thick"><?php echo $row['instructor_email']." ";?></td>
         <td class="thick"><?php echo $row['course_name']." ";?></td>
      </tr>
      <?php
        }
        $conn = null;
        ?>
   </tbody>
</table>

	</div>
	<br>
    <br>
</div>

</div>

</div>

<div class="footer" >
  <p class="thick">Office phone number: 7165800633 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Office email: shiyulu@buffalo.edu</p>

</div>
</body>
</html> 
<?php
if(isset($_SESSION['listTAs'])) {
    echo '<script type="text/javascript">openCity(event,"TAlist");</script>';
    unset($_SESSION['listTAs']);
}
if(isset($_SESSION['removeTA'])) {
    echo '<script type="text/javascript">openCity(event,"remove");</script>';
    unset($_SESSION['removeTA']);
}
?>