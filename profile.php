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
    require('api/connection.php');
    if(!isset($_SESSION['uid'])){
        header("location:index.php");
    }
    ?>
</head>
<body>
    <?php
    require('navigation.php');
    $ids = $_SESSION['uid'];
    $sqls = "select * from profile where credential_id = ".$ids;
    $availability = false;
    $result = mysqli_query($conn,$sqls);
    if(mysqli_num_rows($result) > 0){
        $availability = true;
        $row = mysqli_fetch_assoc($result);
    }
    if(isset($_GET['res'])){
        if($_GET['res'] == "success"){
            echo '<div class="alert alert-success" role="alert">Success!</div>';
        }else if($_GET['res'] == "error"){
            echo '<div class="alert alert-danger" role="alert">Add Error Occured!</div>';
        }else if($_GET['res'] == "error"){
            echo '<div class="alert alert-danger" role="alert">Upload Error Occured!</div>';
        }
    }
    ?>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Your Profile</h3>
                </div>
                <div class="card-body">
                <?php
                if($availability){
                    echo '<img src="profile_pic/'.$row['profile_image'].'" width="100%" height="300"/>
                    <form action="api/auth.php" enctype="multipart/form-data" method="post">
                    <input type="number" name="uid" value="'.$_SESSION['uid'].'" id="" style="display:none">
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input class="form-control" value="'.$row['fname'].'" type="text" name="fname" placeholder="Nimal" id="fname">
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" value="'.$row['lname'].'" name="lname" class="form-control" placeholder="Siril" id="lname">
                    </div>
                    <div class="mb-3">
                        <div class="form-label" id="file_image">Choose Profile Pic</div>
                        <input type="file" name="file_image" id="file_image">
                    </div>
                    <div class="mb-3">
                        <div class="form-label" id="gender">Select Gender</div>
                        <select class="form-select" name="gender" id="gender">
                            <option value="MALE">Male</option>
                            <option value="FEMALE">Female</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-warning" name="update_profile" value="Update Profile">
                </form>';
                }
                if(!$availability){
                    echo '<form action="api/auth.php" enctype="multipart/form-data" method="post">
                    <input type="number" name="uid" value="'.$_SESSION['uid'].'" id="" style="display:none">
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input class="form-control" type="text" name="fname" placeholder="Nimal" id="fname">
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Siril" id="lname">
                    </div>
                    <div class="mb-3">
                        <div class="form-label" id="file_image">Choose Profile Pic</div>
                        <input type="file" name="file_image" id="file_image">
                    </div>
                    <div class="mb-3">
                        <div class="form-label" id="gender">Select Gender</div>
                        <select class="form-select" name="gender" id="gender">
                            <option value="MALE">Male</option>
                            <option value="FEMALE">Female</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-warning" name="insert_profile" value="Add Profile">
                </form>';
                }
                ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
