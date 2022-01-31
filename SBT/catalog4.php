<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="images/logo.png">
  <title>Sajha Book Thela-Catalog-II</title>
   <style type="text/css">
    .navv li .c{
      background:url(images/bgmenu.png) repeat-x;
    }
  </style>
</head>
<body>
<?php include('component.php') ?>
<?php include('header.php')  ?>
<style type="text/css">

	.card{
		background: #766c9b38;
	}
	.text2{
		font-family: Castellar;
		font-size: 30px;
		color: #6ab04c;
	}
	.text1{
		font-family: Copperplate Gothic Bold;
		color: blue;
	}
	.topic{
         text-align: center;
	}
    .c1{
    	padding-bottom: 5%;
    }
	.image{
	max-width: 100%;
	height: auto;
	background: radial-gradient(#fee391,#ffe1e7,#558fa1);
}

h2{
	font-family: Colonna MT;
	color: #86095a;
	text-decoration: dotted underline;
}
.subject button a{
 color: white; 
 background-color: white;
 text-decoration: none;
}
.subject{
  top: 15%;
  position: fixed;
  margin-left: 1%;
  color: white;
}
.subject .i2 a div{
  width: 7em;
}
.subject button{
  display: block;
}
.subject .i2{
   display: none;
}
.subject:hover .i2{
  display: block;
}
.subject:hover button{
  display: none;
}
.subject:hover{
  top: 10%;
}
@media screen and (max-width: 1530px) {
  .subject {
    display: none;
  }
}
</style>

<div class="topic">
	<span class="text1">SEMESTER-I &raquo;</span>
	<span class="text2">COMPUTER engineering</span>
</div> 

<div class="subject">
      <button type="button" class="btn btn-link"  type="button"><i class="fas fa-angle-double-right"></i>QUICK</button>
      <div class="i2" id="#i2">
        <a href="#c1"><div class="btn btn-danger"> Math</div></a><br>
  <a href="#c2"><div type="button" class="btn btn-info">Physics</div></a><br>
  <a href="#c3"><div type="button" class="btn btn-warning">C-program</div></a><br>
  <a href="#c4"><div type="button" class="btn btn-success">English</div></a><br>
  <a href="#c5"><div type="button" class="btn btn-warning">Drawing</div></a><br>
  <a href="#c6"><div type="button" class="btn btn-danger"> Workshop</div></a><br>
  <a href="#c7"><div type="button" class="btn btn-primary">EDCT</div></a>
      </div>
</div>
<div class="container left">
  
  <?php
  ////////////////////////////////////////////////////////////////

  //////////////////////////////////////////////////////////////////////////////////
$sql = "SELECT * FROM `catalog` WHERE book='math' AND stock > 0";
$result = mysqli_query($conn, $sql);
?>


  <h2 align="center" style="margin-top: 5%" id="c1">Mathematics book</h2>
  <div class="row text-center py-5">
            <?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
              component($row['product_name'],$row['product_price'],$row['product_image'],$row['quantity'],$row['isbn'],$row['writer_name'],$row['edition'],$row['stock'],$row['total_price'],$row['id']);
    }
  }
?>                   
    </div>

<?php
$sql = "SELECT * FROM `catalog` WHERE book='physics' AND stock > 0";
$result = mysqli_query($conn, $sql);
?>

    <h2 align="center" id="c2">Physics book</h2>
	<div class="row text-center py-5">
                    <?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
              component($row['product_name'],$row['product_price'],$row['product_image'],$row['quantity'],$row['isbn'],$row['writer_name'],$row['edition'],$row['stock'],$row['total_price'],$row['id']);
    }
  }
?>                     
    </div>








    <?php
$sql = "SELECT * FROM `catalog` WHERE book='c' AND stock > 0";
$result = mysqli_query($conn, $sql);
?>




    <h2 align="center" id="c3">C-Programming book</h2>
	<div class="row text-center py-5">
                  <?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
            component($row['product_name'],$row['product_price'],$row['product_image'],$row['quantity'],$row['isbn'],$row['writer_name'],$row['edition'],$row['stock'],$row['total_price'],$row['id']);
    }
  }
?>                               
    </div>  



<?php
$sql = "SELECT * FROM `catalog` WHERE book='eng' AND stock > 0";
$result = mysqli_query($conn, $sql);
?>
    <h2 align="center" id="c4">English book</h2>
	<div class="row text-center py-5">
                  <?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
              component($row['product_name'],$row['product_price'],$row['product_image'],$row['quantity'],$row['isbn'],$row['writer_name'],$row['edition'],$row['stock'],$row['total_price'],$row['id']);
    }
  }
?>    
    </div>


<?php
$sql = "SELECT * FROM `catalog` WHERE book='drawing' AND stock > 0";
$result = mysqli_query($conn, $sql);
?>
    <h2 align="center" id="c5">Engineering Drawing book</h2>
	<div class="row text-center py-5">
                  <?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
              component($row['product_name'],$row['product_price'],$row['product_image'],$row['quantity'],$row['isbn'],$row['writer_name'],$row['edition'],$row['stock'],$row['total_price'],$row['id']);
    }
  }
?>    
    </div> 

<?php
$sql = "SELECT * FROM `catalog` WHERE book='Workshop' AND stock > 0";
$result = mysqli_query($conn, $sql);
?>

    <h2 align="center" id="c6">Workshop Technology book</h2>
  <div class="row text-center py-5">
                  <?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
              component($row['product_name'],$row['product_price'],$row['product_image'],$row['quantity'],$row['isbn'],$row['writer_name'],$row['edition'],$row['stock'],$row['total_price'],$row['id']);
    }
  }
  // session_start();
  
?>                       
    </div> 
      
</div>    
<?php include('footer.php') ?>
</body>
</html>