<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View News</title>
    <link rel="shortcut icon" href="img/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="style/manageNews.css">
</head>
<body>
    <div class="wrapper">
        <h1>Manage News</h1>
        <div class="search">
                <!-- <select name="" id=""><option value="Name"> Name</option>
                <option value="Date"> Date</option>
                </select> -->
            <input type="text" id="txt_search">

            <button id="btn_search"><img src="img/search.png" alt=""></button>
            
        </div>
        <main>
        <?php
         include ("../connect.php");
         $conn = new connect;
         $conn = $conn->getConn();
         if($conn)
         {
            $sql = "select * from news order by Date desc";
            $allNews = $conn->query($sql);
            while($news = $allNews->fetch_assoc()){
                echo "<figure class='news'>
                <img class='thumbnail' src=".$news['PicLocation']." >
                <figcaption><h3>".$news['Title']."</h3>
                    <p>".$news['Description']."</p>
                </figcaption>
                <figure class='manage'>
                    <a href='editNews.php?id=".$news['id']."'><img src='img/edit.png' id='edit' title='Edit News' alt='Edit News'></a>
                    <a href='manageNews.php?id=".$news['id']."'><img src='img/delete.png' id='delete' alt='Delete News' title='Delete News'></a>
                </figure>
            </figure>";    
            }

            if(isset($_GET['id'])){
                $sql = "delete from news where id =".$_GET['id'];
                
            }
        }
        ?>
        <figure class='news'>
            <img class='thumbnail' src='img/fight.jpg' >
            <figcaption><h3>Titile</h3>
                <p>Desc</p>
            </figcaption>
            <figure class='manage'>
                <a href='editNews.html'><img src='img/edit.png' id='edit' title='Edit News' alt='Edit News'></a>
                <img src='img/delete.png' id='delete' alt='Delete News' title='Delete News'>
            </figure>
        </figure>
        <figure class="news">
            <img class="thumbnail" src="img/emptyStadium.png" alt="">
            <figcaption><h3>Titile</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis eligendi praesentium ab atque dolore, incidunt nihil quos ratione necessitatibus beatae?</p>
            </figcaption>
            <figure class="manage">
                <a href="editNews.html"><img src="img/edit.png" id="edit" title="Edit News" alt="Edit News"></a>
                <img src="img/delete.png" id="delete" alt="Delete News" title="Delete News">
            </figure>
        </figure>
        <figure class="news">
            <img class="thumbnail" src="img/logo3.png" alt="">
            <figcaption><h3>Titile</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis eligendi praesentium ab atque dolore, incidunt nihil quos ratione necessitatibus beatae?</p>
            </figcaption>
            <figure class="manage">
                <a href="editNews.html"><img src="img/edit.png" id="edit" title="Edit News" alt="Edit News"></a>
                <a href="viewnewsadmin.html"><img src="img/delete.png" id="deelte" alt="Delete News" title="Delete News"></a>
                
            </figure>
        </figure>
       
        </main> 
    </div>
</body>
</html>
<script src="script/manageNews.js"></script>