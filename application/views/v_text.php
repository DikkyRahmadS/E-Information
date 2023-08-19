<link rel="icon" href="<?=base_url()?>assets/gambar/tvlogo.png" type="image/x-icon">
<div class="block-header">
<marquee> Maksimum  1000 Huruf</marquee>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Text Berjalan di Footer</h2>
                          
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                <br> <a href="#tambah"class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>  Tambah</a>
                                </div>
                            </div>
                        <div class="body">
                        <div class="row">
                            <table class ="table table-hover table-striped">
                                <tr>
                                 <th>NO </th><th>Data Text</th><th colspan="2">Aksi</th>
                                </tr>
                                
                                <?php 
                                $no=0;
                                foreach ($data_text as $dt_txt) {
                                    $no++;
                                    echo '<tr>
                                            <td>'.$no.'</td>
                                            <td>'.$dt_txt->data.'</td>
                                            <td><a href="#update_text" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_txt->id_text.')">Update</a>
                                            <a href ='.base_url('index.php/text/hapus_text/'.$dt_txt->id_text).' class="btn btn-success" onclick="return confirm(\'Anda yakin\')">Delete</a></td>
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
        <h4 class="modal-title">Tambah Text</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/text/simpan_text')?>" method="post" enctype="multipart/form-data">
        Data Text 
        <input type="text" name="data" class="form-control"><br>
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="update_text">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update text</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/text/update_text')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_text" id="id_text">
           Data Text 
        <input type="text" name="data" class="form-control"><br>
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

    function tm_detail(id_txt){
        $.getJSON("<?=base_url()?>index.php/text/get_detail_text/" + id_txt,function(data)
        {
            $("#id_text").val(data['id_text']);
           
        });
    }

</script>