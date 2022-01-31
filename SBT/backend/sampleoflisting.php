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
$conn = mysqli_connect($servername, $username, $password, $dbname);


  if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }

$sql = "SELECT * FROM `register_user` WHERE 1 Limit 0, 20";
$result = mysqli_query($conn, $sql);
?>
<h1>List of Users</h1>
<span style="float:right;font-size:42px;margin-top:-70px;margin-right: 127px;">
   <a href="dash.php">
    <i style="color:black;margin-right:35px;" class='fa fa-hand-o-left'></i>
</a>

    </span>
<table id="editableTable" class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
                <th>username</th>
                <th>district</th>
                <th>city</th>
                <th>email</th>
                <th>contact number</th>
        </tr>
    </thead>
    <tbody>
        <?php while( $developer = mysqli_fetch_assoc($resultSet) ) { ?>
           <tr id="<?php echo $developer ['id']; ?>">
           <td><?php echo $developer ['id']; ?></td>
           <td><?php echo $developer ['fname']; ?></td>
           <td><?php echo $developer ['lname']; ?></td>
           <td><?php echo $developer ['username']; ?></td>
           <td><?php echo $developer ['district']; ?></td>
           <td><?php echo $developer ['city']; ?></td>
           <td><?php echo $developer ['Email']; ?></td>
           <td><?php echo $developer ['num']; ?></td>                                                 
           </tr>
    </tbody>
    <?php 
mysqli_close($conn);
?>
</table>
</body>
</html>