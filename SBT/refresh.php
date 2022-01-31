<?php
session_start();
$_SESSION['flag']=1;
if(!isset($_SESSION['userid']))
{
	header('location:buysignin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="icon" href="images/logo.png">
	<title>Refreshing........</title>
</head>
<body>
	 <?php 
  require_once("DBConnect.php");
 $u = $_SESSION['username'];
 // $_SESSION['count'] = 0;
 $sql = "SELECT * FROM `buyer_cart` WHERE `username`='$u'";
  $result = mysqli_query($conn, $sql); 
  
 if (mysqli_num_rows($result) > 0)
  {
  while($row = mysqli_fetch_assoc($result)) 
   {
      $bookid = $row["pid"];
      $sql= "SELECT * FROM `catalog` WHERE `id`='$bookid'";
      if($data=mysqli_query($conn, $sql))
      {

        // $data = mysqli_query($conn,"SELECT `stock` AS num FROM `catalog` WHERE `id`='$bookid'") or die(mysql_error());
        $row = mysqli_fetch_assoc($data);
        $stock = $row['stock'];
        $data = mysqli_query($conn,"SELECT `quantity` AS num FROM `buyer_cart` WHERE `pid`='$bookid' AND `username`='$u'") or die(mysql_error());
        $row = mysqli_fetch_assoc($data);
        $qty = $row['num'];
        // echo $bookid;
        // echo $u;
        // echo $stock;
        // echo $qty;exit();
        
        
        if($qty > $stock)
        {

        	$sql= "UPDATE `buyer_cart` SET `status` = 0 WHERE `pid`='$bookid'";
          // $_SESSION['flag'] = 0;/
        	if(mysqli_query($conn, $sql))
         {
        echo "<script>alert('Refreshing completed')</script>";	
        echo "<script>window.location='buyer_cart.php';</script>";
        }
    }
      else 
        // if($qty == $stock)
        {
        	$sql= "UPDATE `buyer_cart` SET `status` = 1 WHERE `pid`='$bookid'";
        	if(mysqli_query($conn, $sql))
          {
         	        // $_SESSION['count'] = 1;
                  echo "<script>alert('Refreshing completed')</script>";	
                  echo "<script>window.location='buyer_cart.php';</script>";
          }
        }
        // else
        // {
        // 	  // $_SESSION['count'] = 1;
        // 	echo "<script>alert('Refreshing completed')</script>";	
        //    echo "<script>window.location='buyer_cart.php';</script>";
        // }
    }
}

        
}
else
{
  header('location: buyer_cart.php');
}

 ?>

</body>
</html>