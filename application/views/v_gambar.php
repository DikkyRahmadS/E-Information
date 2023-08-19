<link rel="icon" href="<?=base_url()?>assets/gambar/tvlogo.png" type="image/x-icon">
<div class="block-header">
<!-- <h1>Gambar</h1> -->
<marquee> Ukuran maksimum gambar 10000 kilobyte, Lebar maksimum 102400 pixel, Tinggi maksimum 76800 pixel</marquee>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Gambar</h2>

                                </div>

                                <div class="col-xs-12 col-sm-6 align-right">
                                <br> <a href="#tambah"class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
                                </div>
                            </div>
                        <div class="body">
                        <div class="row">
                            <table class ="table table-hover table-striped">
                                <tr>
                                <th>NO </th><th>Gambar</th><th>Keterangan</th><th colspan="2">Aksi</th>
                                </tr>
                                
                                <?php 
                                $no=0;
                                foreach ($data_gambar as $dt_gmbr) {
                                    $no++;
                                    echo '<tr>
                                            <td>'.$no.'</td>  
                                            <td><img src='.base_url("assets/gambar/$dt_gmbr->gambar").' width="120" height="100"</td>
                                             <td>'.$dt_gmbr->keterangan.'</td>
                                            <td><a href="#update_gambar" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_gmbr->id_gambar.')">Update</a>
                                            <a href ='.base_url('index.php/gambar/hapus_gambar/'.$dt_gmbr->id_gambar).' class="btn btn-success" onclick="return confirm(\'Anda yakin\')">Delete</a></td>
                                          </tr>';
                                }
                                ?>                              
                            </table>

                            <?php if ($this->session->flashdata('pesan')!=null): ?>
                            
                        
                           <div class="alert alert-danger"><?= $this->session->flashdata('pesan');?></div> 
                            <?php endif ?>
                            
                            </div>
                        </div>
                     </div>
 </div>

 <div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah gambar</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/gambar/simpan_gambar')?>" method="post" enctype="multipart/form-data">
  
        Upload Gambar
        <input type="file" name="gambar" class="form-control"><br>
         Keterangan
        <input type="text" name="keterangan" class="form-control"><br>
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="update_gambar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update gambar</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/gambar/update_gambar')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_gambar" id="id_gambar">
         
        Upload Gambar
        <input type="file" name="gambar" class="form-control"><br>
         Keterangan
        <input type="text" name="keterangan" class="form-control"><br>
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>

    function tm_detail(id_gmbr){
        $.getJSON("<?=base_url()?>index.php/gambar/get_detail_gambar/" + id_gmbr,function(data)
        {
            $("#id_gambar").val(data['id_gambar']);
            $("#keterangan").val(data['keterangan']);
           
        });
    }

</script>