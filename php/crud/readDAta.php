
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Document</title>
    <style>
        table{
            margin-left: auto;
            margin-right: auto;
        }
    table, th, td {
        border:1px solid black;
        width: inherit;
       
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
      nav{
          background-color:#293d3d;
          color: white;
      }
     
    
      </style>
</head>
<body style="background:#f0f5f5;">
    <div class="container">
    <div class="header">CRUD</div>
    <div class="inner_container">
       
          <nav class="navbar navbar-expand-lg  " style="color: white;">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                 
                  <a class="nav-link" href="adddata.php">ADD</a>
                  <a class="nav-link" href="readDAta.php">UPDATE</a>
                  <a class="nav-link" href="readDAta.php">Delete</a>
            
                </div>
              </div>
            </div>
          </nav>
<?php
  //include_once "connection.php"
  
$conn=mysqli_connect("localhost","root","","crud") or die("connection unsuccessfful"); 

$sql="SELECT * FROM student join studentclass ON student.sclass=studentclass.cid ";
$result=mysqli_query($conn,$sql) or die("query unsessfull");

?>
        <table >
            <tr>
                <th>Student ID</th>
                <th>Student name</th>
                <th>Student Adress</th>
                <th>Student Phone</th>
                <th>Class</th>
                <th>Action</th>
            </tr>
            <?php
            if(mysqli_num_rows($result))
{
    while($row=mysqli_fetch_assoc($result))
    {
        ?>
            <tr>
                <td><?php echo $row['sid'] ?></td>
                <td><?php echo $row['sname'] ?></td>
                <td><?php echo $row['sadress'] ?></td>
                <td><?php echo $row['sphone'] ?></td>
                <td><?php echo $row['cname'] ?></td>
                <td><a href="updatedata.php?id=<?php echo $row['sid'] ?>" class="btn edit">edit</a>/<a href="delete.php?id=<?php echo $row['sid'] ?>" class="btn del">delete</a></td>
            </tr>
      
        <?php
    }
}
?>
</div>
</div>
  </table>

</body>
</html>