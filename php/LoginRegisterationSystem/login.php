<?php
include 'connection.php';
$user=false;
if(isset($_POST['Login']))
{

    $username=$_POST['username'];
    $password=$_POST['pswd'];
    $hash2 = md5($password);
    $query="Select * from userregisteration where username='$username' and password='$hash2'";
    session_start();
    $_SESSION['username']=$username;
    $cookie_name="username";
    $cookie_value=$username;
    setcookie($cookie_name,$cookie_value, time()+30*24*60*60);
 /*
    if(isset($_POST['remember']))
 {
    setcookie('name',$username,time()+60*60*7);
    session_start();
    $_SESSION['password']=$hash2;
    header("location:dashboard.php");
 }
 */
  
    $newcon=mysqli_query($conn,$query);
    //$login=mysqli_fetch_assoc($newcon);
    

    if(mysqli_num_rows($newcon) >0)
    {
        $login=mysqli_fetch_assoc($newcon);
      
        header ('location:dashboard.php');
       
    }
    else{
		$errormessage= 'username or password does not exist';
    $user=true;
	}
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
    <style>
  form{
    margin-top:200px;
  }
  
  .btn{
    background-color:#00264d;
    color:white;
            width:150px;
  }
  .btn:hover{
    background-color:#00264d;
    color:white;
            width:150px;
            height: 40px;
  }
 
</style>
</head>
<body style="background:#f0f5f5;">
<form method="POST" enctype="multipart/form-data" style="">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h2 style="text-align:center;">Login</h2>
          </div>
          <form action="contact.php" method="POST">
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="username" placeholder="Enter your name" name="username">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <?php
            if($user==true)
            {
             echo "<h4 style='color:red'> $errormessage</h4>";
            }
            ?>
           <!--
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
              </label>
            </div>
           <div class="row">
              <div class="col-md-4"></div>
              <button type="submit" name="Login" class="btn ">Login</button>
          -->
            
           

              <div class="row">
          
              <div class="col-md-1"></div>
              <div class="col-md-4">
              <button type="submit" name="Login" class="btn ">Login</button></div>
              <div class="col-md-7" >
            <a class='btn ' href="userRegisteration.php">Register Account </a>
            </div>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>