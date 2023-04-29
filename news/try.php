<form action="" method="post" enctype= "multipart/form-data">
<input type="file" name="myImage" id="myImage" name="myImage">
<input type="submit" value="submit" name="submit">
</form>
<?php
    include("../connect.php");
    $conn = new connect;
    $conn = $conn->getConn();
    if(isset($_POST["submit"])){
        if($conn){
            //$title = mysqli_real_escape_string($conn,$_POST["title"]);
            //$desc = mysqli_real_escape_string($conn,$_POST["description"]);
            $picLocation ='';
            if(isset($_FILES["myImage"])){
                $start = "img/news";
                if(chmod($start, 0777)){
                    echo "Chmod is returning true <br>";
                }
                if(is_dir($start)){
                    echo "The path is a directory <br>";
                }
                if(is_writeable($start)){
                    echo "The path is writable <br>";
                }
                if(is_file($_FILES['myImage']["tmp_name"])){
                    echo "There file is a file <br>";
                }
                if(file_exists($_FILES['myImage']["tmp_name"])){
                    echo "File exists ";
                }
                else{
                    echo "file does not exist";
                }
                
                //move_uploaded_file(basename($_FILES["myImage"]['tmp_name']),getcwd()."/img/news/".basename($_FILES["myImage"]['name']));
                //echo readfile(basename($_FILES['myImage']["name"]),true);
                echo "<br>";
                //echo "<img src = '".$_FILES['myImage']["name"]."'> </img>";
                $picLocation = $start."/".basename($_FILES['myImage']["name"]);
                //echo $picLocation."<br>";
                //print_r($_FILES);
                if(move_uploaded_file($_FILES["myImage"]['tmp_name'],$picLocation)){
                    echo 'Uploaded successfully';
                }
                else{
                    echo "we could not find the image <br>";
                    echo basename($_FILES["myImage"]['tmp_name']);
                    echo "<br>";
                    echo $picLocation ."<br>";
                    echo $_FILES["myImage"]["error"]."<br>";
                    echo ini_set('display_errors', 1);
                    echo ini_set('display_startup_errors', 1);
                    print_r($_FILES);
                }
            }
        }
    }
?>
