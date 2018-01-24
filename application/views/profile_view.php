<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PKL UGM | User Profile</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
  .text-overflow {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
  }

  </style>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">UGM</span>
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
              <i class="glyphicon glyphicon-user"></i>
              <span class="hidden-xs"><?php echo $profil->NAMA_SISWA; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>uploads/<?php echo $profil->FOTODIRI_SISWA; ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $profil->NAMA_SISWA; ?>
                  <small><?php echo $profil->ASAL_SMK; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <a href="#" data-toggle="modal" data-target="#edit" class="btn btn-info btn-flat">Edit Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>index.php/auth/logout" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>uploads/<?php echo $profil->FOTODIRI_SISWA; ?>" class="img-circle" alt="User Image" style="height: 45px">
        </div>
        <div class="pull-left info">
          <p><?php echo $profil->NAMA_SISWA; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url(); ?>index.php/siswa/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url(); ?>index.php/siswa/profile">
            <i class="fa fa-dashboard"></i> <span>User Profile</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/siswa/rekap_absen"><i class="fa fa-circle-o"></i> Rekap Absen <i class="fa fa-user pull-right"></i></a></li>
            <li><a href="#" data-toggle="modal" data-target="#nilaiSiswa"><i class="fa fa-circle-o"> Lihat Nilai </i><i class="fa fa-lock pull-right"></i></a></li>
          </ul>
        </li>
        </li>
        <li class="header">Manual</li>
        <li><a href="<?php echo base_url(); ?>index.php/siswa/user_manual" target="_blank"><i class="fa fa-book"></i> <span>User Manual</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary container">
            <div class="box-body box-profile">
              <img src="<?php echo base_url(); ?>uploads/<?php echo $profil->FOTODIRI_SISWA; ?>" class="profile-user-img img-responsive img-circle" alt="User profile picture" style="height: 100px">

              <h3 class="profile-username text-center"><?php echo $profil->NAMA_SISWA; ?></h3>
              <div class="form-group">
              <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/siswa/foto_profil">
                <label>Ganti Foto</label>
                <input type="file" class="form-control" name="foto">
                <input type="submit" class="btn btn-sm btn-info" value="Submit" style="margin-top: 4px">
              </form>
              </div>
              <hr>
              <strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>
              <p class="text-muted">
                <?php echo $profil->ASAL_SMK; ?>
              </p>
              <hr>
              <strong><i class="fa fa-pencil margin-r-5"></i> Jurusan</strong>
              <p class="text-muted">
                <?php echo $profil->JURUSAN; ?>
              </p>
              <hr>
              <strong><i class="fa fa-calendar margin-r-5"></i> Tanggal Lahir</strong>
              <p class="text-muted">
                <?php echo $profil->TANGGALLAHIR_SISWA; ?>
              </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#absen" data-toggle="tab">Absen</a></li>
              <li><a href="#activity" data-toggle="tab">Aktivitas</a></li>
              <li><a href="#settings" data-toggle="tab">Tulis Aktivitasmu</a></li>
            
            </ul>

            <div class="tab-content">

            <div class="active tab-pane" id="absen">
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
                <?php 
                  $disabled = "";
                  if($cekabsen > 0){
                    $disabled = "disabled";
                  }
                ?>
                <form method="post" action="<?php echo base_url(); ?>index.php/siswa/absen"" class="form-horizontal">
                  <div class="form-group">
                  <div>
                    <div class="col-sm-offset-4 col-sm-8">
                      <button type="submit" name="absen" class="btn btn-primary" <?php echo $disabled; ?>>Absence For Today</button>
                    </div>
                    </div>
                  </div>
                </form>
              </div>

              <div class="tab-pane" id="activity">
              <?php
                  $failed = $this->session->flashdata('failed');
                    if(!empty($failed)){
                      echo '<div class="alert alert-danger alert-dismissable">';
                      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                      echo '<i class="icon fa fa-warning"></i>';
                      echo $failed;
                      echo '</div>';
                    }

              foreach ($kegiatan as $data) {
                echo '
                  <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img src="'.base_url().'uploads/'.$data->FOTODIRI_SISWA.'" class="img-circle img-bordered-sm" alt="User Image">
                        <span class="username">
                          <a href="#">'.$data->NAMA_SISWA.'</a>
                          <a href="'.base_url().'index.php/siswa/del_kegiatan/'.$data->ID_KEGSIS.'" class="pull-right btn-box-tool"><i class="fa fa-trash"></i></a>
                        </span>
                    <span class="description">'.$data->TGL_KEGSIS.'</span>
                  </div>
                  <!-- /.user-block -->
                  <p class="text-overflow">
                    '.$data->ISI_KEGSIS.'
                  </p>
                  <a href="#" data-toggle="modal" data-target="#readmore'.$data->ID_KEGSIS.'" class="btn btn-sm btn-info">Read More</a>
                </div>
                <!-- /.post -->
              ';}
                ?>
              </div>
              <!-- /.tab-pane -->
            
              <div class="tab-pane" id="settings">
                <form method="post" action="<?php echo base_url(); ?>index.php/siswa/kegiatan" class="form-horizontal">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo date('Y-m-d')?>" name="tgl_kegiatan" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tulis Aktivitasmu</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" style="height: 200px" name="kegiatan" required></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 <a href="https://dssdi.ugm.ac.id">DSSDI UGM</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->



              <div class="modal fade" id="edit">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Profil</h4>
                    </div>
                    <div class="modal-body">
                      <form method="post" id="edit" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/siswa/edit_submit">
                  <?php
                      echo '
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="'.$profil->USERNAME.'">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="pwd" name="password" value="'.$profil->PASSWORD.'">
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
                        <label>NIS</label>
                        <input type="text" class="form-control" name="nis" value="'.$profil->NIS.'">
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="'.$profil->NAMA_SISWA.'">
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jenkel" value="'.$profil->JENKEL_SISWA.'">
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempatlahir" value="'.$profil->TEMPATLAHIR_SISWA.'">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl_lhr" value="'.$profil->TANGGALLAHIR_SISWA.'">
                      </div>
                      <div class="form-group">
                        <label>Agama</label>
                        <input type="text" class="form-control" name="agama" value="'.$profil->AGAMA_SISWA.'">
                      </div>
                      <div class="form-group">
                        <label>Alamat Siswa</label>
                        <textarea class="form-control" name="alamatsiswa">'.$profil->ALAMAT_SISWA.'</textarea>
                      </div>
                      <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="text" class="form-control" name="nohp" value="'.$profil->NOHP_SISWA.'">
                      </div>
                      <div class="form-group">
                        <label>Asal SMK</label>
                        <input type="text" class="form-control" name="asal" value="'.$profil->ASAL_SMK.'">
                      </div>
                      <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" value="'.$profil->JURUSAN.'">
                      </div>
                      <div class="form-group">
                        <label>Nomor Telp Sekolah</label>
                        <input type="text" class="form-control" name="notelp" value="'.$profil->NOTELP_SMK.'">
                      </div>
                      <div class="form-group">
                        <label>Alamat SMK</label>
                        <textarea class="form-control" name="alamatsekolah">'.$profil->ALAMAT_SMK.'</textarea>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="text" class="form-control" name="tgl_mulai" value="'.$profil->TGL_MULAI.'">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="text" class="form-control" name="tgl_selesai" value="'.$profil->TGL_SELESAI.'">
                      </div>
                      <div class="form-group">
                        <label>Identitas</label>
                        <img src="'.base_url().'uploads/'.$profil->FOTOIDENTITAS_SISWA.'" class="user-image form-control" alt="User Image" style="height: inherit">
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





<?php
  foreach ($kegiatan as $data) {
    echo '
  
              <div class="modal fade" id="readmore'.$data->ID_KEGSIS.'">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Aktivitas Siswa</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-solid">
                          <div class="box-header with-border">
                            <i class="fa fa-user"></i>

                            <b><h2 class="box-title">'.$data->NAMA_SISWA.'</h2></b><small> - '.$data->ASAL_SMK.'</small>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <blockquote>
                              <p>'.$data->ISI_KEGSIS.'</p>
                              <small>Created date <cite title="Source Title">'.$data->TGL_KEGSIS.'</cite></small>
                            </blockquote>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
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

  ';}
?>  


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



<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/AdminLTE-2.4.0/dist/js/demo.js"></script>
</body>
</html>
