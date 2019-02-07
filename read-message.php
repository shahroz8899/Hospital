<?php
include_once 'Session.php';
if($session->check_login())
{
  if(isset($_GET['contactmail_id']))
  {
    require_once '../commonclass.php';
    $comfun = new commonclass();
    $contactmail_id = $comfun->check_data($_GET['contactmail_id']);
    
    require_once '../model/dbconfig.php';
    $db   = new database();    
    $sql = "UPDATE contactus SET  _read='1' WHERE id='$contactmail_id'";
      if ($db->config()->query($sql)) 
      {
        include_once 'layouts/header.php';
        include_once 'layouts/content-header.php';
        include_once 'layouts/left-sidebar.php';
       
  ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <?php 
            $page_title     = 'Message';
            $page_subTitle  = 'Detail';
            include_once 'layouts/page-header.php'; 
          ?>
      <section class="content">
        <?php include_once 'layouts/navbar.php'; ?>
        <div class="row">
          <div class="col-md-3">
            <a href="compose.php" class="btn btn-primary btn-block margin-bottom">Compose</a>
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Folders</h3>

                <div class="box-tools">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="contactus-messages.php"><i class="fa fa-inbox"></i> Inbox
                    <span class="label label-primary pull-right">12</span></a></li>
                  <li><a href="contactus-sent.php"><i class="fa fa-envelope-o"></i> Sent</a></li>
                  <!-- <li><a href="contactus-trash.php"><i class="fa fa-trash-o"></i> Trash</a></li> -->
                </ul>
              </div>
            </div>
          </div>

  <?php 
    if(!empty($contactmail_id))
    {
      $sql = "SELECT * FROM contactus WHERE id='$contactmail_id'";
      $run = $db->config()->query($sql);
      $data = mysqli_fetch_assoc($run);
      
      $username = $data['name'];
      $email    = $data['email'];
      $subject  = $data['subject'];
      $message  = $data['message'];
      $time     = $data['time'];
      
  ?>
      <script type="text/javascript">
        function delete_mail(mail_id){

          $.ajax({
             type: 'POST',
              url: 'ajax_call/contactus/delete.php',
              data: {'del_contactus_id': mail_id},
              success: function(res){
                if(res="del"){
                  alert("Mail deleted");
                  // window.location.href="contactus-messages.php";
                  window.history.back();
                }
                else{
                  error_sweatAlert("Mail Deletion", "Oops! Something went wrong, Error: " + res);
                }
              },
              error: function(res){
                error_sweatAlert("Mail Deletion", "error " + res);
              }
          });
        }

        function reply_to(subject, email, contactmail_id){
          $.ajax({
            type: 'POST',
            url: 'ajax_call/email_fields.php',
            data: {'subject': subject, 'email': email, 'contactmail_id':contactmail_id},
            success: function(res){
              $("#reply").html(res);
              $("#btn_reply").hide();
            },
            error: function(res){
              error_sweatAlert("Reply to Client", "error " + res);
            }
          });
        }
      </script>
      
      <div class="col-md-9">
        <div class="box box-primary">
          
          <div class="box-body no-padding">
            <div class="mailbox-read-info">
              <h3><?= $subject ?></h3>
              <h5>From: <?= $email ?>
                <span class="mailbox-read-time pull-right"><?= $time ?></span></h5>
            </div>
            <div class="mailbox-read-message">
              <p><?= $message ?></p>
            </div>
          </div>
          <div id="reply" style="margin-left: 35px;margin-right: 35px">
            <?php
              $sql = "SELECT * FROM contactus_sent Where contactus_mail_id='$contactmail_id'";
              $run = $db->config()->query($sql);
              if($run->num_rows>0)
              {
                $data = mysqli_fetch_assoc($run);
                $snd_mail_id  = $data['id'];
                $snd_message  = $data['message'];
                $sendTime     = $data['send_time'];
                $no_reply     ="reply exist";
            ?>
            <div class="box" style=" background-color: #9f9f9f;">
              <div class="box-body" >
                <textarea id="message" name="message" placeholder="Message" style="width: 100%; height: auto; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $snd_message ?></textarea>
                  <label style="float: right;"><?= $sendTime ?></label>
              </div>
            </div>
          <?php
            }
          ?>
          </div>
          <div class="box-footer">
            <div class="pull-right">
              <button type="button" onclick="delete_mail(<?= $contactmail_id ?>)" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
              <button type="button" id="btn_reply" <?php if(isset($no_reply)){ ?> style= "display: none;" <?php }?> class="btn btn-default" onclick="reply_to('<?= $subject ?>' ,'<?= $email ?>','<?= $contactmail_id ?>')"  ><i class="fa fa-reply"></i> Reply</button>
            </div>
          </div>
        </div>
      </div>
 
  <?php
    }
    else
    {
      $sent_mail_id = $_GET['sent_mail_id'];
      
      $sql = "SELECT * FROM contactus_sent WHERE id='$sent_mail_id'";
      $run = $db->config()->query($sql);
      $data = mysqli_fetch_assoc($run);
      
      $email    = $data['email'];
      $subject  = $data['subject'];
      $message  = $data['message'];
      $time     = $data['send_time'];
  ?>
     
      <div class="col-md-9">
        <div class="box box-primary"> 
          <div class="box-body no-padding">
            <div class="mailbox-read-info">
              <h3><?= $subject ?></h3>
              <h5>From: <?= $email ?>
                <span class="mailbox-read-time pull-right"><?= $time ?></span></h5>
            </div>
            <div class="mailbox-read-message">
              <textarea placeholder="Message here..." id="compose-textarea" name="compose-textarea" class="form-control"style="height: 300px"><?= $message ?></textarea>
              <!--<p><?= $message ?></p>-->
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="pull-right">
            <button type="button" onclick="delete_sent_mail(<?= $sent_mail_id ?>)" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
          </div>
        </div>
      </div>
          
  <?php
    }
  ?>
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
    function delete_sent_mail(mail_id){
      
      $.ajax({
         type: 'POST',
          url: 'ajax_call/contactus/delete_sent_mail.php',
          data: {'del_contactus_id': mail_id},
          success: function(res){
            if(res="del"){
              success_sweatAlert("Mail Deletion", "Mail deleted");
              window.history.back();
            }
            else{
              error_sweatAlert("Mail Deletion", "Oops! Something went wrong, Error: " + res);
            }
          },
          error: function(res){
            error_sweatAlert("Mail Deletion", "error " + res);
          }
      });
    }
    $(function () {
      $("#compose-textarea").wysihtml5();
    });
</script>