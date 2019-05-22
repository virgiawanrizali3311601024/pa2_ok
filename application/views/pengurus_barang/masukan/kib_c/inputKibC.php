
     <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Form Pembukuan KIB C
        <small>Gedung dan Bangunan</small>
      </h1>
    </section>

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


<form action="<?=base_url('Pengurus_barang/simpan_kib_c') ?>" method="post" enctype="multipart/form-data">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
          <col width="130">
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
                <th>Kondisi</th>
                <th>Bertingkat</th>
                <th>Beton/Tidak Beton</th>
                <th>Luas Lantai</th>
                <th>Tahun Pengadaan</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                       <select  id="kodeaset" name="kode_aset"  class="form-control select2"  style="width: 100%;" onChange="get_data(this.value)" required="">
                    <?php foreach ($kode_asset_C as $list){
                             
                    echo '<option value="'.$list ->kode_aset.'">'.$list->kode_aset.'-'.$list->nama_aset.'</option>';
                     }?>

                </select></td>
                    <input type="hidden" name="nama_aset"  placeholder="Nama Aset" class="form-control" type="text" required="" readonly/>
                    <td><input type="text" class="form-control" name="register"  id="register" required=""/></td>
                    <td><select class="form-control" name="kondisi" id="kondisi" required="">
                            <option>B</option>
                            <option>RR</option>
                            <option>RB</option>
                        </select></td>
                    <td><select class="form-control" name="bertingkat" id="bertingkat" required="">
                            <option>Tingkat</option>
                            <option>Tidak Bertingkat</option>
                        </select></td>
                    <td><select class="form-control" name="beton_tidak" id="beton_tidak" required="">
                            <option>Beton</option>
                            <option>Tidak Beton</option>
                        </select></td>
                    <td><input type="text" class="form-control" id="luas_lantai" name="luas_lantai"/></td>
                    <td><input type="number" class="form-control" id="tahun_pengadaan" name="tahun_pengadaan"/></td>
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
          <col width="130">
          <col width="130">
          <col width="130">
          <div class="text-center">
                <thead>
                <th>Alamat</th>
                <th>No. Dokumen Gedung</th>
                <th>Tanggal Dokumen</th>
                <th>Status Tanah</th>
                <th>No. Kode Tanah</th>
                <th>Luas Tanah</th>
                <th>Asal Usul</th>
                <th>Harga</th>
                <th>Keterangan</th>
        
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" class="form-control" id="alamat" name="alamat"/></td>
                    <td><input type="text" class="form-control" name="nomor_dokumen_gedung" id="nomor_dokumen_gedung" n/></td>
                    <td><input type="date" class="form-control" name="tanggal_dokumen" id="tanggal_dokumen"/></td>
                    <td><input type="text" class="form-control" name="status_tanah" id="status_tanah"/></td>
                    <td><input type="text" class="form-control" name="nomor_kode_tanah" id="nomor_kode_tanah"/></td>
                    <td><input type="text" class="form-control" name="luas_tanah" id="luas_tanah"/></td>
                    <td><input type="text" class="form-control" name="asal_usul" id="asal_usul"/></td>
                    <td><input type="number" class="form-control" name="harga" id="harga"/></td>
                    <td><input type="text" class="form-control" name="keterangan" id="keterangan"/></td>
                </tr>
                    <?php foreach ($skpd as $list): ?>
                  <h1><input type="hidden" value="<?php echo $list->kode_lokasi; ?>" class="form-control" id="kode_lokasi" name="kode_lokasi"/>
                   <?php endforeach; ?>
                <input type="hidden" class="form-control" id="status" value="belum disetujui" name="status"/></h1>
            </tbody>
        </table>
    </div>

<!-- INPUT FILE -->


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
    url:"<?php echo site_url('Pengurus_barang/list_i_asetc')?>",
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
  url:"<?php echo site_url('Pengurus_barang/get_info_i_asetc')?>",
    data:{kata : kata},
    success: function(data)
    {
      var dt = JSON.parse(data);
      $("input[name=nama_aset]").val(dt.nama_aset);
      
    }
  });
}


$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>