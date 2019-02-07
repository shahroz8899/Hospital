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
	      $page_title     = 'Subscriber';
	      $page_subTitle  = '';
	      include_once 'layouts/page-header.php'; 
	    ?>
    	<section class="content">
	    	<?php include_once 'layouts/navbar.php'; ?>

	    	<!-- Main content -->
    		<section class="content">
		      <div class="row">
		        <div class="col-md-4">
		          <div class="box box-solid">
		            <div class="box-header with-border" style="text-align: center;">
		            	<a class="btn btn-app" href="compose.php">
		                	<i class="fa fa-bullhorn"></i> Notify Subscribers
		            	</a>
		            </div> 
		            <!-- /.box-header -->
		            <div class="box-body">
		              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active">
		                    <img src="http://placehold.it/900x500/39CCCC/ffffff&text=I+Love+Bootstrap" alt="First slide">

		                    <div class="carousel-caption">
		                      First Slide
		                    </div>
		                  </div>
		                  <div class="item">
		                    <img src="http://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">

		                    <div class="carousel-caption">
		                      Second Slide
		                    </div>
		                  </div>
		                  <div class="item">
		                    <img src="http://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">

		                    <div class="carousel-caption">
		                      Third Slide
		                    </div>
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		              </div>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		        </div>
		        <div class="col-md-8">
		        	<div class="mailbox-controls">
			        	<div class="table-responsive mailbox-messages" id="contactus_mail_table">
			                <table id="contactus-mails" class="table table-hover table-striped">
			                  <thead>
			                    <tr>
			                      <td style="text-align: center; width: 20%;">Subscriber ID</td>
			                      <td>Email</td>
			                      <td>Subscribe Time</td>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php
			                      require_once '../model/dbconfig.php';
			                      $db   = new database();    
			                      $sql = "SELECT * FROM subscribe";
			                      $run = $db->config()->query($sql);
			                      while($data = mysqli_fetch_assoc($run))
			                      {
			                        $id = $data['id'];
			                        $email = $data['email'];
			                        $subscribe_time = $data['subscribe_time'];
			                    ?>
			                    <tr>
			                      <td class="mailbox-name" style="text-align: center; width: 20%;"><?= $id ?></td>
			                      <td class="mailbox-name"><?= $email ?></td>
			                      <td class="mailbox-name"><?= $subscribe_time ?></td>
			                      <?php
			                    }
			                    ?>
			                  </tbody>
			                </table>
			            </div>
			        </div>
		        </div>
		      </div>
			</section>
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