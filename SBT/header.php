<?php session_start();?>
<html>
<head>
	<title>HOME</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> 
		<style type="text/css">
		.navv li a:hover{
			background:url(images/bgmenu.png) repeat-x;
		}
		.navv li{
			margin-right: 3%;
		}
		/*nav{
			position: sticky!important;
			top: 0;
			left: 0;
		}*/
	</style>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container p-0">
		<!-- <img src="images/book/book.png" style="margin-top: -7%;height: 10%;width: 12%">&nbsp;<span style="color: blue;font-size: 240%">&raquo;</span> -->
		<h3 class="px-5" style="color: white;width: 0px;padding-left: 2%;">	<i class="fas fa-shopping-basket"></i></h3>
		<a class="navbar-brand" href="create.php">SAJHA BOOK THELA</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navv navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link h" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link c" href="buyregis.php">Catalog</a>
				</li>
				<li class="nav-item">
					<a class="nav-link g" href="gallery.php">Gallery</a>
				</li>
				<li class="nav-item">
					<a class="nav-link a" href="aboutus.php">AboutUs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link cu" href="contactus.php">Contacts </a>
				</li>
			</ul>

		</div>


	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="mr-auto"></div>
		<div class="navbar-nav">
			<a class="nav-item nav-link active" href="buyer_cart.php">
				<h5 class="px-5"><i class="fas fa-shopping-cart"></i>
					<span class="badge badge-warning">
						<?php 
						require_once('DBConnect.php');
			
						// echo "nepal";exit();
						
						if(isset($_SESSION['userid']))
						{
							// echo "nepal";exit();
							$user=$_SESSION['userid'];
							// $sql="SELECT COUNT(`id`) as num FROM `buyer_cart`";
							$sql="SELECT COUNT(`id`) AS num FROM `buyer_cart` WHERE `userid`=$user";
						   $data = mysqli_query($conn,$sql);
                           	$row = mysqli_fetch_assoc($data);
						$numUsers = $row['num'];
						   	// $numUsers = $data;
						// echo "$numUsers";exit();
						}
						else
						{
							$numUsers=0;
						}
						echo $numUsers;
                  $_SESSION['flag']=0;   
						?>
					</span>
					
					
				</h5>
			</a>
		</div>
	</div>


</div>
</nav>