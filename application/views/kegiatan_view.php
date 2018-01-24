<style>
  .text-overflow{
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Timeline
        <small>Activity</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/petugas/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Timeline</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-aqua">
                    PKL <small>UGM</small>
                  </span>
            </li>
            <li>
            <?php
                  $failed = $this->session->flashdata('failed');
                    if(!empty($failed)){
                      echo '<div class="alert alert-danger alert-dismissable col-lg-6 col-lg-offset-3">';
                      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                      echo '<i class="icon fa fa-warning"></i>';
                      echo $failed;
                      echo '</div>';
                    }

                  $success = $this->session->flashdata('success');
                  if(!empty($success)){
                      echo '<div class="alert alert-success alert-dismissable col-lg-6 col-lg-offset-3">';
                      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                      echo '<i class="icon fa fa-check"></i>';
                      echo $success;
                      echo '</div>';
                  }
                ?>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <?php 
                foreach ($kegiatan as $data) {
                    echo '
                    <li>
                      <i class="fa fa-commenting bg-blue"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-calendar"></i> '.$data->TGL_KEGSIS.'</span>

                        <h3 class="timeline-header"><a href="#">'.$data->NAMA_SISWA.'</a> '.$data->ASAL_SMK.'</h3>

                        <div class="timeline-body text-overflow">
                          '.$data->ISI_KEGSIS.'
                        </div>
                        <div class="timeline-footer">
                          <a href="#" data-toggle="modal" data-target="#readmore'.$data->ID_KEGSIS.'" class="btn btn-primary btn-xs">Read more</a>
                          <a href="'.base_url().'index.php/petugas/del_kegiatan_dashboard/'.$data->ID_KEGSIS.'" class="btn btn-danger btn-xs">Delete</a>
                        </div>
                      </div>
                    </li>
                    ';
                }
              ?>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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