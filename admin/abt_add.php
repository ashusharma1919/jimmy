<?php
include_once "topbar.php";
include_once "rightside.php";


$count_error = 0;

if(isset($_POST['submit'])){
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
        $error = "plz select image"; 
        $count_error = 1;
    }
    
    if(!$count_error){
        $area = $_POST['name'];
        $link = $_POST['link'];
        $query = "INSERT INTO `about`(`description`,`image`,`link`) VALUES('{$area}','{$imagePath}','{$link}')";
        $checkQuery = mysqli_query($con,$query);
        if($checkQuery){
            echo "<script>alert('data has been added successfully')</script>";
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
                        <h3 class="card-title">About Add</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                    <label for="">File</label>
                                    <input type="file" class="form-control" name="image" id="exampleInputFile">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Btn link</label>
                                <input type="url" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter link" name="link">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea id="tiny" name="name" class="form-control"id="exampleInputEmail1"
                                placeholder="Enter description">
                                    </textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <input type="submit" name="submit"  class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>





<?php require_once("footer.php"); ?>