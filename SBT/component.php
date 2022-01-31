
<style type="text/css">
  .image img{
    width: 124px;height: 160px;
  }
  .fa-star,
.fa-star-half{
  color: #156800;
  /*color: black;*/
  /*background: #156800;*/
  padding: 3% 0;
}
img
{
  /*margin-top:10px;*/
  width:30px;
  height:30px;
  /*float:left;*/
}
</style>
<!-- <link rel="stylesheet" type="text/css" href="rating_style.css"> -->
  <script type="text/javascript">
   function change(id)            
   {
      var bid=document.getElementById(id).className;
      var value=document.getElementById("hidden_"+id).value;
       window.location.href = "insertrating.php?id=" + bid + "&rate=" + value;
   }
</script>
<?php
function component($productname,$productprice,$productimage,$quantity,$isbn,$writer,$edition,$stock,$totalprice,$productid){
$server = "localhost";
$username = "root";
$pwd = "";
$db = "sbt_db";
// Create connection
$conn = mysqli_connect($server, $username, $pwd, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
  $sql="SELECT * FROM `catalog` WHERE `id`='$productid'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  // echo $row['star1']; exit();
?>
  <div class="col-md-3 col-sm-6 my-3 my-md-0 c1">
  <form action="actionbuy.php" method="POST" name="catalog">
  <div class="card shadow">
  <div class="image">
  <img src="<?php echo $productimage ?>" alt="image1" class="img-fluidcard-img-top my-3" >
  </div>
  <div class="card-body">
  <h5 class="card-title"><?php echo $productname ?></h5>
  <div class="div">   <!-- star -->
    <input type="hidden" id="hidden_1<?php echo $productid?>" value="1">
    <img src="<?php  echo $row['star1']; ?>" onclick="change(this.id);" id="1<?php echo $productid?>" class="<?php echo $productid?>">  <!-- 1st star -->
    
    <input type="hidden" id="hidden_2<?php echo $productid?>" value="2">
    <img src="<?php  echo $row['star2']; ?>" onclick="change(this.id);" id="2<?php echo $productid?>" class="<?php echo $productid?>">   <!-- 2nd star -->

    <input type="hidden" id="hidden_3<?php echo $productid?>" value="3">
    <img src="<?php  echo $row['star3']; ?>" onclick="change(this.id);" id="3<?php echo $productid?>" class="<?php echo $productid?>">   <!-- 3rd star -->

    <input type="hidden" id="hidden_4<?php echo $productid?>" value="4">
    <img src="<?php  echo $row['star4']; ?>" onclick="change(this.id);" id="4<?php echo $productid?>" class="<?php echo $productid?>">  <!-- 4th star -->

    <input type="hidden" id="hidden_5<?php echo $productid?>" value="5">
    <img src="<?php  echo $row['star5']; ?>" onclick="change(this.id);" id="5<?php echo $productid?>" class="<?php echo $productid?>"><br>  <!-- 5th star -->
  </div>


  <p> &raquo; broad content at low price<br>&nbsp; and know to use the different programs and features.</p>
  <h5>
  <small><del>रू599</del></small>
  <span class="price">रू<?php echo $productprice ?></span>
  </h5>
  <button type="submit" name="add" class="btn btn-primary my-3">Add to Cart<i class="fas fa-shopping-cart"></i></button>
  <input type='hidden' name='bookname' value='<?php echo $productname ?>'>
  <input type='hidden' name='bookprice' value='<?php echo $productprice?>'>
  <input type='hidden' name='bookimg' value='<?php echo $productimage?>'>
  <input type='hidden' name='bookqty' value='<?php echo $quantity?>'>
  <input type='hidden' name='bookisbn' value='<?php echo $isbn?>'>
  <input type='hidden' name='bookwriter' value='<?php echo $writer?>'>
  <input type='hidden' name='bookedition' value='<?php echo $edition?>'>
  <input type='hidden' name='bookstock' value='<?php echo $stock?>'>
  <input type='hidden' name='booktotal' value='<?php echo $totalprice?>'>
  <input type='hidden' name='bookid' value='<?php  echo $productid?>'>
  </div>
  </div>
  </form>   
  </div> 
  <!-- echo $element; -->
  <?php
}
?>
<?php
function cartElement($productimage,$productname,$productprice,$productid)
{ 

  $element="
  <form action=\"cart.php?action=remove&id=$productid\" method=\"POST\" class=\"cart-items\">
  <div class=\"border rounded\">
  <div class=\"row bg-white\">
  <div class=\"col-md-3 pl-0\">
  <img src=\"$productimage\" alt=\"img1\" class=\"img-fluid\">
  </div>
  <div class=\"col-md-6\">
  <h5 class=\"pt-2\">$productname</h5>
  <small class=\"text-secondary\">Seller:Sajha Book Thela</small>
  <h5 class=\"pt-2\">रू$productprice</h5>
  <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
  </div>
  <div class=\"col-md-3 py-5\">
  <div>
  <form method=\"post\">
  Quantity:
  <input type=\"text\" value=\"1\" name=\"quantity\" class=\"form-control w-25 d-inline\" id=\"quantity\">
  <input type=\"submit\"  name=\"add\" value=\"OK\"/>
  </form>
  </div>
  </div>
  </div>
  </div>
  </form>
  ";
  echo $element;
}
?>