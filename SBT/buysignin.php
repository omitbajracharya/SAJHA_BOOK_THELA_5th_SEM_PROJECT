 <?php
session_start();
// if(isset($_SESSION["username"]))
// {
// 	header('Location : index.php');
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

	.googlelogin h5{
	margin-left: 30%;
	}
	.ourlogin{
		/*border:solid black;*/border-radius: 20px;padding-top: 20px;padding-left: 10%;margin-top:-37%;width: 401px;margin-left: -45%;background-color: #FFFFFC;
}
</style>
</head>
<body>
	<div class="header">
		<div style="margin-left: -10%;margin-top:-30%;color:lightblue;">Sajha Book <span> Thela</span></div>
		</div>
	<div class="body"></div>
		<div class="grad"></div>

		<form class="login-form" method="POST" action="" >
		<div class="login">
			<div class="ourlogin">
				<h3 style="color:#6b0e39;text-align: center;font-family:Bauhaus Md BT;margin-left: -10%"><b>Log In With</b></h3>	
				<div class="googlelogin" style="margin-left: 22%">
            		<button type="button" onclick="window.location = '<?php echo $loginURL ?>';" class="btn btn-primary" style=" width: 60%;">
    					<h6><i class="fab fa-google fa-2x"></i>&nbsp;&nbsp;Google</h6>
           			 </button>
            	</div>
        	<hr>
 
				<input type="text" placeholder="username" name="username" required="required"><br><br>
				<input type="password" placeholder="password" name="pass" id="pass1" required="required">
				<span class="eye" onclick="showpass()">
					<i id="hide1" class="fa fa-eye"></i>
					<i id="hide2" class="fa fa-eye-slash"></i>
				</span><br><br>
				<!-- <br><br> -->
				<!-- <input type="checkbox" onclick="showpass()">Show Password  -->
				
				<style type="text/css">
					#hide1{
						display: none;
					}
					.eye{
						position: absolute;
						top: 120px;
						left: 155px;
					}
			.header{
				position: absolute;
				top: 30%;
			}

				</style>
<script>
function showpass() {
	
	
    var x = document.getElementById("pass1");
	var y = document.getElementById("hide1");
	var z = document.getElementById("hide2");
    if (x.type === "password") {
        x.type = "text";
        y.style.display="block";
        z.style.display="none"
    } else {
        x.type = "password";
        y.style.display="none";
        z.style.display="block";
    }
}

</script>

				<input type="submit" name="Login" value="Login" class="btn btn-danger"/><br><br>
            <a style="color:#008CFF;padding-left:20%;text-decoration:none;font-size: 15px;" href="repassbuy.php">Forgot password???</a><br>
            <hr>

            <div style="margin-left: 15%;">Not a member?<button class="btn btn-link" onclick="window.location = 'buyregis.php'">Sign Up Now</button></div>
			  
			</div>

			
            
				
					

	
		</div>
			
	</form>
	</body>
	</html>