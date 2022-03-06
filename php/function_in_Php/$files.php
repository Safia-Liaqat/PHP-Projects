
<?php
if(isset($_POST['submit']))
{
if(isset($_FILES['image']))
{
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    $file_type=$_FILES['image']['type'];
    if(!($file_type=='image/png' or $file_type=='image/jpg' ))
    {
        echo "<script>alert('Only select file with jpg or png extension')</script>";
    }
}
}
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
    <form  method="post" enctype="multipart/form-data">
    <input type="file" name="image"><br>
    <button name="submit">submit</button>

</form>
</body>
</html>