<!DOCTYPE html>
<html>
<head>
    <title>List of Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <style type="text/css">
     body{
       background: linear-gradient(to right,grey, #009999);
       color:black;
     
     }
     table{
        margin-left: 100px;
        border:-2px dotted grey;
        font-size: 15px;

     }
     h1{
        color:black;
        margin-left: 100px;
     }
     h1:hover{
        color:aqua;
         margin-left: 100px;
     }
 </style>

    </head>
<body>

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

$sql = "SELECT * FROM `register_user` WHERE 1 Limit 0, 20";
$result = mysqli_query($conn, $sql);
// $data = mysqli_num_rows($result);
// echo "<pre>"; print_r($result); exit();
?>
<h1>List of Users</h1>
<table border="0" cellspacing="0" cellpadding="12">
    <tr>
        <th>S.N.</th>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Username</th>
        <th>District</th>
        <th>City</th>
        <th>Email</th>
        <th>Contact number</th>
        <th>Action</th>
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
    <tr>
        <td><?= ++$i;?></td>
        <td><?= $row["id"];?></td>
        <td><?= $row["firstname"];?></td>
        <td><?= $row["lastname"];?></td>
        <td><?= $row["username"];?></td>
        <td><?= $row["district"];?></td>
        <td><?= $row["city"];?></td>
        <td><?= $row["email"];?></td>
        <td><?= $row["contact number"];?></td>
        <td>
           
             <a style="color: #00F; text-decoration: none;"  href="useredit.php?id=<?= $row['id'];?>">&#9998;</a>
          |

            <a style="color: #F00; text-decoration: none;" onclick="return confirm('Are you sure you want to delete this file?')" href="userdel.php?id=<?= $row['id'];?>">&#10008;</a>
    </td>
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
</body>
</html>