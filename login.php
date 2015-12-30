<?php
session_start();
include_once 'Dbconnect.php';
require_once 'config.php'; 

if(isset($_SESSION['user'])!="")
{
 header("Location: ". HOME_PAGE);
}
if(isset($_POST['btn-login']))
{
 $email = mysql_real_escape_string($_POST['email']);
 $upass = mysql_real_escape_string($_POST['pass']);
 $res=mysql_query("SELECT * FROM users WHERE email='$email'");
 $row=mysql_fetch_array($res);
 if($row['password']==md5($upass))
 {
  $_SESSION['user'] = $row['user_id'];
  header("Location: " . HOME_PAGE);
 }
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?PHP echo SITE_TITLE ?></title>
	<link rel="stylesheet" href="assets/css/login.css" type="text/css" />
	
</head>
<body class="login_body">


<center>
	<div id="PageContainer">
	
	<section class="top-banner">
		
	</section>
	
		
	<div id="login-form">
	<form method="post">
	<table class="login_table" align="center" width="30%" border="0">
	<tr>
	<td><input type="text" name="email" placeholder="Your Email" required /></td>
	</tr>
	<tr>
	<td><input type="password" name="pass" placeholder="Your Password" required /></td>
	</tr>
	<tr>
	<td><button type="submit" name="btn-login">Sign In</button></td>
	</tr>
	<tr>
	<td><a href="register.php">Sign Up Here</a></td>
	</tr>
	</table>
	</form>
	</div>

</div>
</center>
</body>
</html>