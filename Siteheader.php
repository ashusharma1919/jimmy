<?php
include_once('confi.php');
require_once('admin/redirect.php');
$editQuery = "SELECT * FROM `logo`";
$query = mysqli_query($con, $editQuery);
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title><?= $row['title'] ?></title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top" class="politics_version">

    <!-- LOADER -->
    <div id="preloader">
        <div id="loader">
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
    </div><!-- end loader -->
    <!-- END LOADER -->
	
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
			<img class="img-fluid" src="<?php echo $link2."upload/".$row['logos'] ?>" alt="" />
		</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

    <?php
      $query = "SELECT * FROM `menu` ORDER BY position DESC";
      $match = mysqli_query($con,$query);
      $results = mysqli_num_rows($match);
      if($results > 0){
    ?>
          <ul class="navbar-nav text-uppercase ml-auto">
            <?php
            $count = 1;
              while($row = mysqli_fetch_assoc($match)){
                if($count == 1){
                  $sectionId = "content";
                }else{
                  $sectionId = strtolower(str_replace(' ','',$row['menuName']));
                }
            ?> 
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger active" href="#<?php echo $sectionId ?>"><?php echo $row['menuName'] ?></a>
              </li>

              
            <?php $count++; } ?>
          </ul>
    <?php } ?>
        </div>
      </div>
    </nav>
	
