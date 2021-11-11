<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Profile</title>
    <?php
    session_start();

    if(!isset($_SESSION['uid'])){
        header("location:index.php");
    }
    ?>
</head>
<body>
    <?php
    require('navigation.php');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-0 col-sm-0 col-md-2 col-lg-3 col-xl-3 col-xxl-5"></div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-2">
                <form action="api/auth.php" enctype="multipart/form-data" method="post">
                    <input type="number" name="uid" value="<?php echo $_SESSION['uid']; ?>" id="" style="display:none">
                    <input type="text" name="fname" id="fname">
                    <input type="text" name="lname" id="lname">
                    <input type="file" name="file_image" id="file_image">
                    <select name="gender" id="gender">
                        <option value="MALE">Male</option>
                        <option value="FEMALE">Female</option>
                    </select>
                    <input type="submit" name="insert_profile" value="Add / Update Profile">
                </form>
            </div>
            <div class="col-0 col-sm-0 col-md-2 col-lg-3 col-xl-3 col-xxl-5"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>