
    <!-- Footer -->
    <!-- Footer -->
  <footer id="footer" class="footer p-0 bg-black-111">
    <div class="container pb-20">
      <div class="row mb-50">
        
      </div>
      <div class="row multi-row-clearfix">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark"> <div style="background-color: #ffffff"><img alt="" src="images/logo-footer.png"></div>
            <p class="font-12 mt-20 mb-10">We provide medical care related to pregnancy or childbirth and deliver diagnose, treat, and help prevent diseases of women. Particularly those which are affecting the reproductive system....</p>
            <a class="text-gray font-12" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a> 
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Quick Links</h5>
            <ul class="list-border list theme-colored angle-double-right">
              <!-- <li><a href="index.php">Home</a></li> -->
              <li><a href="services.php">Services</a></li>
              <li><a href="prices.php">Treatment Prices</a></li>
              <li><a href="contact-us.php">Contact us</a></li>
            </ul>
          </div>
        </div>
        <!-- <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Latest News</h5>
            <div class="latest-posts">
              <article class="post media-post clearfix pb-0 mb-10">
                <a class="post-thumb" href="#"><img src="https://placehold.it/80x55" alt=""></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="#">Sustainable Construction</a></h5>
                  <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                </div>
              </article>
              <article class="post media-post clearfix pb-0 mb-10">
                <a class="post-thumb" href="#"><img src="https://placehold.it/80x55" alt=""></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="#">Industrial Coatings</a></h5>
                  <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                </div>
              </article>
              <article class="post media-post clearfix pb-0 mb-10">
                <a class="post-thumb" href="#"><img src="https://placehold.it/80x55" alt=""></a>
                <div class="post-right">
                  <h5 class="post-title mt-0 mb-5"><a href="#">Storefront Installations</a></h5>
                  <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                </div>
              </article>
            </div>
          </div>
        </div> -->

        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Quick Contact</h5>
            <ul class="list list-border">
              <li><a href="#"><?= $contact_num ?></a></li>
              <li><a href="#"><?= $email ?></a></li>
              <li><a href="#" class="lineheight-20"><?= $address ?></a></li>
            </ul>
            
          </div>
        </div>

        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Quick Connect</h5>
            <p class="text-white mb-5 mt-15">Subscribe to our newsletter</p>
            <form id="subscriber-form" class="newsletter-form mt-10">
              <label class="display-block" for="mce-EMAIL"></label>
              <div class="input-group">
                <input type="email" name="subs-email" placeholder="Your Email"  class="form-control" data-height="37px" id="subs-email">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-colored btn-theme-colored m-0"><i class="fa fa-paper-plane-o text-white"></i></button>
                </span>
              </div>
            </form>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#subscriber-form").submit(function(event){
                        var email = $("#subs-email").val().trim();

                        if((email != ''))
                        {
                            var formData = new FormData(this);
                            $.ajax({
                                url: 'ajax/submit-subscribe.php',
                                type: 'POST',
                                data: formData,
                                success: function (data) {
                                    if(data == 'submitted')
                                    {
                                      success_sweatAlert("Subscribe Us","You are successfully Subscribed, We'll be in touch.!")
                                      $("#subscriber-form")['0'].reset();
                                    }
                                    else if(data == 'exists'){
                                      success_sweatAlert("Subscribe Us","You are already Subscribed, Thank you.!")
                                      $("#subscriber-form")['0'].reset();
                                    }
                                    else{
                                      error_sweatAlert("Subscribe Us", "Something went wrong, please try again. Error: " + data);
                                    }
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });
                        }
                        else
                        {
                          warning_sweatAlert("Subscribe Us", "Please provide us your email.");
                        }
                        
                        event.preventDefault();
                    });
                });
            </script>
            <ul class="social-icons icon-dark mt-20">
              <li><a href="<?= $facebook ?>" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
              <li><a href="<?= $twitter ?>" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
              <li><a href="<?= $google_plus ?>" data-bg-color="#A11312"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="<?= $linkedin ?>" data-bg-color="#05A7E3"><i class="fa fa-linkedin"></i></a></li>
              <!-- <li><a href="#" data-bg-color="#C22E2A"><i class="fa fa-youtube"></i></a></li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-nav bg-black-222 p-20">
      <div class="row text-center">
        <div class="col-md-12">
          <p class="text-white font-11 m-0">Copyright &copy;2018  Muhammad Shahroz Abbas Technologies. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
  <!-- end wrapper -->

  <!-- Footer Scripts -->
  <!-- JS | Custom script for all pages -->
  <script src="js/custom.js"></script>
  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
  <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
  <script type="text/javascript" src="js/sweetalert.min.js"></script>
  
  </body>
</html>