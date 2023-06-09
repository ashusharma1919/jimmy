<?php

include_once "topbar.php";
include_once "rightside.php";

$query = "SELECT * FROM `menu`";
$match = mysqli_query($con,$query);
$results = mysqli_num_rows($match);
if($results > 0){

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
<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $sec = $_POST['menu'];
    $query = "INSERT INTO `set_section`(`id`,`menudrop`,`secname`)VALUES(NULL,'{$name}','{$sec}')";
    $check = mysqli_query($con,$query);
    if($check){
        echo "data has been insert";
    }else{
        echo "data don't insert";
    }
}

?>
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
                                    <select class="form-control" name="name">
                                    <?php
                                            while($row = mysqli_fetch_assoc($match)){
                                            ?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['menuName']?></option>
                                    <?php }  ?>
                                    </select>
                                    
                            </div>
                            <?php  } ?>
                            <div class="form-group">
                            <select class="form-control " name="menu">
                                <option value="content">Home</option>
                                    <option value="about">ABOUT US</option>
                                    <option value="services">Services</option>
                                    <option value="portfolio">Portfolio</option>
                                    <option value="testimonials">Testimonials</option>
                                    <option value="contact">Contact</option>
                                    </select> 
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