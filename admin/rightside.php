<?php
include_once('../confi.php');
require_once('redirect.php');

$editQuery = "SELECT * FROM `logo`";
$query = mysqli_query($con, $editQuery);
$row = mysqli_fetch_assoc($query);
?>

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $link2."upload/".$row['logos'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= $link2."admin"?>" class="d-block">Company Name</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?= $link2."admin" ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="<?=$link2?>" class="nav-link" target="_blank">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Go To Site
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Site Options
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="logo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top logo </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="fevicon.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top fevicon</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Menu_item
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add_Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="menu_show.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show_menu</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Fix-section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="fixsection.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="fixsectionshow.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Section</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Sliders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="s_add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="s_show.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Slider</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
              About
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="abt_add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add summary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="abt_show.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show summary</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
              Service
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ser_add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ser_show.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Service</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
              Portfolio
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="port_menuadd.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> PortAdd_Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="port_menushow.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PortShow_menu</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="port_photoadd.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PortAdd_photo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="port_photoshow.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PortShow_photo</p>
                </a>
              </li>
              
            </ul>
          </li>

          <!-- ------------- -->


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
              Testimonials
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="testadd.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add person</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="testshow.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show person</p>
                </a>
              </li>

            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Contact Form
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <!-- <li class="nav-item">
                <a href="inqury.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add inquiry</p>
                </a>
              </li> -->

              <li class="nav-item">
                <a href="inquryshow.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show inquiry</p>
                </a>
              </li>
              
            </ul>
          </li>

          <!-- ---------------------- -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">