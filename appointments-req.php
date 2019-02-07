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
			url = "appointment-details.php?appointment_id="+id;
			window.open(url, '_parent'); 
		}
	</script>
	<div class="content-wrapper">
    <?php 
      $page_title     = 'Appointments';
      $page_subTitle  = '';
      include_once 'layouts/page-header.php'; 
    ?>

    <!-- Main content -->
    	<section class="content">
      
      	<?php include_once 'layouts/navbar.php'; ?>
      		<div class="row">
		        <div class="col-xs-12">
		          <div class="box">
		            <div class="box-header" style="text-align: center; border-bottom: 1px solid; border-color: #b8b6b6; margin-left: 3pc; margin-right: 3pc;" >
		              <h3 class="box-title" style="font-weight: bold; font-size: 1.5pc;">Appointments List</h3>
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
				                  <th>Appointment Time</th>
				                  <th>Purpose</th>
				                  <th>Requested Time</th>
				                </tr>
			                </thead>
			                <tbody>
			                	<?php
			                      	require_once '../model/dbconfig.php';
			                      	$db   = new database();    
			                      	$sql = "SELECT * FROM appointment";
			                      	$run = $db->config()->query($sql);
			                      	while($data = mysqli_fetch_assoc($run))
			                      	{
				                        $id 				= $data['id'];
				                        $username 			= $data['username'];
				                        $contactNum 		= $data['contactNum'];
				                        $_read 				= $data['_read'];
				                        $appointment_time 	= $data['appointment_time'];
				                        $purpose 			= substr($data['purpose'], 0, 25);
				                        $submit_time 		= $data['submit_time'];

			                    ?>
			                	<tr <?php if($_read == '0'){ ?> style="cursor: pointer; background-color: #879da3; color: #ffffff" <?php } else { ?> style="cursor: pointer;" <?php } ?> onclick="detail(<?= $id ?>)">
				                	<td style="text-align: center;"><?= $id ?></td>
				                	<td><?= $username ?></td>
				                	<td><?= $contactNum ?></td>
				                	<td><?= $appointment_time ?></td>
				                	<td><?= $purpose . "...." ?></td>
				                	<td><?= $submit_time ?></td>
				                	
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