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
	              <h3 class="font-28">Appoinment</h3>
	              <ol class="breadcrumb white mt-10">
	                <li><a href="#">Home</a></li>
	                <li><a href="#">Pages</a></li>
	                <li class="active text-theme-colored">Appoinment</li>
	              </ol>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>

	    <!-- Section: Appointment -->
	    <section>
	      <div class="container pb-0">
	        <div class="section-content">
	          <div class="row">
	            <div class="col-md-7">
					<h4 class="text-theme-colored title-border mt-0">Make An appointment Now</h4>
					<p class="mb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro similique ipsa deleniti doloribus fuga dicta id voluptate, excepturi nostrum cupiditate</p>

	              <!-- Appointment Form Sart-->
		            <form id="appointment_form" name="appointment_form" class="form-transparent mt-30" method="post" action="http://thememascot.net/demo/html/health-beauty/medical/medinova-html/v3.2/demo/includes/appointment.php">
		                <div class="row">
		                  <div class="col-sm-6">
		                    <div class="form-group mb-10">
		                      <input id="form_name" name="form_name" class="form-control" type="text" required="" placeholder="Enter Name" aria-required="true">
		                    </div>
		                  </div>
		                  <div class="col-sm-6">
		                    <div class="form-group mb-10">
		                      <input id="form_phone" name="form_phone" class="form-control required" type="text" placeholder="Enter Phone" aria-required="true">
		                    </div>
		                  </div>                 
		                </div>
		                <div class="row">
		                  <div class="col-sm-6">
		                    <div class="form-group mb-10">
		                      <input id="form_email" name="form_email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
		                    </div>
		                  </div> 
		                  <div class="col-sm-6">
		                    <div class="form-group mb-10">
		                      <input name="form_appontment_date" class="form-control required datetime-picker" type="text" placeholder="Appoinment Date & Time" aria-required="true">
		                    </div>
		                  </div>
		                </div>
		                <div class="form-group mb-10">
		                  <textarea id="form_message" name="form_message" class="form-control required" data-height="120px" placeholder="Enter Message" rows="5" aria-required="true"></textarea>
		                </div>
		                <div class="form-group mb-0 mt-20">
		                  <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
		                  <button type="submit" class="btn btn-dark btn-theme-colored btn-lg btn-flat" data-loading-text="Please wait...">Submit Now</button>
		                </div>
		            </form>
	              
					<!-- Appointment Form Validation-->
					<script type="text/javascript">

					</script>
					<!-- Appointment Form Ends -->

	            </div>
	            <div class="col-md-5">
	              <img alt="" src="images/photos/1.png" class="img-responsive img-fullwidth">
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	</div>
</div>

<?php
	include_once 'layouts/footer-sp.php';
?>