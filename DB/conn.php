<?php 
$username="root";
$password="";
$server="localhost";
$db="portfoliodb";

$conn= mysqli_connect($server,$username,$password,$db);
if(!$conn){
    echo "<script>alert('Something Error......');</script>";
}

?>