<?php
   include 'connection.php';
$insert=false;

   $NAmeError="";
   $emailError="";
   $passwordError="";
   $genderErr="";
   $fileerror="";
   $cpasswordError="";
 
   if(isset($_POST['submit']))
   {
    
    
       $name=$_POST['username'];
       $email=$_POST['email'];
       $password=$_POST['pswd'];
       $cpswd=$_POST['cpswd'];
       $gender=$_POST['gender'];
       $_SESSION['username']=$name;
      /* if($_FILES['file']['name'])
       {
           $path='upload/';
          move_uploaded_file($_FILES['file']['tmp_name'],"images/".$path);
          $image="image/".$_FILES['file']['name'];
       }*/
      // $filename=$_FILES['file'];
      $files=$_FILES['file'];  
      $filename=$files['name'];
      $filerror=$files['error'];
      $filetmp=$files['tmp_name'];
      $fileext=explode('.',$filename);
      $filecheck=strtolower(end($fileext));
      $fileextstored=array('png','jpg','jpeg');
      if(in_array($filecheck,$fileextstored))
      {
        $destination='upload/'.$filename;
        move_uploaded_file($filetmp,$destination);
        $image=$destination;
      }



      $hash = md5($password);
       
      
     $query=  "INSERT INTO `loginregisterationsystem`.`userregisteration` ( `username`, `password`, `email`, `gender`, `image`) VALUES ('$name', '$hash','$email',  ' $gender', ' $image')";
     if(mysqli_query($conn,$query))
     {

      $insert=True; 
     }
    
      
  
     
     if(empty($_POST['username']))
     {
       $NAmeError="<p style='color:red;'>NAme is required</p>";
     }
     else
     {
       $Name=test_user_input($_POST["username"]);
       if(!preg_match("/^[A-Za-z. ]*$/",$Name))
       {
         $NAmeError="<p style='color:red;'>Only letters and white spaces are allowed</p>";
       }
     }
    

     if(empty($_POST['email']))
     {
       $emailError="<p style='color:red;'>email  is required</p>";

     }
     else
     {
       $email=test_user_input($_POST["email"]);
       if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //The email address is valid.
        $emailError="Please Enter a valid email adress";
   } 
   /*
       if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'",$email))
       {
        $emailError="Please Enter a valid email adress";
       }*/
     }
     if(empty($_POST['pswd']))
     {
       $passwordError="<p style='color:red;'>password  is required</p>";
     }

     else{
       $Password=test_user_input($_POST["pswd"]);
     }
     if($password!=$cpswd)
     {
      $cpasswordError="password  Does not match"  ;
     }

     if (empty($_POST["gender"])) {
      $genderErr = "<p style='color:red;'>Gender is required</p>";
    }
    else{
      $Gender=test_user_input($_POST["gender"]);
    }

    


    

   }
   
   function test_user_input($data){
     return $data;
   }





?>
<style>
  .btn{
    background-color:#00264d;
  }
}
  .btn:hover{
    background-color:#00264d;
    color:white;
            width:150px;
            height: 40px;
  }
 
  </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
    <style>
       form{
    margin-top:80px;
  }
  .btn{
    background-color:#00264d;
    color:white;
    
  }

  .btn:hover{
    background-color:#00264d;
    color:white;
height:40px;
  }
 
  </style>
</head>
<body style="background:#f0f5f5;">
    <form method="POST"  enctype="multipart/form-data">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h2 style="text-align:center;">Registeration Form</h2>
          </div>
          
       
          <form action="contact.php" method="POST">
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="username" placeholder="Enter your name" name="username">
            </div><?php echo $NAmeError; ?>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div><?php echo $emailError; ?>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div><?php echo $passwordError; ?>
            <div class="form-group">
              <label for="Cpwd">Confirm Password:</label>
              <input type="password" class="form-control" id="Cpwd" placeholder="Confirm password" name="Cpswd">
            </div><?php echo $cpasswordError; ?>
            <div class="form-group">
              <label for="gender">Gender</label><br>
             male <input type="radio" id="male" value='male'  name="gender">
             Female <input type="radio"  id="Female" value='Female'  name="gender">
            </div>
            <?php echo $genderErr; ?>
            
            <div class="form-group">
              <label for="img">Image</label>
              <input type="file" class="form-control" id="file"  name="file">
            </div>
            
            <div class="row">
            <div class="col-md-1"></div>
              <div class="col-md-4">
              <button type="submit" name="submit" class="btn ">Submit</button></div>
              <div class="col-md-6">
            <a class='btn ' href="Login.php">Already have an Account</a>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>