

<?php

/**
 * Class to take care of initial photos
 */
class init_class{

    // Property declaration
    private $desc;
    private $filename;







    // method declaration

    public function getdesc(){
      return $this->$desc;
    }
    public function getfilename(){
      return $this->$filename;
    }

    public function setdesc($desc_param){
    $this->desc = $desc_param;
    }
    public function setfilename($filename_param){
      $this->filename = $filename_param;
    }



    public function post(){
      include("config.php");

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
             $query = "INSERT INTO init_photo(description, filename, location) VALUES('".$this->desc."','".$this->filename."','".$target_file."')";

             mysqli_query($con, $query);

             echo '
                  Selfie posted successfully!
             ';
             header('location: index.php');
           }
         }

      }else{

        echo '
             Sorry could not post your selfie try again!
             ';
        }
    }

}



 ?>
