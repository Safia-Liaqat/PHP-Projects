
  <?php
  $server="localhost";
  $username="root";
  $password="";
  $dbname="loginregisterationsystem";
  $conn=mysqli_connect($server,$username,$password,$dbname);
  if(!$conn)
  {
      die("connection error".mysqli_connect_error());
  }

  ?>