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
	<title>SBT-Sign Out </title>
	<style>
	body{
		background-color: black;
		text-align: center;
		font-family:Freestyle Script;
		color:brown;
	}
	.container{
			background-color: white;
	}
	.heading{
		text-align: center;
		font-family:Freestyle Script;
	}
	.card{
		background-color: black;
	}
	h1{
		color:black;
	}
	h4{
		color:white;
	}
	h5{
		font-family: sans-serif;
	}
	
</style>
</head>
<body>
	<div class="container mt-2">
		<div class="heading">
			<h1>Sajha Book Thela</h1>
		</div>
	</div>

	<div class="container mt-2">
       <h3>"The one and only rediscovered Bookshop"</h3>
       <div class="row">

<!-- /////starting of col//////////////// -->
   <div class="col-md-4">
  <div class="card">
  <img class="rounded-circle mt-2" src="images/username.jpg" alt="Card image" style="width:80%;height:50%;margin-left:10%;">
    <div class="card-body">
      <h4 class="card-title">Username</h4>
      
      <button class="btn btn-primary">
      	<h5>
      	<?php
      	 require_once("DBConnect.php");
      	 session_start();
      $u = $_SESSION['username'];
      echo "$u";


      	?>
      	</h5>


      </button>
    </div>
</div>
</div>
<!-- /////starting of col//////////////// -->
   <div class="col-md-4">
  <div class="card">
  <img class="rounded-circle  mt-2" src="images/cart.jpg" alt="Card image" style="width:80%;height:50%;margin-left:10%;">
    <div class="card-body">
      <h4 class="card-title">Total item in the cart</h4>
      
    <button class="btn btn-primary">
      	<h5>
      	<?php
      	 require_once("DBConnect.php");
      	 $data = mysqli_query($conn,"SELECT COUNT(`pid`) AS num FROM `buyer_cart` WHERE `username` = '$u'") or die(mysql_error());
         $row = mysqli_fetch_assoc($data);
         $total = $row['num'];
         echo $total;



      	?>
      	</h5>


      </button>
    </div>
</div>
</div>
<!-- /////starting of col//////////////// -->
   <div class="col-md-4">
  <div class="card">
  <img class="rounded-circle mt-2" src="images/sell.jpg" alt="Card image" style="width:80%;height:50%;margin-left:10%;">
    <div class="card-body">
      <h4 class="card-title">Total item buy/sell</h4>
      
      <button class="btn btn-primary">
      	<h5>
      	<?php
      	 require_once("DBConnect.php");
      	 $data = mysqli_query($conn,"SELECT COUNT(`id`) AS num FROM `buyer_transaction` WHERE `username` = '$u'") or die(mysql_error());
         $row = mysqli_fetch_assoc($data);
         $total = $row['num'];
         echo $total;



      	?>
      	</h5>


      </button>
    </div>
</div>
</div>
<!-- /////////////end of row/////////// -->
</div><br>
<!-- ////////////end of conatiner??????????? -->
   </div><br>
	<!-- /////////////////////toggal start///////////////// -->
		<h5>	 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Sign Out</button></h5>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h6 class="modal-title" style="color:black;">
          	<b style="color:black;font-family: sans-serif;">
          	<?php 
          	// session_start();
          	$username = $_SESSION['username'];
          	echo $username ;
          	session_destroy();

          	?>
          	Thankyou for your response to our website</b>

          </h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" style="color:black;">
         <h6 style="color:black;font-family: sans-serif;"> Are you sure you want to sign out?</h6>
        </div>
        
        <!-- Modal footer -->
       
        <div class="modal-footer">
        	
     
   <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location = 'index.php';" style="color:black;font-family: sans-serif;">
        	          	 

           Confirm

           </button>
    
          
     
        </div>
       

        
      </div>
    </div>
  </div>
	
</body>
</html>