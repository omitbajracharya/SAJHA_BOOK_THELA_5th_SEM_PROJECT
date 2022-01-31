<?php
$bookid=$_GET['book_id'];
$price = $_GET['cost'];
$bookqty = $_GET['quantity'];
$total = $price * $bookqty;
// echo "$total";exit();
// echo "$bookid";
// echo "$price";
// echo "$bookqty";
// exit();
require_once('DBConnect.php');
// echo "nepal";exit();
session_start();
$uid=$_SESSION['userid'];

// echo $uid;exit();

$data = mysqli_query($conn,"SELECT `stock` AS num FROM `catalog` WHERE `id`='$bookid'") or die(mysql_error());
$row = mysqli_fetch_assoc($data);
$stock = $row['num'];
if($bookqty < $stock+1)
{

	$sql = "UPDATE buyer_cart SET `quantity`='$bookqty' , `total_price`='$total' WHERE `pid` = '$bookid' AND `userid`='$uid'";
	if(mysqli_query($conn, $sql)){
		// echo "<script>alert('successfully quantity is updated in cart')</script>";
// echo "nepal";exit();
		echo "<script>window.location='buyer_cart.php';</script>";


	}
}
else
{

	echo "<script>alert('Opss!!!sorry.Out of stock!!!')</script>";
	echo "<script>window.location='buyer_cart.php';</script>";

}

?>

