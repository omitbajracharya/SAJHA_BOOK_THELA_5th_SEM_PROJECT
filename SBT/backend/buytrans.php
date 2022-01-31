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
  <title>Sajha Book Thela-buyer_details</title>
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
  table{
    /*border: 1px solid red;*/
    text-align: center;
  }
  table tr td img{
  width:124px !important;
  height: 160px !important;
}
.testing .tallyuser{
  font-size: 30px;
  
} 
.delivers button{
  font-size: 30px;
  color:#00d0ff;
 } 
 .delivers{
  width:20%;
  margin-left: 40%;
  /*text-align: center;*/
 }
pre{
  margin-left: 1%;
  color: #210330;
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
      <div class="col-md-10 testing" >

        <h1 style="font-family: sans-serif;color:#51ff51;margin-left: 1%;">Order List:</h1>



        <?php
        require_once("DBConnect.php");
      $sql = "SELECT `tally`,`username` FROM `buyer_transaction` GROUP BY `tally`";
      $result = mysqli_query($conn, $sql);
      $k=0;
      $count = mysqli_num_rows($result);
      if($count>0){
      while($row=mysqli_fetch_assoc($result))
        {
          $user[$k]=$row["username"];
          $tally[$k]=$row["tally"];
          $k++;
      }
      
   foreach($user as $key => $value) {
         $sql = "SELECT * FROM `register_buyer` WHERE `username`='$value'";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result); 
        $contact[$key] = $row["contact_number"];
        $city[$key] = $row["city"];
      }
      // print_r($city);
      // mysqli_close($conn);
      foreach ($tally as $key=>$value) {
        // require_once("DBConnect.php");
        //  $sql = "SELECT * FROM `register_buyer` WHERE `username`='$value'";
        //  $result = mysqli_query($conn, $sql);
        //  $row = mysqli_fetch_assoc($result);
         // print_r($row);exit();
        $i=$key+1;//just start index with 1
        
        echo "<pre class='tallyuser'>$i)$user[$key]<br>Details: $contact[$key],$city[$key]</pre>";
        // echo "<pre class='tallyuser'>$key)$value</pre>";
      ?>
       <?php
      require_once("DBConnect.php");
      $sql = "SELECT `due` FROM `buyer_transaction` WHERE `tally`='$value'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      // $data = mysqli_num_rows($result);
      // echo "<pre>"; print_r($result); exit();
        ?>
      <div class="delivers">
        <form method="post" action="deliver.php">
        <!-- <input type="hidden" name="user" value="<?=$user[$key]?>"> -->
        <input type="hidden" name="match" value="<?=$value?>">  
      <button type="submit"><i class="fas fa-check-circle"></i>Deliver</button>
      <h5 style="color:white">
         <?php
      if($row['due']==1)
      {
      ?>
      <input type="radio" id="payment1" name="payment" value="Cash" style="margin-left: 38%;" checked>
<!-- <label for="Cash">Cash</label> -->
<label for="Cash">Cash</label>
<?php
 }
else{
  ?>
<input type="radio" id="payment2" name="payment" value="esewa" style="margin-left: 38%;" checked>
<label for="Esewa">Esewa</label><br>
<?php } ?>
</h5>
      </form>
    </div>
      <div>
        
      </div>
      <?php
      require_once("DBConnect.php");
      $sql = "SELECT * FROM `buyer_transaction` WHERE `tally`='$value'";
      $result = mysqli_query($conn, $sql);
      // $data = mysqli_num_rows($result);
      // echo "<pre>"; print_r($result); exit();
        ?>
      
        <table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <!-- <th>S.N.</th> -->
            <th>Transcation No.</th>
            <th>Order_ID</th>
            <th>Book_id</th>
            <!-- <th>Username</th> -->
            <th>Book name</th>
            <th>Book price</th>
            <th>Book image</th>
            <th>Quantity</th>
            <th>ISBN</th>
          <th>Writer_name</th>
          <th>Edition</th>
          <th>Total_price</th>
            <!-- <th>Action</th> -->
          </tr>
          <?php
          if (mysqli_num_rows($result) > 0) {
           
            while($row = mysqli_fetch_assoc($result)) {
               ?>
            <tr>
             
              <td><?= $row["transcation no"];?></td>
              <td><?= $row["order_id"];?></td>
              <td><?= $row["id"];?></td>
              <!-- <td>  <?= $row["username"];?></td> -->
              <td><?= $row["book_name"];?></td>
              <td><?= $row["book_price"];?></td>
              <td>
                    <img src=" <?= $row["book_image"];?>" class="card-img-top" height="100">
                  </td>
              <td><?= $row["quantity"];?></td>
              <td><?= $row["isbn"];?></td>
              <td><?= $row["writer_name"];?></td>
              <td><?= $row["edition"];?></td>
              <td><?= $row["total_price"];?></td>
              <!-- <td>
                <a style="color: #F00; text-decoration: none;" onclick="return confirm('Are you sure you want to delete this file?')" href="buyertrandel.php?id=<?= $row['transcation no'];?>">&#10008;</a>
              </td> -->
            </tr>
            <?php
          }   
        } else {
        ?>
        <tr>
          <td colspan="12">No Record(s) found.</td>
        </tr>
        <?php
      }
      ?>
      
    </table>
    <!-- end of table -->
  
    <!-- <div class="delivers">
      <h1><i class="fas fa-check-circle"></i>Mark Sold</h1>
    </div> -->
<?php 
}}
else{
  ?>
        <table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <!-- <th>S.N.</th> -->
            <th>Transcation No.</th>
            <th>Order_ID</th>
            <th>Book_id</th>
            <!-- <th>Username</th> -->
            <th>Book name</th>
            <th>Book price</th>
            <th>Book image</th>
            <th>Quantity</th>
            <th>ISBN</th>
          <th>Writer_name</th>
          <th>Edition</th>
          <th>Total_price</th>
            <!-- <th>Action</th> -->
          </tr>
 
        <tr>
          <td colspan="12">No transaction .</td>
        </tr>
      <?php
      }

      mysqli_close($conn);
?>

  </div>
  <!-- end of body div -->
</div>
</section>
</div>


<!-- ending div of main -->
</body>
</html>