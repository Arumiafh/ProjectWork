<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rekap Nilai Siswa PKL
        <small>DSSDI UGM</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/petugas/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="active">Rekap Nilai Siswa</a></li>
   <!--      <li class="active">Data tables</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Rekap Nilai Siswa PKL</h3> -->
              
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
                  <th>Nilai Sikap</th>
                  <th>Nilai Keterampilan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>  

                    <?php
                $no = 1;
                foreach ($nilai as $data) {
                  // if($data->STATUS == 'verified'){
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
                    <td>'.$data->ASAL_SMK.'</td>
                    <td>'.$data->JURUSAN.'</td>
                    <td>'.$data->NAMA_PETUGAS.'</td>
                    <td>'.$data->NILAI_SIKAP.'</td>
                    <td>'.$data->NILAI_KETERAMPILAN.'</td>
                  '; ?>
                    <?php 

                    if($this->session->userdata('ROLE') == 'Pembimbing'){
                    echo '
                    <td>
                      <a href="#" data-toggle="modal" data-target="#editnilaisiswa'.$data->SISWA_ID.'" class="btn btn-sm btn-info">Edit</a>
                    </td> 
                    ';
                  } ?>
                  <?php echo '
                    <td>
                      <a href="'.base_url().'index.php/petugas/del_siswa/'.$data->SISWA_ID.'" class="btn btn-sm btn-danger">Delete</a>
                    </td>
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


<?php
    foreach ($nilai as $data) {
      echo '
      <div class="modal fade" id="editnilaisiswa'.$data->SISWA_ID.'">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Nilai Siswa</h4>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="'.base_url().'index.php/petugas/edit_nilai_siswa/'.$data->SISWA_ID.'">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nilai Sikap</label>
                        <input type="number" class="form-control" value="'.$data->NILAI_SIKAP.'" name="nilai_sikap" required>
                      </div>
                      <div class="form-group">
                        <label>Nilai Keterampilan</label> 
                        <input type="number" class="form-control" value="'.$data->NILAI_KETERAMPILAN.'" name="nilai_keterampilan" required>
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