<?php
require("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['login_submit'])){
        $uemail = $_POST["uemail"];
        $upass = $_POST["upass"];

        $sql_str = "select id,email from credentials where email = '".$uemail."' && password = '".$upass."'";
        $result = mysqli_query($conn,$sql_str);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            session_start();

            $_SESSION["uid"] = $row["id"];
            $_SESSION["email"] = $row["email"];

            header("location:../dashboard.php");//check
        }else{
            header("location:../index.php");//check
        }
    }else if(isset($_POST['register_sumbit'])){
        $email = $_POST['email'];
        $pass1 = $_POST["password1"];
        $pass2 = $_POST["password2"];
        if($pass1 == $pass2){
            $sql_st = "insert into credentials(email,password) values ('".$email."','".$pass1."')";
            if(mysqli_query($conn,$sql_st)){
                header("location:../index.php");//changed
            }else{
                header("location:../signup.php");//changed
            }
        }else{
            header("location:../signup.php");//changed
        }
    }else if(isset($_POST['insert_profile'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $uid = $_POST['uid'];

        $target_dir = "../profile_pic/";
        $target_file = $target_dir.basename($_FILES["file_image"]["name"]);

        if(move_uploaded_file($_FILES['file_image']['tmp_name'],$target_file)){
            $image_url = $_FILES['file_image']['name'];
            $profile_insert = "insert into profile (credential_id,fname,lname,profile_image,sex)values('".$uid."','".$fname."','".$lname."','".$image_url."','".$gender."')";
            if(mysqli_query($conn,$profile_insert)){
                header("location:../profile.php?res=success");//changed
            }else{
                header("location:../profile.php?res=error");//changed
            }
        }else{
            header("location:../profile.php?res=error");//changed
        }
    }else if(isset($_POST['update_profile'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $uid = $_POST['uid'];

        $target_dir = "../profile_pic/";
        $target_file = $target_dir.basename($_FILES["file_image"]["name"]);

        if(move_uploaded_file($_FILES['file_image']['tmp_name'],$target_file)){
            $image_url = $_FILES['file_image']['name'];
            $profile_insert = "update profile set fname = '".$fname."',lname = '".$lname."',profile_image = '".$image_url."',sex = '".$gender."' where credential_id = ".$uid;
            if(mysqli_query($conn,$profile_insert)){
                header("location:../profile.php?res=success");//changed
            }else{
                header("location:../profile.php?res=error");//changed
            }
        }else{
            header("location:../profile.php?res=error");//changed
        }
    }else{
        header("location:../index.php");//changed
    }
}else{
    header("location:../index.php");//changed
}

?>
