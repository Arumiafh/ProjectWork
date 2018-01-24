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

    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/dist/css/skins/_all-skins.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url(); ?>index.php/auth/home" class="navbar-brand"><b>PKL </b>UGM</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>index.php/auth/login_siswa">Login</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/auth/register_siswa">Register</a></li>
            <li><a href="https://dssdi.ugm.ac.id">About Us</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container container-mobile p-t-md">
 
    <?php
      $this->load->view($main_view);
    ?>

    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
 <footer class="main-footer">
 <div class="container">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 <a href="https://dssdi.ugm.ac.id">DSSDI UGM</a>.</strong> All rights
    reserved.
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/plugins/iCheck/icheck.min.js"></script>
<!-- validate -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/lib/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/dist/jquery.validate.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
  $( document ).ready( function () {
      var base_url = '<?php echo base_url(); ?>';
         $('.reload-captcha').click(function(event){
             event.preventDefault();
             $.ajax({
                 url:base_url+'index.php/auth/refresh_captcha',
                 success:function(data){
                     $('.captcha-img').replaceWith("<p class='captcha-img text-center'>" + data + "</p>");
                 }
             });            
          });

     $.validator.addMethod("checkUsername", 
        function(value, element) {
            var result = false;
            $.ajax({
                type:"GET",
                async: false,
                url: base_url+'index.php/auth/checkusername/' + value,
                success: function(msg) {
                    result = (msg == "exists") ? false : true;
                }
            });
            return result;
        }, 
        "Username Already Exists"
    );
    
    jQuery.validator.addMethod("passwordCheck",
        function(value, element, param) {
            if (this.optional(element)) {
                return true;
            } else if (!/[0-9]/.test(value)) {
                return false;
            } else if(!/[a-z]/.test(value)){
                return false;
            }

            return true;
        },
        "Password must contain number & alphabet");

        $('#password, #confirm_password').on('keyup', function () {
          if ($('#password').val() == $('#confirm_password').val()) {
            $('#confirm_message').html('Matching').css('color', 'green');
          } else 
            $('#confirm_message').html('Not Matching').css('color', 'red');
        });

     $( "#register-form" ).validate( {
        rules: {
          username: {
            required: {
                depends:function(){
                    $(this).val($.trim($(this).val()));
                    return true;
                } 
            },
            minlength: 4,
            checkUsername: true
          },
          password: {
            required: {
                depends:function(){
                    $(this).val($.trim($(this).val()));
                    return true;
                }
            },
            minlength: 6
            
          },
          confirm_password: {
            required: {
                depends:function(){
                    $(this).val($.trim($(this).val()));
                    return true;
                }
            },
            
          },
          nis: {
            required: {
                depends:function(){
                    $(this).val($.trim($(this).val()));
                    return true;
                }
            },
            minlength: 4
          },
          nama: {
            required: true,
            minlength: 6
          },
          tempatlahir: {
            required: true,
            minlength: 4
          },
          agama: {
            required: true,
            minlength: 5
          },
          alamatsiswa: {
            required: true,
            minlength: 10 
          },
          nohp:{
            required: {
                depends:function(){
                    $(this).val($.trim($(this).val()));
                    return true;
                }
            },
            minlength: 9
          },
          asal:{
            required: true,
            minlength: 10
          },
          jurusan:{
            required: true,
            minlength: 5
          },
          notelp:{
            required: {
                depends:function(){
                    $(this).val($.trim($(this).val()));
                    return true;
                }
            },
            minlength: 8
          },
          alamatsekolah: {
            required: true,
            minlength: 10 
          },
          captcha: {
            required: true 
          },
        },
        messages: {
          username: {
            required: "Please enter a username",
            minlength: "Your username must const of at least 4 characters"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          confirm_password: {
            required: "Please provide a confirm password"
          },
          nis: {
            required: "Please enter your NIS number",
            minlength: "Your NIS number must const of at least 4 characters"
          }, 
          nama: {
            required : "Please enter your full name",
            minlength: "Your full name muct const of at leat 6 characters"
          },
          tempatlahir: {
            required : "Please enter your place of birth",
            minlength: "Your place of birth must const of at least 4 characters"
          },
          agama: {
            required : "Please enter your religion",
            minlength: "Your religion must const of at least 5 characters"
          },
          alamatsiswa: {
            required : "Please enter your home address",
            minlength: "Your home addres must const of at least 10 characters"
          }, 
          nohp:{
            required : "Please enter your phone number",
            minlength: "Your phone number must be at least 9 characters long"
          }, 
          asal:{
            required : "Please enter which school are you from",
            minlength: "Your school must const of at least 10 characters"
          },
          jurusan:{
            required : "Please enter your department",
            minlength: "Your department must const of at least 5 characters"
          },
          notelp:{
            required : "Please enter your school phone number",
            minlength: "Your school phone number must be at least 8 characters long"
          }, 
          alamatsekolah: {
            required : "Please enter your school address",
            minlength: "Your school addres must const of at least 10 characters"
          },
          captcha: {
            required : "Please enter captcha"
          },  
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        },
      } );       

    } );
</script>
</body>
</html>
