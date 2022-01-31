 <?php
session_start();
// if(isset($_SESSION["username"]))
// {
// 	header('Location : catalog1.php');
// }

?>
<?php
    require_once "config.php";
    if(isset($_GET["code"]))
    {

    	// echo "nepal";exit();
    	$token=$gclient->fetchAccessTokenWithAuthCode($_GET["code"]);
    	if(!isset($token['error']))
    	{
    		 // echo "nepal";exit();
    		$gclient->setAccessToken($token['access_token']);
    		$_SESSION['access_token']=$token['access_token'];
			$google_service=new Google_Service_Oauth2($gclient);
			$data=$google_service->userinfo->get();
			if(!empty($data['given_name']))
			{  
				$_SESSION['logs']=1;
				$_SESSION['username']=$data['given_name']."_".$data['family_name'];
				$_SESSION['userid']=$data['id'];
				$u=$_SESSION['username'];
				$_SESSION['firstname'] = $data['given_name'];
				$_SESSION['lastname'] = $data['family_name'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['district'] = $data['address'];
				$_SESSION['city'] = $data['residence'];

				// $id=$_SESSION['userid'];
				// echo "$id";exit();
					echo "<script>alert(\"Welcome $u.\");</script>";
				header('location:catalog1.php');
			}

    	}																								
    }
   if(!isset($_SESSION['access_token'])) 
   {
   	$loginURL=$gclient->createAuthUrl();
   }
?>

 <?php
if(isset($_POST['Login'])){
	// echo "Nepal";exit;
	$u = $_POST['username'];
	// session_start();
//   $_SESSION['username'] = $u;		
	$p = md5($_POST['pass']);
	$sql = "SELECT * FROM `register_buyer` WHERE (`username`='$u') AND `password`='$p' AND `status`=1 AND `is_verified`=1;";
	//echo $sql;
	$host = "localhost";
	$dbUsername="root";
	$dbPassword ="";
	$dbname="sbt_db";
	$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$userid=$row['id'];
    $_SESSION['username']= $u;
	$_SESSION['userid']=$userid;
	echo "<script>alert(\"Welcome $u.\");</script>";
	echo "<script>window.location='catalog1.php';</script>";		
		exit; 
	}else{
		echo "<script>alert('Username or Password Incorrect!');</script>";
		echo "<script>window.location='buysignin.php';</script>";
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="images/logo.png">
	<title>Sajha Book Thela-Sign In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/buysignin.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<style>
	.ourlogin{
		/*border: 1px solid red;*/
	}
	input[type="submit"]
	{
		margin-left: 15%;
		margin-top: 5%;
	}
	.googlelogin h5{
		margin-left: 30%;

	}
</style>
</head>
<body>
	<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div style="margin-left: 10%;color:lightblue;">Sajha Book <span> Thela</span></div>
		</div>
		<br>
		<form class="login-form" method="POST" action="">
		<div class="login">
			<div class="ourlogin">
				<input type="text" placeholder="username" name="username" required="required"><br>
				<input type="password" placeholder="password" name="pass" id="pass" required="required">
				<br>
				<input type="checkbox" onclick="showpass()">Show Password 
<script>
function showpass() {
    var x = document.getElementById("pass");
	
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
				<input type="submit" name="Login" value="Login" class="login-submit" style="background-color: green;height:40px;width:40%;border:1px solid green;color:black;border-radius: 5%;" /><br><br>
				
			</div>
			<div class="googlelogin">
            	<h5 style="color: blue;">OR</h5><br>
            	<button type="button" onclick="window.location = '<?php echo $loginURL ?>';" class="btn btn-primary" style="margin-left: 28%;">
            		<!-- <i style="color: red;"class="fa fa-google" aria-hidden="true"></i> -->
            	<i class="fab fa-google-plus-square fa-lg"></i>
            </button>
            </div>  
            <br><br>
            <a style="color:yellow;padding-left:20%;text-decoration:none;" href="repassbuy.php">Forgot password???</a><br>
				
						

	
		</div>
			
	</form>
	</body>
	</html>