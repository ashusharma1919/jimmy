<?php
include_once "topbar.php";
include_once "rightside.php";


if(isset($_POST['submit'])){
    $name = $_POST['menu'];
    $query = "INSERT INTO `portmenu`(`id`,`menuname`)VALUES(NULL,'{$name}')";
    $check = mysqli_query($con,$query);
    if($check){
        echo "data has been insert";
    }else{
        echo "data don't insert";
    }
}


?>


<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Portfolio Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">port_menu Form</li>
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
                            <h3 class="card-title">InsertData</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="POST">
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" name="menu">
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