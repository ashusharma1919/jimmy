<?php
include_once "topbar.php";
include_once "rightside.php";
 
$editquery = "SELECT * FROM `logo`";
$ckeck = mysqli_query($con,$editquery);
$results = mysqli_fetch_assoc($ckeck);
$errorcount = 0;

if(isset($_POST['submit'])){
    if(!empty($_FILES['image']['name'])){
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
        $extension = array("jpeg","jpg","png","icon");
            if(in_array($file_ext,$extension)===true){
                if($file_size< 2097152){
                    $imagePath = time().rand(100000,999999).".".$file_ext;
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
    if(!$errorcount){
        $upquery = "UPDATE `logo` SET `fevi`='{$imagePath}'";
        $check = mysqli_query($con,$upquery);
        if($check){
            echo "<script>alert('data updeted')</script>";
        }else{
            echo "<script>alert('dont'updated)</script>";
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
                            <h3 class="card-title">UpdateData</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <img src="<?php echo $link2."upload/".$results['fevi'] ?>" alt="" width="150" height="150">
                                <div class="form-group">
                                    <label for="exampleInputFile">Fevion</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                            <input type="hidden" class="custom-file-input" name="old-image" id="" value="<?= $results['fevi'] ?>">
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