<?php
include_once "topbar.php";
include_once "rightside.php";

if(isset($_GET['updateid'])){
    $pass = $_GET['updateid'];
    $data = "SELECT * FROM `portmenu` WHERE id='{$pass}'";
    $check = mysqli_query($con,$data);
    $row = mysqli_fetch_assoc($check);
}else{
    echo redirect('add.php');
}


if(isset($_POST['submit'])){
    $name = $_POST['menu'];
    $id = $_POST['id'];
    $sqlInsert = "UPDATE `portmenu` SET `menuName`='{$name}' WHERE id='{$id}'";
    $result = mysqli_query($con, $sqlInsert);
    if($result){
        echo "<script>alert('Data has been updated successfully!')</script>";
        echo redirect('admin/menu_show.php');
    }else{
        echo "<script>alert('Data has not been updated successfully!')</script>";
        mysqli_error($con);
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
                            <h3 class="card-title"> Menu-UpdateData</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="" method="POST">
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="hidden" value="<?php echo @$row['id'] ?>" name="id">
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" name="menu" value="<?php echo @$row['menuname']?>">
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