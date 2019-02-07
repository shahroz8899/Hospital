<?php
include_once 'Session.php';
if($session->check_login())
{
  include_once 'layouts/header.php';
  include_once 'layouts/content-header.php';
  include_once 'layouts/left-sidebar.php';

?>

  <script type="text/javascript">

    var clicked = false;
    function check_uncheck_all(){
      $(".ads_Checkbox").prop("checked", !clicked);
      clicked = !clicked;
    }

    function del_mail() {
        var arr = $('.ads_Checkbox:checked').map(function(){
            return this.value;
        }).get();

        $.ajax({
          type: 'POST',
          url: 'ajax_call/contactus/delete_multiple.php',
          data: {'del_contactus_ids': arr},
          success: function(res){
            if(res = "del"){
              window.location.href="contactus-sent.php";
            }
            else{
              alert("Oops! Something went wrong, Error: " + res);
            }
          },
          error: function(res){
            alert("error " + res);
          }
        });
    }

    function refresh_contactmails(){
        $.ajax({
          type: 'POST',
          url: 'ajax_call/contactus/refresh-sent.php',
          data: {'contactus_sent-mails':'contactus_mails'},
          success: function(res){
            $("#contactus_mail_table").html(res);   
          },
          error: function(res){
            alert("error " + res);
          }
        });
    }
    
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php 
      $page_title     = 'Contact Us';
      $page_subTitle  = 'Sent Mails';
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
                  <!-- <span class="label label-primary pull-right">12</span></a></li> -->
                <li><a href="contactus-sent.php"><i class="fa fa-envelope-o"></i> Sent</a></li>
                <!-- <li><a href="contactus-trash.php"><i class="fa fa-trash-o"></i> Trash</a></li> -->
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>
            </div>
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <button  class="btn btn-default btn-sm checkbox-toggle"><input type="checkbox" onclick="check_uncheck_all()" />
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" onclick="del_mail()"><i class="fa fa-trash-o"></i></button>
                </div>
                <button type="button" class="btn btn-default btn-sm" onclick="refresh_contactmails()"><i class="fa fa-refresh"></i></button>
              </div>
              <div class="table-responsive mailbox-messages" id="contactus_mail_table">
                <table id="contactus-mails" class="table table-hover table-striped">
                  <thead style="display: none">
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      require_once '../model/dbconfig.php';
                      $db   = new database();    
                      $sql = "SELECT * FROM contactus_sent WHERE trash='0'";
                      $run = $db->config()->query($sql);
                      while($data = mysqli_fetch_assoc($run))
                      {
                        $id                 = $data['id'];
                        $contactus_mail_id  = $data['contactus_mail_id'];
                        $email              = $data['email'];
                        $subject            = $data['subject'];
                        $message            = substr($data['message'], 0, 10);
                        $time               = $data['send_time'];
                    ?>
                    <tr>
                      <td><input type="checkbox" class="ads_Checkbox" name="checkmail_id[]" value="<?= $id ?>"></td>
                      <td class="mailbox-name"><a href="read-message.php?contactmail_id=<?=$contactus_mail_id?>&sent_mail_id=<?= $id ?>"><?= $email ?></a></td>
                      <td class="mailbox-subject"><b><?= $subject ?></b> - <?= $message ?>...
                      </td>
                      <td class="mailbox-date"><?= $time ?></td>
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
<!-- page script -->
<script>
  $(function () {
    $('#contactus-mails').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
