<?php 
$host = 'localhost';
$username = 'root';
$password = "";
$database = "php_final_project";

$conn = new mysqli($host, $username, $password, $database);

if($conn->connect_error){
  die("Connection failed: ". $conn->connect_error);
}
?>

