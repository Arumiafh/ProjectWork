<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa PKL
        <small>DSSDI UGM</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data</a></li>
        <li class="active">Tabel Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <!--   <h3 class="box-title">Data Siswa PKL</h3> -->
              <!-- <div class="" style="margin-top: 10px">
                <a href="#" data-toggle="modal" data-target="#tambahSiswa" class="btn btn-md btn-primary">Tambah Siswa</a>
              </div> -->
            
            <?php
                  $failed = $this->session->flashdata('failed');
                    if(!empty($failed)){
                      echo '<div class="alert alert-danger alert-dismissable" style="margin-top: 10px">';
                      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                      echo '<i class="icon fa fa-warning"></i>';
                      echo $failed;
                      echo '</div>';
                    }

                  $success = $this->session->flashdata('success');
                  if(!empty($success)){
                      echo '<div class="alert alert-success alert-dismissable" style="margin-top: 10px">';
                      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                      echo '<i class="icon fa fa-check"></i>';
                      echo $success;
                      echo '</div>';
                  }
                ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover table-responsive">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Nama</th>
                  <th>NIS</th>
                  <th>Asal Sekolah</th>
                  <th>Jurusan</th>
                  <th>Pembimbing</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($siswa as $data) {
                  if($data->STATUS == 'verified'){
                  $disabled = "";
                  foreach ($ceknilai as $datacek) {
                    if($datacek->SISWA_ID == $data->SISWA_ID){
                      $disabled = "disabled";
                      break;
                    }
                  }
                  echo '
                  <tr>
                    <td>'.$no++.'</td>
                    <td>'.$data->USERNAME.'</td>
                    <td>'.$data->PASSWORD.'</td>
                    <td>'.$data->NAMA_SISWA.'</td>
                    <td>'.$data->NIS.'</td>
                    <td>'.$data->ASAL_SMK.'</td>
                    <td>'.$data->JURUSAN.'</td>
                    <td>'.$data->NAMA_PETUGAS.'</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal'.$data->SISWA_ID.'" style="margin-right: 5px">Detail</button>
                      </td>
                      <td>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#nilaiSiswa'.$data->SISWA_ID.'" style="margin-right: 5px" '.$disabled.'>Nilai</button>
                      </td>
                      <td>
                      <a href="'.base_url().'index.php/petugas/edit_siswa/'.$data->SISWA_ID.'" class="btn btn-info btn-sm" style="margin-right: 5px">Edit</a>
                      </td>
                      <td>
                      <a href="'.base_url().'index.php/petugas/del_siswa/'.$data->SISWA_ID.'" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>

                ';}
                  }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
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


  <?php
    foreach ($siswa as $data) {
      echo '
      <div class="modal fade" id="modal'.$data->SISWA_ID.'">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Detail Siswa</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="'.$data->USERNAME.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" value="'.$data->PASSWORD.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="'.$data->ACCOUNT_EMAIL.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>NIS</label>
                        <input type="text" class="form-control" name="nis" value="'.$data->NIS.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="'.$data->NAMA_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jenkel" value="'.$data->JENKEL_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempatlahir" value="'.$data->TEMPATLAHIR_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl_lhr" value="'.$data->TANGGALLAHIR_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Agama</label>
                        <input type="text" class="form-control" name="agama" value="'.$data->AGAMA_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Alamat Siswa</label>
                        <textarea class="form-control" name="alamatsiswa" disabled>'.$data->ALAMAT_SISWA.'</textarea>
                      </div>
                      <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="text" class="form-control" name="nohp" value="'.$data->NOHP_SISWA.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Asal SMK</label>
                        <input type="text" class="form-control" name="asal" value="'.$data->ASAL_SMK.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" value="'.$data->JURUSAN.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Nomor Telp Sekolah</label>
                        <input type="text" class="form-control" name="notelp" value="'.$data->NOTELP_SMK.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Alamat SMK</label>
                        <textarea class="form-control" name="alamatsekolah" disabled>'.$data->ALAMAT_SMK.'</textarea>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="text" class="form-control" name="tgl_mulai" value="'.$data->TGL_MULAI.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="text" class="form-control" name="tgl_selesai" value="'.$data->TGL_SELESAI.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Pembimbing</label>
                        <input type="text" class="form-control" name="Pembimbing" value="'.$data->NAMA_PETUGAS.'" disabled>
                      </div>
                      <div class="form-group">
                        <label>Identitas</label>
                        <img src="'.base_url().'uploads/'.$data->FOTOIDENTITAS_SISWA.'" class="user-image form-control" alt="User Image" style="height: 50%">
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
    ';}
  ?>

               <div class="modal fade" id="tambahSiswa">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tambah Siswa</h4>
                    </div>
                    <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/petugas/add_siswa">
                      <div class="form-group has-feedback">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>NIS</label>
                        <input type="number" class="form-control" placeholder="NIS" name="nis" required>
                        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
                        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                      </div>
                      <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jenkel">
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                      </select>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempatlahir" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lhr" required>
                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Agama</label>
                        <input type="text" class="form-control" placeholder="Agama" name="agama" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Alamat Siswa</label>
                        <textarea class="form-control" rows="3" placeholder="Alamat Siswa" name="alamatsiswa" required></textarea>
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>No HP</label>
                        <input type="number" class="form-control" placeholder="No HP" name="nohp" required>
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Asal SMK</label>
                        <input type="text" class="form-control" placeholder="Asal SMK" name="asal" required>
                        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" placeholder="Jurusan" name="jurusan" required>
                        <span class="glyphicon glyphicon-education form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>No Telp Sekolah</label>
                        <input type="number" class="form-control" placeholder="No Telp Sekolah" name="notelp" required>
                        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Alamat Sekolah</label>
                        <textarea class="form-control" rows="3" placeholder="Alamat Sekolah" name="alamatsekolah" required></textarea>
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tgl_mulai" placeholder="01-01-2018" required>
                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tgl_selesai" placeholder="03-03-2018" required>
                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                      </div>
                      <div class="form-group">
                        <label>Pembimbing</label>
                        <select class="form-control" name="pembimbing" id="pembimbing">
                            <?php  
                            foreach($pembimbing as $data){
                              echo '
                              <option value="'.$data->PETUGAS_ID.'">'.$data->NAMA_PETUGAS.'</option>
                            ';} ?>
                        </select>
                      </div>
                      <div class="form-group has-feedback">
                        <label>Upload Identitas</label>
                        <input type="file" class="form-control" name="identitas" required>
                        <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary pull-right" value="Submit">
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>





<?php
    foreach ($siswa as $data) {
      echo '
      <div class="modal fade" id="nilaiSiswa'.$data->SISWA_ID.'">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Nilai Siswa</h4>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="'.base_url().'index.php/petugas/nilaisiswa/'.$data->SISWA_ID.'">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nilai Sikap</label>
                        <input type="number" class="form-control" placeholder="0-100" name="nilai_sikap" required>
                      </div>
                      <div class="form-group">
                        <label>Nilai Keterampilan</label> 
                        <input type="number" class="form-control" placeholder="0-100" name="nilai_keterampilan" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary pull-right" value="Submit">
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->  
    ';}
  ?>

