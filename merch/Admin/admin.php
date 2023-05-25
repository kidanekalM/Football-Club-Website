<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>
<body>
    <div class="main-section">
        <div class="right">
<!--             <img src="search-interface-symbol.png" alt="" class="image1">
 -->        <a href="\Final Project\Login\Login.html"><img src="Pictures/user.png" alt="" class="image2"></a>
<!--             <img src="Pictures/shopping-cart.png" alt="" class="image3">
 -->        </div>

        <div class="left">
            <div class="logos">
                <img src="Pictures/trylogo.png" alt="" class="image4">
                <p class="lbl1">DREAM TEAM</p>
                <p class="lbl2">OFFICIAL ONLINE STORE</p>
            </div>
            <div class="dream">WE ARE DREAM TEAM. MORE THAN JUST A FOOTBALL CLUB</div>

        </div>
        <div class="get-your-merch"><br>
            MANAGE YOUR MERCH
            <div class="search-box">
<!--                 <form action="">
                    <input type="text" name="search" class="search" size="67"/></br>
                </form> -->
            </div>
        </div>
        <div class="toolbox">
<!--             <button class="filter" type="menu"><img src="Pictures/setting.png" alt="" class="image5">
                Filters</button> -->
           <a href="\Final Project\Admin-Add\add.html"><button class="add-merch">Add Merch</button></a><br><br><br>
            <div class="fmenu">
                <table>
                    <br>
                    <img src="Pictures/stadd.jpg" alt="" style="width:38%" class="sideimg">
                    <img src="Pictures/player.png" alt="" class="sideplayer">
                    <!-- 
                    <td class="gender">Gender <br>
                            <input type="radio"class="male"> Male <br>
                            <input type="radio"class="female"> Female
                        </td>
                    <td class="kit-type">Kit Type <br>
                            <input type="radio"class="home"> Home  <br>
                            <input type="radio"class="away"> Away <br>
                            <input type="radio"class="goalkeeper"> Goalkeeper
                        </td>
                       <td class="featured">Featured Departments<br><br>
                                <input type="radio"class="upper">Upper<br><br>   
                                <input type="radio"class="lower">Lower<br><br>
                                <input type="radio"class="others">Others
                            </td>  -->
                </table>
            </div>
        </div>
        <div class="merches">
            
<!--             <div class="m1" >
                <img src="Pictures/pants.jpg" class="shirt">
                <p class="d1">Dream Hoodie</p>
                <p class="p1">1050<span class="s1" style="margin-left:10px">ETB</span></p>
                <button class="editmerch">Edit</button>
                <button class="deletemerch">Delete</button>
                </div><br>
                <div class="m1" >
                    <img src="Pictures/pants.jpg" class="shirt">
                    <p class="d1">Test</p>
                    <p class="p1">1050<span class="s1" style="margin-left:10px">ETB</span></p>
                    <button class="editmerch">Edit</button>
                    <button class="deletemerch">Delete</button>
                    </div><br>
                    <div class="m1" >
                        <img src="Pictures/pants.jpg" class="shirt">
                        <p class="d1">Test</p>
                        <p class="p1">1050<span class="s1" style="margin-left:10px">ETB</span></p>
                        <button class="editmerch">Edit</button>
                        <button class="deletemerch">Delete</button>
                        </div><br> -->
            <?php
                include_once('../connect.php');
                $conn = new Connect;
                $connect = $conn->getConnection();
                $sql = "SELECT * FROM merch";
                $result = $connect->query($sql);
                if($result->num_rows > 0){
                    while($row=$result->fetch_assoc()){
                        $id=$row['id'];
                        $name=$row['name'];
                        $price=$row['Price'];
                        $pic=$row['PicLocation'];
                        echo '<div class="m1">';
                        echo '<img src="Pictures/'.$row['PicLocation'].'" class="shirt">';
                        echo '<p class="d1">'.$row['name'].'</p>';
                        echo '<p class="p1">'.$row['Price'].'<span class="s1" style="margin-left:10px">ETB</span></p>';
                        echo "<button class='editmerch'><a href='../Admin-Edit/edit.php?id=$id&name=$name&price=$price&pic=$pic'
                        style='color:black;text-decoration:none'>Edit</a></button>";
                        echo "<button class='deletemerch'><a href='delete.php?id=$id&name=$name' style='color:black;text-decoration:none;'
                        '>Delete</a></button>";
                        echo '</div><br>';
                    }
                }

                if(!$result){
                    die('error'.mysqli_error($connect));
                }

            ?>
        </div>
    </div>

</body>
</html>
<script src="admin.js"></script>

<!-- <div class="m1">
<img src="Pictures/shirt.jpg" alt="" class="shirt">
<p class="d1">Dream Team Training Suit</p>
<p class="p1">1049.99 <span class="s1">ETB</span></p> -->
