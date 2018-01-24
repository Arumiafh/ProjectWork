<div class="col-xs-8 col-xs-offset-2 bg-col bg-col1">
<div class="register-box mar-top" style="width: 70%;">
  <div class="register-box-body">
    <div class="alert alert-warning text-center">
      <h3><b>Status Akun : UNVERIFIED</b></h3>
    </div>
    <div class="text-center">
      <h4><p>Anda belum terdaftar sebagai peserta siswa PKL di DSSDI UGM<br>Tunggu sampai Admin mengkonfirmasi akun anda</p></h4>
    </div>
    <div class="box box-warning">
      <div class="box-header with-border text-center">
        <h4><b>Data Diri</b></h4>
      </div>
      <div class="box-body">
        <dl class="dl-horizontal">
        <h4>
         <dt>Nama</dt> 
         <dd>: <?php echo $profil->NAMA_SISWA; ?></dd>
         <dt>Asal Sekolah</dt>
         <dd>: <?php echo $profil->ASAL_SMK; ?><dd>
         <dt>Jurusan</dt>
         <dd>: <?php echo $profil->JURUSAN; ?></dd>
         <dt>Status</dt>
         <dd>: Menunggu</dd>
        </h4>
        </dl>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 col-xs-offset-4" style="margin-bottom: 20px">
          <a href="<?php echo base_url(); ?>index.php/auth/logout" class="btn btn-danger btn-block">Log Out</a>
        </div>
        <!-- /.col -->
      </div>
    </div>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
</div>