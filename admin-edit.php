<?php
include_once 'Session.php';
if($session->check_login())
{
	if(isset($_GET['admin_id']))
	{
		require_once '../commonclass.php';
		$comfun = new commonclass();

		$admin_id = $comfun->check_data($_GET['admin_id']);
		if(!empty($admin_id))
		{
			require_once '../model/dbconfig.php';
          	$db   = new database();    
          	$sql = "SELECT * FROM admin WHERE id='$admin_id'";
          	$run = $db->config()->query($sql);
          	$data = mysqli_fetch_assoc($run);
            
            $admin_name 	= $data['admin_name'];
            $email 			= $data['email'];
            $contact 		= $data['contact'];
            $password 		= $data['password'];
            $admin_role 	= $data['admin_loggedIn'];
            $createdTime 	= $data['createdTime'];

			include_once 'layouts/header.php';
			include_once 'layouts/content-header.php';
			include_once 'layouts/left-sidebar.php';
?>

			<div class="content-wrapper">
			    <?php 
		          $page_title     = 'Admin Control';
		          $page_subTitle  = 'Update Admin';
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
					            	<form id="editadmin-form">
					            		<div class="input-group">
						                	<span class="input-group-addon">#</span>
						                	<input type="text" class="form-control" placeholder="Admin name" value="<?= $admin_id ?>" disabled>
						                	<input type="hidden" id="admin_id" name="admin_id" class="form-control" placeholder="Admin name" value="<?= $admin_id ?>">
						            	</div>
						            	<br>
						            	<div class="input-group">
						                	<span class="input-group-addon">@</span>
						                	<input type="text" id="admin_name" name="admin_name" class="form-control" placeholder="Admin name" value="<?= $admin_name ?>" disabled>
						            	</div>
						            	<br>
						            	<div class="input-group">
						                	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						                	<input type="email" name="admin_email" id="admin_email" class="form-control" placeholder="Email" value="<?= $email ?>" disabled>
						            	</div>
						            	<br>
						            	<div class="input-group">
						                	<span class="input-group-addon"><i class="fa fa-key"></i></span>
						                	<input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Password" >
						            	</div>
						            	<br>
						            	<div class="input-group">
						                	<span class="input-group-addon"><i class="fa fa-key"></i></span>
						                	<input type="password" name="admin_con_pass" id="admin_con_pass" class="form-control" placeholder="Confirm Password" >
						            	</div>
						            	<br>
						            	<div class="input-group">
						                	<span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
						                	<input type="text" name="admin_contact" id="admin_contact" class="form-control" placeholder="Contact Number" value="<?= $contact ?>">
						            	</div>
						            	<br>
						            	<div class="input-group">
						                	<span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
						                	<select name="admin_rights" id="admin_rights" class="form-control">
						                		<option value="0" disabled>Select</option>
						                		<option value="1" <?php if($admin_role=='1'){ ?> selected <?php } ?>  >All rights</option>
						                		<option value="2" <?php if($admin_role=='2'){ ?> selected <?php } ?>  >Sale Person</option>
						                	</select>
						            	</div>
						            	<br>
						            	<div class="input-group" style="float: right;">
						            		<button type="submit" style="width: 5pc;" class="btn btn-primary"> Edit <i class="fa fa-pencil-square-o"></i></button>
						            		<button type="button" onclick="del_Admin(<?= $admin_id ?>)" style="width: 5pc;" class="btn btn-danger"> Delete <i class="fa fa-trash-o"></i></button>
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
	}
}
else
{
	header("Location: login.php");
}
?>
<script type="text/javascript">
	function del_Admin(admin_id) {
		$.ajax({
          url: 'ajax_call/admin/del-admin.php',
          type: 'POST',
          data: {'admin_id':admin_id},
          success: function (data) {
            if(data = 'del')
            {
                alert("Admin has been deleted.");
                window.history.back();
            }
            else
            {
                alert("Something went wrong, please try again later!!! data = " + data);
            }
          },
          error: function(data){
              alert("Error: " + data);
          }
        });
	}
	$("#editadmin-form").submit(function(event){
		var password            = $("#admin_password").val().trim();
        var confirm_password    = $("#admin_con_pass").val().trim();

        if ($("#admin_rights")[0].selectedIndex <= 0) {
            warning_sweatAlert("Update Admin!!!", "Please assign admin priviliges.");
        }
        else if(password != confirm_password){
            error_sweatAlert("Update Admin!!!", "Password not matched.");
        }
        else
        {
            var admin_name          = $("#admin_name").val().trim();
            var admin_email         = $("#admin_email").val().trim();
            var contact             = $("#admin_contact").val().trim();
            var privilege           = $("#admin_rights").val().trim();

            if((admin_name != '') && (admin_email != '') && (password == confirm_password) && (contact != '') && (privilege != '')){
                var formData = new FormData(this);
                $.ajax({
                    url: 'ajax_call/admin/update-admin.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if(data == 'password not matched')
                        {
                            warning_sweatAlert("Update Admin!!!", "Both passwords are not matched, Please try with same password.");
                        }
                        else if(data == 'exists with same name')
                        {
                            warning_sweatAlert("Update Admin!!!", "Admin exists with same name, Please try with another one.");
                        }
                        else if(data == 'exists with same email')
                        {
                            warning_sweatAlert("Update Admin!!!", "Admin exists with same email, Please try with another one.");
                        }
                        else if(data == 'updated')
                        {
                            success_sweatAlert("Update Admin!!!", "Admin updated. Thank you!");
                           	window.history.back();
                        }
                        else
                        {
                            error_sweatAlert("Update Admin!!!", "Something went wrong, please try again.Error : " + data);
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
</script>
