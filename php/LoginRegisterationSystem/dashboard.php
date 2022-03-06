<?php

session_start();
 
if(!isset($_SESSION["username"])){
	header("Location: login.php");
	exit();
}
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:rgb(220,220,220);">
  <div class="row" style="background-color: rgb(47,79,79); height:50px; margin-top: 10px; margin-left: 10px; padding: 10px;" >
      <div class="col-md-4">
<h2 style="float: left;color: white;">Welcome<?php    if(isset($_COOKIE["username"])){
    echo " ". $_COOKIE["username"].".....!";
}; ?></h2></div>
<div class="col-med-6">
<h3 style="float: right; text-align-last:right;"> 
    <a href="logout.php" style="text-decoration: none;color: white; margin-right: 10px;">Logout</a>
    </h3>
    </div>
</div>
<br><br><br><br>
    <table border="5" width='1000px' align="center" style="background-color: white;">
        <caption>Dashboard</caption>
        <tr>
            <th>Name </th>
            <th>EmailAdress </th>
            <th>Gender </th>
            <th>Image </th>
        </tr>
        <?php
       global $conn;
        $query="SELECT * FROM userregisteration";
        $stm=$conn->query($query);
       // $newcon=mysqli_query($conn,$query);
         while($datarows=$stm->fetch_array())
         {
             $name=$datarows['username'];
             $email=$datarows['email'];
             $gender=$datarows['gender'];
             $image=$datarows['image'];
         

        ?>
        <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $gender; ?></td>
            <td><img src="<?php echo $image; ?>" width="100px" height="100px"></td>
            <?php
         }
         ?>
        </tr>
    </table>
</body>
</html>