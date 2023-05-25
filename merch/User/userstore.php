<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userstore.css">
    <title>Document</title>
</head>
<body>
    <div class="main-section">
        <div class="right">
            <a href="\Final Project\Login\Login.html"><img src="Pictures/user.png" alt="" class="image2"></a>
<!--             <img src="Pictures/search-interface-symbol.png" alt="" class="searchimg">
 -->     
     </div>

        <div class="left">
            <div class="logos">
                <img src="Pictures/trylogo.png" alt="" class="image4">
                <p class="lbl1">DREAM TEAM</p>
                <p class="lbl2">OFFICIAL ONLINE STORE</p>
            </div>
            <div class="dream">WE ARE DREAM TEAM. MORE THAN JUST A FOOTBALL CLUB</div>
        </div>

        <div class="get-your-merch"><br>
            GET YOUR MERCH NOW
            <div class="search-box">
<!--                 <form action="">
                   <input type="text" name="search" class="search" size="67"/></br>
             </form> -->
            </div>
        </div>

        <div class="toolbox">
<!--             <button class="filter" type="menu"><img src="Pictures/setting.png" alt="" class="image5">
                Filters</button> -->
                <a href="\Final Project\Purchased Items\purchased.html"><button class="seller">Purchased Items</button></a><br><br><br>
            <div class="fmenu">
                <img src="Pictures/next.png" alt="" class="nextpic">
                <table>
                    <br>
                    <img src="Pictures/stad2.jpg" alt="" style="width: 37%;" class="sidepic">
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
                <p class="d1">Test</p>
                <p class="p1">1050<span class="s1" style="margin-left:10px">ETB</span></p>
                <button class="purchase">Purchase</button>
                </div><br>
                <div class="m1" >
                    <img src="Pictures/pants.jpg" class="shirt">
                    <p class="d1">Why</p>
                    <p class="p1">1050<span class="s1" style="margin-left:10px">ETB</span></p>
                    <button class="purchase">Purchase</button>
                    </div><br>
                    <div class="m1">
                        <img src="Pictures/pants.jpg" class="shirt">
                        <p class="d1">Hi</p>
                        <p class="p1">1050<span class="s1" style="margin-left:10px">ETB</span></p>
                        <button class="purchase">Purchase</button>
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
                    echo '<div class="m1">';
                    echo '<img src="Pictures/'.$row['PicLocation'].'" class="shirt">';
                    echo '<p class="d1">'.$row['name'].'</p>';
                    echo '<p class="p1">'.$row['Price'].'<span class="s1" style="margin-left:10px">ETB</span></p>';
                    echo "<button class='purchase'>Purchase</button>";
                    echo '</div><br>';

                    
                }
            }
            if(!$result){
                die('error'.mysqli_error($connect));
            }
        ?>
        </div>
    </div>
    <div class="buy">
        <div class="purchase">
        <form method="post" action="">
        <label for="personal" class="personal"> Personal Information </label>
        <p class="fname">
            <label for="name" class="name"> First Name: </label>
            <input type="text" name="txtFirstName" id="txtFirstName">
            </p>
            <p class="lname">
            <label for="name" class="name">Last Name: </label>
            <input type="text" name="txtLastName" id="txtLastName">
            </p>
        <p class="email">
            <label for="email" class="email">Email Address: </label>
            <input type="text" name="txtEmail" id="txtEmail">
            </p>
            <p>
            <button class="back"><a href="\Final Project\User\userstore.php" 
            style='color:black;text-decoration:none;font-family: "Oswald", sans-serif;'>Back</a></button>
            </p>
            <p>
            <input type="submit" name="Submit" id="Submit" value="Submit">
            </p>

    </form>
    <?php

                    if(isset($_POST['id'])){
                        $other = mysqli_query($conn,'select * from merch where id ='.$_GET['id'])->fetch_assoc();
                        if(isset($_POST["Submit"])){
                            $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.chapa.co/v1/transaction/initialize',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>'{
                    "amount":"'.$other['Price'].'",
                    "currency": "ETB",
                    "email": "'.$_POST['txtEmail'].'",
                    "first_name": "'.$_POST['txtFirstName'].'",
                    "last_name": "'.$_POST['txtLastName'].'",
                    "tx_ref": "'.$_POST['txtFirstName'].date().'",
                    "callback_url": "http://localhost/Final Project/User/userstore.php",
                    }',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer CHASECK-xxxxxxxxxxxxxxxx',
                        'Content-Type: application/json'
                    ),
                    ));

                    $response = curl_exec($curl);
                    $response = json_decode($response,true);
                    
                    curl_close($curl);
                    header('Location: '.$response['data']['checkout_url']);
                        }
                    }
            ?>
        </div>
    </div>

<!-- $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.chapa.co/v1/transaction/initialize',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
 "amount":"100",
  "currency": "ETB",
  "email": "'.$_POST['txtEmail'].'",
  "first_name": "'.$_POST['txtFirstName'].'",
  "last_name": "'.$_POST['txtLastName'].'",
  "tx_ref": "'.$_POST['txtFirstName'].date().'",
  "callback_url": "http://localhost/Final%20Project/User/userstore.php",
  }',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer CHASECK-xxxxxxxxxxxxxxxx',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response; -->
</body>
</html>
<script src="userstore.js"></script>