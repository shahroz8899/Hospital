<header id="header" class="header">
    <div class="header-top bg-theme-colored sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="widget no-border m-0">
              <ul class="social-icons icon-dark icon-theme-colored icon-sm sm-text-center">
                <li><a href="<?= $facebook ?>"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?= $twitter ?>"><i class="fa fa-twitter"></i></a></li>
                <li><a href="<?= $google_plus ?>"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="<?= $linkedin ?>"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-9">
            <div class="widget no-border m-0">
              <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="text-white" href="#"><?= $contact_num ?></a> </li>
                <li class="text-white m-0 pl-10 pr-10"> <i class="fa fa-clock-o text-white"></i> <?= $timing ?></li>
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="#"><?= $email ?></a> </li>
                <li class="sm-display-block mt-sm-10 mb-sm-10">
                  <!-- Modal: Appointment Starts -->
                  <a class="bg-light p-5 text-theme-colored font-11 pl-10 pr-10" style="cursor: pointer;" data-toggle="modal" data-target="#modal_appontment_form_at_about">Make an Appointment</a>
                  <!-- Modal: Appointment End -->
                  <!-- Modal - Appontment Form Starts -->
	              <div class="modal fade" id="modal_appontment_form_at_about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	                <div class="modal-dialog" role="document">
	                  <div class="modal-content">
	                    <div class="border-1px p-25">
	                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                      <h4 class="text-theme-colored text-uppercase m-0">Make an Appointment</h4>
	                      <div class="line-bottom mb-30"></div>
	                      <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
	                      <!-- Appointment Form -->
	                      <form id="clinic-top_appointment-form" name="clinic-appointment-form">
	                        <div class="row">
	                          <div class="col-sm-12">
	                            <div class="form-group mb-10">
	                              <input id="username" name="username" class="form-control" type="text" required="" placeholder="Enter Name" aria-required="true">
	                            </div>
	                          </div>
	                          <div class="col-sm-12">
	                            <div class="form-group mb-10">
	                              <input id="email" name="email" class="form-control email" required type="email" placeholder="Enter Email" aria-required="true">
	                            </div>
	                          </div>
	                          <div class="col-sm-12">
	                            <div class="form-group mb-10">
	                              <input id="contact_num" name="contact_num" class="form-control email" required type="text" placeholder="Enter Contact Number" aria-required="true">
	                            </div>
	                          </div>
	                          <div class="col-sm-12">
	                            <div class="form-group mb-10">
	                              <input name="appointment_time" id="appointment_time" class="form-control datetime-picker" required type="text" placeholder="Appoinment Date & Time" aria-required="true">
	                            </div>
	                          </div>
	                        </div>
	                        <div class="form-group mb-10">
	                          <textarea id="purpose" name="purpose" class="form-control" required  placeholder="Enter Message" rows="5" aria-required="true"></textarea>
	                        </div>
	                        <div class="form-group mb-0 mt-20">
	                          <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
	                          <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Send Message</button>
	                        </div>
	                      </form>

	                      <script type="text/javascript">
			                  $(document).ready(function(){
			                      $("#clinic-top_appointment-form").submit(function(event){
			                          var username            = $("#username").val().trim();
			                          var email               = $("#email").val().trim();
			                          var contact_num         = $("#contact_num").val().trim();
			                          var appointment_time    = $("#appointment_time").val().trim();
			                          var purpose             = $("#purpose").val().trim();

			                          if((username != '') && (email != '') && (contact_num != '') && (appointment_time != '') && (purpose != ''))
			                          {
			                              var formData = new FormData(this);
			                              $.ajax({
			                                  url: 'ajax/submit-appointment.php',
			                                  type: 'POST',
			                                  data: formData,
			                                  success: function (data) {
			                                      if(data == 'submitted')
			                                      {
			                                          // warning_sweatAlert("New Category!!!", "Category already exists");
			                                          success_sweatAlert("Appointment","We have received your query. We will contact you soon. Thank You!")
			                                          $("#clinic-top_appointment-form")['0'].reset();
			                                      }
			                                      else{
			                                          // error_sweatAlert("New Category!!!", data);
			                                          error_sweatAlert("Appointment", "Something went wrong, please try again. Error: " + data);
			                                      }
			                                  },
			                                  cache: false,
			                                  contentType: false,
			                                  processData: false
			                              });
			                          }
			                          else
			                          {
			                            warning_sweatAlert("Appointment", "Please provide all credentials.");
			                          }
			                          
			                          event.preventDefault();
			                      });
			                  });
			              </script>

	                      
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <!-- Modal - Appontment Form Ends -->
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest">
        <div class="container">
          <nav id="menuzord-right" class="menuzord blue bg-lightest">
            <a class="menuzord-brand pull-left flip" href="javascript:void(0)">
              <img src="images/logo-top.png" style="height: 40px; width: 180px;" alt="Logo">
            </a>
            <!-- <div id="side-panel-trigger" class="side-panel-trigger"><a href="#"><i class="fa fa-bars font-24 text-gray"></i></a></div> -->
            <ul class="menuzord-menu onepage-nav">
              <li class="active"><a href="index.php">Home</a> </li>
              <li><a href="about.php">About</a></li>
              <li><a href="services.php">Services</a></li>
              <li><a href="prices.php">Pricing</a></li>
              <!-- <li><a href="blogs.php">Blogs</a></li> -->
              <li><a href="contact-us.php">Contact</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
</header>