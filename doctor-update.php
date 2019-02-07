<?php
include_once 'Session.php';
if($session->check_login())
{
    include_once 'layouts/header.php';
    include_once 'layouts/content-header.php';
    include_once 'layouts/left-sidebar.php';

    require_once '../model/dbconfig.php';
    $db   = new database();    
    $sql = "SELECT * FROM doctor WHERE id='1'";
    $run = $db->config()->query($sql);
    $data = mysqli_fetch_assoc($run);
    
    $doctor_name            = $data['doctor_name'];
    $specialization         = $data['specialization'];
    $profession_detail      = $data['profession_detail'];
    $image                  = $data['image'];
    $fb_link                = $data['fb_link'];
    $gmail_link             = $data['gmail_link'];
    $twitter_link           = $data['twitter_link'];
?>

	<div class="content-wrapper">
	    <?php 
          $page_title     = 'Doctor';
          $page_subTitle  = 'Update';
          include_once 'layouts/page-header.php'; 
        ?>

	    <!-- Main content -->
    	<section class="content">
            <?php include_once 'layouts/navbar.php'; ?>
            <div class="row"  style="padding: 3pc;">
                <div class="col-12">
                    <div class="box box-info">
			            <div class="box-header with-border" style="text-align: center;">
			             	<h3 class="box-title">Doctor Profile</h3>
			            </div>
			            <div class="box-body" style="padding: 1pc;">
                            <form id="doctor-form" enctype="multipart/form-data">
                                <div class="col-md-6 col-lg-6" style="margin-top: 1.5pc;">
                                    <img onclick="changePicture(); return false" id="image" width="100%" style="height: 20pc;" src="<?= $image ?>" alt="category image"/>
                                    <input accept="image/*" type="file" id="doctor_image" name="doctor_image" onchange="readURL(this);"style="visibility: hidden;" />
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-top: 2pc;">
    				            	<div class="input-group">
    				                	<span class="input-group-addon"><i class="fa fa-font"></i></span>
    				                	<input type="text" id="doctor_name" name="doctor_name" class="form-control" placeholder="Doctor name" value="<?= $doctor_name ?>" >
    				            	</div>
    				            	<br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                        <input type="text" id="specialization" name="specialization" class="form-control" placeholder="Specialization" value="<?= $specialization ?>">
                                    </div>
                                    <br>
    				            	<div class="input-group">
    				                	<span class="input-group-addon"><i class="fa fa-info"></i></span>
                                        <textarea name="profession_detail" id="profession_detail" class="form-control" placeholder="Profession detail Or statement" style="height: 12pc;"><?= $profession_detail ?></textarea>
    				            	</div>
    				            	<br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="text-align: center;">
                                            <button type="submit" style="width: 15pc;" class="btn btn-primary"> Update <i class="fa fa-save"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>   
                            <br>
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
                                                              <input type="hidden" name="link_type" value="fb_link">
                                                              <input type="text" class="form-control" name="link" id="fb_link" value="<?= $fb_link ?>" placeholder="https://facebook.com/clinic_site_facebook">
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
                                                              <input type="hidden" name="link_type" value="twitter_link">
                                                              <input type="text" class="form-control" name="link" value="<?= $twitter_link ?>" id="twitter_link" placeholder="https://twittwe.com/clinic_site_twitter">
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
                                                              <input type="hidden" name="link_type" value="gmail_link">
                                                              <input type="text" class="form-control" name="link" value="<?= $gmail_link ?>" id="googlePlus_link" placeholder="https://google plus.com/clinic_site_google_plus">
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
        function changePicture(){
            $('#doctor_image').click();
        }
        function readURL(input)
        {
            if (input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function (e)
                {
                    $('#image')
                        .attr('src',e.target.result);

                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function link_updation(formData){
            $.ajax({
                url: 'ajax_call/doctor/update-social_link.php',
                type: 'POST',
                data: formData,
                success: function (data) {
                    if(data == 'updated')
                    {
                        success_sweatAlert("Update Doctor Link!!!", "link Updated. Thank you!");
                    }
                    else
                    {
                        error_sweatAlert("Update Doctor Link!!!", "Something went wrong, please try again.Error : " + data);
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }

        $(document).ready(function(){
            $("#doctor-form").submit(function(event){

                var doctor_name          = $("#doctor_name").val().trim();
                var specialization       = $("#specialization").val().trim();
                var profession_detail    = $("#profession_detail").val().trim();
                var doctor_image         = $("#doctor_image").val().trim();
               
                if((doctor_name != '') && (profession_detail != '') && (specialization != '') ){
                    var formData = new FormData(this);

                    $.ajax({
                        url: 'ajax_call/doctor/update-doctor.php',
                        type: 'POST',
                        data: formData,
                        success: function (data) {
                            if(data == 'update')
                            {
                                success_sweatAlert("Update Doctor!!!", "Doctor record updated. Thank you!");
                            }
                            else
                            {
                                error_sweatAlert("Update Doctor!!!", "Something went wrong, please try again.Error : " + data);
                            }
                           
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                }
                else
                {
                    error_sweatAlert("Update Doctor!!!", "Please provide all credentials.");
                }
                event.preventDefault();
            });

            $("#fb-form").submit(function(event){
                var fb_link       = $("#fb_link").val().trim();
                
                if((fb_link != '')){
                    var formData = new FormData(this);
                    link_updation(formData);
                }
                else
                {
                    error_sweatAlert("Update Doctor Link!!!", "Please provide link.");
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
                    error_sweatAlert("Update Doctor Link!!!", "Please provide link.");
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
                    error_sweatAlert("Update Doctor Link!!!", "Please provide link.");
                }
                event.preventDefault();
            });
        });
    </script>