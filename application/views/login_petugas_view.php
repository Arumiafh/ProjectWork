<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PKL UGM | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style>
  .spacing {
    padding-top:7px;
    padding-bottom:7px;
  }
</style>

</head>
<body class="hold-transition login-page" style="background-color: #f5f8fa">
<div class="row" style="margin-top: 100px">
<div class="col-md-6 col-md-offset-3">
<div class="page-header">
  <a href="<?php echo base_url(); ?>index.php/auth/home"><h1 class="logo" style="color: #1e3948">Sistem Informasi <small>PKL UGM</small></h1></a>
</div>
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
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Please Sign In</h3>
  </div>
  <div class="panel-body">
  
  <div class="row">
  
<div class="col-md-5" style="text-align: center;margin-bottom: 35px;color: #1e3948">
  <h1 style="margin-bottom: -20px;font-weight: 600;letter-spacing: 4px;font-size: 33pt">Welcome</h1><br><h2 style="margin-top: 0px;">to Petugas Panel</h2>
</div>

<div class="col-md-7" style="border-left:1px solid #ccc;height:160px">
<form class="form-horizontal" action="<?php echo base_url(); ?>index.php/auth/login_petugas_submit" id="login-form" enctype="multipart/form-data" method="post">

  <!-- <input id="textinput" name="textinput" type="text" placeholder="Enter User Name" class="form-control input-md" style="margin-bottom: 20px"> -->
  <div class="has-feedback">
    <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username" value="<?php echo $this->session->flashdata('username_error'); ?>" required>
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
  </div>
  <div class="has-feedback">
    <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" style="margin-top: 18px" value="<?php echo $this->session->flashdata('password_error'); ?>" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
  </div>
  <!-- <input id="textinput" name="textinput" type="text" placeholder="Enter Password" class="form-control input-md"> -->
  <div class="spacing"><a href="#" data-toggle="modal" data-target="#forget"><small> Forgot Password?</small></a><br/></div>
  <button type="submit" class="btn btn-info btn-sm pull-right">Sign In</button>

</form>

</div>
    
</div>
    
</div>
<div class="panel-footer">
    <strong>Copyright &copy; 2017 <a href="https://dssdi.ugm.ac.id">DSSDI UGM</a>.</strong> All rights
    reserved. 
</div>
</div>
</div>
</div>

    <div class="modal fade" id="forget">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Forget Password</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                          <h3 class="text-red" style="font-weight: 600;">Please Contact Your Administrator !</h3>
                          <small style="font-weight: 600">*Or Open Documentation</small>
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

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/iCheck/icheck.min.js"></script>
<!-- validate -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/lib/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/dist/jquery.validate.js"></script>

<script type="text/javascript">
  $( document ).ready( function () {
      var base_url = '<?php echo base_url(); ?>';
         $('.reload-captcha').click(function(event){
             event.preventDefault();
             $.ajax({
                 url:base_url+'index.php/auth/refresh_captcha',
                 success:function(data){
                     $('.captcha-img').replaceWith("<p class='captcha-img'>" + data + "</p>");
                 }
             });            
          });
    } );
</script>
</body>
</html>
