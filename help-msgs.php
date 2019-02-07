<?php
include_once 'Session.php';
if($session->check_login())
{
  include_once 'layouts/header.php';
  include_once 'layouts/content-header.php';
  include_once 'layouts/left-sidebar.php';

?>
	<script type="text/javascript">
		function detail(id) {
			url = "help_message-details.php?message_id="+id;
			window.open(url, '_parent'); 
		}
	</script>
	<div class="content-wrapper">
    <?php 
      $page_title     = 'Help';
      $page_subTitle  = 'Inbox';
      include_once 'layouts/page-header.php'; 
    ?>

    <!-- Main content -->
    	<section class="content">
      
      	<?php include_once 'layouts/navbar.php'; ?>
      		<div class="row">
		        <div class="col-xs-12">
		          <div class="box">
		            <div class="box-header" style="text-align: center; border-bottom: 1px solid; border-color: #b8b6b6; margin-left: 3pc; margin-right: 3pc;" >
		              <h3 class="box-title" style="font-weight: bold; font-size: 1.5pc;">Help Messages List</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body" style="margin: 1pc;">
		            	<div class="table-responsive"> 
	    	            	<table id="example1" class="table table-responsive table-bordered table-hover">
			                <thead>
				                <tr>
				                  <th style="text-align: center;">Appointment ID</th>
				                  <th>Client Name</th>
				                  <th>Contact Number</th>
				                  <th>Help Message</th>
				                  <th>Requested Time</th>
				                </tr>
			                </thead>
			                <tbody>
			                	<?php
			                      	require_once '../model/dbconfig.php';
			                      	$db   = new database();    
			                      	$sql = "SELECT * FROM help_messages";
			                      	$run = $db->config()->query($sql);
			                      	while($data = mysqli_fetch_assoc($run))
			                      	{
				                        $id 				= $data['id'];
				                        $username 			= $data['name'];
				                        $contactNum 		= $data['contactNum'];
				                        $_read 				= $data['_read'];
				                        $purpose 			= substr($data['message'], 0, 25);
				                        $send_time  		= $data['send_time'];

			                    ?>
			                	<tr <?php if($_read == '0'){ ?> style="cursor: pointer; background-color: #879da3; color: #ffffff" <?php } else { ?> style="cursor: pointer;" <?php } ?> onclick="detail(<?= $id ?>)">
				                	<td style="text-align: center;"><?= $id ?></td>
				                	<td><?= $username ?></td>
				                	<td><?= $contactNum ?></td>
				                	<td><?= $purpose . "...." ?></td>
				                	<td><?= $send_time ?></td>
				                	
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
<?php
  include_once 'layouts/footer.php';
}
else
{
  header("Location: login.php");
}
?>

<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>