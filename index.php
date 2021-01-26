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
.thick {font-weight:bold;}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
}
.thick {font-weight:bold;
		color:#0000ff;
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
        <li onclick="openCity(event,'verify')" class="tablinks">Verify Email</li>
        <li onclick="openCity(event,'signup')" class="tablinks">Sign up</li>
        <li onclick="openCity(event,'login')" class="tablinks active">Log in</li>
      </ul>
</div>
</div>

<div id="center" class="row">
<div class="column middle" id="center">
  <div id="login" class="tabcontent" style="display:block;">
    <div id='border' class="container">
    <form action="login.php" method="post">
      <div class="form-group">
        <label for="login_email"  class="thick form-check-label">Email:</label>
        <input type="email" name="login_email" id="login_email" placeholder="Enter email" size="30" required>
      </div>
      <div class="form-group">
        <label for="login_pwd"   class="thick form-check-label">Password:</label>
        <input type="password" id="login_pwd" name="login_pwd" minlength="8" placeholder="Enter password" size="30" required>
      </div>
        <br/>
      <input type="submit" class="btn btn-primary btn-sm" value="Log in">
      <br>
      <label class="form-check-label">
          <a href="www.google.com">Forget password</a>
        </label>
    </form>
    <br/>
  </div>
  </div>


<div id="signup" class="tabcontent">
  	<div id='border' class="container">
    <form action="signup.php" method="post">
    <div class="form-group">
      <label class="thick" for="firstname">First name:</label>
      <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter first name" required>
    </div>

    <div class="form-group">
      <label class="thick" for="lastname">Last name:</label>
      <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter last name" required>
    </div>

    <div class="form-group">
      <label class="thick" for="signup_email">Email:</label>
      <br>
      <input type="Email" name="signup_email" size="30" placeholder="Enter email">
      
    </div>
    
    <div class="form-group">
      <label class="thick" for="signup_password">Password:</label>
      <input type="password" name="signup_password" id = "signup_password" class="form-control" id="pwd" placeholder="Enter password">

    </div>
    
    <input type="submit" class="btn btn-primary btn-sm" value="Submit">

    </form>
	<br/>
	</div>
</div>
<!--verify email-->

<div id="verify" class="tabcontent">
	<div id='border' class="container">
  <form action="verify_email.php" method="post">
    <div class="form-group">
      <label class="thick" for="verify_email">Email:</label>
      <br>

        <input type="email" id ="verify_email" name="verify_email" size="30" placeholder="We need your email to identify you">
        <br>
        <br>
      <label class="thick" for="verication_code">Verification code:</label>
      <br>
    <input type="text" name="verication_code" id="verication_code" placeholder="Enter the code">
    <br>
    <br>
    <input type="submit" class="btn btn-primary btn-sm" value="Verify">
    </div>
    </form>
    </div>
</div>
</div>

</div>

<div class="footer" >
  <p class="thick">Office phone number: 7165800633 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Office email: shiyulu@buffalo.edu</p>

</div>
</body>
</html> 
<?php
if(isset($_SESSION['verifyemail'])) {
    echo '<script type="text/javascript">openCity(event,"verify");</script>';
    echo '<script type="text/javascript">document.getElementById("verify_email").value = "'.$_SESSION['verifyemail'].'";</script>';
    unset($_SESSION['verifyemail']);
}
if(isset($_SESSION['signup'])) {
    echo '<script type="text/javascript">openCity(event,"signup");</script>';
    unset($_SESSION['signup']);
}
?>