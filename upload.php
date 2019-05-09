<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>4Selfie | Post your selfie</title>

    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/bootstrap/thumbnail-gallery.css">

    <!-- php code to add init selfie to database -->
      <?php
      include("config.php");
      include("classes/init_post.php");

      if(isset($_POST['but_submit'])){

    //Creating a new instance of the class initial post!
      $init_selfie = new init_class();

              //Initializing the attributes in the class init_selfie from the HTML form
              $gotten_desc = $_POST['desc'];
              $gotten_location = $_FILES['file']['name'];

            $init_selfie->setdesc($gotten_desc);
            $init_selfie->setfilename($gotten_location);


              //Calling for the method greate to create a new instance of a post in the database
              $init_selfie->post();

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
      <li class="active"><a href="upload.php">Post Selfie</a></li>
    </ul>
  </div>
</nav>
<div class="container gallery-container">

    <h1>Post your selfie and get views!</h1>

    <p class="page-description text-center">Take and upload your selfie and get rated</p>




    <div class="tz-gallery">
      <p>Completely anonymous no one sees who you are</p>
        <form class="" action="upload.php" method="POST" enctype="multipart/form-data">
          <label for="selfie">* Your selfie:</label>
          <input id="selfie" class="form-control" type="file" name="file">
          <br>
          <label for="desc">Small description(Optional):</label>
          <textarea id="desc" rows="8" cols="80" class="form-control" type="text" name="desc" value="" placeholder="Your description goes here..."></textarea><br>

          <input class="btn btn-primary" type="submit" name="but_submit" value="Post">
        </form>

    </div>

</div>

<script src="assets/bootstrap/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>
