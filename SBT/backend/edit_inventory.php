<?php
$error="";
$user_id = @$_GET['id'];
if(!isset($user_id)) {
	header('Location: inventory.php');
}

  require_once("DBConnect.php");
$sql = "SELECT * FROM `catalog` WHERE `id`='$user_id'";
$result = mysqli_query($conn, $sql);
$prev_data = mysqli_fetch_assoc($result);
  if(isset($_POST['insert']))
  { 
  	$user_id = $_GET['id'];
	// echo "$user_id";exit();
     // echo "nepal";exit();
  	   $book=$_POST['book'];
       $name=$_POST['name'];
       $price=$_POST['price'];
       $isbn=$_POST['isbn'];
       $edition=$_POST['edition'];
       $image="images/1sem/".$_FILES['file']['name'];
       $writer=$_POST['writer'];
       $stock=$_POST['stock'];


    $files = $_FILES['file'];
    $filename =  $files['name'];
    $fileerror = $files['error'];
    $filetmp = $files['tmp_name'];
    $extension = explode('.',$filename);
    $filecheck = strtolower(end($extension));

       if(strlen($isbn)<13)
       {
        $error="* ISBN number should be of 13 digits";
       }
       else if(!preg_match("/^[0-9]{13}$/",$isbn))
       {
        $error = "* Invalid ISBN number";
       }
       else{
$sql = "UPDATE `catalog` SET `product_name`='$name',`product_price`='$price',`product_image`='$image',`book`='$book',`isbn`='$isbn',`writer_name`='$writer',`edition`='$edition',`stock`='$stock' WHERE `id`='$user_id';";

require_once("DBConnect.php");

if (mysqli_query($conn, $sql)) {
    // echo "Record updated successfully";
      $destination = 'images/1sem/'.$filename;
        move_uploaded_file($filetmp, $destination);
    header('Location: inventory.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
}
       
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/back.css">
  <link rel="stylesheet" type="text/css" href="../css/global.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> 
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
  <link rel="icon" href="images/logo.png">
  <title>Sajha Book Thela-Home</title>
  <style type="text/css">
  	a{
    text-decoration: none;
    color:black;
    /*padding-left:32%;*/
  }
  a:hover{
    text-decoration: none;
    color:white;
  }
  tr{
    color:white;
  }
    button{
    width:100%;
    /*background-color: black;*/
    background: linear-gradient(to right,#060c1063, #009999);
    border:1px solid #009999 ;

  }
  button:hover{
    width:100%;
    background-color: black;
    color:white;

  }
  .container-fluid{
    height:100%;
  }
 
  .point{
  	/*margin-top: -1%;*/
  	padding-top: 0px;
  	background-image: url(images/16.jpg);
  		background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
	font-family:new time roman;

  	-webkit-box-shadow: -1px 4px 26px 11px rgba(0,0,0,0.75);
 -moz-box-shadow: -1px 4px 26px 11px rgba(0,0,0,0.75);
box-shadow: -1px 4px 26px 11px rgba(0,0,0,0.75);
  }
.label{
		font-weight: small;
		margin-top: 1%;
		color:white;
		font-size:20px;
	}
  </style>
 </head>

 <body>
 	<?php include('header.php')?>
<div class="fluid-container">
  <section id="block">
    <div class="row no-gutters">
<?php include('nav.php')?>
      <!-- end of navigation section -->
      <!-- start of body div -->
      <div class="col-md-10 ebook" >
     <p id="breadcrumb"><a href="inventory.php" style="padding-left: 10px;color:red">Home</a> &raquo; <a href="inventory.php">Inventory</a> &raquo;<span style="color: #89e28c;">Edit </span></p>
       
 
 		<form action="" method="POST" enctype="multipart/form-data" class="form-container">
<div class="row point" style="color:white;font-family:Bauhaus Md BT;font-size:20px;padding-top: 0%;padding-bottom: 1%; ">
	
 			<div class="col-md-12"><h1 style="color: blue;font-family: Bauhaus Md BT;margin-left: 25%;margin-bottom: 1%;"><span style="color: red;">B</span><span style="color:#CDDC39;">oo</span><span style="color:red;">k</span> <span style="color: red;">D</span><span style="color: #09e512;">esc</span><span style="color: #FFC107;">rip</span><span style="color:#3cd7c8;">tio</span><span style="color: red;">n</span></h1></div>
       
       						<label class="label col-md-2 control-label">BOOK</label>
						<div class="col-md-10">
							<select name="book" class="form-control selectpicker" value="<?= $prev_data['book'];?>" required="required">

								<option value="">----</option>
								<option>math</option>
								<option>c</option>
								<option>physics</option>
								<option>workshop</option>
								<option>drawing</option>
								<option>edct</option>
								<option>eng</option>
							</select>
						</div>
						<label class="label col-md-2 control-label">Book_name</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="name"  value="<?= $prev_data['product_name'];?>" placeholder="Bookname
							" required="required">
						</div>
						<label class="label col-md-2 control-label">Book_price</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="price"  value="<?= $prev_data['product_price'];?>" placeholder="Book Price
							" required="required">
						</div>
						<label class="label col-md-2 control-label">Book_image</label>
						<div class="col-md-10" required="required">
							<input type="File" name="file">
						</div>
						<label class="label col-md-2 control-label">Writer_name</label>	
						<div class="col-md-10" required="required">
							<input type="text" class="form-control"  value="<?= $prev_data['writer_name'];?>" name="writer" placeholder="writer name
							">
						</div>


						<label class="label col-md-2 control-label">Edition</label>
						<div class="col-md-10">
							<select name="edition"  value="<?= $prev_data['edition'];?>" class="form-control selectpicker" required="required">
								<option value="">----</option>
			       				<option>2076</option>
								<option>2075</option>
								<option>2074</option>
								<option>2073</option>
								<option>2072</option>
								<option>2071</option>
								<option>2070</option>
		 					</select>
						</div>

						<label class="label col-md-2 control-label">ISBN_No</label>	
						<div class="col-md-10" required="required">
							<input type="number" class="form-control"  value="<?= $prev_data['isbn'];?>" name="isbn" placeholder="ISBN NO
							" required="required">
              <span style="color: red;"><small><?php echo "$error"; ?></small></span>
						</div>
						<label class="label col-md-2 control-label">Stock</label>	
						<div class="col-md-10" required="required">
							<input type="number" class="form-control"  value="<?= $prev_data['stock'];?>" name="stock" placeholder="Stock
							">
						</div>

 	
 	
 	<button type="submit" class="btn btn-success btn-block" name="insert" style="width: 100px;padding-top: 8px;padding-bottom: 8px; margin-left: 32%;border-radius: 30%; ">UPDATE</button>
</form>
</div>
 
 </div>
  <!-- end of body div -->

</section>
</div>
<!-- ending div of main -->
</body>
</html>