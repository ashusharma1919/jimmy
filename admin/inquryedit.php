<?php
include_once "topbar.php";
include_once "rightside.php";

if(isset($_GET['updateid'])){
    $pass = $_GET['updateid'];
    $data = "SELECT * FROM `contact` WHERE id='{$pass}'";
    $check = mysqli_query($con,$data);
    $row = mysqli_fetch_assoc($check);
}else{
    echo redirect('admin/add.php');
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
                            <h3 class="card-title">Show Contact</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="POST">
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="hidden" value="<?php echo @$row['id'] ?>" name="id">
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" name="name" value="<?php echo @$row['name']?>" readonly>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter email" name="email"value="<?php echo @$row['email']?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Mob</label>
                                <input type="number" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter phone" name="phone"value="<?php echo @$row['phone']?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Message</label>
                                <textarea  name="mess" class="form-control"id="exampleInputEmail1"
                                placeholder="Enter description" readonly><?php echo strip_tags(@$row['mess']) ?>"
                                    </textarea>
                            </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php require_once("footer.php"); ?>