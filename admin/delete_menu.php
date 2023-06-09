<?php
include_once "topbar.php";
include_once "rightside.php";
$pass = $_GET['deleteid'];
$query = "DELETE FROM `menu` WHERE id='{$pass}'";
$results = mysqli_query($con,$query);
mysqli_query($con, "DELETE FROM `set_section` WHERE menudrop='{$pass}'");

if($results){
    echo "<script>alert('Data has  been deleted successfully!')</script>";
    echo redirect('admin/menu_show.php');
   
}else{
    echo "<script>alert('Data has not been deleted successfully!')</script>";
}
?>