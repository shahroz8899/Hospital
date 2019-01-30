<?php
	include_once 'layouts/header-sp.php';
?>

<div class="body-overlay"></div>

<div id="wrapper" class="clearfix">
 	<!-- preloader 
 	<?php include_once 'layouts/preloader.php'; ?>-->
 	
 	<!-- Header -->
  	<?php include_once 'layouts/top-header.php'; ?>

	  <!-- Start main-content -->
	  <div class="main-content">
	    <!-- Section: home -->
	    <section id="home" class="divider">
	      <div class="container-fluid p-0">
	        <!-- Slider -->
	        <?php include_once 'layouts/slider.php'; ?>
	      </div>
	    </section>

	    <!-- About Section -->
	    <?php include_once 'layouts/section-about.php'; ?>

	    <!-- About Section -->
	    <?php include_once 'layouts/section-service.php'; ?>

	    <!-- Specialities Section -->
	    <?php include_once 'layouts/section-specialities.php'; ?>

	    <!-- Specialities Doctor -->
	    <?php include_once 'layouts/section-doctor.php'; ?>

	    <!-- Top Prices -->
	    <?php include_once 'layouts/section-top-prices.php'; ?>
	  </div>
  <!-- end main-content -->
 
<?php
	include_once 'layouts/footer-sp.php';
?>