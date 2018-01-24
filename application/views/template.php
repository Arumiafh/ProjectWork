<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PKL UGM | Dashboard</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/morris.js/morris.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PKL</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PKL </b>UGM</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('FOTODIRI_PETUGAS');  ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('NAMA_PETUGAS');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('FOTODIRI_PETUGAS'); ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('NAMA_PETUGAS'); ?>
                  <small><?php echo $this->session->userdata('ROLE'); ?> DSSDI - UGM</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div>
                  <a href="#" data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm btn-flat">Edit Profil</a>
                  <a href="#" data-toggle="modal" data-target="#foto" class="btn btn-sm btn-warning btn-flat">Ganti foto profil</a>
                  <a href="<?php echo base_url(); ?>index.php/auth/logout" class="btn btn-danger btn-sm btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('FOTODIRI_PETUGAS'); ?>" class="img-circle" alt="User Image" style="height: 45px">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('NAMA_PETUGAS'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url('index.php/petugas/dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/petugas/data_siswa"><i class="fa fa-circle-o"></i> Siswa <i class="fa fa-user pull-right"></i></a></li>
            
            <?php
              if($this->session->userdata('ROLE') == 'Admin'){
                echo '
                  <li><a href="'.base_url().'index.php/petugas/data_pembimbing"><i class="fa fa-circle-o"></i> Pembimbing <i class="fa fa-lock pull-right"></i></a></li>
                  <li><a href="'.base_url().'index.php/petugas/data_admin"><i class="fa fa-circle-o"></i> Admin <i class="fa fa-key pull-right"></i></a></li>
                ';
              }
            ?>
          </ul>
          <li>
            <a href="<?php echo base_url('index.php/petugas/data_kegiatan'); ?>">
            <i class="fa fa-comments"></i> <span>Kegiatan Siswa</span>
          </a>
          </li>

          <?php 
            if($this->session->userdata('ROLE') != 'Siswa')
            {
              echo '
              <li>
                <a href="'.base_url().'index.php/petugas/rekap_absen">
                  <i class="fa fa-comments"></i> <span>Rekap Absen Siswa</span>
                </a>
              </li>

              <li>
                <a href="'.base_url().'index.php/petugas/rekap_nilai">
                  <i class="fa fa-comments"></i> <span>Rekap Nilai Siswa</span>
                </a>
              </li>';
            }
          ?>

        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->
  <?php
    $this->load->view($main_view);
  ?>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 <a href="https://dssdi.ugm.ac.id">DSSDI UGM</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- Modal -->
            <div class="modal fade" id="edit">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Profil</h4>
                    </div>
                    <div class="modal-body">
                      <form method="post" enctype="multipart/form-data" id="edit" action="<?php echo base_url();?>index.php/petugas/edit_profil_pembimbing">
                  <?php
                      echo '
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="'.$profil->USERNAME.'">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="pwd" value="'.$profil->PASSWORD.'">
                      </div>
                      <div class="form-group">
                        <input type="checkbox" id="show-hide" name="show-hide" value=""/>
                        <label for="show-hide">Show password</label>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="'.$profil->ACCOUNT_EMAIL.'">
                      </div>
                      <div class="form-group">
                        <label>NIP</label>
                        <input type="text" class="form-control" name="nip" value="'.$profil->NIP.'">
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="'.$profil->NAMA_PETUGAS.'">
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jenkel" value="'.$profil->JENKEL_PETUGAS.'">
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat">'.$profil->ALAMAT_PETUGAS.'</textarea>
                      </div>
                      <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="text" class="form-control" name="no_hp" value="'.$profil->NOHP_PETUGAS.'">
                      </div>

                      <div class="form-group">
                        <label>Identitas</label>
                        <img src="'.base_url().'uploads/'.$profil->FOTOIDENTITAS_PETUGAS.'" class="user-image form-control" alt="User Image" style="height: inherit">
                      </div>
                      <div class="form-group">
                        <input type="file" class="form-control" name="identitas">
                      </div>
                      ';
                    ?>
                      </div>
                      <div class="modal-footer">
                        <input type="submit" class="btn btn-primary pull-right" value="Submit">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

            <div class="modal fade" id="foto">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Foto Profil</h4>
                    </div>
                    <div class="modal-body">
                      <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/petugas/foto_profil">
                      <div class="form-group">
                        <label>Silahkan pilih foto</label>
                        <input type="file" accept="image/*" onchange="loadFile(event)" name="foto" style="margin-bottom: 19px">
                        <img id="output" style="max-width: 100%"/>
                        <script>
                          var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                          };
                        </script>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-primary pull-right" value="Submit">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      </form>
                    </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->


<!-- /.modal -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/morris.js/morris.min.js"></script>
<!-- page script -->
<script>
  $(function () {
     $('#example1').DataTable({
       'paging'      : true,
       'lengthChange': true,
       'searching'   : true,
       'ordering'    : true,
       'info'        : true,
       'autoWidth'   : true
     })
  })
</script>
<script>
(function() {
  
  var PasswordToggler = function( element, field ) {
    this.element = element;
    this.field = field;
    
    this.toggle();  
  };
  
  PasswordToggler.prototype = {
    toggle: function() {
      var self = this;
      self.element.addEventListener( "change", function() {
        if( self.element.checked ) {
          self.field.setAttribute( "type", "text" );
        } else {
          self.field.setAttribute( "type", "password" );  
        }
            }, false);
    }
  };
  
  document.addEventListener( "DOMContentLoaded", function() {
    var checkbox = document.querySelector( "#show-hide" ),
      pwd = document.querySelector( "#pwd" ),
      form = document.querySelector( "#edit" );
      
      var toggler = new PasswordToggler( checkbox, pwd );
    
  });
  
})();
</script>
</body>
</html>
