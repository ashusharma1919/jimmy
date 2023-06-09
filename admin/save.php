<?php
// include_once "topbar.php";
// include_once "rightside.php";
// if(isset($_FILES['image'])){
// $errors = array();
// $file_name = $_FILES['image']['name'];
// $file_size = $_FILES['image']['size'];
// $file_temp = $_FILES['image']['tmp_name'];
// $file_type = $_FILES['image']['type'];
// $file_ext = strtolower(end(explode('.',$file_name)));
// $extension = array("jpeg","jpg","png");
// if(in_array($file_ext,$extension)=== false)
// {
//     $errors[] = "this file not allowed"; 
// }
// if($file_size > 2097152){
//     $errors[] = "this file size  notallowed."; 
// }
// if(empty($errors) == true){
//     move_uploaded_file($file_temp,"../upload/".$file_name);

// }else{
//     print_r($errors);
//     die();
// }
// };

// $title = mysqli_real_escape_string($con,$_POST['til']);
// $favicon = mysqli_real_escape_string($con,$_POST['favi']);
// $date = date("d m, y");


// $sql = "INSERT INTO logo(`title`,`fevi`,`logos`) VALUES('{$title}','{$favicon}','{$file_name}')";
// if(mysqli_query($con,$sql)){
//     header('location:add.php');
// }else{
//     echo "<script>alert(query not run)</script>";
// }

echo "<pre>";
print_r($_FILES);

?>