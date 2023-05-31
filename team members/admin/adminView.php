<?php
    include('../../connect.php');
    $conn = new connect;
    $connection = $conn->getConn();
if(!$conn){
    die('error'.mysqli_connect_error());
}
$query = "SELECT * from team";
$result=$connection->query($query);

    if(!$result){
        die('error'.mysqli_connect_error());
    }
    else{
        if($result->num_rows > 0) 
        {
             echo '<table  border="1", cellspacing="1", cellpadding="5">';
             echo '<td>'.'id'.'</td>';
             echo '<td>'.'first name'.'</td>';
             echo '<td>'.'last name'.'</td>';
             echo '<td>'.'photo'.'</td>';
             echo '<td colspan="1">'.'description'.'</td>';
             echo '<td>'.'age'.'</td>';
             echo '<td>'.'status'.'</td>';
             echo '<td colspan="2">'.'operation'.'</td>';


            while($row =$result->fetch_assoc()){
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['FName'].'</td>';
                echo '<td>'.$row['LName'].'</td>';
                echo '<td>'.'<img src=" ../images/'.$row['PicLocation'].'"</td>';
                echo '<td>'.$row['About'].'</td>';
                echo '<td>'.$row['Age'].'</td>';
                echo '<td>'.$row['Status'].'</td>';

                echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>";
                echo "<td><a href='delete.php?id=" . $row['id'] . "' 
                          onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>";
             echo "</tr>";
                
               
            
            }
            echo '</table>';
            
        } else {
            echo "No data found.";
        }
    }
    ?>

