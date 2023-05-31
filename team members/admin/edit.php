<?php
  include('../../connect.php');
  $conn = new connect;
  $connection = $conn->getConn();
if(!$conn){
  die('error'.mysqli_connect_error());
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM team WHERE id = $id";
    $result=$connection->query($query);
    $row =$result->fetch_assoc();
    echo "<form method='post' action='update.php' enctype='multipart/form-data'>";
    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
    echo "<label>first name:</label> <input type='text' name='fname'pattern='['A-Za-z']' value='" . $row['FName'] . "'><br>";
    echo "<label>last name:</label> <input type='text' name='lname' pattern='['A-Za-z']' value='" . $row['LName'] . "'><br>";
    echo "<label>Age:</label> <input type='number' min='17' max='50' name='age' value='" . $row['Age'] . "'><br>";
    echo "<label>Description:</label><br><textarea name='description'  cols='30' rows='10' value='".$row['About']."' ></textarea><br>";
    echo "<label>Image:</label>";
    echo "<input type='file' required name='image'><br>";
    echo "<img src='../images/" . $row['PicLocation'] . "'><br>";
    echo "<label>status:</label><select  name='status' >
    <option value=".'goalkeeper'.">Goal Keeper</option>
    <option value=".'defender'.">Defender</option>
    <option value=".'midfilder'.">Midfilder</option>
    <option value=".'forward'.">Forward</option>
</select><br>";

echo "<input type='submit'name='submit' value='Submit'>";
echo "</form>";
}

  
 
?>