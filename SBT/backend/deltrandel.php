<?php
// echo "nepal";exit();
$tally = @$_GET['match'];
if (!isset($user_id)) {
	header('Location: buytrans.php');
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `deliver` WHERE `tally`='$tally';";

if (mysqli_query($conn, $sql)) {

    header('Location: delivered.php');
    //echo "<script>alert('successfully deleted from cart')</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
<?php
// $Tid = @$_GET['id'];
// if (!isset($user_id)) {
// 	header('Location: buyer_cust.php');
// }
 
// require_once('DBConnect.php');
// $sql = "DELETE FROM `deliver` WHERE `id`='$Tid'";

// if (mysqli_query($conn, $sql)) {

//     header('Location: Delivered.php');
// } else {
//     echo "Error deleting record: " . mysqli_error($conn);
// }
?>