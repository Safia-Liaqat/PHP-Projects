<?php
  //include_once "connection.php"
  
$conn=mysqli_connect("localhost","root","","crud") or die("connection unsuccessfful"); 

if(isset($_POST['add']))
{
    $sid=$_POST['sid'];
   $sname=$_POST['sname'];
   $sclass=$_POST['sclass'];
    $sadress=$_POST['sadress'];
    $sphone=$_POST['sphone'];
    $sql="INSERT INTO student( `sname`, `sadress`, `sclass`, `sphone`) VALUES ('$sname','$sadress','$sclass','$sphone')";
    $result=mysqli_query($conn,$sql) or die("unsucessfull");
    header ('location:readDAta.php');
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
    <title>Document</title>
    <style>
    
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
 <!-- <div class="header"><i>CRUD</i></div>
  <div class="col-md-4"></div>-->
  <div class="container">

  <div class="header">CRUD</div>

  <div class="inner_container">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          
          <ul class="nav navbar-nav">
            <li class="active"><a href="readDAta">Home</a></li>
            <li>  <a href="adddata.php">ADD</a></li>
            <li><a href="readDAta.php">UPDATE</a></li>
            <li><a href="readDAta.php">Delete</a></li>
          </ul>
        </div>
      </nav>

    <form method="POST" action="adddata.php" >
     <div class="row">
    <div class="col-md-3"></div>
      <div class="card  col-md-6">
        <div class="card-body">
          <div class="card-title">
            <h2 style="text-align:center;">Add Data</h2>
          </div>
          
            <div class="form-group">
            <label for="id">id</label>
        <input type="text" name="sid"  class="form-control">
</div>
            <div class="form-group">
            <label for="email">name</label>
        <input type="text" name="sname"  class="form-control">
        </div>
            <div class="form-group">
            <label for="">Adress</label>
        <input type="text" name="sadress"  class="form-control">
        </div>
            <div class="form-group">
            <label for="">phone</label>
        <input type="text" name="sphone"  class="form-control">
        </div>
            <div class="form-group">
              <label for="">Class</label>
            <select name="sclass" id=""  class="form-control">
            <option value="2">Select Class</option>
          <?php
            $conn=mysqli_connect("localhost","root","","crud") or die("connection unsuccessfful"); 
         $sql="select * from studentclass";
         $result=mysqli_query($conn,$sql) or die("query unsessfull");
           while($rows=mysqli_fetch_assoc($result)){
             ?>
            <option value="<?php echo $rows['cid']; ?>"><?php echo $rows['cname']; ?></option>
            <?php
}
            ?>
        </select>
            </div> 
            <div class="row">
            <div class="col-md-1"></div>
              <div class="col-md-4">
              <button type="submit" name="add" class="btn ">Submit</button></div>   
            </div>
          </form>
          </div>
          </div>
        </div>
          
</body>
</html>