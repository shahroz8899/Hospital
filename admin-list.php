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
          $page_subTitle  = 'Admin Listing';
          include_once 'layouts/page-header.php'; 
        ?>

	    <!-- Main content -->
	    <section class="content">
	    	<?php include_once 'layouts/navbar.php'; ?>
	    	<div class="row">
		        <div class="col-xs-12">
		          <div class="box">
		            <div class="box-header" style="text-align: center; border-bottom: 1px solid; border-color: #b8b6b6; margin-left: 3pc; margin-right: 3pc;" >
		              <h3 class="box-title" style="font-weight: bold; font-size: 1.5pc;">Admin List</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body" style="margin: 1pc;">
		            	<div class="table-responsive"> 
		            		<table id="example1" class="table table-bordered table-hover ">
			                <thead>
				                <tr>
				                  <th style="text-align: center;">Admin ID</th>
				                  <th>Admin Name</th>
				                  <th>Admin Email</th>
				                  <th>Admin Contact</th>
				                  <th>Admin Role</th>
				                  <th>Created At</th>
				                  <th>Action</th>
				                </tr>
			                </thead>
			                <tbody>
			                	<?php
			                      	require_once '../model/dbconfig.php';
			                      	$db   = new database();    
			                      	$sql = "SELECT * FROM admin";
			                      	$run = $db->config()->query($sql);
			                      	while($data = mysqli_fetch_assoc($run))
			                      	{
				                        $id 			= $data['id'];
				                        $admin_name 	= $data['admin_name'];
				                        $email 			= $data['email'];
				                        $contact 		= $data['contact'];
				                        $admin_role 	= $data['admin_role'];
				                        $createdTime 	= $data['createdTime'];

				                        $edit_url           = "admin-edit.php?admin_id=" . $id;
			                    ?>
			                	<tr onclick="detail(<?= $id ?>)">
				                	<td style="text-align: center;"><?= $id ?></td>
				                	<td><?= $admin_name ?></td>
				                	<td><?= $email ?></td>
				                	<td><?= $contact ?></td>
				                	<td><?= $admin_role ?></td>
				                	<td><?= $createdTime ?></td>
				                	<td style="text-align: center; margin: auto;">
	                                  <a href="<?php echo $edit_url; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
	                                  <a onclick="del_Admin(<?= $id ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
	                                </td>
				                	
			                	</tr>
			                	<?php
			                    	}
			                    ?>
			                </tbody>
			              </table>
			            </div>
		            </div>
		          </div>
		        </div>
		    </div>
	    </section>
	</div>

	<script type="text/javascript">
		function del_Admin(admin_id) {
			$.ajax({
	          url: 'ajax_call/admin/del-admin.php',
	          type: 'POST',
	          data: {'admin_id':admin_id},
	          success: function (data) {
	            if(data = 'del')
	            {
	                success_sweatAlert("Admin Delete", "Admin has been deleted.");
	                location.reload();
	            }
	            else
	            {
	                error_sweatAlert("Admin Delete", "Something went wrong, please try again later!!! data = " + data);
	            }
	          },
	          error: function(data){
	            error_sweatAlert("Admin Delete", "Something went wrong, please try again later!!! data = " + data);
	          }
	        });
		}
	</script>
<?php
	include_once 'layouts/footer.php';
}
else
{
	header("Location: login.php");
}
?>