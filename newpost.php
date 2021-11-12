<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>New Post</title>
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
    if(isset($_GET['res'])){
        if($_GET['res'] == "success"){
            echo '<div class="alert alert-success" role="alert">Success!</div>';
        }else if($_GET['res'] == "failed_add"){
            echo '<div class="alert alert-danger" role="alert">Add Error Occured!</div>';
        }else if($_GET['res'] == "failed_upload"){
            echo '<div class="alert alert-danger" role="alert">Upload Error Occured!</div>';
        }
    }
    ?>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Image</h3>
                </div>

                <div class="card-body">
                    <form action="api/post.php"  enctype="multipart/form-data" method="POST">
                        <input type="number" name="uid" style="display:none" value="<?php echo $_SESSION['uid']; ?>" id="">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Awesome image" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="caption" class="form-label">Caption</label>
                            <textarea name="caption" id="caption" cols="30" rows="10" placeholder="Today taken at home" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label"></label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <input class="btn btn-warning" type="submit" name="upload_new" value="Upload">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
