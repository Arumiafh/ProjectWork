<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa PKL
        <small>DSSDI UGM</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data tables</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Data Siswa PKL</h3>
            </div>
            <div class="box-body">  
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/petugas/edit_siswa_submit/<?php echo $siswa->SISWA_ID; ?>">
<?php
    echo '
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="'.$siswa->USERNAME.'">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" value="'.$siswa->PASSWORD.'">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="'.$siswa->ACCOUNT_EMAIL.'">
                      </div>
                      <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control" name="nis" value="'.$siswa->NIS.'">
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="'.$siswa->NAMA_SISWA.'">
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jenkel" value="'.$siswa->JENKEL_SISWA.'">
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempatlahir" value="'.$siswa->TEMPATLAHIR_SISWA.'">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl_lhr" value="'.$siswa->TANGGALLAHIR_SISWA.'">
                      </div>
                      <div class="form-group">
                        <label>Agama</label>
                        <input type="text" class="form-control" name="agama" value="'.$siswa->AGAMA_SISWA.'">
                      </div>
                      <div class="form-group">
                        <label>Alamat Siswa</label>
                        <textarea class="form-control" name="alamatsiswa">'.$siswa->ALAMAT_SISWA.'</textarea>
                      </div>
                      <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="text" class="form-control" name="nohp" value="'.$siswa->NOHP_SISWA.'">
                      </div>
                      <div class="form-group">
                        <label>Asal SMK</label>
                        <input type="text" class="form-control" name="asal" value="'.$siswa->ASAL_SMK.'">
                      </div>
                      <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" value="'.$siswa->JURUSAN.'">
                      </div>
                      <div class="form-group">
                        <label>Nomor Telp Sekolah</label>
                        <input type="text" class="form-control" name="notelp" value="'.$siswa->NOTELP_SMK.'">
                      </div>
                      <div class="form-group">
                        <label>Alamat SMK</label>
                        <textarea class="form-control" name="alamatsekolah">'.$siswa->ALAMAT_SMK.'</textarea>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="text" class="form-control" name="tgl_mulai" value="'.$siswa->TGL_MULAI.'">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="text" class="form-control" name="tgl_selesai" value="'.$siswa->TGL_SELESAI.'">
                      </div>
                      <div class="form-group">
                        <label>Identitas</label>
                        <img src="'.base_url().'uploads/'.$siswa->FOTOIDENTITAS_SISWA.'" class="user-image form-control" alt="User Image" style="height: inherit">
                      </div>
                      <div class="form-group">
                        <input type="file" class="form-control" name="identitas">
                      </div>

  ';
?>
            <div class="form-group">
                <input type="submit" class="btn btn-primary pull-right" value="Submit">
                <a href="<?php echo base_url(); ?>index.php/petugas/data_siswa" class="btn btn-danger">Cancel</a>
            </div>
            </form>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
