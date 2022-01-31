<?php
require_once("DBConnect.php");
$pid=$_GET["id"];
$rating=$_GET["rate"];//howmanystar

$sql = "INSERT INTO `rating`(`pid`,`php`) VALUES ($pid,$rating)";
  mysqli_query($conn,$sql);
///////////////////////////////////////////
$average=0;
   require_once("DBConnect.php");
  

$sql="SELECT `php` FROM `rating` WHERE `pid`='$pid'";
$result=mysqli_query($conn,$sql);
$total=mysqli_num_rows($result);
// echo $total;exit();
 if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $average=$average+$row['php'];
               }
             }
             else
              $total=1;
             
               $average=(int)($average/$total);
               // echo $average;exit();
/////////////////////////////////////////////////////////////////////////

require_once("DBConnect.php");
for($i=$average;$i>=1;$i--)
{
  $a[$i]="star2.png";
  // echo $a[$rating];
}
// echo "nepal";exit();
// print_r($a);exit();
 $nostar=$average+1;
  for($j=$nostar;$j<=5;$j++)
      {
        $a[$j]="star1.png";
       // echo $a[$nostar];
}
$sql="UPDATE `catalog` SET `star1`= '$a[1]',`star2`='$a[2]',`star3`='$a[3]',`star4`='$a[4]',`star5`='$a[5]' WHERE `id`=$pid";
mysqli_query($conn,$sql) or die("error");
////////////////////////////////////////////////////////////////
  header('location:catalog4.php');
?>
