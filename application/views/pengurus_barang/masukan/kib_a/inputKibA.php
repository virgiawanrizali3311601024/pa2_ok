<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Form Pembukuan KIB A
        <small>Tanah</small>
      </h1>
    </section>
<?php echo $this->session->flashdata('notif') ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->

          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->

            <!-- form start -->
              <div class="box-body">
                <div class="form-group">

<!-- form -->


<form action="<?=base_url('Pengurus_barang/simpan_kib_a') ?>" method="post" enctype="multipart/form-data">

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
          <col width="130">
          <col width="130">
          <col width="130">
          <col width="130">
          <col width="130">
          <col width="130">
          <div class="text-center">
                <thead>
                <th>Kode/Nama Barang</th>
                <th>Register</th>
                <th>Luas</th>
                <th>Tahun Pengadaan</th>
                <th>Alamat</th>
                <th>Status Tanah</th>
                </thead>
            <tbody>
                 <tr>
                    <input type="hidden" name="nama_aset" placeholder="Nama Aset" class="form-control" type="text" required="" readonly/>
                    <td>
                      <select  id="kodeaset" name="kode_aset"  class="form-control select2"  style="width: 100%;" onChange="get_data(this.value)" required="">
                  <?php foreach ($kode_asset_A as $list){
                             
                    echo '<option value="'.$list ->kode_aset.'">'.$list->kode_aset.'-'.$list->nama_aset.'</option>';
                     }?>

                </select>
                    </td>
                    <td><input type="text" class="form-control" id="register" name="register" required=""/></td>            
                    <td><input type="text" class="form-control" id="luas" name="luas" required=""/></td>
                    <td><input type="number" class="form-control" id="tahun_pengadaan" name="tahun_pengadaan" required=""/></td>
                    <td><input type="text" class="form-control" id="alamat" name="alamat" required=""/></td>
                    <td><input type="text" class="form-control" id="status_tanah" name="status_tanah" required=""/></td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped table-highlight">
          <col width="130">
          <col width="130">
          <col width="130">
          <col width="130">
          <col width="130">
          <col width="130">
    <div class="text-center">
                <thead>
                <th>Tanggal Sertifikat</th>
                <th>Nomor Sertifikat</th>
                <th>Asal-Usul</th>
                <th>Harga</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                <tr>
                    <td><input type="date" class="form-control" id="tanggal_sertifikat" name="tanggal_sertifikat" required=""/></td>
                    <td><input type="text" class="form-control" id="nomor_sertifikat" name="nomor_sertifikat" required=""/></td>
                    <td><input type="text" class="form-control" id="asal_usul" name="asal_usul" required=""/></td>
                    <td><input type="number" class="form-control" id="harga" name="harga" required=""/></td>
                    <td><select class="form-control" name="kondisi" id="kondisi" required="">
                            <option>B</option>
                            <option>RR</option>
                            <option>RB</option>
                        </select></td> 
                    <td><input type="text" class="form-control" id="keterangan" name="keterangan" required=""/></td>
                </tr>                   
                    <?php foreach ($skpd as $list): ?>
              <h1>
                  <input type="hidden" value="<?php echo $list->kode_lokasi; ?>" class="form-control" id="kode_lokasi" name="kode_lokasi" />
                   <?php endforeach; ?>
                <input type="hidden" class="form-control" id="status" value="belum disetujui" name="status"/>
              </h1>
            </tbody>
        </table>
    </div>

<!-- INPUT FILE -->
<div class="file-upload">
  <div class="file-select">
    <div class="file-select-button" id="foto_fisik">Foto Tanah</div>
    <div class="file-select-name" id="noFile">Format File *.png*.jpg*.jpeg</div> 
    <input type="file" name="foto_fisik" id="chooseFile" required="" accept=".jpg, .jpeg, .png">
  </div>
</div>
<h1></h1>
<div class="file-upload">
  <div class="file-select">
    <div class="file-select-button" id="kontrak">Kontrak</div>
    <div class="file-select-name" id="noFile">Format File *.pdf</div> 
    <input type="file" name="kontrak" id="chooseFile" required="" accept=".pdf">
  </div>
</div>
<h1></h1>
<button class="btn btn-primary" type="submit">Submit</button>
<h1><small><small>*Kondisi = B:Baik, RR:Rusak Ringan, RB:Rusak Berat</small></small><br>
<small><small>*Gunakan tanda Minus (-) untuk bagian data yang kosong</small></small></h1>
</form>
<h1></h1>




<div class="modal fade" id="messageModal" >
  <div class="modal-dialog modal-dialog-centered">
   
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-header bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Notifikasi</b></h4>
        </div>
        <div class="modal-body">
          <p><?php echo $this->session->flashdata('msg'); ?></p>
        </div>
       
       </div>
      </div>
    
  </div>

  <div class="modal fade" id="errorModal" >
  <div class="modal-dialog modal-dialog-centered">
   
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-header bg-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Galat!</b></h4>
        </div>
        <div class="modal-body">
          <p><?php echo $this->session->flashdata('error'); ?></p>
        </div>
       
       </div>
      </div>
    
  </div>

  


 
                </div>
              </div>

              
              <!-- /.box-body -->

              
           
          </div>
          <!-- /.box -->


     
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<script type="text/javascript">

$('.select2').select2()

$("#kodeaset").select2({
  placeholder:"Nama Aset / Kode Aset",
  ajax:{
    url:"<?php echo site_url('Pengurus_barang/list_i_aseta')?>",
    dataType: 'json',
    data: function (params) {

            var queryParameters = {
                text: params.term
            }
            return queryParameters;
        } 
  },
  cache: true,
  minimumInputLength: 2,
  formatResult: format,
  formatSelection: format,
  escapeMarkup: function(m) { return m; }
});

function format(x)
{
  return x.text;
}

function get_data(kata)
{
  $.ajax({
  url:"<?php echo site_url('Pengurus_barang/get_info_i_asetb')?>",
    data:{kata : kata},
    success: function(data)
    {
      var dt = JSON.parse(data);
      $("input[name=nama_aset]").val(dt.nama_aset);
      
    }
  });
}

</script>

<!-- JS FILE INPUT -->
