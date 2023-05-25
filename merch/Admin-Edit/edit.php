<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Document</title>
</head>
<body>
    <?php
        include('../connect.php');
        $conn=new Connect;
        $id = $_GET['id'];
        $name=$_GET['name'];
        $price=$_GET['price'];
        $pic=$_GET['pic'];
        ?>
    <form method="post" action="">
        <p class="name">
            <label for="name" class="name">Name: </label>
            <input type="text" name="txtName" id="txtName" value="<?php echo "$name"; ?>">
            </p>
        <p class="price">
            <label for="price" class="price">Price: </label>
            <input type="text" name="txtPrice" id="txtPrice" value="<?php echo "$price"; ?>">
            </p>

            <p>
            <input type="file" id="filename" name="filename">
            </p>
            <p>
            <input type="submit" name="Submit" id="Submit" value="Submit">
            </p>
    </form>
</body>
</html>

<?php
    if(isset($_POST['Submit']))
    {
        $namee=$_POST['txtName'];
        $pricee=$_POST['txtPrice'];
        $picc=$_POST['filename'];
$query = "UPDATE merch SET name='$namee', price='$pricee',PicLocation='$picc' WHERE id='$id'";
$connect2=$conn->getConnection();
$data =mysqli_query($connect2,$query);
if($data)
{
    echo '<script type="text/javascript">'; 
    echo 'alert("Merch Updated Successfully!");'; 
    echo 'window.location.href = "../Admin/admin.php";';
    echo '</script>';


}
    }