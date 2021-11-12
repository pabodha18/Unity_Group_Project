<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
    <?php
    require('api/connection.php');

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
    <div class="container" >

        <div class="row">
            <?php
            $sqlq = "select posts.id,posts.title,posts.caption,posts.image_url,profile.fname,profile.lname,profile.profile_image from posts,profile where profile.credential_id = posts.user";
            $result_set = mysqli_query($conn,$sqlq);
            if(mysqli_num_rows($result_set) > 0){
                while($row = mysqli_fetch_assoc($result_set)){
                    echo '<div class="col-0 col-xs-0 col-sm-0 col-md-0 col-lg-3 col-xl-3 col-xxl-3"></div>
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="card" style="margin:10px">
                            <div class="card-header">
                                <div style="display:flex;margin-bottom:0;padding-bottom:0">
                                    <img src="profile_pic/'.$row['profile_image'].'" alt="profile pic" height="40px" width="40px" style="border-radius:20px">
                                    <h5 style="margin-top:5px;margin-left:5px">'.$row['fname'].' '.$row['lname'].'</h5>
                                </div>
                                <h3 style="margin-top:0;padding-top:0">'.$row['title'].'</h3>
                                
                            </div>
                            <div class="card-body">
                                <img src="images/'.$row['image_url'].'" height="400" width="100%" alt="added Image">
                            </div>
                            <div class="card-footer">
                                <p>'.$row['caption'].'</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-0 col-xs-0 col-sm-0 col-md-0 col-lg-3 col-xl-3 col-xxl-3"></div>';
                }
            }
            ?>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
