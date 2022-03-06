<?php
$insert=false;
if(isset($_POST['submit']))
{
  
$server="localhost";
$username="root";
$password="";
$conn=mysqli_connect($server,$username,$password);
if(!$conn){
    die("connection error".mysqli_connect_error());
}
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['pswd'];
  $sql= "INSERT INTO `contactform`.`contacttable` ( `username`, `password`, `email`) VALUES ('$username', '$email', '$password')";
  
  if($conn -> query($sql)==True){
    $insert=true;
    
}else{
 echo "Error: $sql <br> $conn->error";
}
$conn->close();
}
  /*
  if(mysqli_query($conn,$sql))
  {
    $insert=True;
    echo "<h2>Record entered sucesssfully</h2>";
  }
  else{
    echo "<h2>Record failed</h2>";
  }
  mysqli_close($conn);
  */


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet">
  <title>Document</title>
</head>

<body >
<img class="bg" src="as.webp" alt="">
  
  
   
    
    <?php
            if($insert==true){
              echo "<h2 class='savemsg'>Record entered sucsessfully</h2>";
            }
            ?>
           
  
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h2>Contact Form</h2>
          </div>


          <form action="contact.php" method="POST">
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="username" placeholder="Enter your name" name="username">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
              </label>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
              <button type="submit" name="submit" class="btn ">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>