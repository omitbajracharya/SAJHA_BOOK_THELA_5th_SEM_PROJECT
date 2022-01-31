<center>
<br>
<br>
<br>
<br>
<br>


<?php

session_start();
// echo "string";
$user = $_SESSION["username"];




if(isset($_POST["otp_no"]) && $_POST["otp_no"]!="" && $_SESSION["otp"]==$_POST["otp_no"])
{
	require_once("DBConnect.php");
$sql = "UPDATE `register_buyer` SET `is_verified`=1 WHERE `username`='$user'";
mysqli_query($conn,$sql);
session_destroy();
header('Location:buysignin.php');

//Do you stuff
}
else
{
echo "<script>alert('Invalid!');</script>";
include('confirm_code.php')
?>

<!-- <form action="mail2.php" method="post">
  <input name="captcha" type="text">
  <input type="submit" name="submit" value="submit">
</form>
 -->
 
<?php 
  } 
?>

<!-- <a href="index2.php">Index</a> -->
</center>