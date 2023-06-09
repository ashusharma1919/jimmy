<?php

include_once "topbar.php";
include_once "rightside.php";

$editQuery = "SELECT * FROM `logo`";
$query = mysqli_query($con, $editQuery);
$row = mysqli_fetch_assoc($query);

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
        $imagePath = $_POST['old-image'];
    }
    
    if(!$count_error){
        $title = $_POST['til'];
        $query = "UPDATE `logo` SET `title`='{$title}', `logos`='{$imagePath}'";
        $checkQuery = mysqli_query($con,$query);
        if($checkQuery){
            echo "<script>alert('right')</script>";
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
                    <h1>Update Logo & Title</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Logo & Title</li>
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
                            <h3 class="card-title">UpdateData</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">title</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" name="til" value="<?= $row['title'] ?>">
                                </div>

                                <img src="<?php echo $link2."upload/".$row['logos'] ?>" alt="" width="150" height="150">
                                <div class="form-group">
                                    <label for="exampleInputFile">logo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                            <input type="hidden" class="custom-file-input" name="old-image" id="" value="<?= $row['logos'] ?>">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input type="submit"name="submit" value="Submit" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php require_once("footer.php"); ?>