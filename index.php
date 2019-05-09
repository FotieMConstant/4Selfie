<?php
include('config.php');
include('classes/init_post.php');

 ?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>4Selfie | Home</title>

    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/bootstrap/thumbnail-gallery.css">

</head>
<body>


  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><strong>4Selfie</strong></a>
    </div>
    <ul class="nav navbar-nav">
      <li  class="active"><a href="#">Home</a></li>
      <li><a href="rated.php">Rated</a></li>
      <li><a href="upload.php">Post Selfie</a></li>
    </ul>
  </div>
</nav>
<div class="container gallery-container">

    <h1>4Selfie</h1>
    <p class="page-description text-center">Take and post your selfie and get rated</p>


    <div class="tz-gallery">

        <div class="row">

          <?php
            include("config.php");

            $fetchSelfies = mysqli_query($con, "SELECT id, description, filename, location FROM init_photo ORDER BY id DESC");
            while($row = mysqli_fetch_assoc($fetchSelfies)){

              $id = $row['id'];
              $desc = $row['description'];
              $location = $row['location'];
              $name_of_file = $row['filename'];

            echo '
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a class="lightbox" href="'.$location.'" title="'.$desc.'">
                        <img src="'.$location.'" alt="Selfie image" title="'.$desc.'">
                    </a>
                    <div class="caption">
                        <h3> <a href="edit.php?edit?id='.$id.'"><button class="btn btn-success" type="button" name="button">Start</button></a> </h3>
                        <strong>Description of selfie</strong>
                        <hr>
                        <p>'.$desc.'</p>
                    </div>
                </div>
            </div>
            ';
          }
?>
        <style media="screen">
        #error{
          height: 150px;
          width: 150px;
          }

        </style>
        <?php if (empty($id)): ?>
          <center>
            <h2>Ooops!</h2>
              <img id="error" src="assets/images/gifs/coldface.gif" alt="No content">
              <h4>No selfie was uploaded recently...</h4>
              <p>Please [<a href="upload.php">click here</a>] to post and start a competition</p>
          </center>
        <?php endif; ?>

            </div>
        </div>

    </div>

</div>

<script src="assets/bootstrap/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>
