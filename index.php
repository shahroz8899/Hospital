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
      $page_title     = 'Dashboard';
      $page_subTitle  = 'Control Panel';
      include_once 'layouts/page-header.php'; 
    ?>

    <!-- Main content -->
    <section class="content">
      
      <?php include_once 'layouts/navbar.php'; ?>

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Appointments</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Appointment ID</th>
                    <th>Patient Name</th>
                    <th>Purpose</th>
                    <th>Appointment Time</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT id, username, appointment_time, purpose FROM appointment ORDER BY id DESC LIMIT 5";
                      $run = $db->config()->query($sql);
                      while($data = mysqli_fetch_assoc($run))
                      {
                        $id               = $data['id'];
                        $username         = $data['username'];
                        $appointment_time = $data['appointment_time'];
                        $purpose          = substr($data['purpose'], 0 , 20);

                        $appointment_url    = "appointment-details.php?appointment_id=" . $id;
                    ?>
                  <tr>
                    <td><a href="<?= $appointment_url ?>"><?= 'APT#' . $id ?></a></td>
                    <td><?= $username ?></td>
                    <td><?= $purpose . ' ...' ?></td>
                    <td><?= $appointment_time ?></td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-footer clearfix">
              <a href="appointments-req.php" class="btn btn-sm btn-default btn-flat pull-right">View All Appointments</a>
            </div>
          </div>

          <!-- TO DO List 
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">To Do List</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <div class="box-body">
              <ul class="todo-list">
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" value="">
                  <span class="text">Design a nice theme</span>
                  <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" value="">
                  <span class="text">Make the theme responsive</span>
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" value="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" value="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" value="">
                  <span class="text">Check your messages and notifications</span>
                  <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" value="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
              </ul>
            </div>
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
          </div>
          /.box -->

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Email</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form id="quick_email-form" name="quick_email-form">
                <div class="form-group">
                  <input type="hidden" name="contact_id" id="contact_id" value="N/A">
                  <input type="email" class="form-control" name="emailto" id="emailto" placeholder="Email to:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea class="textarea" name="compose-textarea" id="compose-textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </div>
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
          </form>
          </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Treatment Prices -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Added Price</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php
                  $sql = "SELECT id, title, detail, price FROM treatmentprices ORDER BY id DESC LIMIT 4";
                  $run = $db->config()->query($sql);
                  while($data = mysqli_fetch_assoc($run))
                  {
                    $id       = $data['id'];
                    $title    = $data['title'];
                    $price    = $data['price'];
                    $detail   = substr($data['detail'], 0 , 20);
                ?>
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/treatment-price.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="treatmentPrice.php" class="product-title"><?= $title ?>
                      <span class="label label-warning pull-right"><?= $price . '.00' ?></span></a>
                    <span class="product-description"><?= $detail ?></span>
                  </div>
                </li>
                <?php
                  }
                ?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="treatmentPrice-add.php" class="uppercase">View All Treatment Prices</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
        </section>
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
    $("#quick_email-form").submit(function(event){
      event.preventDefault();
      var contact_id        = $("#contact_id").val().trim();
      var emailto           = $("#emailto").val().trim();
      var subject           = $("#subject").val().trim();
      var compose_textarea  = $("#compose-textarea").val().trim();
    
      if((emailto != '') && (subject != '') && (compose_textarea != '')){
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
                success_sweatAlert("Quick Email", "Email has been successfully sent.");
                $("#quick_email-form")['0'].reset();
              }
              else
              {
                error_sweatAlert("Quick Email", "Something went wrong, please try again later!!! data = " + data);
              }
          },
          error: function(data){
            error_sweatAlert("Quick Email", "Error: " + data);
          }
        });
      }
      else
      {
        error_sweatAlert("Quick Email", "please enter all credentials.");
      }
    });
  });
</script>