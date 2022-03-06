<?php
$conn=mysqli_connect("localhost","root","","crud") or die("connection unsuccessfful"); 
$sid=$_GET['id'];
$sql="Delete from student Where sid={$sid}";
$result=mysqli_query($conn,$sql) or die("query unsessfull");
header('location:readData.php');
?>