<?php
    include ('../connect.php');
    $conn = new connect;
    $conn = $conn->getConn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Fixtures</title>
    <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="style/managefixtures.css">
    
</head>
<body>
    <div class="wrapper">
        <main>
            <header>
                <input type="text">
                <button><img src="img/search.png" alt=""></button>
                <button id="add"><img src="img/add.png" alt=""></button>
            </header>
            <div class="cover">
                <div class="addFixture">
                <form action="" method="POST" enctype="multipart/form-data">
                <h1>Add Fixture</h1>    
                <label for="name"><h2>Team Name</h2></label>
                    <!-- <input type="select" id="name" name='name'> -->
                    <select name="name" placeholder="--select --" required>
                        <option>Man Utd</option>
                        <option>Man City</option>
                        <option>Arsenal</option>
                        <option>Wolves</option>
                        <option>Foxes</option>
                        <option>Cats</option>
                        <option>Dogs</option>
                    </select>
                    <label for="date"><h2>Date</h2></label>
                    <input required type="date" id="date" name='date'>
                    <label for="date"><h2>Ticket Price</h2></label>
                    <input required type="number" id="price" name ='price'>
                    <label for="date"><h2>Location</h2></label>
                    <input required type="text" id="location" name ='location'>
                    <label for="tickets"><h2>number of tickets</h2></label>
                    <input required type="number" id="tickets" name='tickets'>

                    <input type="submit" value="submit" id="submit" name="submit">
                </form>
                </div>
            </div>
            <?php
                if(isset($_POST['submit'])){
                 if($conn){
                    $sql = "insert into merch values(default,'img/ticket.png','Phoenix vs ". $_POST['name']." on ".$_POST['date']."',".$_POST['price'].",".$_POST['tickets'].")";
                    mysqli_query($conn,$sql);
                    $sql = "insert into Fixtures values(default,'".$_POST['name']."','".$_POST['location']."','".$_POST['date']."')";
                    mysqli_query($conn,$sql);
                    
                    // echo $sqlTick;
                //    $sql = "insert into fixtures(name,PicLocation,location,Date) values('$_POST['']')";
                //    $result = mysqli_query($conn,$sql);
                }
                else{
                }
            }
            ?>
            <div class="fixture">
            <?php
                 if($conn){
                   $sql = "select * from fixtures order by date desc";
                   $result = mysqli_query($conn,$sql);
                   while($fixture = $result->fetch_assoc()){

                    echo "<img src='img/".$fixture['name'].".png' alt ='team logo' class= 'logo'>";
                    echo "<h3 class='name'>".$fixture['name']."</h3>";
                    echo "<h3 class='date'".$fixture['date']."</h3>";
                    echo "<h3 class = 'tickets'>".$fixture['ticket']."</h3>";
                    echo "<div class='icons'>";
                    echo "<a href='managefixtures.php?id=".$fixture['id']."&type=edit"."'><img id='editFixture' src='img/edit.png' alt='' class='icon edit'></a>";
                    echo "<a href='managefixtures.php?id=".$fixture['id']."&type=delete"."'><img id='deleteFixture' src='img/delete.png' alt='' class='icon delete'></a>";
                    echo "</div> </div>";

                   }
                //    echo $result;
                //    print_r($result);
                }

            ?>
                <img src="img/logo3.png" alt="teamLogo" class="logo">
                <h3 class="name">Team Name</h3>
                <h3 class="date">Date</h3>
                <h3 class="location">Location</h3>
                <h3 class="tickets">234 tickets</h3>
                <div class="icons">
                    
                </div>
            </div>
            <div class="fixture">
                <img src="img/logo3.png" alt="teamLogo" class="logo">
                <h3 class="name">Team Name</h3>
                <h3 class="date">Date</h3>
                <h3 class="location">Location</h3>
                <h3 class="tickets">234 tickets</h3>
                <div class="icons">
                    <a href=""><img id="editFixture" src="img/edit.png" alt="" class="icon edit"></a>
                    <a href=""><img id="deleteFixture" src="img/delete.png" alt="" class="icon delete"></a>
                </div>
            </div>
            
        </main>
    </div>
</body>
</html>
<script src="script/managefixtures.js"></script>