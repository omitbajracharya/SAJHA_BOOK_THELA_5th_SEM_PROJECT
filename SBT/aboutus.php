<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> 
   <link rel="icon" href="images/logo.png">
  <title>Sajha Book Thela-About us</title>
  <style>
  .fluid-container{
    height:100%;
  }
  .photo img{
    width:100%;
  }
  .head{
    background-color: black;
    color:white;
    text-align: center;
    margin-top: 2%;
    margin-left: 40%;
    margin-right: 40%;
    border-radius: 5%;
 }
 .des{
  /*background-color: lightgrey;*/
  color:white;
  margin-left: 10%;
  margin-right:10%;
 }
 .des p{
  /*font-weight: 105px;*/
  font-family:BatangChe;
  font-size: 20px;
 }
 .detail p{
  font-family:BatangChe;
  font-size: 18px;
  background-color: lightgrey;
  color:black;
  margin-left:9%;
  margin-right:10%;
 }
 .photo{
  background: url(images/slide2.jpg);
  background-repeat: no-repeat; 
  background-size: cover;
  position: relative;
  height: 600px;
  width: 100%;
 }
 .ptitle{
  position: absolute;
  top: 40%;
  left: 50%;
  -webkit-transform:translate(-50%);
  z-index: 2;
  font-family: sans-serif;
 }
 .ptitle h1{
  font-size: 60px;
  color: #ab9e9e;
  text-align: center;
  margin : 0;
 }
 .ptitle p{
  font-size: 20px;
  color: #ab9e9e;
  text-align: center;
  margin : 0;
  letter-spacing: 6px;
  margin-top: 10px;
 }
 .overlay{
  background: #000000ad;
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  z-index:1;
 }
  
    .navv li .a{
      background:url(images/bgmenu.png) repeat-x;
    }
   
</style>
</head>
<body>
  <div class="fluid-container">
    <?php include('header.php')?>
    <div class="photo">
      <div class="ptitle">
        <h1>SAJHA BOOK THELA</h1>
        <p>Providing best services is our moto.</p> 
      </div>
      
      <!-- <img src="images/slide2.jpg" height="600px;"> -->
      <div class="overlay"></div>
    </div>


    <div class="head">
    <h2>About Us</h2>
  </div>
  <div class="des">

    <b>
    <p>Let's face it: college textbooks are insanely expensive. And, at the end of the term, the bookstore gives students virtually nothing back for their books. We believe in a better way for students to sell their textbooks quickly, conveniently, and for a fair price. How we do that is by providing an online service to give you cash for your books in two easy steps: 1) get an instant price quote online, 2) get paid promptly as per your book conditions.</p>
    <p>
We believe in outstanding customer service. That's why our customers get an email response promptly--usually within few days. Our awesome Customer Care Team is standing by.</p>
<p>
We believe that it is important to do things the right way, and to create relationships based on trust. That's why we invite every single customer to leave us feedback on our website, and we work diligently to maintain an excellent feedback score.
If you are looking for someone that you can really count on, give us a try. Sajha Book Thela provides a variety of books for purchase throughout the Nepal. We work with different customer directly to give you the widest choice of books.
Since our establishment, we try our best to our clients save on books they choose to buy. As we partner with dozens of daily customer, so that every people always get the best prices without spending the time to find the best place to buy your favorite and important novels or college textbooks. Moreover, they are all available for online booking in just a few mouse clicks.
</p>
</b>
</div>
<div class="detail">
  <p>Website Service:24 hours<br>
  Address:Balaju,Kathmandu</p>
</div>
  <div class="head">
    <h2>Where to find us</h2>
  </div>
  <div  class="p2 mt-2">
                <!-- <iframe style="border: 0;width: 100%" src="https://www.google.com/maps/embed?pb=" width="75%" height="200" frameborder="0"></iframe> -->

      <img src="images/map.png" height="480px;"width="100%;"> 
    </div>
 <?php include('footer.php')?>
</div>

</body>
</html>