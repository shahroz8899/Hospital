<?php
include_once 'Session.php';
if($session->check_login())
{
  include_once 'layouts/header.php';
  include_once 'layouts/content-header.php';
  include_once 'layouts/left-sidebar.php';

?>

  <div class="content-wrapper">
    <?php include_once 'layouts/page-header.php'; ?>

	    <!-- Main content -->
	    <section class="content">
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
