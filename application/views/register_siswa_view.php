<!-- Content Header (Page header) -->

<section class="content-header">
        <h1 class="text-center">
          Register
        </h1>
<div class="col-md-offset-2 col-md-8 col-xs-12">
<div class="register-box" style="min-width: 100%;margin-top: 25px;">
  <div class="register-box-body">

    <?php
      $failed = $this->session->flashdata('failed');
        if(!empty($failed)){
          echo '<div class="alert alert-danger alert-dismissable">';
          echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
          echo '<i class="icon fa fa-warning"></i>';
          echo $failed;
          echo '</div>';
        }
    ?>

    <form method="post" enctype="multipart/form-data" class="form-horizontal" id="register-form" action="<?php echo base_url();?>index.php/auth/daftar">

      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Username</label>
        <div class="col-md-9">
        <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?php echo $this->session->flashdata('username_error'); ?>" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Password</label>
        <div class="col-md-9">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="<?php echo $this->session->flashdata('password_error'); ?>" passwordCheck="passwordCheck" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Confirm Password</label>
        <div class="col-md-9">
        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password" value="<?php echo $this->session->flashdata('confirm_password_error'); ?>" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span id='confirm_message'></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Email</label>
        <div class="col-md-9">
        <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $this->session->flashdata('email_error'); ?>" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">NIS</label>
        <div class="col-md-9">
        <input type="number" class="form-control" placeholder="NIS" name="nis" id="nis" value="<?php echo $this->session->flashdata('nis_error'); ?>" required>
        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Nama Lengkap</label>
        <div class="col-md-9">
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" id="nama" value="<?php echo $this->session->flashdata('nama_error'); ?>" required>
        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group">
      <label class="col-md-3 control-label">Jenis Kelamin</label>
      <div class="col-md-9">
      <select class="form-control" name="jenkel" id="jenkel">
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
      </select>
      </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Tempat Lahir</label>
        <div class="col-md-9">
        <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempatlahir" id="tempatlahir" value="<?php echo $this->session->flashdata('tempatlahir_error'); ?>" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Tanggal Lahir</label>
        <div class="col-md-9">
        <input type="date" class="form-control" placeholder="01-02-1999" name="tgl_lhr" id="tgl_lhr" value="<?php echo $this->session->flashdata('tgl_lhr_error'); ?>" required>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Agama</label>
        <div class="col-md-9">
        <input type="text" class="form-control" placeholder="Agama" name="agama" id="agama" value="<?php echo $this->session->flashdata('agama_error'); ?>" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Alamat Siswa</label>
        <div class="col-md-9">
        <textarea class="form-control" rows="3" placeholder="Alamat Siswa" name="alamatsiswa" id="alamatsiswa" required><?php echo $this->session->flashdata('alamatsiswa_error'); ?></textarea>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">No HP</label>
        <div class="col-md-9">
        <input type="number" class="form-control" placeholder="No HP" name="nohp" id="nohp" value="<?php echo $this->session->flashdata('nohp_error'); ?>" required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Asal SMK</label>
        <div class="col-md-9">
        <input type="text" class="form-control" placeholder="Asal SMK" name="asal" id="asal" value="<?php echo $this->session->flashdata('asal_error'); ?>" required>
        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Jurusan</label>
        <div class="col-md-9">
        <input type="text" class="form-control" placeholder="Rekayasa Perangkat Lunak" name="jurusan" id="jurusan" value="<?php echo $this->session->flashdata('jurusan_error'); ?>" required>
        <span class="glyphicon glyphicon-education form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">No Telp Sekolah</label>
        <div class="col-md-9">
        <input type="number" class="form-control" placeholder="No Telp Sekolah" name="notelp" id="notelp" value="<?php echo $this->session->flashdata('notelp_error'); ?>" required>
        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Alamat Sekolah</label>
        <div class="col-md-9">
        <textarea class="form-control" rows="3" placeholder="Alamat Sekolah" name="alamatsekolah" id="alamatsekolah" required><?php echo $this->session->flashdata('alamatsekolah_error'); ?></textarea>
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Tanggal Mulai</label>
        <div class="col-md-9">
        <input type="date" class="form-control" placeholder="01-01-2018" name="tgl_mulai" id="tgl_mulai" value="<?php echo $this->session->flashdata('tgl_mulai_error'); ?>" required>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Tanggal Selesai</label>
        <div class="col-md-9">
        <input type="date" class="form-control" placeholder="30-03-2018" name="tgl_selesai" id="tgl_selesai" min="<?php echo date("Y-m-d");?>" value="<?php echo $this->session->flashdata('tgl_selesai_error'); ?>" required>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group has-feedback">
        <label class="col-md-3 control-label">Upload Identitas</label>
        <div class="col-md-9">
        <input type="file" class="form-control" name="identitas" id="identitas" required>
        <span class="glyphicon glyphicon-picture form-control-feedback"></span>
        </div>
      </div>
      <div class="form-group">
      <p id="captImg" class="captcha-img text-center"><?php echo $captchaImg; ?></p>
        <label class="col-md-3 control-label">Captcha</label>
        <div class="col-md-8">
        <input type="text" class="form-control" name="captcha" placeholder="Captcha" style="margin-bottom: 5px"/>
        </div>
        <div class="col-md-1" style="margin-left: -15px">
        <a href="#" class="reload-captcha refreshCaptcha btn btn-info btn-sm" ><i class="glyphicon glyphicon-refresh"></i></a>
        </div>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-6 col-xs-offset-3">
          <input type="submit" value="Register" class="btn btn-primary btn-block btn-flat">
        </div>
        <!-- /.col -->
      </div>
    </form>

      <div style="text-align: center;padding-top: 10px;">
          Already have an account?<a href="<?php echo base_url(); ?>index.php/auth/login_siswa"><u> Log in </u></a>
      </div>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

</div>
</section>
<!-- /.content -->
    
