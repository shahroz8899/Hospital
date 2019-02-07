<?php
include_once 'Session.php';
if($session->check_login())
{
  include_once 'layouts/header.php';
  include_once 'layouts/content-header.php';
  include_once 'layouts/left-sidebar.php';

  	require_once '../model/dbconfig.php';
  	$db   = new database();    
  	$sql = "SELECT * FROM web_content WHERE id='1'";
  	$run = $db->config()->query($sql);
  	$data = mysqli_fetch_assoc($run);
    
    $facebook 		= $data['facebook'];
    $twitter 		= $data['twitter'];
    $google_plus 	= $data['google_plus'];
    $linkedin 		= $data['linkedin'];
    $contact_num 	= $data['contact_num'];
    $email 			= $data['email'];
    $timing 		= $data['timing'];
    $address 		= $data['address'];
?>

	<div class="content-wrapper">
	    <?php 
	      $page_title     = 'Web Content';
	      $page_subTitle  = 'Update';
	      include_once 'layouts/page-header.php'; 
	    ?>


	    <!-- Main content -->
	    <section class="content">

		    <!-- Clinic Info EXAMPLE -->
		    <div class="box box-default">
		        <div class="box-header with-border">
		          <h3 class="box-title">Clinic Info</h3>
		          <div class="box-tools pull-right">
		            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
		          </div>
		        </div>
		        <div class="box-body">
		        	<form name="clinicinfo-form" id="clinicinfo-form">
			          <div class="row">
			            <div class="col-md-6">
			              <div class="form-group">
			                <label>Contact Email</label>
			                <input type="email" name="web-email" id="web-email" class="form-control" value="<?= $email ?>" placeholder="Contact Email" required="">
			              </div>
			              <div class="form-group">
			                <label>Contact Number</label>
			                <input type="text" name="web-contact" id="web-contact" class="form-control" value="<?= $contact_num ?>" placeholder="Contact Number" required="">
			              </div>
			            </div>
			            <div class="col-md-6">
			              <div class="form-group">
			                <label>Clinic Timing</label>
			                <input type="text" name="web-time" id="web-time" placeholder="Mon-Fri 06:00 PM - 11:00 PM" value="<?= $timing ?>" class="form-control" required="">
			              </div>
			              <div class="form-group">
			                <label>Clinic Address</label>
			                <input type="text" name="web-address" id="web-address" placeholder="398 Gulshan block, Iqbal town, Lahore." value="<?= $address ?>" class="form-control" required="">
			              </div>
			            </div>
			            <div class="col-md-12" style="text-align: right;">
			              <div class="form-group">
			                <button type="submit" class="btn btn-primary">Update</button>
			              </div>
			            </div>
			          </div>
			        </div>
			    </form>
		    </div>


	      	<div class="row">
		        <div class="col-md-12">
		          <div class="box box-danger">
		            <div class="box-header">
		              <h3 class="box-title">Social Links</h3>
		            </div>
		            <div class="box-body">
		            	<div class="row">
		            		<div class="col-xs-12 col-sm-12 col-md-12">
		            			<form id="fb-form">
					              	<div class="col-xs-10 col-sm-10 col-md-10">
							            <div class="form-group">
							                <div class="input-group">
							                  <div class="input-group-addon">
							                    <i class="fa fa-facebook-official"></i>
							                  </div>
							                  <input type="hidden" name="link_type" value="facebook">
							                  <input type="text" class="form-control" name="link" id="fb_link" value="<?= $facebook ?>" placeholder="https://facebook.com/clinic_site_facebook">
							                </div>
							            </div>
							        </div>
							        <div class="col-xs-2 col-sm-2 col-md-2">
							        	<button type="submit" class="btn btn-primary">Update</button>
							        </div>
							    </form>
						    </div>
					    </div>

		            	<div class="row">
		            		<div class="col-xs-12 col-sm-12 col-md-12">
		            			<form id="twitter-form">
					              	<div class="col-xs-10 col-sm-10 col-md-10">
					              		<div class="form-group">
							                <div class="input-group">
							                  <div class="input-group-addon">
							                    <i class="fa fa-twitter"></i>
							                  </div>
							                  <input type="hidden" name="link_type" value="twitter">
							                  <input type="text" class="form-control" name="link" value="<?= $twitter ?>" id="twitter_link" placeholder="https://twittwe.com/clinic_site_twitter">
							                </div>
			              				</div>
									</div>
							        <div class="col-xs-2 col-sm-2 col-md-2">
							        	<button type="submit" class="btn btn-primary">Update</button>
							        </div>
							    </form>
						    </div>
					    </div>

			            <div class="row">
		            		<div class="col-xs-12 col-sm-12 col-md-12">
		            			<form id="googlePlus-form">
					              	<div class="col-xs-10 col-sm-10 col-md-10">
					              		<div class="form-group">
							                <div class="input-group">
							                  <div class="input-group-addon">
							                    <i class="fa fa-google-plus"></i>
							                  </div>
							                  <input type="hidden" name="link_type" value="google_plus">
							                  <input type="text" class="form-control" name="link" value="<?= $google_plus ?>" id="googlePlus_link" placeholder="https://google plus.com/clinic_site_google_plus">
							                </div>
						                </div>
				                	</div>
							        <div class="col-xs-2 col-sm-2 col-md-2">
							        	<button type="submit" class="btn btn-primary">Update</button>
							        </div>
							    </form>
						    </div>
					    </div>

				        <div class="row">
		            		<div class="col-xs-12 col-sm-12 col-md-12">
		            			<form id="linkedin-from">
					              	<div class="col-xs-10 col-sm-10 col-md-10">
						              	<div class="form-group">
							                <div class="input-group">
							                  <div class="input-group-addon">
							                    <i class="fa fa-linkedin"></i>
							                  </div>
							                  <input type="hidden" name="link_type" value="linkedin">
							                  <input type="text" class="form-control" name="link" value="<?= $linkedin?>" id="linkedin_link" placeholder="https://linkedin.com/clinic_site_linkedin">
							                </div>
						                </div>
			              			</div>
							        <div class="col-xs-2 col-sm-2 col-md-2">
							        	<button type="submit" class="btn btn-primary">Update</button>
							        </div>
							    </form>
						    </div>
					    </div>
		            </div>
		          </div>
		        </div>
			</div>
		</section>
	</div>
<?php
	include_once 'layouts/footer.php';
}
else
{
	header("Location: login.php");
}
?>
	<script type="text/javascript">
        $(document).ready(function(){
            $("#clinicinfo-form").submit(function(event){
                var web_email       = $("#web-email").val().trim();
                var web_contact     = $("#web-contact").val().trim();
                var web_time		= $("#web-time").val().trim();
                var web_address		= $("#web-address").val().trim();
                
                if((web_email != '') && (web_contact != '') && (web_time != '') && (web_address != '')){
                    var formData = new FormData(this);
                    $.ajax({
                        url: 'ajax_call/web_content/update-clinicInfo.php',
                        type: 'POST',
                        data: formData,
                        success: function (data) {
                            if(data == 'updated')
                            {
                                success_sweatAlert("Clinic Info!!!", "Information Updated. Thank you!");
                            }
                            else
                            {
                                error_sweatAlert("Clinic Info!!!", "Something went wrong, please try again.Error : " + data);
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                }
                else
                {
                    error_sweatAlert("Clinic Info!!!", "Please provide all credentials.");
                }
                event.preventDefault();
            });

            function link_updation(formData){
            	$.ajax({
                    url: 'ajax_call/web_content/update-social_link.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if(data == 'updated')
                        {
                            success_sweatAlert("Clinic Social Link!!!", "link Updated. Thank you!");
                        }
                        else
                        {
                            error_sweatAlert("Clinic Social Link!!!", "Something went wrong, please try again.Error : " + data);
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }

            $("#fb-form").submit(function(event){
                var fb_link       = $("#fb_link").val().trim();
                
                if((fb_link != '')){
                    var formData = new FormData(this);
                    link_updation(formData);
                }
                else
                {
                    error_sweatAlert("Clinic Social Link!!!", "Please provide link.");
                }
                event.preventDefault();
            });
            $("#twitter-form").submit(function(event){
                var twitter_link       = $("#twitter_link").val().trim();
                
                if((twitter_link != '')){
                    var formData = new FormData(this);
                    link_updation(formData);
                }
                else
                {
                    error_sweatAlert("Clinic Social Link!!!", "Please provide link.");
                }
                event.preventDefault();
            });
            $("#googlePlus-form").submit(function(event){
                var googlePlus_link       = $("#googlePlus_link").val().trim();
                
                if((googlePlus_link != '')){
                    var formData = new FormData(this);
                    link_updation(formData);
                }
                else
                {
                    error_sweatAlert("Clinic Social Link!!!", "Please provide link.");
                }
                event.preventDefault();
            });
            $("#linkedin-from").submit(function(event){
                var linkedin_link       = $("#linkedin_link").val().trim();
                
                if((linkedin_link != '')){
                    var formData = new FormData(this);
                    link_updation(formData);
                }
                else
                {
                    error_sweatAlert("Clinic Social Link!!!", "Please provide link.");
                }
                event.preventDefault();
            });
        });
    </script>