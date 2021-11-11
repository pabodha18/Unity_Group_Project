<?php
require('connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['upload_new'])){

        $uid = $_POST['uid'];
        $title = $_POST['title'];
        $caption = $_POST['caption'];

        $target_dir = "../images/";
        $target_file = $target_dir.basename($_FILES['image']['name']);
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)){
            $image_url = $_FILES['image']['name'];

            $sql_upload_post = "insert into posts (title,caption,image_url,user) values ('".$title."','".$caption."','".$image_url."',".$uid.")";
            if(mysqli_query($conn,$sql_upload_post)){
                echo "Insertion Completed";
            }else{
                echo "Insertion Failed";
            }

            echo "File Upload Success!";
        }else{
            echo "File Upload Failed!";
        }
    }else{
        echo "incorrect";
    }
}else{
    echo "other";
}

?>