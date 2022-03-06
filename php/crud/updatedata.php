<?php
  
if(isset($_POST['submit']))
{
  $conn=mysqli_connect("localhost","root","","crud") or die("connection unsuccessful"); 
  echo $sid=$_POST['sid'];
  echo $sname=$_POST['sname'];
  echo $sclass=$_POST['sclass'];
  echo  $sadress=$_POST['sadress'];
  echo  $sphone=$_POST['sphone'];
   $sql="UPDATE student SET sname='$sname',sadress='$sadress',sclass='$sclass',sphone='$sphone' WHERE sid='$sid' ";
   $result=mysqli_query($conn,$sql) or die("query unsucessfull");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
    <style>
       /*
      .main-content{
        margin:0 auto;
      }
     
      .header{
        height:100px;
        background-color:#00264d;
        color:white;
        font-weight: 600;
      text-align: center;

      }
      */
      .btn{
        background-color: #00264d;
        color: white;
      }
      .header{
        height:80px;
        background-color:#00b3b3;
        color:white;
        font-size:large;
        font-weight: 800;
        text-align: center;
        padding: 30px;
      }
      .inner_container{
          background-color: white;
          width: inherit;
      } 
     
    </style>
</head>
<body style="background:#f0f5f5;">
  <div class="container">
    <!-- <div class="main-content">
     <div class="header">Crud</div> -->
     <div class="container">
      <div class="header">CRUD</div>
      <div class="inner_container">
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li>  <a href="adddata.php">ADD</a></li>
              <li><a href="readDAta.php">UPDATE</a></li>
              <li><a href="readDAta.php">Delete</a></li>
            </ul>
          </div>
        </nav>
<form method="POST" action="adddata.php" >
<div class="row">
    <div class="col-md-3"></div>
      <div class="card col-md-6">
        <div class="card-body">
          <div class="card-title">
            <h2 style="text-align:center;">Update Data</h2>
          </div>
          <?php
  //include_once "connection.php"
  
$conn=mysqli_connect("localhost","root","","crud") or die("connection unsuccessfful"); 
$st_id=$_GET['id'];
$sql="SELECT * FROM student where sid ={$st_id} ";
$result=mysqli_query($conn,$sql) or die("query unsessfull");
if(mysqli_num_rows($result))
{
while($row=mysqli_fetch_assoc($result))
{
?>
           <div class="form-group">
            <label for="" >id</label>
        <input type="text" class="form-control" name="sid" value="<?php echo $row['sid']; ?>">
</div>
            <div class="form-group">
            <label for="">name</label>
        <input type="text" name="sname" class="form-control" value="<?php echo $row['sname'] ;?>">
        </div>
            <div class="form-group">
            <label for="">Adress</label>
        <input type="text" name="sadress" class="form-control" value="<?php echo $row['sadress'] ;?>">
        </div>
            <div class="form-group">
            <label for="">phone</label>
        <input type="text" name="sphone"  class="form-control" value="<?php echo $row['sphone'] ;?>">
        </div>
            <div class="form-group">
              <label for="">Class</label>
            <select name="sclass" class="form-control" id="">
          <?php
          $st_id=$_GET['id'];
          $sql1="SELECT * FROM studentclass ";
          $result1=mysqli_query($conn,$sql1) or die("query unsessfull");
          if(mysqli_num_rows($result1))
          {
          while($row1=mysqli_fetch_assoc($result1))
          {
          
          
          ?>
     
            <option value="<?php echo $row1['cid']; ?>"><?php echo $row1['cname']; ?></option>
          <?php
          }
        }
          ?>
        </select>
            </div>
           
            
            <div class="row">
            <div class="col-md-1"></div>
              <div class="col-md-4">
              <button type="submit" name="submit" class="btn ">Update</button>
            </div>
         
            </div>
            </div>
          </form>
          <?php
}
}
?>
</div>
</div>
</div>
</div>
</body>
</html>