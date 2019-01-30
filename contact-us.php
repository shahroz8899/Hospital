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
	              <h2 class="font-28">Contact</h2>
	              <ol class="breadcrumb white mt-10">
	                <li><a href="#">Home</a></li>
	                <li class="active text-theme-colored">Contact</li>
	              </ol>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>

	    <!-- Divider: Contact -->
	    <section class="divider overlay-deep">
	      <div class="container">
	        <div class="row pt-30">
	          <div class="col-md-7">
	            <h3 class="line-bottom mt-0 mb-30">Interested in discussing?</h3>
	            <!-- Contact Form -->
	            <form id="contactus-form" name="contactus-form" class="form-transparent">
	              <div class="row">
	                <div class="col-sm-6">
	                  <div class="form-group">
	                    <label for="form_name">Name <small>*</small></label>
	                    <input id="username" name="username" class="form-control" type="text" placeholder="Enter Name" required>
	                  </div>
	                </div>
	                <div class="col-sm-6">
	                  <div class="form-group">
	                    <label for="form_email">Email <small>*</small></label>
	                    <input id="email" name="email" class="form-control email" required type="email" placeholder="Enter Email">
	                  </div>
	                </div>
	              </div>
	              <div class="row">
	                <div class="col-sm-6">
	                  <div class="form-group">
	                    <label for="form_phone">Phone <small>*</small></label>
	                    <input id="phone" name="phone" class="form-control" type="text" required placeholder="Enter Phone">
	                  </div>
	                </div>
	                <div class="col-sm-6">
	                  <div class="form-group">
	                    <label for="form_name">Subject <small>*</small></label>
	                    <input id="subject" name="subject" class="form-control" required type="text" placeholder="Subject Or Purpose">
	                  </div>
	                </div>
	                
	              </div>
	              <div class="form-group">
	                <label for="form_name">Message <small>*</small></label>
	                <textarea id="message" name="message" class="form-control" required rows="5" placeholder="Enter Message"></textarea>
	              </div>
	              <div class="form-group">
	                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
	                <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="Please wait...">Send your message</button>
	                <button type="button" class="btn btn-default btn-flat btn-theme-colored" onclick="reset_form()">Reset</button>
	              </div>
	            </form>
	          </div>
	          <div class="col-md-5">
	            <h3 class="line-bottom mt-0">Get in touch with us</h3>
	            <p>Aliquam officia dolor rerum enim doloremque iusto eos atque tempora dignissimos similique, quae, maxime sit accusantium delectus.</p>
	            <ul class="styled-icons icon-dark icon-sm icon-circled mb-20">
	              <li><a href="#" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
	              <li><a href="#" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
	              <li><a href="#" data-bg-color="#4C75A3"><i class="fa fa-vk"></i></a></li>
	              <li><a href="#" data-bg-color="#D9CCB9"><i class="fa fa-instagram"></i></a></li>
	              <li><a href="#" data-bg-color="#D71619"><i class="fa fa-google-plus"></i></a></li>
	              <li><a href="#" data-bg-color="#A4CA39"><i class="fa fa-android"></i></a></li>
	              <li><a href="#" data-bg-color="#4C75A3"><i class="fa fa-vk"></i></a></li>
	            </ul>

	            <div class="icon-box media bg-deep mb-15" style="padding: 10px; padding-left: 20px;"> 
	            	<a class="media-left pull-left flip mr-20" href="#"> <i class="pe-7s-map-2 text-theme-colored"></i></a>
		            <div class="media-body">
		            	<h5 class="mt-0">Our Office Location</h5>
		                <p><?= $address ?></p>
		            </div>
	            </div>
	            <div class="icon-box media bg-deep mb-15" style="padding: 10px; padding-left: 20px;"> 
	            	<a class="media-left pull-left flip mr-15" href="#"> <i class="pe-7s-call text-theme-colored"></i></a>
	            	<div class="media-body">
	                	<h5 class="mt-0">Contact Number</h5>
	                	<p><a href="tel:+325-12345-65478"><?= $contact_num ?></a></p>
	              	</div>
	            </div>
	            <div class="icon-box media bg-deep mb-15" style="padding: 10px; padding-left: 20px;">
	            	<a class="media-left pull-left flip mr-15" href="#"> <i class="pe-7s-mail text-theme-colored"></i></a>
	              	<div class="media-body">
	                	<h5 class="mt-0">Email Address</h5>
	                	<p><a href="mailto:supporte@yourdomin.com"><?= $email ?></a></p>
	              	</div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	    
	    <!-- Divider: Google Map -->
	    <section>
	      <div class="container-fluid pt-0 pb-0">
	        <div class="row">
	        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.3593252912433!2d74.29100231463076!3d31.514289554596587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190375cf5c0eb1%3A0x30d78daf8a0832e4!2sThe+Family+Clinic!5e0!3m2!1sen!2s!4v1543914032068" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
	          <!-- Google Map HTML Codes 
	          <div 
	            id="map-canvas-multipointer"
	            data-mapstyle="default"
	            data-height="500"
	            data-zoom="12"
	            data-marker="images/map-marker.png">
	          </div>
	          <script src="http://maps.google.com/maps/api/js?key=AIzaSyAYWE4mHmR9GyPsHSOVZrSCOOljk8DU9B4"></script>
	          <script src="js/google-map-init-multilocation.js"></script>
-->
	        </div>
	      </div>
	    </section>
	</div>
  	<!-- end main-content -->
</div>

<?php
	include_once 'layouts/footer-sp.php';
?>

<script type="text/javascript">
	function reset_form(){
		$('#contactus-form').trigger("reset");
	}
    $(document).ready(function(){
        $("#contactus-form").submit(function(event){
            event.preventDefault();
            var username       = $("#username").val().trim();
            var phone          = $("#phone").val().trim();
            var email          = $("#email").val().trim();
            var subject        = $("#subject").val().trim();
            var message        = $("#message").val().trim();

            // if((username != '') && (phone != '') && (email != '') && (subject != '') && (message != ''))
            // {
                var formData = new FormData(this);
                $.ajax({
                    url: 'ajax/submit-contactus.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data == 'submitted')
                        {
                            alert("Contact us","Thank you for contacting us. We'll contact you soon.");
                             $("#contactus-form")['0'].reset();
                        }
                        else if(data == 'required')
                        {
                            error_sweatAlert("Contact us","Please provide all credentials");
                        }
                    },
                    error: function(data){
                        error_sweatAlert("Contact us","Error: " + data);
                    }
                });
            // }
            // else
            // {
            //     warning_sweatAlert("Contact us","Please provide all credentials");
            // }
        });
    });
</script>