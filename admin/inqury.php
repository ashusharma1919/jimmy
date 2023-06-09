<?php
include_once "topbar.php";
include_once "rightside.php";


$count_error = 0;

if(isset($_POST['submit'])){
  
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mob = $_POST['phone'];
        $message = $_POST['mess'];

        $query = "INSERT INTO `contact` (`name`,`email`,`phone`,`mess`) VALUES('{$name}','{$email}','{$mob}','{$message}')";
        $checkQuery = mysqli_query($con,$query);
        if($checkQuery){
            echo "<script>alert('data has been added successfully')</script>";
        }else{
            echo "<script>alert('wrong')</script>";
        }
    }

 ?>
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Inquiry form </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Inquiry form</li>
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
                        <h3 class="card-title">Inquiry form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter name" name="name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Mob</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter phone" name="phone">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Message</label>
                                <textarea id="tiny" name="mess" class="form-control"id="exampleInputEmail1"
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