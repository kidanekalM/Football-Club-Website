<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="store.css">
  <link rel="stylesheet" href="profile.css">
</head>
<body>
<?php
  include('../../connect.php');
  $conn = new connect;
  $connection = $conn->getConn();
if(!$conn){
  die('error'.mysqli_connect_error());
}
$id=$_GET['id'];
$query = "SELECT * from team where `id`='$id'";
$result=$connection->query($query);
$data = [];
if($result->num_rows>0){
    
    while($row=$result->fetch_assoc()){
            $data[]=$row;
               } 
               }
    if(isset($data)){
        foreach($data as $item){
            echo '<div class="main">';
            echo'<div class="player">';
            echo'<img  src="../images/'.$item['PicLocation']. '" />';
            echo'<h3>'.$item['FName'].' '.' '.$item['LName'].'</h3>';
            echo'</div>';
            echo'<div class="para">';
            echo'<h1>'.'BIOGRAPHY'.'</h1>';
            echo'<p>'.$item['About'].'</p>';
            echo'</div>';
            echo'</div>';


            echo'<div class="promotion">';
           echo '<section class="store-section">';
   echo '<h2 class="store-heading">'.'Official Store'.'</h2>';
   echo' <div class="store-carousel">';
    echo '<div class="store-item active">';
     echo '<img src="pics/shirt.png" alt="Merchandise 1">';
      echo  '<h3 class="store-item-title">'.'Shirt'.'</h3>';
       echo '<p class="store-item-desc">'.'Description of Merchandise 1'.'</p>';
      echo '</div>';
      echo '<div class="store-item">';
      echo  '<img src="pics/hoodie.png" alt="Merchandise 2">';
      echo  '<h3 class="store-item-title">'.'Hoodie'.'</h3>';
       echo '<p class="store-item-desc">'.'Description of Merchandise 2'.'</p>';
      echo '</div>';
      echo'<div class="store-item">';
       echo' <img src="pics/boot.png" alt="Merchandise 3">';
        echo '<h3 class="store-item-title">'.'Boots'.'</h3>';
        echo '<p class="store-item-desc">'.'Description of Merchandise 3'.'</p>';
      echo '</div>';


    // echo '<button class="prev-button">'.'&#10094;'.'</button>';
     //echo '<button class="next-button">'.'&#10095;'.'</button>';
     echo '</div>';
     echo '<button class="store-button">'.'Shop Now'.'</button>';
     echo'</section>';
 

            echo'</div>';

        }
    }else{
        echo'not set';
    }
?>
</body>
</html>
<script src="../store.js"></script>