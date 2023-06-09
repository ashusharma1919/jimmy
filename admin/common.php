<?php
function imageUpload($query){
    if(isset($_FILES[$query]['name'])){
        $error = array();
        $file_name = $_FILES[$query]['name'];
        $file_size = $_FILES[$query]['size'];
        $file_tmp = $_FILES[$query]['tmp_name'];
        $file_type = $_FILES[$query]['type'];
        //  $file_ext = strtolower(end(explode('.', $file_name)));
         $file_ext = pathinfo($file_name,PATHINFO_EXTENSION);
        $extension = array("jpeg","jpg","png");
    
        if(in_array($file_ext, $extension) == false){
            $error[] = "This extension file not allowed, Please choose a JPG or PNG file";  
            echo "extension not matched";
        }
        if($file_size >= 2097152){
            $error[] = "File size must be 2MB or lower";
            echo "file size above";
        }
        if(empty($error) == true){
            move_uploaded_file($file_tmp,"../upload/".$file_name);
            return $file_name;
        }else{
            print_r($error);
            echo "something went wrong";
            die();
        }
    }
}

?>