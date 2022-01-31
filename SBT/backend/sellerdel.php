<?php
$user_id = @$_GET['id'];
if (!isset($user_id)) {
	header('Location: seller_cust.php');
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `register_seller` WHERE id='$user_id';";

if (mysqli_query($conn, $sql)) {

    header('Location: seller_cust.php');
    //echo "<script>alert('successfully deleted from cart')</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}