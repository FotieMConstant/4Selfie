<?php
include('config.php');
include('classes/final_post.php');



if (!empty($_GET["liked_p1"])) {
  // code...
  $id =  $_GET["liked_p1"];
  $final_P = new final_class();

  $final_P->liked_p1($id);
  header('location: rated.php');

}




if (!empty($_GET["liked_p2"])) {
  // code...
  $id_2 =  $_GET["liked_p2"];
  $final_P2 = new final_class();

  $final_P2->liked_p2($id_2);
  header('location: rated.php');

}




 ?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>4Selfie | Rated selfies</title>

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
      <li><a href="index.php">Home</a></li>
      <li  class="active"><a href="#">Rated</a></li>
      <li><a href="upload.php">Post Selfie</a></li>
    </ul>
  </div>
</nav>
<div class="container gallery-container">

    <h1>Rate a selfie, get rated be at the top!</h1>

    <p class="page-description text-center">Take and post your selfie and get rated</p>




    <div class="tz-gallery">

        <div class="row">


          <?php
            include("config.php");
            //Fetching for all images in final_photo table
            $fetchAllSelfies = mysqli_query($con, "SELECT id, description_p1, description_p2, location_1, location_2, likes_p1, likes_p2   FROM final_photo ORDER BY id DESC");
            while($row = mysqli_fetch_assoc($fetchAllSelfies)){

              $id = $row['id'];
              $description_p1 = $row['description_p1'];
              $description_p2 = $row['description_p2'];
              $location_1 = $row['location_1'];
              $location_2 = $row['location_2'];
              $likes_p1 = $row['likes_p1'];
              $likes_p2 = $row['likes_p2'];

              if(!empty($id)) {
                // code...
                echo '
                  <div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                        <div class="caption">
                        <strong><h3>'.$likes_p1.' Star(s)</h3></strong>
                        <a href="rated.php?liked_p1='.$id.'"><button class="btn btn-warning" type="button" name="button">Rate</button></a>

                        </div>
                          <a class="lightbox" href="'.$location_1.'" title="'.$description_p1.'">
                              <img src="'.$location_1.'" alt="image">
                          </a>

                            <a class="lightbox" href="'.$location_2.'" title="'.$description_p2.'">
                              <img src="'.$location_2.'" alt="image">
                            </a>

                          <div class="caption">
                          <strong><h3>'.$likes_p2.' Star(s)</h3></strong>
                            <a href="rated.php?liked_p2='.$id.'"><button class="btn btn-warning" type="button" name="button">Rate</button></a>
                          </div>
                      </div>
                  </div>
                  ';
              }

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
          <h3>No pair of selfie is available for rating yet...</h3>
          <p>Please [<a href="index.php">click here</a>] to start a competition</p>
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
