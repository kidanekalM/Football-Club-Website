<?php
    include ('../connect.php');
    include ('../common/adminMenu.php');
    $conn = new connect;
    $conn = $conn->getConn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Tickets</title>
    <link rel="stylesheet" href="style/buyTickets.css">
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1 class="title">Personal Information</h1>
            <label for="fname">First Name</label>
            <input type="text" name="fname">
            <label for="lname">Last Name</label>
            <input type="text" name="lname">
            <label for="email" >E-mail</label>
            <input type="email" name="email" id="email" required>
            <label for="pnumber" required>Phone Number</label>
            <input type="tel" name="pnumber" id="pnumber" required>
            <div class="buttons">
                <input type="reset" value="clear" name="">
                <input type="submit" value="submit" name="submit" id='submit'>
            </div>
        </form>
            <?php
            if(isset($_GET['id']))
            {
                $other = mysqli_query($conn,'select * from fixtures where id ='.$_GET['id'])->fetch_assoc();
                 echo "<aside> <section>
                        <figure class='home Team'>
                            <img src='img/Phoenix.png' alt='Team Logo' class='logo'>
                            <figcaption>
                                <h2>Phoenix</h2>
                            </figcaption>
                            </figure>
                                <p class='vs'>
                                    Vs
                                </p>
                        
                            <figure class='opponent'>
                            <img src='img/".$other['Name'].".png' alt='Team Logo' class='logo'>
                                <figcaption>
                                    <h2>".$other['Name']."</h2>
                                </figcaption>
                            </figure>
                            
                            </section>
                            <p class='detail date'>".$other['DATE']."</p>
                            <p class='detail location'>".$other['location']."</p>
                    
                            </aside>
                            ";
                // print_r($other);

                # requesting chapa payment
                if(isset($_POST["submit"])){
                    // echo '<script>alert("aaa")</script>';
                    if($other['ticketPrice']==0){
                        $other['ticketPrice']=100;
                    }
                    $curl = curl_init();
                    $tx_ref = $_POST['fname'].date('U');
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
                    "amount":"'.$other['ticketPrice'].'",
                    "currency": "ETB",
                    "email": "'.$_POST['email'].'",
                    "first_name": "'.$_POST['fname'].'",
                    "last_name": "'.$_POST['lname'].'",
                    "phone_number": "'.$_POST['pnumber'].'",
                    "tx_ref": "'.$tx_ref.'",
                    "callback_url": "http://localhost/Football-Club-Website/fixtures/verify.php",
                    "return_url": "http://localhost/Football-Club-Website/fixtures/fixtures.php",
                    "customization[title]": " Phoenix vs '.$other['Name'].'",
                    "customization[description]": " on '.$other['DATE'].' "
                    }',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: CHASECK_TEST-jemo02JnnrUo4NknnTHa3BWCNRnPe9wY',
                        'Content-Type: application/json'
                    ),
                    ));

                    $response = curl_exec($curl);
                    $response = json_decode($response,true);
                    curl_close($curl);
                    print_r($response['data']['checkout_url']);
                    // echo $response['da;
                    header('Location: '.$response['data']['checkout_url']);
                }
                else{
                    echo '<script>alert("naaa")</script>';
                }
            
            }
            ?>
    </div>
</body>
</html>