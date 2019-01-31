<!-- Section: Pricing -->
<section id="pricing" data-bg-img="images/pattern/p4.png">
  <div class="container pb-50">
    <div class="section-title text-center">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="text-uppercase mt-0">Pricing</h2>
          <div class="title-icon">
            <img class="mb-10" src="images/title-icon.png" alt="">
          </div>
          <p>As such, it's difficult to find a reasonable private gynecologist. But here you will find affordable gynecologist <br> with quality and coverage of prenatal care and basic gynecological services.</p>
        </div>
      </div>
    </div>
    <div class="section-content">
      <div class="row">  <!-- fadeInLeft fadeInUp fadeInRight -->
        <?php 
            $sql = "SELECT * FROM treatmentprices WHERE top_treatment='1'";
            $run = $db->config()->query($sql);
            while($data = mysqli_fetch_assoc($run)){
              $title              = $data['title'];
              $price              = $data['price'];
              $detail             = $data['detail'];
              $treatment_time     = $data['treatment_time'];
          ?>
        <div class="col-xs-12 col-sm-4 col-md-4 hvr-float-shadow mb-sm-30 wow fadeInRight animation-delay1">
          <div class="pricing-table style1 bg-white-light border-10px text-center">
            <div class="pricing-icon">
              <i class="icon-stethoscopes"></i>
            </div>
            <div class="pt-40 pb-60">
              <h3 class="package-type mt-40"><?= $title ?></h3>
              <!-- <p>Hurry to grap your offer now</p> 
              <h1 class="price text-theme-colored mb-10">24<span class="font-48">%</span></h1>-->
              <h1 class="price text-theme-colored mb-10"><?= $price ?></h1>
              <!-- <h4 class="discount">Discount</h4> -->
              <p style="text-align: center; padding-right: 20px; padding-left: 20px;"><?= $detail ?></p> 
              <p><?= $treatment_time ?></p>
              <a class="btn btn-colored btn-theme-colored text-uppercase" href="#" style="cursor: pointer;" data-toggle="modal" data-target="#modal_appontment_form_at_about">Make an Appointment!</a><br>
            </div>
          </div>
        </div>
        <?php
          } 
        ?>
      </div>
    </div>
  </div>
</section>
    