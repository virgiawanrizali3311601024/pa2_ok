
     <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Form Pembukuan KIB D
        <small>Jalan, Irigasi Dan Jaringan</small>
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
<div>
  <button id="predik" data-toggle="tooltip" title="Memprediksi data sesuai dengan masukan Merk, Ukuran, Bahan, Dan Harga">Prediksi</button>
  <input type="text" id="prediksi"></input>
</div>

<form action="<?=base_url('Pengurus_barang/simpan_kib_d') ?>" method="post" enctype="multipart/form-data">
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
                <th>Kode Barang</th>
                <th>Register</th>
                <th>Konstruksi</th>
                <th>Panjang</th>
                <th>Lebar</th>
                <th>Luas</th>
                <th>Alamat</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                      <select  id="kodeaset" name="kode_aset"  class="form-control select2"  style="width: 100%;" onChange="get_data(this.value)" required="" readonly>
                    <?php foreach ($kode_asset_D as $list){
                             
                    echo '<option value="'.$list ->kode_aset.'">'.$list->kode_aset.'-'.$list->nama_aset.'</option>';
                     }?>

                </select></td>
                    <input type="hidden" name="nama_aset"  placeholder="Nama Aset" class="form-control" type="text" />
                    <td><input type="text" class="form-control" id="register" name="register" /></td>
                    <td><input type="text" class="form-control" id="konstruksi" name="konstruksi" /></td>
                    <td><input type="text" class="form-control" id="panjang" name="panjang"/></td>
                    <td><input type="text" class="form-control" id="lebar" name="lebar"/></td>
                    <td><input type="text" class="form-control" id="luas" name="luas"/></td>
                    <td><input type="text" class="form-control" id="alamat" name="alamat"/></td>
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
                <th>Tahun Pengadaan</th>
                <th>Tanggal Dokumen</th>
                <th>Nomor Dokumen</th>
                <th>Status Tanah</th>
                <th>Nomor Kode Tanah</th>
                <th>Asal-Usul</th>
                <th>Harga</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                <tr>
                    <td><input type="number" class="form-control" id="tahun_pengadaan" name="tahun_pengadaan"/></td>
                    <td><input type="date" class="form-control" id="tanggal_dokumen" name="tanggal_dokumen"/></td>
                    <td><input type="text" class="form-control" id="nomor_dokumen" name="nomor_dokumen"/></td>
                    <td><input type="text" class="form-control" id="status_tanah" name="status_tanah"/></td>
                    <td><input type="text" class="form-control" id="nomor_kode_tanah" name="nomor_kode_tanah"/></td>
                    <td><input type="text" class="form-control" id="asal_usul" name="asal_usul"/></td>
                    <td><input type="number" class="form-control" id="harga" name="harga"/></td>
                    <td><select class="form-control" value="" id="kondisi" name="kondisi">
                            <option>B</option>
                            <option>RR</option>
                            <option>RB</option>
                        </select></td>
                    <td><input type="text" class="form-control" id="keterangan" name="keterangan"/></td>
                    <?php foreach ($skpd as $list): ?>
                  <input type="hidden" value="<?php echo $list->kode_lokasi; ?>" class="form-control" id="kode_lokasi" name="kode_lokasi"/>
                   <?php endforeach; ?>
                <input type="hidden" class="form-control" id="status" value="belum disetujui" name="status"/>
                </tr>
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

<script>
document.getElementById('form-kib').skpd.onchange = function() {
    var newaction = "<?php echo base_url() ?>petugas_inven/UploadKibB/"+this.value;
    document.getElementById('form-kib').action = newaction;
};
</script>



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
      
  

<?php 
if(!empty($this->session->flashdata('msg'))) { ?>
 <script>
    $(window).on('load',function(){
       $('#messageModal').modal('show');
    });
 </script>
 <?php } ?>




 <?php 
if(!empty($this->session->flashdata('error'))) { ?>
 <script>
    $(window).on('load',function(){
       $('#errorModal').modal('show');
    });
 </script>
 <?php } ?>
 
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
    url:"<?php echo site_url('Pengurus_barang/list_i_asetd')?>",
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
  url:"<?php echo site_url('Pengurus_barang/get_info_i_asetd')?>",
    data:{kata : kata},
    success: function(data)
    {
      var dt = JSON.parse(data);
      $("input[name=nama_aset]").val(dt.nama_aset);
      
    }
  });
}

$("#predik").on("click", function(event){
      var merk = $("#merk").val();
      var ukuran = $("#ukuran").val();
      var bahan = $("#bahan").val();
      var harga = $("#harga").val();
      
      
      var fetur = {
        merk : merk,
        ukuran : ukuran,
        bahan : bahan,
        harga : harga
        
      };
      $.ajax({
        type: "POST",
        url: "http://127.0.0.1:5000/predict",
        data: JSON.stringify(fetur),
        contentType: "application/json",
        dataType: "json",
        success: function(response) {
          
          var data = JSON.parse(JSON.stringify(response[0]['predikisi'].prediksi))
          $("#prediksi").val(data);
        },
        failure: function(error){
          $("#prediksi").val(error);
        }
      });
      $("#prediksi").val("");
    });
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
 