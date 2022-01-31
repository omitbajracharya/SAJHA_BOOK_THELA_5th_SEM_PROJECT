<?php
require_once("DBConnect.php");
$pid=$_GET["id"];
$rating=$_GET["rate"];//howmanystar
session_start();
$username=$_SESSION['username'];
$sql = "SELECT * FROM `rating` WHERE `user`='$username' AND `pid`=$pid";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{

    $sql = "UPDATE `rating` SET `rate`='$rating' WHERE `user`='$username' AND `pid`=$pid ";
    mysqli_query($conn,$sql);
}
else
{
$sql = "INSERT INTO `rating`(`user`,`pid`,`rate`) VALUES ('$username',$pid,$rating)";
  mysqli_query($conn,$sql);
}  
///////////////////////////////////////////
$average=0;
   require_once("DBConnect.php");
  

$sql="SELECT `rate` FROM `rating` WHERE `pid`='$pid'";
$result=mysqli_query($conn,$sql);
$total=mysqli_num_rows($result);
// echo $total;exit();
 if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $average=$average+$row['rate'];
               }
             }
             else
              $total=1;
             
               $average=(int)($average/$total);
               // echo $average;exit();
/////////////////////////////////////////////////////////////////////////

require_once("DBConnect.php");
for($i=$average;$i>=1;$i--)//average=3
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
