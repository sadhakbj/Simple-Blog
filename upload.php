
<?php

include_once("header.php");
include_once("connect.php");

?>



<?php



if(isset($_POST['submit'])) {
    $errors =array();
    $allowed_ext = array('jpg','jpeg','png','gif','JPG','JPEG');
    

        $file_name = $_FILES['myfile']['name'];
        
        $extension=explode('.',$file_name);
        $file_ext=strtolower(end($extension));
        
        $file_size = $_FILES['myfile']['size'];
        $file_tmp = $_FILES['myfile']['tmp_name'];
        
        if(in_array($file_ext, $allowed_ext) ===false) {
        
        $errors[]='Extension not allowed. Plz Select Proper Image';
        
        
        }
        if ($file_size > 20009712)
          {
        $errors[] = 'File size is too big ';
        
          } 
          
          
          $namecheck =mysql_query("SELECT img from users where img='images/$file_name'");
          $count = mysql_num_rows($namecheck);
        
        if($count!=0)
        
            {
            
            $query1= mysql_query("UPDATE users SET img='images/$file_name' WHERE uname='$user'");
            header("location: profile.php?u=$user");
            }
            else {
          
        if (empty($errors)) {
        
              
          $location = "images/$file_name";
          if(move_uploaded_file($file_tmp ,$location))
      
        {
        
        header("location: profile.php?u=$user");
        
        
        } 
              $query= mysql_query("UPDATE users SET img='$location' WHERE uname='$user'");
            echo "file uploaded";
            header("location: profile.php?u=$user");
            exit();
          }
          else
          {
          foreach ($errors as $error)
           
            echo  $error , '<br/>';
          
          }
          
        
        
}
  }
?>
