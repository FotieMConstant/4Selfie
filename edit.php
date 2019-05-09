
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>4Selfie | Join other user in selfie</title>

    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/bootstrap/thumbnail-gallery.css">

    <!-- php for getting other user's selfie by id -->

<?php
include('config.php');
include("classes/final_post.php");


  if (isset($_GET['edit?id'])) {

    $viewID = $_GET['edit?id'];
    // Fetching value in database
    $view_query = mysqli_query($con, "SELECT id, description, filename, location FROM init_photo WHERE id = $viewID");
    $view_value = mysqli_fetch_assoc($view_query);


    $desc = $view_value['description'];
    $location = $view_value['location'];
    $name_of_file = $view_value['filename'];



  }else {
    // code...
    echo "Edit id cannot be empty!";
  }


 ?>



</head>
<body>


  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><strong>4Selfie</strong></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="rated.php">Rated</a></li>
      <li><a href="upload.php">Post Selfie</a></li>
    </ul>
  </div>
</nav>
<div class="container gallery-container">

    <h1>Join the fun, no name needed!</h1>

    <p class="page-description text-center">The competition is all anonymous</p>

    <!-- Columns are always 50% wide, on mobile and desktop -->
      <div class="container">

          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <h3> <strong>Your selfie</strong> </h3>
              <p>Post your own selfie and see who gets more likes!</p>

              <div class="tz-gallery">
                <?php

                echo '
                <p>Completely anonymous no one sees who you are</p>
                  <form class="" action="edit_handler.php" method="POST" enctype="multipart/form-data">
                    <label for="selfie">* Your selfie:</label>
                    <input id="selfie" class="form-control" type="file" name="file">
                    <br>
                    <label for="desc">Small description(Optional):</label>
                    <textarea id="desc" rows="8" cols="80" class="form-control" type="text" name="desc1" value="" placeholder="Your description goes here..."></textarea><br>


                    <input class="form-control" type=hidden value="'.$viewID.'" name="sec_edit?id">

                    <input class="btn btn-primary" type="submit" name="but_submit" value="Post">
                  </form>
                      ';
                     ?>




              </div>

            </div>

          <hr>

          <div class="col-xs-12 col-sm-6 col-md-8">
              <h3> <strong>Other user's selfie</strong> </h3>

              <?php

              // Selected selfie will be displayed if the variable is not empty!
              if(!empty($view_value['location'])){

              echo '
              <div class="col-sm-12 col-md-8">
                  <div class="thumbnail">
                      <a class="lightbox" href="'.$location.'" title="'.$desc.'">
                          <img src="'.$location.'" alt="Selfie image" title="'.$desc.'">
                      </a>
                      <div class="caption">
                          <h3><button class="btn btn-success" type="button" name="button">Started!</button> </h3>
                          <strong>Description of selfie</strong>
                          <hr>
                          <p>'.$desc.'</p>
                      </div>
                  </div>
              </div>
              ';
            } else {
              // Default image displayed when video not selected!
              echo "An error <br/>
              was encountered, other <br/>
              selfie could not be displayed<br/>
              please go back and select start<br/>
              competition";
            }
               ?>


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
