<?php

class Images{
    
         //NEED TO SEE HOW THIS CLASS CAN BE IMPROVED 
          public static function Upload($target_loc){
              
          if(isset($_FILES["fileToUpload"]["name"]) && isset($_SESSION['is_logged_in'])){ 
            $target_dir = $target_loc;
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {                    
                    $uploadOk = 1;
                } else {
                    //echo "File is not an image.";
                    Messages::setMsg('File is not an image.', 'error');
                    
                    $uploadOk = 0;
                    return;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                //echo "Sorry, file already exists.";
                Messages::setMsg('Sorry, file already exists.', 'error');
                
                $uploadOk = 0;
                return;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 5500000) {
                echo $_FILES["fileToUpload"]["size"] ;
                 Messages::setMsg('Sorry, file is too large.', 'error');
                
                $uploadOk = 0;
                return;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "JPG") {
                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                 Messages::setMsg('Sorry, only JPG, JPEG, PNG & GIF files are allowed.', 'error');
                
                $uploadOk = 0;
                return;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                //echo "Sorry, your file was not uploaded.";
                
                 Messages::setMsg('Sorry, file was not uploaded.', 'error');
                return;
                
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    
                    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. ";
                     Messages::setMsg('The file '. basename( $_FILES["fileToUpload"]["name"]).'has been uploaded.', 'true');
                    
                    
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                     Messages::setMsg('Sorry, there was an error uploading your file.', 'error');
                    return;
                }
            }
             
          }
              
              return true;
          }
    
    
       public static function Delete($fileName, $target_loc){
           
           if( isset($_SESSION['is_logged_in'])){ 
           
           
           $dellete_path = realpath($target_loc.$fileName);
           
           if(is_writable($dellete_path)){
               
               if (!unlink($dellete_path))
                  {
                  //echo ("Error deleting $fileName");
                   Messages::setMsg("Error deleting $fileName", 'error');
                  }
                else
                  {
                  //echo ("Deleted $fileName");
                   Messages::setMsg("Delated $fileName", 'true'); 
                  }
               return true;
           }
           else
           {
               Messages::setMsg("Path Not Writable.", 'error'); 
           }
           
       }
           return;
       }
    
}
    
?>
