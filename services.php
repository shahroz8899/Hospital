<?php
	include_once 'layouts/header-sp.php';
?>

<div class="body-overlay"></div>

<div id="wrapper" class="clearfix">

  	<?php include_once 'layouts/top-header.php'; ?>

  	  <!-- Start main-content -->
  	<div class="main-content">
	    <!-- Section: inner-header -->
	    <section class="inner-header divider layer-overlay overlay-deep" data-bg-img="images/bg/bg5.jpg">
	      <div class="container pt-90 pb-50">
	        <!-- Section Content -->
	        <div class="section-content">
	          <div class="row"> 
	            <div class="col-md-12 xs-text-center">
	              <h3 class="font-28">Services</h3>
	              <ol class="breadcrumb white mt-10">
	                <li><a href="#">Home</a></li>
	                <li class="active text-theme-colored">Services</li>
	              </ol>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>

	    <?php 
	    	include_once 'layouts/section-service.php';
	    	include_once 'layouts/section-specialities.php';
		?>

	</div>

</div>

<?php
	include_once 'layouts/footer-sp.php';
?>