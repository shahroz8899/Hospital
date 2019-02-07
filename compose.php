<?php
include_once 'Session.php';
if($session->check_login())
{
  include_once 'layouts/header.php';
  include_once 'layouts/content-header.php';
  include_once 'layouts/left-sidebar.php';
?>

  <script type="text/javascript">
    function reset_form(){
      $('#compose-form')[0].reset();
    }
  </script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php 
      $page_title     = 'Compose';
      $page_subTitle  = '';
      include_once 'layouts/page-header.php'; 
    ?>
    

    <!-- Main content -->
    <section class="content">
      <?php include_once 'layouts/navbar.php'; ?>
      <div class="row">
        <div class="col-md-3">
          <a href="contactus-messages.php" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
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
                  <!-- <span class="label label-primary pull-right">12</span></a></li> -->
                <li><a href="contactus-sent.php"><i class="fa fa-envelope-o"></i> Sent</a></li>
                <!-- <li><a href="contactus-trash.php"><i class="fa fa-trash-o"></i> Trash</a></li> -->
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>
            </div>
            <form id="compose-form">
              <div class="box-body">
                <div class="form-group">
                  <input class="form-control" type="hidden" name="contact_id" id="contact_id" value="00">
                  <input class="form-control" type="email" placeholder="To:" name="emailto" id="emailto">
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Subject:" name="subject" id="subject">
                </div>
                <div class="form-group">
                  <textarea placeholder="Message here..." id="compose-textarea" name="compose-textarea" class="form-control" style="height: 300px">
                  </textarea>
                </div>
              </div>
              <div class="box-footer">
                <div class="pull-right">
                  <!-- <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button> -->
                  <button type="reset" onclick="reset_form()" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
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
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
  
  $(document).ready(function(){
    $("#compose-form").submit(function(event){
      event.preventDefault();
      var contact_id        = $("#contact_id").val().trim();
      var emailto           = $("#emailto").val().trim();
      var subject           = $("#subject").val().trim();
      var compose_textarea  = $("#compose-textarea").val().trim();
    
      if((contact_id != '') && (emailto != '') && (subject != '') && (compose_textarea != '')){
        var formData = new FormData(this);
        $.ajax({
          url: 'ajax_call/send_compose-mail.php',
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          success: function (data) {
              if(data == 'send')
              {
                success_sweatAlert("Email Send", "Email has been sent.");
                $("#compose-form")['0'].reset();
              }
              else
              {
                error_sweatAlert("Email Send", "Something went wrong, please try again later!!! data = " + data);
              }
          },
          error: function(data){
            error_sweatAlert("Email Send", "Error: " + data);
          }
        });
      }
      else
      {
        warning_sweatAlert("Email Send", "All credentials are required");
      }
    });
  });
</script>