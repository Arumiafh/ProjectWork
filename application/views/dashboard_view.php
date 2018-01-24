<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-7">
          <!-- small box -->


          <?php
            if($this->session->userdata('ROLE') == 'Admin')
            {
              echo '
              <div class="small-box bg-aqua">
            <div class="inner">
              <h3>'.$total_v.'</h3>

              <p>Siswa PKL</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="'.base_url().'index.php/petugas/data_siswa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>';
            }
          
            else if ($this->session->userdata('ROLE') == 'Pembimbing') {
              echo '
              <div class="small-box bg-aqua">
            <div class="inner">
              <h3>'.$total_v.'</h3>

              <p>Siswa PKL</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="'.base_url().'index.php/petugas/data_siswa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>';
            }
          ?>

        <div class="col-lg-4 col-xs-7">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $total_s; ?></h3>

              <p>Rekap Absen Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo base_url(); ?>index.php/petugas/rekap_absen" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-7">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $total_l; ?></h3>

              <p>Rekap Nilai Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo base_url(); ?>index.php/petugas/rekap_nilai" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <!-- ./col -->
        
        <!-- ./col -->

        <?php
              if($this->session->userdata('ROLE') == 'Admin'){
                echo '
                <div class="col-lg-4 col-xs-7">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>'.$total_p.'<sup style="font-size: 20px"></sup></h3>

                      <p>Pembimbing</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="'.base_url().'index.php/petugas/data_pembimbing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                  <div class="col-lg-4 col-xs-7">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>'.$total_a.'</h3>

                      <p>Admin</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="'.base_url().'index.php/petugas/data_admin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                ';
              }
            ?>
      
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <div class="row">
        <div class="col-lg-5">
              <!-- USERS LIST -->

<!-- if != empty maka panel nilai muncul -->

              <?php
                if($this->session->userdata('ROLE') == 'Admin')
                {
                  echo ' <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Admin Approval</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">'.$total_u.'New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </div>
                </div>';
                }

              ?>
             
                <!-- /.box-header -->
                <div class="box-body">
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
                  if($this->session->userdata('ROLE') == 'Admin')
                  {
                    echo '<ul class="users-list clearfix">';
                  
                 
                    foreach ($siswa1 as $data) {
                      if($data->STATUS == 'unverified'){
                        echo '
                        <li>
                          <a href="#" data-toggle="modal" data-target="#modal'.$data->SISWA_ID.'">
                          <img src="'.base_url().'assets/images/blank.png" style="" alt="User Image">
                          <a class="users-list-name" href="#" data-toggle="modal" data-target="#modal'.$data->SISWA_ID.'">'.$data->NAMA_SISWA.'</a>
                          <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#accept'.$data->SISWA_ID.'">Accept</a>
                          <a href="'.base_url().'index.php/petugas/unverified/'.$data->SISWA_ID.'" class="btn btn-xs btn-danger" style="margin-left: 1px">Deny</a>
                        </li>
                      ';}
                    }
                
                  echo '</ul>';  }?>


                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <?php
                  if($this->session->userdata('ROLE') == 'Admin')
                  {
                    echo '<div class="box-footer text-center">
                  <a href="#" data-toggle="modal" data-target="#viewAll" class="uppercase">View All Users</a>
                </div>';
                  }
                ?>
                
               
                <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div> -->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->

      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>

  <?php
    foreach ($siswa1 as $data) {
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
                        <input type="text" class="form-control" name="username" value="'.$data->NAMA_SISWA.'" disabled>
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
                        <textarea class="form-control" name="alamatsmk" disabled>'.$data->ALAMAT_SMK.'</textarea>
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


              <div class="modal fade" id="viewAll">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">All User</h4>
                    </div>
                    <div class="modal-body">
                      <ul class="users-list clearfix">
                      <?php
                        foreach ($siswa1 as $data) {
                          if($data->STATUS == 'unverified'){
                            echo '
                            <li>
                              <img src="'.base_url().'assets/images/blank.png" style="max-width: 80px" alt="User Image">
                              <a class="users-list-name" href="#" data-toggle="modal" data-target="#modal'.$data->SISWA_ID.'">'.$data->NAMA_SISWA.'</a>
                              <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#accept'.$data->SISWA_ID.'">Accept</a><a href="'.base_url().'index.php/petugas/unverified/'.$data->SISWA_ID.'" class="btn btn-xs btn-danger" style="margin-left: 1px">Deny</a>
                            </li>
                          ';}
                        }
                      ?>
                      </ul>
                      <!-- /.users-list -->
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

              <?php 
              foreach ($siswa1 as $data) {
              echo '
              <div class="modal fade" id="accept'.$data->SISWA_ID.'">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Accept box</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <label class="control-label">Silahkan pilih pembimbing terlebih dahulu untuk siswa PKL</label>
                        <form method="post" enctype="multipart/form-data" action="'.base_url().'index.php/petugas/verified/'.$data->SISWA_ID.'">
                        <select class="form-control" name="pembimbing">
                          '; 
                          foreach($namapembimbing as $data2){
                            echo '
                            <option value="'.$data2->PETUGAS_ID.'">'.$data2->NAMA_PETUGAS.'</option>
                          ';} echo '
                        </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-md btn-info pull-right" value="Submit"/>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->  
              ';}?>

