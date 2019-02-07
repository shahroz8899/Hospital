<?php
include_once 'Session.php';
if($session->check_login())
{
	if(isset($_GET['message_id']))
	{
		require_once '../model/dbconfig.php';
		require_once '../commonclass.php';
		$db   = new database();    
		$comfun = new commonclass();

		$message_id = $comfun->check_data($_GET['message_id']);
		if(!empty($message_id))
		{
			$sql = "UPDATE help_messages SET  _read='1' WHERE id='$message_id'";
	        if ($db->config()->query($sql)) 
	        {
				include_once 'layouts/header.php';
				include_once 'layouts/content-header.php';
				include_once 'layouts/left-sidebar.php';

				$sql = "SELECT * FROM help_messages WHERE id='$message_id'";
				$run = $db->config()->query($sql);
				$data = mysqli_fetch_assoc($run);

				$id 				= $data['id'];
				$username 			= $data['name'];
				$email 				= $data['email'];
				$contactNum 		= $data['contactNum'];
				$purpose 			= $data['message'];
				$_read 				= $data['_read'];
				$comment 			= $data['comment'];
				$reply 				= $data['reply'];
				$reply_time 		= $data['reply_time'];
				$comment_time 		= $data['comment_time'];
				$send_time 			= $data['send_time'];
	
		
?>

				<div class="content-wrapper">
			    	<?php 
				      $page_title     = 'Help Message';
				      $page_subTitle  = 'Details';
				      include_once 'layouts/page-header.php'; 
				    ?>
			    	
			    	<section class="content">
			      
			      		<?php include_once 'layouts/navbar.php'; ?>
			      		
			      		<div class="row">
					        <div class="col-xs-12">
					          <div class="box">
					            <div class="box-header" style="text-align: center; margin-left: 3pc; margin-right: 3pc;" >
					            	<h3 class="box-title" style="font-weight: bold; font-size: 1.5pc;">Message Details</h3>
					            </div>
					            <div class="box-body" style="margin: 1pc;">
					              <div class="box box-danger">
						            
						            <div class="box-body" style="margin-top: 1pc;">
						              <div class="row">
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">Message ID: </label>
						                	<label class="col-xs-6 col-md-6" style="font-weight: 500;">APT_ID# <?= $id ?></label>
						                </div>
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">User Name</label>
							                <label class="col-xs-6 col-md-6" style="font-weight: 500;"><?= $username ?></label>
						                </div>
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">User Contact</label>
							                <label class="col-xs-6 col-md-6" style="font-weight: 500;"><?= $contactNum ?></label>
						                </div>
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">User Email</label>
							                <label class="col-xs-6 col-md-6" style="font-weight: 500;"><?= $email ?></label>
						                </div>
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">Submission Time</label>
							                <label class="col-xs-6 col-md-6" style="font-weight: 500;"><?= $send_time ?></label>
						                </div>
						                <div class="col-xs-12 col-md-6 col-sm-12">
						                	<label class="col-xs-6 col-md-6">Message</label>
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
						            						<input type="hidden" name="help_id_hidden" id="help_id_hidden" value="<?= $id ?>">
							            					<div class="col-sm-6 col-md-4 col-xs-4" style="margin-top: 1pc;">
							            						<label>Comment</label>
							            					</div>
							            					<div class="col-sm-6 col-md-8 col-xs-8" style="margin-top: 1pc;">
							            						<?php if($comment == '-----') { ?>
							            							<textarea id="comment" name="comment" class="form-control"  placeholder="Write comment against this message."></textarea>
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
									            					<input type="hidden" name="help_replyid" id="help_replyid" value="<?= $id ?>">
									            					<input type="hidden" name="help_reply_username" id="help_reply_username" value="<?= $username ?>">
									            					<input type="hidden" name="help_replyemail" id="help_replyemail" value="<?= $email ?>">
									            					<input type="hidden" name="help_reply_purpose" id="help_reply_purpose" value="<?= $purpose ?>">
									            					<input type="hidden" name="help_reply_submit_time" id="help_reply_submit_time" value="<?= $send_time ?>">

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
            var help_id_hidden   = $("#help_id_hidden").val().trim();
            var comment          = $("#comment").val().trim();

            if((help_id_hidden != '') && (comment != ''))
            {
            	var formData = new FormData(this);
                $.ajax({
                    url: 'ajax_call/help_message/help-comment.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if(data == 'saved')
                        {
                            success_sweatAlert("Help Comment", "Comment saved.");
                            location.reload();
                        }
                        else{
                            error_sweatAlert("Help Comment", "Error: " + data);
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
            else
            {
                warning_sweatAlert("Help Comment", "Please enter your comment.");
            }
            
            event.preventDefault();
        });

        $("#reply-form").submit(function(event){
            var help_replyid   	= $("#help_replyid").val().trim();
            var reply_toClient  = $("#reply_toClient").val().trim();

            if((help_replyid != '') && (reply_toClient != ''))
            {
            	var formData = new FormData(this);
                $.ajax({
                    url: 'ajax_call/help_message/reply_to_client.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if(data == 'replied')
                        {
                            success_sweatAlert("Reply to Client","Reply successfully send.");
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
                warning_sweatAlert("Reply to Client", "Please provide reply.");
            }
            
            event.preventDefault();
        });
    });
</script>
