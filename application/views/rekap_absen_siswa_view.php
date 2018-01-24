<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rekap Absen Siswa PKL
        <small>DSSDI UGM</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/siswa/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Siswa</a></li>
        <li class="active">Rekap Absen Siswa</li>
      </ol>
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
                  <th>Nama</th>
                  <th>NIS</th>
                  <th>Waktu Absensi Masuk</th>
                </tr>
                </thead>
                <tbody>  

                    <?php
                $no = 1;
                foreach ($absensis as $data) {

                  //if($data->STATUS == 'verified'){
                  $disabled = "";
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
                    <td>'.$data->WAKTU_ABSENSI.'</td>
                ';
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