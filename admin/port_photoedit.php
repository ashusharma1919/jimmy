<?php

include_once "topbar.php";
include_once "rightside.php";
$pass = $_GET['updateid'];
$editQuery = "SELECT * FROM `portphoto`WHERE id='{$pass}'";
$query = mysqli_query($con, $editQuery);
$row = mysqli_fetch_assoc($query);

if(isset($_POST['submit'])){
    $count_error = 0;
    if(!empty($_FILES['image']['name'])){
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $extension = array("jpeg","jpg","png");
        if(in_array($file_ext,$extension)=== true){
            if($file_size < 2097152){
                $imagePath = time().rand(100,999).".".$file_ext;
                move_uploaded_file($file_temp,"../upload/".$imagePath);
            }else{
                $error = "this file size not allowed."; 
                $count_error = 1;
            }
        }else{
            $error = "this file not allowed"; 
            $count_error = 1;
        }
    }else{
        $imagePath = $_POST['old-image'];
    }
    
    if(!$count_error){
        $desc = implode(", ",$_POST['name']);
        
        $id = $_POST['id'];
        $query = "UPDATE `portphoto` SET `menuid`='{$desc}',`image`='{$imagePath}'WHERE id='{$id}'";
        $checkQuery = mysqli_query($con,$query);
        if($checkQuery){
            echo "<script>alert('data updated')</script>";
            echo redirect('admin/port_photoshow.php');
        }else{
            echo "<script>alert('wrong')</script>";
        }
    }else{
        echo "<script>alert('{$error}')</script>";
    }
}
?>



<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>General Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">General Form</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">update</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                
                                <input type="hidden" value="<?php echo @$row['id'] ?>" name="id">

                                <div class="form-check form-check-inline">
                                        <?php
                                        $showQuery = "SELECT * FROM `portmenu`";
                                        $check = mysqli_query($con, $showQuery);
                                        $numRows = mysqli_num_rows($check);
                                            if($numRows > 0){
                                                while($result = mysqli_fetch_assoc($check)){
                                                $photoId = explode(', ',$row['menuid']);
                                                $menu11 = str_replace(' ','_',$result['menuname']);
                                                if(in_array($menu11, $photoId)){
                                                    $checked = "checked";
                                                }else{
                                                    $checked = "";
                                                }
                                        ?>
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?= str_replace(" ","_", $result['menuname']) ?>" name="name[]" <?php echo $checked ?>>
                                            <label class="form-check-label" for="inlineCheckbox1"><?= $result['menuname'] ?></label>&nbsp&nbsp&nbsp
                                        <?php } } ?>
                                </div>

                            </div>

                           
                            <img src="<?php echo $link2."upload/".$row['image'] ?>" alt="" width="50" height="50">
                            
                            <div class="form-group">
                                <label for="exampleInputFile"></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                        <input type="hidden" class="custom-file-input" name="old-image" id=""
                                            value="<?= $row['image'] ?>">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>
                            </div>



                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once("footer.php"); ?>