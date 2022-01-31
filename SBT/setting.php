<?php 

// Change Info From Here
// session_start();
$epay_url = "https://uat.esewa.com.np/epay/main";
$pid = rand(1,1000);
 $_SESSION['orderid'] = $pid;
$successurl = "http://localhost/SBT/clearbuycart.php";
$failedurl = "http://localhost/SBT/index.php";
// $merchant_id = "test_merchant";
$merchant_code = "epay_payment"; 
$fraudcheck_url = "https://uat.esewa.com.np/epay/transrec";



require_once("DBConnect.php");
// session_start();
$u = $_SESSION['username'];
// $_SESSION['payment']= 0;
$data = mysqli_query($conn,"SELECT SUM(total_price) AS num FROM buyer_cart WHERE `username`= '$u' AND `status` = '1'") or die(mysql_error());
$row = mysqli_fetch_assoc($data);
$total = $row['num'];

?>