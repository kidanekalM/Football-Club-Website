
<?php
include('../connect.php');
$conn=new Connect;
if (isset($_POST['Submit'])) {

    $name = $_POST['txtName'];

    $price = $_POST['txtPrice'];

    $image = $_POST['filename'];


    $sql = "INSERT INTO `merch`(`name`, `price`, `PicLocation`) VALUES ('$name','$price','$image')";
    $connect2=$conn->getConnection();
    $result = $connect2->query($sql);


    if ($result == TRUE) {
      echo '<script type="text/javascript">'; 
      echo 'alert("New Merch Created Successfully!");'; 
      echo 'window.location.href = "../Admin/admin.php";';
      echo '</script>';

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $connect2->close(); 

  }
?>