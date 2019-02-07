<?php
include_once 'Session.php';
if($session->check_login())
{
	if(isset($_GET['appointment_id']))
	{
		require_once '../model/dbconfig.php';
		require_once '../commonclass.php';
		$db   = new database();    
		$comfun = new commonclass();

		$appointment_id = $comfun->check_data($_GET['appointment_id']);
		if(!empty($appointment_id))
		{
			$sql = "UPDATE appointment SET  _read='1' WHERE id='$appointment_id'";
	        if ($db->config()->query($sql)) 
	        {
				include_once 'layouts/header.php';
				include_once 'layouts/content-header.php';
				include_once 'layouts/left-sidebar.php';

				$sql = "SELECT * FROM appointment WHERE id='$appointment_id'";
				$run = $db->config()->query($sql);
				$data = mysqli_fetch_assoc($run);

				$id 				= $data['id'];
				$username 			= $data['username'];
				$email 				= $data['email'];
				$contactNum 		= $data['contactNum'];
				$appointment_time 	= $data['appointment_time'];
				$purpose 			= $data['purpose'];
				$status 			= $data['status'];
				$_read 				= $data['_read'];
				$comment 			= $data['comment'];
				$reply 				= $data['reply'];
				$reply_time 		= $data['reply_time'];
				$comment_time 		= $data['comment_time'];
				$submit_time 		= $data['submit_time'];
	
		
?>

				<div class="content-wrapper">
			    	<?php 
			          $page_title     = 'Appointment';
			          $page_subTitle  = 'Detail';
			          include_once 'layouts/page-header.php'; 
			        ?>
			    	
			    	<section class="content">
			      
			      		<?php include_once 'layouts/navbar.php'; ?>
			      		
			      		<div class="row">
					        <div class="col-xs-12">
					          <div class="box">
					            <div class="box-header" style="text-align: center; margin-left: 3pc; margin-right: 3pc;" >
					            	<h3 class="box-title" style="font-weight: bold; font-size: 1.5pc;">Appointment Details</h3>
					            </div>
					            <div class="box-body" style="margin: 1pc;">
					              <div class="box box-danger">
						            
						            <div class="box-body" style="margin-top: 1pc;">
						              <div class="row">
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">Appointment ID: </label>
						                	<label class="col-xs-6 col-md-6" style="font-weight: 500;">APT_ID# <?= $id ?></label>
						                </div>
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">Client Name</label>
							                <label class="col-xs-6 col-md-6" style="font-weight: 500;"><?= $username ?></label>
						                </div>
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">Client Contact</label>
							                <label class="col-xs-6 col-md-6" style="font-weight: 500;"><?= $contactNum ?></label>
						                </div>
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">Client Email</label>
							                <label class="col-xs-6 col-md-6" style="font-weight: 500;"><?= $email ?></label>
						                </div>
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">Appointment Time</label>
							                <label class="col-xs-6 col-md-6" style="font-weight: 500;"><?= $appointment_time ?></label>
						                </div>
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">Submission Time</label>
							                <label class="col-xs-6 col-md-6" style="font-weight: 500;"><?= $submit_time ?></label>
						                </div>
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">Purpose</label>
							                <label class="col-xs-6 col-md-6" style="font-weight: 500; text-align: justify;"><?= $purpose ?></label>
						                </div>
						              </div>
						            </div>

						            <div class="box-body" style="margin-top: 1pc;">
						            	<div class="row">
						            		<div class="col-xs-12 col-md-12">
						            			<div class="col-xs-12 col-sm-12 col-md-6" style="border-top: 2px solid #DD4B39; padding: 25px;">
						            				<div class="row">
						            					<form id="comment-form">
						            						<input type="hidden" name="appoint_id_hidden" id="appoint_id_hidden" value="<?= $id ?>">
							            					<div class="col-sm-6 col-md-4 col-xs-4">
							            						<label>Status</label>
							            					</div>
							            					<div class="col-sm-6 col-md-8 col-xs-8">
							            						<select id="status_review" name="status_review" class="form-control">
							            							<option <?php if($status == 'Pending' ){ ?> selected <?php } ?> value="Pending">Pending</option>
							            							<option <?php if($status == 'On Running' ){ ?> selected <?php } ?> value="On Running">On Running</option>
							            							<option <?php if($status == 'Cancel' ){ ?> selected <?php } ?> value="Cancel">Cancel</option>
							            							<option <?php if($status == 'Completed' ){ ?> selected <?php } ?> value="Completed">Completed</option>
							            						</select>
							            					</div>
							            					<div class="col-sm-6 col-md-4 col-xs-4" style="margin-top: 1pc;">
							            						<label>Comment</label>
							            					</div>
							            					<div class="col-sm-6 col-md-8 col-xs-8" style="margin-top: 1pc;">
							            						<?php if($comment == '-----') { ?>
							            							<textarea id="comment" name="comment" class="form-control"  placeholder="Write comment against this appointment."></textarea>
																<?php
							            							}
							            							else
							            							{
							            						?>
							            							<textarea id="comment" name="comment" class="form-control"  placeholder="Write comment against this appointment."><?= $comfun->check_data($comment); ?></textarea>
							            							<label style="font-weight: 400; float:right;">Last Comment Time: <?= $comment_time ?></label>
							            						<?php
							            							}
							            						?>
							            					</div>
							            					<div class="col-12" style="float: right; margin-right: 10px; margin-top: 1pc;" >
							            						<button type="submit" class="btn btn-primary">Save</button>
							            					</div>
							            				</form>
						            				</div>
						            			</div>
						            			<div class="col-md-offset-1 col-xs-12 col-sm-12 col-md-5" style="border-top: 2px solid #DD4B39; padding: 0px 25px;">
						            				<?php
						            					if($reply == '-----')
						            					{
						            				?>
								            				<form id="reply-form">
									            				<div class="col-12" style="text-align: center; margin-top: 5px;">
								            						<label>Reply back to Client</label>
								            					</div>
									            				<div class="col-12" style="margin-top: 1pc;">
									            					<input type="hidden" name="appoint_replyid" id="appoint_replyid" value="<?= $id ?>">
									            					<input type="hidden" name="appoint_reply_username" id="appoint_reply_username" value="<?= $username ?>">
									            					<input type="hidden" name="appoint_replyemail" id="appoint_replyemail" value="<?= $email ?>">
									            					<input type="hidden" name="appoint_reply_car_model" id="appoint_reply_car_model" value="<?= $car_model ?>">
									            					<input type="hidden" name="appoint_reply_purpose" id="appoint_reply_purpose" value="<?= $purpose ?>">
									            					<input type="hidden" name="appoint_reply_appointment_time" id="appoint_reply_appointment_time" value="<?= $appointment_time ?>">
									            					<input type="hidden" name="appoint_reply_submit_time" id="appoint_reply_submit_time" value="<?= $submit_time ?>">

								            						<textarea name="reply_toClient" id="reply_toClient" placeholder="Reply back to client" class="form-control" rows="4"></textarea>
								            					</div>
								            					<div class="col-12" style="float: right; margin-top: 1pc;  margin-bottom: 5px;" >
								            						<button type="submit" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Reply  <i class="fa fa-reply"></i></button>
								            					</div>
								            				</form>
								            		<?php
								            			}
								            			else
								            			{
								            		?>
								            			<div class="col-12" style="text-align: center; margin-top: 5px;">
						            						<label>Replied to Client</label>
						            					</div>
							            				<div class="col-12" style="margin-top: 1pc;">
							            					<textarea disabled class="form-control" rows="4"><?= $reply ?></textarea>
							            				</div>
								            		<?php
								            			}
								            		?>

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
  		}
  	}
}
else
{
  header("Location: login.php");
}
?>
<script type="text/javascript">
	$(document).ready(function(){
        $("#comment-form").submit(function(event){
            var appoint_id_hidden   = $("#appoint_id_hidden").val().trim();
            var comment            	= $("#comment").val().trim();
            var status_review 		= $('#status_review').find(":selected").text();

            if((appoint_id_hidden != '') && (status_review != ''))
            {
            	var formData = new FormData(this);
                $.ajax({
                    url: 'ajax_call/appointment/appointment-comment.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if(data == 'saved')
                        {
                            warning_sweatAlert("Appointment Comment", "Comment saved.");
                            location.reload();
                        }
                        else{
                            error_sweatAlert("Appointment Comment", data);
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
            else
            {
                error_sweatAlert("Appointment Comment", "Please provide at least status review.");
            }
            
            event.preventDefault();
        });

        $("#reply-form").submit(function(event){
            var appoint_replyid   = $("#appoint_replyid").val().trim();
            var reply_toClient    = $("#reply_toClient").val().trim();

            if((appoint_replyid != '') && (reply_toClient != ''))
            {
            	var formData = new FormData(this);
                $.ajax({
                    url: 'ajax_call/appointment/reply_to_client.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if(data == 'replied')
                        {
                            success_sweatAlert("Reply to Client", "Reply send to client");
                            location.reload();
                        }
                        else{
                            error_sweatAlert("Reply to Client", "Error: " + data);
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
            else
            {
                warning_sweatAlert("Reply to Client", "Please enter your reply");
            }
            
            event.preventDefault();
        });
    });
</script>
