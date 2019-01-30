<?php
	include_once 'layouts/header-sp.php';
?>

<div class="body-overlay"></div>

<div id="wrapper" class="clearfix">

  	<?php include_once 'layouts/top-header.php'; ?>

  	<!-- Start main-content -->
	<div class="main-content">
	    <!-- Section: inner-header -->
	    <section class="inner-header divider layer-overlay overlay-deep" data-bg-img="images/bg/bg5.jpg">
	      <div class="container pt-90 pb-50">
	        <!-- Section Content -->
	        <div class="section-content">
	          <div class="row"> 
	            <div class="col-md-12 xs-text-center">
	              <h2 class="font-28">Prices</h2>
	              <ol class="breadcrumb white mt-10">
	                <li><a href="#">Home</a></li>
	                <li class="active text-theme-colored">Prices</li>
	              </ol>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>

	    <!-- Top Prices -->
	    <?php include_once 'layouts/section-top-prices.php'; ?>
	    
	    <!-- Section: Schedule -->
	    <section id="schedule" class="divider parallax layer-overlay overlay-light" data-bg-img="images/bg/bg1.jpg">
	      <div class="container pt-80 pb-60">
	        <div class="section-content">
	          <div class="row">
	            <div class="col-md-12">
	              <table class="table table-striped table-schedule">
	                <thead>
	                  <tr class="bg-theme-colored">
	                    <th>Time</th>
	                    <th>Treatment</th>
	                    <th>Price</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	<?php 
				            $sql = "SELECT * FROM treatmentprices";
				            $run = $db->config()->query($sql);
				            while($data = mysqli_fetch_assoc($run)){
				              $title              = $data['title'];
				              $price              = $data['price'];
				              $treatment_time     = $data['treatment_time'];
				          ?>
  	    	            <tr>
		                  <td><?= $treatment_time ?></td>
	    	              <td><strong><?= $title ?></strong></td>
		                  <td><?= $price ?> Rs/...</td>
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
	    </section>

	</div>
  	<!-- end main-content -->
</div>

<?php
	include_once 'layouts/footer-sp.php';
?>