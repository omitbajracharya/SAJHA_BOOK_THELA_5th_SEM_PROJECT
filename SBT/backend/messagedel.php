<?php
$user_id = @$_GET['id'];
if (!isset($user_id)) {
	header('Location: message.php');
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `message` WHERE message_no='$user_id';";

if (mysqli_query($conn, $sql)) {

    header('Location: message.php');
    //echo "<script>alert('successfully deleted from cart')</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}