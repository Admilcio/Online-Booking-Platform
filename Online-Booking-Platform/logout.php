<?php 
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["logged_in"]);
  header("location:login.php")
?>