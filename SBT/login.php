<?php
session_start();
if(isset($_POST['Login'])){
	// echo "Nepal";exit;
	$u = $_POST['username'];
	$p = md5($_POST['pass']);
	$role = $_POST['admin'];
	$sql = "SELECT * FROM `register_user` WHERE (`username`='$u') AND `password`='$p' AND `role`='$role'";
	//echo $sql;
	$host = "localhost";
	$dbUsername="root";
	$dbPassword ="";
	$dbname="sbt_db";
	$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
	
    $result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// echo "Login Successful";exit;
		$row = mysqli_fetch_assoc($result);
		$_SESSION['role']=$row['role'];
		echo "<script>alert('Valid!');</script>";
		if($row['role']=='Administrator')
		{
			echo "<script>window.location='backend/home.php';</script>";		
        	exit; 	
		}
		else
		{
			header('location: backend/buytrans.php');
		}
		
		
	}else{
		echo "<script>alert('Username or Password Incorrect!');</script>";
		echo "<script>window.location='login.php';</script>";
		exit;
	}
	
}
?>
 <!DOCTYPE html>
<html>
<head>

	<link rel="icon" href="images/logo.png">
	<title>Sajha Book Thela-Log in</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/Bootstrap.js">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
<body>
    <form class="login-form" method="POST" action="" >
  <p class="login-text">
    <span class="fa-stack fa-lg">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-lock fa-stack-1x"></i>
    </span>
  </p>
  <input type="radio" id="Admin" name="admin" value="Administrator" checked>
<label for="Admin" style="color: #b3ffb5;">Administrator</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" id="Deliver" name="admin" value="Delivery">
<label for="Deliver" style="color: #b3ffb5;">Delivery Boy</label>
  <input type="text" class="login-username" autofocus="true" required="true" placeholder="Username" name="username" />
  <input type="password" class="login-password" required="true" placeholder="Password" name="pass" />
  <input type="submit" name="Login" value="Login" class="login-submit" />
</form>
<a href="#" class="login-forgot-pass">forgot password?</a>
<div class="underlay-photo"></div>
<div class="underlay-black"></div> 
</body>
</html>