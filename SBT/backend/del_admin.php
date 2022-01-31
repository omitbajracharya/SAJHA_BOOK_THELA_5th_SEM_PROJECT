<?php
echo "nepal";exit;
$id = @$_GET['id'];
if (!isset($id)) {
	header('Location: backend.php');
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `login` WHERE `id`='$id';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header('Location: backend.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}