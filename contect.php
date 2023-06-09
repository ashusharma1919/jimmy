<?php
include_once "confi.php"; 
require_once('admin/redirect.php');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      


$count_error = 0;

if(isset($_POST['submit'])){
  
    echo redirect('index.php');
    die;
        // $name = $_POST['name'];
        // $email = $_POST['email'];
        // $mob = $_POST['phone'];
        // $message = $_POST['mess'];

        // $query = "INSERT INTO `contact` (`name`,`email`,`phone`,`mess`) VALUES('{$name}','{$email}','{$mob}','{$message}')";
        // $checkQuery = mysqli_query($con,$query);
        // if($checkQuery){
        //     echo "<script>alert('Thank you the form was submitted successfully')</script>";
        //     echo redirect('/');
        // }else{
        //     echo "<script>alert('wrong')</script>";
        // }
    }

 ?>
