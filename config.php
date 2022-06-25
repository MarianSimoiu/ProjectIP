<?php 


$host="localhost";
$user="root";
$password="";
$db="demo";

$conn = mysqli_connect($host,$user,$password,$db);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
?>