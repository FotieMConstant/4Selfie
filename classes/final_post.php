

<?php

/**
 * Class to take care of initial photos
 */

class final_class{

    // Property declaration
    private $desc;
    private $filename;








    // method declaration

    public function getdesc1(){
      return $this->$desc;
    }
    public function getfilename1(){
      return $this->$filename;
    }

    public function setdesc1($desc_param){
    $this->desc = $desc_param;
    }
    public function setfilename1($filename_param){
      $this->filename = $filename_param;
    }



    public function post1($O_userphoto_location, $O_userdescription){
      include("config.php");

      // "O" standts for "other" as in other user
      $O_userlikes = 0;
      $current_userlikes = 0;


      //Setting the max upload size!
       $maxsize = 2048242880; // 2048MB = 2GB
      $target_dir = "assets/images/init_upload/";
      $target_file = $target_dir . $_FILES["file"]["name"];


      // Select file type
      $pictureFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("PNG","JPG","JPEG","JPG","png","jpg","jpeg","jpg");

      // Check extension
      if( in_array($pictureFileType, $extensions_arr) ){

         // Check file size
         if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
           echo '<div class="alert alert-danger"><center><strong>File too large</strong>. File must be less than 2GB. Check video size and <a href="upload.php">try again</a></div></center>';
         }else{
           // Upload
           if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
             // Insert record
             $query = "INSERT INTO final_photo(description_p1, description_p2, location_1, location_2, likes_p1, likes_p2) VALUES('".$this->desc."','".$O_userdescription."','".$target_file."','".$O_userphoto_location."','".$current_userlikes."','".$O_userlikes."')";

             mysqli_query($con, $query);

             echo '
                  Selfie posted successfully!
             ';
             header('location: rated.php');
           }
         }

      }else{

        echo '
             Sorry could not post your selfie try again!
             ';
        }
    }


    public function liked_p1($post_id){
      include("config.php");

      // update record and adding the likes selfie 1 to the database
      $query = "UPDATE final_photo SET likes_p1 = likes_p1 + 1 WHERE id ='".$post_id."'";

      mysqli_query($con, $query);

    }

    public function liked_p2($post_id){

      include("config.php");

      // update record and adding the likes for selfie 2 to the database
      $query = "UPDATE final_photo SET likes_p2 = likes_p2 + 1 WHERE id ='".$post_id."'";

      mysqli_query($con, $query);


    }




}



 ?>
