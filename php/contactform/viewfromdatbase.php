<?php
$server="localhost";
$username="root";
$password="";
$conn=mysqli_connect($server,$username,$password);
if(!$conn){
    die("connection error".mysqli_connect_error());
}
$sql="SELECT * FROM contacttable ";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
        <th>user name</th>
        <th>email</th>
        <th>password</th>
    </tr>
    <?php
    while($Datarows=mysql_fetch_assoc($result))
    {
       
    

    ?>

       
        <td><?php echo $Datarows.['id'];?></td>
      
      <?php
    }
    ?>
    </table>
    

</body>
</html>