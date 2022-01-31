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
    text-align: center;
  }
  table tr td img{
  width:124px !important;
  height: 160px !important;
}
pre p{
	position: relative;
	/*border-radius: 38%;*/
	left:1%;
	background-color: #66eaff;
	width: 16%;
	height: 32px;
	padding-left: 2%;
}
pre p a{
position: absolute;
right: 0px;
width: 20px;
/*border:1px solid red;*/
/*bo: 0%;*/
top: 10%;
color: #F00; text-decoration: none;
}
pre span{
margin-left: -9%;
}
.delivers{
	margin-left: 1%;
}

</style>
<!-- <pre class='tallyuser'><p>$i)$user[$key]<span>&#10008;</span></p><br><span>Details: $contact[$key],$city[$key]<span></pre> -->
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
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "sbt_db";
        // Create connection
          $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
          if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "SELECT * FROM `deliver` WHERE 1";
          $result = mysqli_query($conn, $sql);
      // $data = mysqli_num_rows($result);
      // echo "<pre>"; print_r($result);
       // exit();
          ?>
          <h1 style="font-family: sans-serif;color:#51ff51;margin-left: 1%;">Delivered Details:</h1>
        <?php
        require_once("DBConnect.php");
      $sql = "SELECT `tally`,`username` FROM `deliver` GROUP BY `tally`";
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
        ?>
        <!-- <div>
        	<div>
        		<?=$i;?>)<?=$user[$key];?>
    			<span style="border: ">
        			<a onclick="return confirm('Are you sure you want to delete this file?')" href="deltrandel.php?tally=<?= $row['tally'];?>">&#10008;</a>
        		</span>
        	</div>

        </div> -->
        <pre class='tallyuser'>
        	<p><?=$i;?>)<?=$user[$key];?>
    			<?php
          if($_SESSION['role']!='Delivery')
          {
            ?>
        			<a onclick="return confirm('Are you sure you want to delete this file?')" href="deltrandel.php?match=<?= $value;?>">&#10008;</a>
          <?php
          }
          ?>
    		</p>
    		<span>Details: <?=$contact[$key]?>,<?=$city[$key]?><span>
		</pre>
        <!-- // echo "<pre class='tallyuser'>$key)$value</pre>";
        // echo "$value";exit(); -->
      
       <?php
      require_once("DBConnect.php");
      $sql = "SELECT `due` FROM `deliver` WHERE `tally`='$value'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      // $pay = $row['due'];
      // echo $pay;exit();
        ?>
      <div class="delivers">
      	<label for="Cash" style="color: #f1afb5;">Paid by : </label>
         <?php
      if($row['due']==1)
      {
      	// echo $pay;exit();
      ?>
          <label for="Cash" style="color: #85fe85;">Cash</label>
<?php
      }
else{
		// echo $pay;exit();
  ?>
<label for="Esewa" style="color: #85fe85;">Esewa</label><br>
<?php } ?>
<!-- </h5> -->
      </form>
    </div>
      <div>
        
      </div>
      <?php
      require_once("DBConnect.php");
      $sql = "SELECT * FROM `deliver` WHERE `tally`='$value'";
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