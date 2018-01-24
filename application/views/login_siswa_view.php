     <!-- Content Header (Page header) -->
      <section class="content-header text-center">
        <h1>
          Login
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="login-box" style="margin-top: 25px;">
  <div class="login-logo" style="margin-bottom: 13px;">
    <!-- <img src="<?php echo base_url(); ?>assets/images/logo_ugm.png" style="max-width: 75pt;"> -->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Log in to your account</p>

    <?php
                  $failed = $this->session->flashdata('failed');
                    if(!empty($failed)){
                      echo '<div class="alert alert-danger alert-dismissable">';
                      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                      echo '<i class="icon fa fa-warning"></i>';
                      echo $failed;
                      echo '</div>';
                    }

                  $success = $this->session->flashdata('success');
                  if(!empty($success)){
                      echo '<div class="alert alert-success alert-dismissable">';
                      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                      echo '<i class="icon fa fa-check"></i>';
                      echo $success;
                      echo '</div>';
                  }
                ?>

    <form action="<?php echo base_url(); ?>index.php/auth/login_siswa_submit" id="login-form" enctype="multipart/form-data" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?php echo $this->session->flashdata('username_error'); ?>" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="<?php echo $this->session->flashdata('password_error'); ?>" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
          <p class="captcha-img text-center">
            <?php echo $captchaImg; ?>
          </p>
        <input type="text" class="form-control" name="captcha" placeholder="Captcha" style="margin-bottom: 5px" required />
        <a href="#" class="reload-captcha refreshCaptcha btn btn-info btn-sm tex" ><i class="glyphicon glyphicon-refresh"></i></a>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-8">
              <label><a href="#" data-toggle="modal" data-target="#forget"><u>Forgot your password?</u></a></label>
        </div>
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="<?php echo base_url(); ?>index.php/auth/register_siswa" class="btn btn-block btn-social btn-google btn-flat center">Don't have an account register here</a>
    </div>
    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

      </section>
      <!-- /.content -->
    

    <div class="modal fade" id="forget">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Forget Password</h4>
                    </div>
                    <div class="modal-body">
                        <div class=>
                          <h3 class="text-red text-center" style="font-weight: 600;">Please Contact Your Administrator !</h3>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->  