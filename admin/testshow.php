<?php
include_once "topbar.php";
include_once "rightside.php";

$query = "SELECT * FROM `testimonials`";
$match = mysqli_query($con,$query);
$results = mysqli_num_rows($match);
if($results > 0){
?>
<!-- <section class="content"> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-striped dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Image</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Post</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Telent</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Summary</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Actions</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            while($row = mysqli_fetch_assoc($match)){
                                            ?>
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                <?php echo $row['id']?>
                                            </td>
                                           
                                            <td><img src="<?php echo $link2."upload/".$row['photo'] ?>" alt=""
                                                width="50" height="50">
                                            </td>
                                            <td>
                                                <?php echo $row['name']?>
                                            </td>
                                            <td>
                                                <?php echo $row['post']?>
                                            </td>
                                            <td>
                                                <?php echo $row['tenent']?>
                                            </td>
                                            <td>
                                                <?php echo $row['descn']?>
                                            </td>

                                            <td>
                                                <a href="testedit.php?updateid=<?php echo $row['id']?>"
                                                    class="btn btn-sm btn-success">Edit</a>
                                                <a href="testdelete.php?deleteid=<?php echo $row['id']?>"
                                                    class="btn btn-sm btn-danger">Delete</a>
                                            </td>

                                        </tr>
                                        <?php
                                            }
                                           ?>
                                    </tbody>
                                </table>
                                <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<!-- </section> -->

<?php
include_once "footer.php";

?>