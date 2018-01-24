<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nilai PKL
        <small>DSSDI UGM</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/siswa/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Siswa</li>
        <li class="active">Nilai Siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           <!--  <div class="box-header">
              <h3 class="box-title">Rekap Absen Siswa PKL</h3>
              
            </div> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover table-responsive">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIS</th>
                  <th>Jurusan</th>>
                  <th>Nilai Sikap</th>
                  <th>Nilai Keterampilan</th>>
                </tr>
                </thead>
                <tbody>  

                    <?php
                $no = 1;
                foreach ($nilai as $data) {

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
                    <td>'.$data->JURUSAN.'</td>
                    <td>'.$data->NILAI_SIKAP.'</td>
                    <td>'.$data->NILAI_KETERAMPILAN.'</td>
                  </tr>
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