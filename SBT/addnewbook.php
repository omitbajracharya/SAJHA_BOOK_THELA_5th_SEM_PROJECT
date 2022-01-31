<?php
require_once("DBConnect.php");
$error="";$bookid="";$bookname="";$bookisbn="";$bookwriter="";$bookedition="";$bookqty="";
if(isset($_POST['verify']))
{
	session_start();
	// echo "nepal";exit();
	$bookid = $_POST['id'];
	$bookname = $_POST['name'];
	$bookimage = "images/1sem/".$_FILES['file']['name'];
	$bookisbn = $_POST['isbn'];
	$bookwriter = $_POST['writer'];
	$bookedition = $_POST['edition'];
	$bookqty = 1 ;
    $uid=$_SESSION['userid'];	
    $u=$_SESSION['username'] ;
    $files = $_FILES['file'];
    $filename =  $files['name'];
    $fileerror = $files['error'];
    $filetmp = $files['tmp_name'];
    $extension = explode('.',$filename);
    $filecheck = strtolower(end($extension));
    $fileextstored = array('png', 'jpg', 'jpeg');
    

    if (!in_array($filecheck, $fileextstored )) {
    		// echo "nepal";exit();
       echo "Your file extension must be .png, .jpg or .jpeg";
    } 
    else {
        // move the uploaded (temporary) file to the specified destination
        $destination = 'images/1sem/'.$filename;
        move_uploaded_file($filetmp, $destination);

      if(strlen($bookisbn)<13)
       {
         $error = "* ISBN number should be of 13 digits";
       }
       else if(!preg_match("/^[0-9]{13}$/",$bookisbn))
       {
       $error = "* Invalid ISBN number";       
       }
       else{
                $sql = "INSERT INTO `seller_cart` (`pid`,`sellid`,`username`,`book_name`, `book_image`, `isbn`, `writer_name`, `edition`, `quantity`) VALUES ($bookid,$uid,'$u','$bookname','$bookimage','$bookisbn','$bookwriter',$bookedition,$bookqty)";   
            
         if(mysqli_query($conn, $sql)){
						      echo "<script>alert('successfully book is added in cart')</script>";
						    // echo "Records added successfully.";
						    echo "<script>window.location='isbn.php';</script>";
                            }
       
				    //    else{				 
				    // // echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
				    // echo "<script>alert('Book is already added to cart')</script>";
				    // echo "<script>window.location='isbn.php';</script>";
				    //   }
           }
       }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="images/logo.png">
  <title>Sajha Book Thela-Add new book</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Book name:</span>
										<input class="form-control" type="text" name="name"  value="<?php echo $bookname; ?>"  placeholder="Complete name of book" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">ISBN:</span>
										<input class="form-control" type="text" name="isbn"  value="<?php echo $bookisbn; ?>"  placeholder="upto only 13 character" required>
										<span style="color: red;"><small><?php echo "$error"; ?></small></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Writer name:</span>
										<input class="form-control" type="text" name="writer" value="<?php echo $bookwriter; ?>"   required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Edition:</span>
										<input class="form-control" type="number" name="edition" value="<?php echo $bookedition; ?>"   required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">ID:</span>
										<input class="form-control" type="number" name="id" placeholder="enter random no" value="<?php echo $bookid; ?>"   required>
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-btn">
										<button class="submit-btn" name="verify">Done</button>
									</div>

									<div class="row">
									<div class="col-md-3">
									<div class="form-btn">
										<input type="file" name="file" id="file" required="required">								
									</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>