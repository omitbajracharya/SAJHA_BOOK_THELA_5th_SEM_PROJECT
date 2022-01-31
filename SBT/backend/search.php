
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/back.css">
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
    background: linear-gradient(to right,black, #009999);
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
 .row div tr td img{
  	width: 100px;
  	height: 120px;
  }
.row{
	width: 90%;
}
</style>
</head>
<body>
  <!-- /// -starting of header div -->
  <?php include('header.php')?>
 <!-- /////////////////////////////////////////starting of body div -->
 <div class="fluid-container">
  <section id="block">
    <div class="row no-gutters">
      <!-- navigation section-start -->
      <?php include('nav.php')?>
      <!-- end of navigation section -->
      <!-- start of body div -->
      <div class="col-md-10" >





        <?php
        require_once("DBConnect.php");
        $searching=$_POST['find'];

      $sql = "SELECT * FROM `catalog` WHERE `book`='$searching'";
      $result = mysqli_query($conn, $sql);
        ?>
       
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
    </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
                            <td><?= ++$i;?></td>
                         <!--   <td><?= $row["id"];?></td> -->
                            <td><?= $row["product_name"];?></td>
                            <td><?= $row["product_price"];?></td>
                            <td>
                                <img src=" <?= $row["product_image"];?>" class="card-img-top">
                            </td>
                            <td><?= $row["isbn"];?></td>
                            <td><?= $row["writer_name"];?></td>
                            <td><?= $row["edition"];?></td>
                             <td><?= $row["stock"];?></td>
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