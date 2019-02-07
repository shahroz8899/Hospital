<?php
include_once 'Session.php';
if($session->check_login())
{
  include_once 'layouts/header.php';
  include_once 'layouts/content-header.php';
  include_once 'layouts/left-sidebar.php';

?>

	<div class="content-wrapper">
	    <?php 
          $page_title     = 'Admin Control';
          $page_subTitle  = 'Add New Admin';
          include_once 'layouts/page-header.php'; 
        ?>

	    <!-- Main content -->
    	<section class="content" style="padding: 3pc;">
            <div class="row">
                <div class="col-12">
                    <div class="box box-info">
			            <div class="box-header with-border" style="text-align: center;">
			             	<h3 class="box-title">Assigning Credentials to Admin</h3>
			            </div>
			            <div class="box-body" style="padding: 1pc;">
			            	<form id="addadmin-form">
				            	<div class="input-group">
				                	<span class="input-group-addon">@</span>
				                	<input type="text" id="admin_name" name="admin_name" class="form-control" placeholder="Admin name">
				            	</div>
				            	<br>
				            	<div class="input-group">
				                	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				                	<input type="email" name="admin_email" id="admin_email" class="form-control" placeholder="Email">
				            	</div>
				            	<br>
				            	<div class="input-group">
				                	<span class="input-group-addon"><i class="fa fa-key"></i></span>
				                	<input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Password">
				            	</div>
				            	<br>
				            	<div class="input-group">
				                	<span class="input-group-addon"><i class="fa fa-key"></i></span>
				                	<input type="password" name="admin_con_pass" id="admin_con_pass" class="form-control" placeholder="Confirm Password">
				            	</div>
				            	<br>
				            	<div class="input-group">
				                	<span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
				                	<input type="text" name="admin_contact" id="admin_contact" class="form-control" placeholder="Contact Number">
				            	</div>
				            	<br>
				            	<div class="input-group">
				                	<span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
				                	<select name="admin_rights" id="admin_rights" class="form-control">
				                		<option value="0" disabled>Select</option>
				                		<option value="1">All rights</option>
				                		<!-- <option value="2">Sale Person</option> -->
				                	</select>
				            	</div>
				            	<br>
				            	<div class="input-group" style="float: right;">
				            		<button type="submit" style="width: 5pc;" class="btn btn-primary"> Add <i class="fa fa-save"></i></button>
				            	</div>
				            </form>

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
            $("#addadmin-form").submit(function(event){

                var password            = $("#admin_password").val().trim();
                var confirm_password    = $("#admin_con_pass").val().trim();

                if ($("#admin_rights")[0].selectedIndex <= 0) {
                    warning_sweatAlert("New Admin!!!", "Please assign admin rights.");
                }
                else if(password != confirm_password){
                    error_sweatAlert("New Admin!!!", "Password not matched.");
                }
                else
                {
                    var admin_name          = $("#admin_name").val().trim();
                    var admin_email         = $("#admin_email").val().trim();
                    var contact             = $("#admin_contact").val().trim();
                    var privilege           = $("#admin_rights").val().trim();

                    if((admin_name != '') && (admin_email != '') && (password != '') && (confirm_password != '') && (password == confirm_password) && (contact != '') && (privilege != '')){
                        var formData = new FormData(this);

                        $.ajax({
                            url: 'ajax_call/admin/submit-newadmin.php',
                            type: 'POST',
                            data: formData,
                            success: function (data) {
                                if(data == 'password not matched')
                                {
                                    warning_sweatAlert("New Admin!!!", "Both passwords are not matched, Please try with same password.");
                                }
                                else if(data == 'exists with same name')
                                {
                                    warning_sweatAlert("New Admin!!!", "Admin exists with same name, Please try with another one.");
                                }
                                else if(data == 'exists with same email')
                                {
                                    warning_sweatAlert("New Admin!!!", "Admin exists with same email, Please try with another one.");
                                }
                                else if(data == 'added')
                                {
                                    success_sweatAlert("New Admin!!!", "Admin added. Thank you!");
                                    $("#addadmin-form")['0'].reset();
                                }
                                else if(data == 'not added')
                                {
                                    error_sweatAlert("New Admin!!!", "Admin not added. Something went wrong, try again.!");
                                }
                                else
                                {
                                    error_sweatAlert("New Admin!!!", "Something went wrong, please try again.Error : " + data);
                                }
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    }
                    else
                    {
                        error_sweatAlert("New Admin!!!", "Please select all");
                    }
                    
                }
                event.preventDefault();
            });
        });
    </script>