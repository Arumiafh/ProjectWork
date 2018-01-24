<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rekap Absen Siswa PKL
        <small>DSSDI UGM</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/petugas/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>index.php/petugas/rekap_absen">Rekap Absen Siswa</a></li>
     <!--    <li class="active">Data tables</li>
 -->      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Rekap Absen Siswa PKL</h3> -->
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover table-responsive">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Siswa</th>
                  <th>NIS</th>
                  <th>Asal Sekolah</th>
                  <th>Jurusan</th>
                  <th>Pembimbing</th>
                  <th>Waktu Absensi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>  

                    <?php
                $no = 1;
                foreach ($absen as $data) {

                  //if($data->STATUS == 'verified'){
                  // $disabled = "";
                  // foreach ($cek as $datacek) {
                  //   if($datacek->SISWA_ID == $data->SISWA_ID){
                  //     $disabled = "disabled";
                  //     break;
                  //   }
                  // }
                  echo '
                  <tr>
                    <td>'.$no++.'</td>
                    <td>'.$data->NAMA_SISWA.'</td>
                    <td>'.$data->NIS.'</td>
                    <td>'.$data->ASAL_SMK.'</td>
                    <td>'.$data->JURUSAN.'</td>
                    <td>'.$data->NAMA_PETUGAS.'</td>
                    <td>'.$data->WAKTU_ABSENSI.'</td>

                    ';

                     if($this->session->userdata('ROLE')!='Siswa'){
                       echo '
                    <td>
                       <a href="'.base_url().'index.php/petugas/del_siswa/'.$data->SISWA_ID.'" class="btn btn-sm btn-danger">Delete</a>
                     </td>
                   </tr> ';}

                
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