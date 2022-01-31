<?php
  session_start();
  require_once('DBConnect.php');
  $_SESSION['payment'] = $_POST['payment'];
  $payment = $_POST['payment'];
  header('location: clearbuycart.php');
?>