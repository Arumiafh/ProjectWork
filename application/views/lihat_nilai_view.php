<?php
    foreach //($siswa as $data) 
    {
      echo '
      <div class="modal fade" id="nilaiSiswa'.$data->SISWA_ID.'">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Nilai Siswa</h4>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="'.base_url().'index.php/admin/nilaisiswa/'.$data->SISWA_ID.'">
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Nilai Sikap</label>
                        <input type="number" class="form-control" value="'.$data->NILAI_SIKAP.'" name="nilai_sikap" disabled>
                      </div>
                      <div class="form-group">
                        <label>Nilai Keterampilan</label> 
                        <input type="number" class="form-control" value="'.$data->NILAI_KETERAMPILAN.'" name="nilai_keterampilan" disabled>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
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