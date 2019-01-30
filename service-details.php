<?php
	include_once 'layouts/header-sp.php';
?>

<div class="body-overlay"></div>

<div id="wrapper" class="clearfix">

  	<?php include_once 'layouts/top-header.php'; ?>

  	  <div class="main-content">
	    <!-- Section: inner-header -->
	    <section class="inner-header divider layer-overlay overlay-deep" data-bg-img="images/bg/bg5.jpg">
	      <div class="container pt-90 pb-50">
	        <!-- Section Content -->
	        <div class="section-content">
	          <div class="row"> 
	            <div class="col-md-12 xs-text-center">
	              <h3 class="font-28">Services Detais</h3>
	              <ol class="breadcrumb white mt-10">
	                <li><a href="#">Home</a></li>
	                <li><a href="#">Pages</a></li>
	                <li class="active text-theme-colored">Services Details</li>
	              </ol>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>

	    <!-- Section: Service details -->
	    <section>
	      <div class="container pb-30">
	        <div class="section-content">
	          <div class="row">
	            <div class="col-xs-12 col-sm-8 col-md-8 pull-left">
	              <div class="row">
	                <div class="col-md-12">
	                  <img alt="" src="images/photos/services-details.jpg" />
	                </div>
	              </div>
	              <div class="row multi-row-clearfix mt-30">
	                <div class="col-md-12">
	                  <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquet odio non porta laoreet. Vestibulum in dui euismod, molestie quam porta, sagittis arcu. Pellentesque vitae pulvinar urna, in dignissim nulla. Mauris iaculis, tortor sed pharetra varius, purus augue feugiat purus, vitae porta nulla turpis pellentesque dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus posuere posuere ex, ac tincidunt turpis porta id. Aenean sed mauris lacus. </p>
	                  <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquet odio non porta laoreet. Vestibulum in dui euismod, molestie quam porta, sagittis arcu. Pellentesque vitae pulvinar urna.</p>
	                </div>
	                <div class="col-md-12 mb-30">
	                  <h4 class="text-theme-colored title-border mb-20">Our Features Services</h4>
	                  <ul class="list-icon theme-colored">
	                    <li><i class="fa fa-pencil-square-o"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor totam nobis, eum harum omnis?</li>
	                    <li><i class="fa fa-pencil-square-o"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In.</li>
	                    <li><i class="fa fa-pencil-square-o"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic ad iusto earum quas ducimus.</li>
	                    <li><i class="fa fa-pencil-square-o"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, iste.</li>
	                    <li><i class="fa fa-pencil-square-o"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
	                    <li><i class="fa fa-pencil-square-o"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate laboriosam delectus, ducimus.</li>
	                  </ul>
	                </div>
	              </div>
	            </div>
	            <div class="col-sx-12 col-sm-4 col-md-4 sidebar pull-right">
	              <div class="widget">
	                <a data-target="#modal_appontment_form" data-toggle="modal" href="#" class="btn btn-colored btn-theme-colored btn-xl btn-block">Make an Appointment</a>

	                <!-- Modal - Appontment Form Starts -->
	                <div class="modal fade" id="modal_appontment_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	                  <div class="modal-dialog" role="document">
	                    <div class="modal-content">
	                      <div class="border-1px p-25">
	                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        <h4 class="text-theme-colored text-uppercase m-0">Make an Appointment</h4>
	                        <div class="line-bottom mb-30"></div>
	                        <p>Lorem ipsum dolor sit amet, consectetur elit.</p>
	                        <!-- Appointment Form -->
	                        <form id="popup_appointment_form" name="popup_appointment_form" class="" method="post" action="http://thememascot.net/demo/html/health-beauty/medical/medinova-html/v3.2/demo/includes/appointment.php">
	                          <div class="row">
	                            <div class="col-sm-12">
	                              <div class="form-group mb-10">
	                                <input id="form_name" name="form_name" class="form-control" type="text" required="" placeholder="Enter Name" aria-required="true">
	                              </div>
	                            </div>
	                            <div class="col-sm-12">
	                              <div class="form-group mb-10">
	                                <input id="form_email" name="form_email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
	                              </div>
	                            </div>
	                            <div class="col-sm-12">
	                              <div class="form-group mb-10">
	                                <input name="form_appontment_date" class="form-control required datetime-picker" type="text" placeholder="Appoinment Date & Time" aria-required="true">
	                              </div>
	                            </div>
	                          </div>
	                          <div class="form-group mb-10">
	                            <textarea id="form_message" name="form_message" class="form-control required"  placeholder="Enter Message" rows="5" aria-required="true"></textarea>
	                          </div>
	                          <div class="form-group mb-0 mt-20">
	                            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
	                            <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Send Message</button>
	                          </div>
	                        </form>

	                        <!-- Appointment Form Validation-->
	                        <script type="text/javascript">
	                          $("#popup_appointment_form").validate({
	                            submitHandler: function(form) {
	                              var form_btn = $(form).find('button[type="submit"]');
	                              var form_result_div = '#form-result';
	                              $(form_result_div).remove();
	                              form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
	                              var form_btn_old_msg = form_btn.html();
	                              form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
	                              $(form).ajaxSubmit({
	                                dataType:  'json',
	                                success: function(data) {
	                                  if( data.status == 'true' ) {
	                                    $(form).find('.form-control').val('');
	                                  }
	                                  form_btn.prop('disabled', false).html(form_btn_old_msg);
	                                  $(form_result_div).html(data.message).fadeIn('slow');
	                                  setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
	                                }
	                              });
	                            }
	                          });
	                        </script>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	                <!-- Modal - Appontment Form Ends -->

	              </div>
	              <div class="widget">
	                <div class="team text-center maxwidth400 bg-light">
	                  <div class="thumb"><img class="img-fullwidth" src="images/team/team1.jpg" alt=""></div>
	                  <div class="content p-15">
	                    <h4 class="name mb-0 mt-0"><a class="text-theme-colored" href="#">Dr. Smile Jhon</a></h4>
	                    <h6 class="title mt-0">Orthopaedics</h6>
	                    <ul class="list-inline mt-5">
	                      <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored"></i> <a href="#" class="text-gray">123-456-789</a> </li>
	                      <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored"></i> <a href="#" class="text-gray">contact@yourdomain.com</a> </li>
	                    </ul>
	                  </div>
	                </div>
	              </div>
	              <div class="widget">
	                <h5 class="widget-title line-bottom">Opening Hours</h5>
	                <div class="opening-hourse">
	                  <ul>
	                    <li class="clearfix"> <span> Friday - Saturday :  </span>
	                      <div class="value pull-right"> 10.00 am - 6.00 pm </div>
	                    </li>
	                    <li class="clearfix"> <span> Monday - Thusday :</span>
	                      <div class="value pull-right"> 8.00 am - 9.00 pm </div>
	                    </li>
	                    <li class="clearfix"> <span> Sunday : </span>
	                      <div class="value pull-right"> Colosed </div>
	                    </li>
	                  </ul>
	                </div>
	              </div>
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