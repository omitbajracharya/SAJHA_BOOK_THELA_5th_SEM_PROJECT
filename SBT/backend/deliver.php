<?php
// echo "nepal";exit();
require_once("DBConnect.php");
// $username = $_POST["user"];
$tally = $_POST["match"];
// echo $username;exit();
$sql = "SELECT  * FROM `deliver` WHERE `tally`='$tally'";
if(mysqli_query($conn,$sql))
{
	$sql = " SELECT max(`tally`) as num FROM `deliver`";
 	$data = mysqli_query($conn,$sql);
   	$row = mysqli_fetch_assoc($data);
	$match = $row['num'];
	$match = $match + 1;
}
else{
	$match = $tally;
}
$sql = "SELECT  * FROM `buyer_transaction` WHERE `tally`='$tally'";
$result =mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($result))
{
	$trans_no=$row["transcation no"];
	$O_id=$row["order_id"];
	$id=$row["id"];
	$user=$row["username"];
	$book_name=$row["book_name"];
	$book_price=$row["book_price"];
	$book_image=$row["book_image"];
    $quan=$row["quantity"];
	$isbn=$row["isbn"];
	$writer=$row["writer_name"];
	$edition=$row["edition"];
	$total=$row["total_price"];
	// $match=$row["tally"];
	$due=$row["due"];

$sql = "INSERT INTO `deliver`(`transcation no`, `order_id`, `book_id`, `username`, `book_name`, `book_price`, `book_image`, `quantity`, `isbn`, `writer_name`, `edition`, `total_price`,`tally`,`due`) VALUES ('$trans_no','$O_id','$id','$user','$book_name','$book_price','$book_image','$quan','$isbn','$writer','$edition','$total','$match','$due')";
if(mysqli_query($conn, $sql)){
	// echo $user;exit();
	$sql = "DELETE  FROM `buyer_transaction` WHERE `tally`='$tally'";
    mysqli_query($conn,$sql);

      echo "<script>alert('DELIVER MARKED')</script>";
    echo "<script>window.location='buytrans.php';</script>";
   } 
   else
   	{
   		echo "Error updating record: " . mysqli_error($conn);
echo "<script>window.location='buytrans.php';</script>";
}

}
mysqli_close($conn);
?>