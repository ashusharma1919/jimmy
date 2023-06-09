<?php
// $link2 = "http://localhost/mywebapp";
require_once("Siteheader.php");
require_once('admin/redirect.php');
$query = "SELECT * FROM `slaider`";
$match = mysqli_query($con,$query);
$results = mysqli_num_rows($match);
if($results > 0){

?>


<div id="content">
	<div id="slider">
	<?php
		$count = 1;
         while($row = mysqli_fetch_assoc($match)){
     ?>
		<img src="<?php echo $link2."upload/".$row['s_img'] ?>" alt="<?php echo $row['s_name'] ?>" data-url="#<?php $count ?>">
	<?php
		$count++; }?>
	</div>
	</div>
<?php } ?>


<?php

	$menuList = "SELECT * FROM `menu`";
	$menuResult = mysqli_query($con, $menuList);
	$menuCount = mysqli_num_rows($menuResult);
	
	while($menuRow = mysqli_fetch_assoc($menuResult)){
		$sectionList = "SELECT * FROM `set_section` WHERE `menudrop`='{$menuRow['id']}'";
		$sectionResult = mysqli_query($con, $sectionList);
		$sectionCount = mysqli_num_rows($sectionResult);

		while($sectionRow = mysqli_fetch_assoc($sectionResult)){
?>



	<?php
	if($sectionRow['secname'] == 'about'){
		$query = "SELECT * FROM `about`";
		$match = mysqli_query($con,$query);
		$results = mysqli_num_rows($match);
		$row = mysqli_fetch_assoc($match)
	?>
	<div id="<?php echo strtolower(str_replace(' ','',$menuRow['menuName'])) ?>" class="section wb">
		<div class="container">
			<div class="row">
			<div class="col-md-6">
				<div class="right-box-pro">
					<img src="<?php echo $link2."upload/".$row['image'] ?>" alt="" class="img-fluid img-rounded">
					<div class="card-back"></div>
					<div class="card-front"></div>
				</div><!-- end media -->
			</div><!-- end col -->
			
			<div class="col-md-6">
				<div class="message-box">
					<div><?php echo $row['description']?></div>
					<?php
					if(!empty($row['link'])){
					?>
					<a href="<?php echo $row["link"]?>" class="sim-btn btn-hover-lt"><span class="btn-text">Download CV</span></a>
				<?php
					}else{
						echo "<div class='sim-btn btn-hover-lt'></div>";
					}
				?>
				</div><!-- end messagebox -->
			</div><!-- end col -->

		</div><!-- end row -->
	</div><!-- end container -->
	</div><!-- end section -->
	<?php } ?>




	<?php
	if($sectionRow['secname'] == 'services'){
		$query = "SELECT * FROM `services`";
		$match = mysqli_query($con,$query);
		$results = mysqli_num_rows($match);
		if($results > 0){
	?>
	<div id="<?php echo strtolower(str_replace(' ','',$menuRow['menuName'])) ?>" class="section lb">
		<div class="container">
			<div class="section-title text-center">
				<h3>Services</h3>
				<p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.</p>
			</div><!-- end title -->

			

			<div class="row">
			<?php
				while($row = mysqli_fetch_assoc($match)){
			?>
				<div class="col-md-4">
					<div class="services-inner-box btn-hover-lt">
						<div class="ser-icon" style="position:relative;">
							<?php if(!empty($row['icon'])){ ?>
								<i class="<?php echo $row['icon']?>"></i>
							<?php
							}else{ ?>

								<img src="<?php echo $link2."upload/".$row['image'] ?>" alt="" width="50px" height="65px" style="background:red;">
							<?php } ?>
						</div>
						
						<div><?php echo $row['service']?></div>
					</div>
				</div><!-- end col -->
			<?php
				}
			?>
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->
	<?php } } ?>



	<?php
		if($sectionRow['secname'] == 'portfolio'){
	?>
	<div id="<?php echo strtolower(str_replace(' ','',$menuRow['menuName'])) ?>" class="section lb">
		<div class="container">
			<div class="section-title text-center">
				<h3>Portfolio</h3>
				<p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.</p>
			</div><!-- end title -->

			<div class="gallery-menu row text-center">
				<div class="col-md-12">
					<div class="button-group filter-button-group">
						<button class="active" data-filter="*">All</button>
						<?php 
							$query = "SELECT * FROM `portmenu`";
							$match = mysqli_query($con,$query);
							$results = mysqli_num_rows($match);
							if($results > 0){
								while($row = mysqli_fetch_assoc($match)){
									echo '<button data-filter=".'.str_replace(" ","_",$row['menuname']).'">'.$row['menuname'].'</button>';
								}
							}
						?>
						<!-- <button data-filter=".gal_b">Creative Design</button>
						<button data-filter=".gal_c">Graphic Design</button> -->
					</div>
				</div>
			</div>

			<div class="gallery-list row">
				<?php
					$queryP = "SELECT * FROM `portphoto`";
					$matchP = mysqli_query($con,$queryP);
					$resultsP = mysqli_num_rows($matchP);
					if($resultsP > 0){
						while($rowp = mysqli_fetch_assoc($matchP)){
							$menuVal = explode(", ",$rowp['menuid']);
							$strVal = implode(' ',$menuVal);
							// foreach($menuVal as $key=>$value){
							// 	echo $value;
							// }
				?>
				<div class="col-md-4 col-sm-6 gallery-grid <?= $strVal ?>">
					<div class="gallery-single fix">
						<img src="<?php echo $link2."upload/".$rowp['image'] ?>" class="img-fluid" alt="Image">
						<div class="img-overlay">
							<a href="<?php echo $link2."upload/".$rowp['image'] ?>" data-rel="prettyPhoto[gal]"
								class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				<?php } } ?>
			</div>
		</div>
	</div>
	</div>
	<?php } ?>



	<?php 
		if($sectionRow['secname'] == 'testimonials'){
	?>
	<div id="testimonials" class="section wb">
		<div class="container">
			<div class="section-title text-center">
				<h3>Testimonials</h3>
				<p>We thanks for all our awesome testimonials! There are hundreds of our happy customers! </p>
			</div><!-- end title -->

			<?php
			
					$query = "SELECT * FROM `testimonials`";
					$match = mysqli_query($con,$query);
					$results = mysqli_num_rows($match);
					if($results > 0){
					?>
			

			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="testi-carousel owl-carousel owl-theme">
					<?php
						while($rowp = mysqli_fetch_assoc($match)){
				?>
						<div class="testimonial clearfix">
							<div class="testi-meta">
								<img src="<?php echo $link2."upload/".$rowp['photo'] ?>" alt="" class="img-fluid">
								<h4><?php echo $rowp['name'] ?> <small>-<?php echo $rowp['post'] ?> </small></h4>
							</div>
							<!-- end testi-meta -->
							<div class="desc">
								<h3><i class="fa fa-quote-left"></i> <?php echo $rowp['tenent'] ?></h3>
								<p class="lead"><?php echo $rowp['descn'] ?>.</p>
							</div>
						</div>
						<?php
						}}?>
						
					</div><!-- end carousel -->
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->
	<?php } ?>


	<?php 
		if($sectionRow['secname'] == 'contact'){
	?>
	<div id="<?php echo strtolower(str_replace(' ','',$menuRow['menuName'])) ?>" class="section db">
		<div class="container">
			<div class="section-title text-center">
				<h3>Contact</h3>
				<p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.</p>
			</div><!-- end title -->

			<div class="row">
				<div class="col-md-12">
					<div class="contact_form">
						<div id="message"></div>
						<form action="contect.php" method="POST">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" id="name" type="text"name="name" placeholder="Your Name"
											required="required" data-validation-required-message="Please enter your name.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<input class="form-control" id="email"name="email" type="email" placeholder="Your Email"
											required="required"
											data-validation-required-message="Please enter your email address.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group">
										<input class="form-control" id="phone" name="phone" type="tel" placeholder="Your Phone"
											required="required"
											data-validation-required-message="Please enter your phone number.">
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea class="form-control"name="mess" id="message" placeholder="Your Message"
											required="required"
											data-validation-required-message="Please enter a message."></textarea>
										<p class="help-block text-danger"></p>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-lg-12 text-center">
									<div id="success"></div>
									<button id="sendMessageButton" class="sim-btn btn-hover-lt"name="submit" type="submit"><span
											class="btn-text">Send Message</span></button>
								</div>
							</div>
						</form>
					</div>
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->
	<?php } ?>


<?php
	}
}
require_once("Sitefooter.php");
?>