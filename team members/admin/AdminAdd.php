<?php
include('../../connect.php');
$conn = new connect;
$connection = $conn->getConn();
if(!$conn){
    die('error'.mysqli_connect_error());
}
 if(isset($_POST['submit'])){
    $image=$_FILES['image']['name'];
    $fname=$_POST['fname']; 
    $lname=$_POST['lname'];
    $age=$_POST['age'];
    $description=$_POST['about'];
    $stat=$_POST['status'];

    $query="INSERT into team values('','$fname','$lname','$image','$description','$age','$stat')";
    if($query==true){
        move_uploaded_file($_FILES['image']['tmp_name'],"../images/$image");
        echo' <script>alert("successfully added")</script>';
        //header('location:../admin');
    }
    $result=$connection->query($query);
    if(!$result){
        die('error'.mysqli_connect_error());
    }else{
        //echo 'data sucessfully added';
    }

 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adding data</title>
</head>
<body>

    <form action="AdminAdd.php" method="post" enctype="multipart/form-data">
        first name<input  pattern="[A-Za-z]" required type="text" name="fname" ><br>
        last name<input pattern="[A-Za-z]" required type="text" name="lname" ><br>
        age<input required type="number" name="age" min="17" max="50" ><br>
        description<br><textarea name="about"  cols="30" rows="10"></textarea><br>
        image<input required type="file" name="image" ><br>
          status<input type="radio" required name="status"  value="goalkeeper">Goal keeper
                <input type="radio" required name="status" value="defender"> Defender
                <input type="radio" required name="status" value="midfilder"> Midfilder
                <input type="radio" required name="status" value="forward" > Forward <br>

        <input type="submit" name=" submit" value="send">
    </form>
</body>
</html>
