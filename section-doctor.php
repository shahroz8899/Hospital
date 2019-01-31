<?php
  $sql = "SELECT * FROM doctor WHERE id='1'";
  $run = $db->config()->query($sql);
  $data = mysqli_fetch_assoc($run);
  
  $doctor_name        = $data['doctor_name'];
  $specialization     = $data['specialization'];
  $profession_detail  = $data['profession_detail'];
  $image              = $data['image'];
  $fb_link            = $data['fb_link'];
  $gmail_link         = $data['gmail_link'];
  $twitter_link       = $data['twitter_link'];
?>
<!-- Section: Doctors -->
    <section id="doctors" class="divider" data-bg-img="images/photos/1.jpg">
      <div class="container-fluid p-0">
        <div class="section-content p-90 p-sm-10">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="  maxwidth600 mt-sm-50 mb-sm-50">
                <div class="item">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="team-thum">
                        <img src="<?= $image ?>" alt="">
                      </div>
                    </div>
                    <div class="col-md-6 pl-60 pt-40 pl-sm-15">
                      <h3 class="team-title">Dr.</h3>
                      <h1 class="team-name mt-0"><?= $doctor_name ?></h1>
                      <h5 class="team-subtitle text-theme-colored"><?= $specialization ?></h5>
                      <p class="team-description"><?= $profession_detail ?></p>
                      <ul class="social-icons icon-dark icon-theme-colored icon-sm m-0 mt-30">
                        <li><a href="<?= $fb_link ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?= $gmail_link ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?= $twitter_link ?>"><i class="fa fa-google-plus"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- <div class="item">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="team-thum">
                        <img src="images/team/team2.jpg" alt="">
                      </div>
                    </div>
                    <div class="col-md-6 pl-60 pt-40 pl-sm-15">
                      <h3 class="team-title">Dr.</h3>
                      <h1 class="team-name mt-0">Hasan Smith</h1>
                      <h5 class="team-subtitle text-theme-colored">Cardiologist</h5>
                      <p class="team-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae illo sint debitis maxime neque accusantium dicta, totam. Corporis libero porro praesentium sapiente illo debitis quaerat eos, dolorem beatae voluptas, hic aperiam aspernatur maxime. Tempora vero, consequatur.</p>
                      <ul class="social-icons icon-dark icon-theme-colored icon-sm m-0 mt-30">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="item">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="team-thum">
                        <img src="images/team/team3.jpg" alt="">
                      </div>
                    </div>
                    <div class="col-md-6 pl-60 pt-40 pl-sm-15">
                      <h3 class="team-title">Dr.</h3>
                      <h1 class="team-name mt-0">John Doe</h1>
                      <h5 class="team-subtitle text-theme-colored">Neurologiest</h5>
                      <p class="team-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae illo sint debitis maxime neque accusantium dicta, totam. Corporis libero porro praesentium sapiente illo debitis quaerat eos, dolorem beatae voluptas, hic aperiam aspernatur maxime. Tempora vero, consequatur.</p>
                      <ul class="social-icons icon-dark icon-theme-colored icon-sm m-0 mt-30">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>