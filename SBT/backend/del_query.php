<?php
$id = @$_GET['id'];
if (!isset($id)) {
	header('Location: query.php');
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `new_query` WHERE id='$id';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header('Location: query.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}