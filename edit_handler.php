<?php
include('config.php');
include("classes/final_post.php");


      if(isset($_POST['but_submit'])){

        //Catching former picture's id

        $now_viewID =  $_POST["sec_edit?id"];



        //Creating a new instance of the class initial post!
          $final_selfie = new final_class();
          //Initializing the attributes in the class final_selfie from the HTML form

          $got_desc = $_POST['desc1'];
          $got_location = $_FILES['file']['name'];

          $final_selfie->setdesc1($got_desc);
          $final_selfie->setfilename1($got_location);

          //Fetching the information in the database if any record match
          if (isset($_POST['sec_edit?id'])) {

            $viewID = $_POST['sec_edit?id'];
            // Fetching value in database
            $view_query = mysqli_query($con, "SELECT id, description, filename, location FROM init_photo WHERE id = $viewID");
            $view_value = mysqli_fetch_assoc($view_query);


            $desc = $view_value['description'];
            $location = $view_value['location'];
            $name_of_file = $view_value['filename'];

            //Calling for the method greate to create a new instance of a post in the database passing as parameter the other post's description and location
            $final_selfie->post1($location, $desc);


          }else {
            // code...
            echo "Edit id cannot be empty!";
          }




        }


 ?>
