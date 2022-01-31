<?php
$user_id = @$_GET['id'];
if (!isset($user_id)) {
	header('Location: selltrans.php');
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `seller_transaction` WHERE `transcation no`='$user_id';";

if (mysqli_query($conn, $sql)) {

    header('Location: selltrans.php');
    //echo "<script>alert('successfully deleted from cart')</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}