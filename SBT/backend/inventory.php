<?php
// echo "Nepal";exit();
require_once("DBConnect.php");
$sql = "SELECT * FROM `catalog`";
$result = mysqli_query($conn, $sql);
// $data = mysqli_num_rows($result);
// echo "<pre>"; print_r($result); exit();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/back.css">
  <!-- <link rel="stylesheet" type="text/css" href="../css/global.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> 
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
  <link rel="icon" href="images/logo.png">
  <title>Sajha Book Thela-Home</title>
  <style>

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

td a{
  color: white;
}
.content{
  margin-left: 1%;
  width: 95%;
}
th{
  font-size: 20px;
  color: #e7fb28;
}
.content h1{
  color: skyblue;
   margin-left: 35%;
   font-family: Baskerville Old Face;
}
table tr td img{
  width:124px !important;
  height: 160px !important;
}

</style>
</head>
<?php include('header.php')?>
<div class="fluid-container">
  <section id="block">
    <div class="row no-gutters">
      <!-- navigation section-start -->
      <?php include('nav.php')?>
      <!-- end of navigation section -->
      <!-- start of body div -->
      <div class="col-md-10" >
        
        <p id="breadcrumb"><a href="inventory.php" style="padding-left: 10px;color:red">Home</a> &raquo; <a href="inventory.php">Inventory</a> &raquo;<span style="color: #89e28c;"> List </span></p>
        <div class="content table-responsive">
<h1>Inventories</h1>
<!-- <a href="insertcatalog.php"><img src="images/b1.png" height="30px"></a> -->
<table border="1" cellspacing="0" cellpadding="10" align="center" class="table table-bordered">
    <tr>
        <th>S.N.</th>
        <th>Book Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Isbn No.</th>
        <th>Writer Name</th>
        <th>Edition</th>
        <th>Stock</th>
        <th style="width: 100px;">Action</th>
    </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    //$user_list = mysqli_fetch_assoc($result);
    // echo "<pre>"; print_r($user_list);exit;
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
?>
    <tr style="font-size: 20px;">
                            <td><?= ++$i;?></td>
                         <!--   <td><?= $row["id"];?></td> -->
                            <td><?= $row["product_name"];?></td>
                            <td><?= $row["product_price"];?></td>
                            <td>
                                <img src=" <?= $row["product_image"];?>" class="card-img-top" height="100">
                            </td>
                            <td><?= $row["isbn"];?></td>
                            <td><?= $row["writer_name"];?></td>
                            <td><?= $row["edition"];?></td>
                             <td><?= $row["stock"];?></td>
        <td><a href="edit_inventory.php?id=<?= $row['id'];?>" style="color: #00ff00;"><i class="fa fa-edit fa-lg" ></i></a> | <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_inventory.php?id=<?= $row['id'];?>" style="color:#da6337;"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>
    </tr>
<?php
    }   
} else {
    ?>
    <tr>
        <td colspan="3">No Record(s) found.</td>
    </tr>
    <?php
}
?>
<?php 
mysqli_close($conn);
?>
</table>            
        </div>
  </div>
  <!-- end of body div -->
</div>
</section>
</div>
<div style="margin-bottom: 20%;"></div>
<!-- ending div of main -->
</body>
</html>