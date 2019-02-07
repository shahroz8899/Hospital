<?php
include_once 'Session.php';
if($session->check_login())
{
  header("Location: index.php");
}
else
{
   include_once 'layouts/header.php';
    include_once '../model/dbconfig.php';
    include_once '../commonclass.php';

    $db = new database();
    $comfun = new commonclass();
    $errors = array();


    if(isset($_POST['login']))
    {
        $email      = $comfun->check_data($_POST["email"]);
        $password     = $comfun->check_data($_POST["password"]);

        if(empty($email))
        {
            array_push($errors, "Email is required");
        }
        if(empty($password))
        {
            array_push($errors, "Password is required");
        }

        if(count($errors) == 0)
        {
            $password = md5($password);

            $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
            $result = $db->config()->query($sql);
            if(mysqli_num_rows($result) == 1)
            {
              $row = mysqli_fetch_assoc($result);
              // session_start();
              $_SESSION['admin_clinic']       = "loggedin";
              $_SESSION['email']              = $email;
              $_SESSION['admin_loggedIn']     = $row['admin_loggedIn'];
              $_SESSION['admin_name']         = $row['admin_name'];
              $_SESSION['admin_role']         = $row['admin_role'];
              $_SESSION['member_since']       = $row['createdTime'];
              $_SESSION['last_loggedin_time'] = time();
              echo "<script type='text/javascript'>window.top.location='index.php';</script>"; exit;
            }
            else
            {
                array_push($errors, "wrong Email/Password combination");
            }
        }
    }

?>
    <div class="login-box">
      <div class="login-logo">
        <a href="../" style="color: #ffffff;"><b>The Family </b> Clinic</a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <?php include '../model/errors.php'; ?>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
          </div>
        </form>
        <!-- <a href="#">I forgot my password</a><br> -->
      </div>
    </div>
    <!-- /.login-box -->

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
    </script>
  </body>
</html>
<?php
}
?>