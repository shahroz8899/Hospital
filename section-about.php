<!-- Section: Welcome -->
    <section id="about">
      <div class="container pb-0">
        <div class="row">
          <div class="col-md-4">
            <div class="border-10px p-30 pt-10 pb-0">
              <h5><i class="fa fa-pencil-square-o text-theme-colored"></i> Need Help?</h5>
              <p class="mt-0 text-uppercase">Just make an appointment to get help from our experts</p>

              <!-- Appontment Form Starts -->
              <form id="help-form" name="clinic-appointment-form">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input id="username" name="username" class="form-control" type="text" required="" placeholder="Enter Name" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input id="email" name="email" class="form-control email" required type="email" placeholder="Enter Email" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input id="contact_num" name="contact_num" class="form-control email" required type="text" placeholder="Enter Contact Number" aria-required="true">
                    </div>
                  </div>
                </div>
                <div class="form-group mb-10">
                  <textarea id="purpose" name="purpose" class="form-control" required placeholder="Enter Message" rows="5" aria-required="true"></textarea>
                </div>
                <div class="form-group mb-0 mt-20">
                  <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                  <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Send Message</button>
                </div>
              </form>

              <script type="text/javascript">
                  $(document).ready(function(){
                      $("#help-form").submit(function(event){
                          var username            = $("#username").val().trim();
                          var email               = $("#email").val().trim();
                          var contact_num         = $("#contact_num").val().trim();
                          var purpose             = $("#purpose").val().trim();

                          // if((username != '') && (email != '') && (contact_num != '') && (purpose != ''))
                          // {
                              var formData = new FormData(this);
                              $.ajax({
                                  url: 'ajax/submit-help.php',
                                  type: 'POST',
                                  data: formData,
                                  success: function (data) {
                                      if(data == 'submitted')
                                      {
                                          // warning_sweatAlert("New Category!!!", "Category already exists");
                                          success_sweatAlert("The Family Clinic Help", "We have received your query. We will contact you soon. Thank You!")
                                          $("#help-form")['0'].reset();
                                      }
                                      else{
                                          error_sweatAlert("The Family Clinic Help", "Sorry for Inconvenience, Something went wrong. Error: " + data);
                                      }
                                  },
                                  cache: false,
                                  contentType: false,
                                  processData: false
                              });
                          // }
                          // else
                          // {
                          //   warning_sweatAlert("The Family Clinic Help","Please provide all credentials.");
                          // }
                          
                          event.preventDefault();
                      });
                  });
              </script>
              <!-- Appontment Form Ends -->
            </div>
          </div>
          <div class="col-md-4">
            <h3 class="text-gray-silver font-playfair mt-10 mt-sm-30 mb-0">About</h3>
            <h1 class="text-gray font-playfair mt-0">The Family Clinic</h1>
            <p><em>One of the world's leading clinic providing safe & compassionate care at its best for everyone.</em></p>
            <p class="mt-20">We provide medical care related to pregnancy or childbirth and deliver diagnose, treat, and help prevent diseases of women. Particularly those which are affecting the reproductive system....</p>
            <!-- <p class="mt-20"><img src="images/signature.png" alt=""></p> -->
            <a href="about.php" class="btn btn-default btn-lg mt-15 mb-md-30">Read more</a>
          </div>
          <div class="col-md-4">
            <img src="images/about/about2.png" alt="">
          </div>
        </div>
      </div>
    </section>
