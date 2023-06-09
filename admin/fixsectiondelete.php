<?php
include_once "topbar.php";
include_once "rightside.php";
$pass = $_GET['deleteid'];
$query = "DELETE FROM `set_section` WHERE id='{$pass}'";
$results = mysqli_query($con,$query);
if($results){
    echo "<script>alert('Data has  been deleted successfully!')</script>";
    echo redirect('admin/fixsectionshow.php');
   
}else{
    echo "<script>alert('Data has not been deleted successfully!')</script>";
}
?>