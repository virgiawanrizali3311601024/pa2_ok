<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Form Pembukuan KIB F
        <small>Konstruksi Dalam Pengerjaan</small>
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
<form action="<?=base_url('Pengurus_barang/simpan_kib_f') ?>" method="post" enctype="multipart/form-data">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
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
                <th>Kode Barang</th>
                <th>Nama Aset</th>
                <th>Bangunan</th>
                <th>Bertingkat/Tidak</th>
                <th>Beton/Tidak</th>
                <th>Luas</th>
                <th>Alamat</th>
                <th>Tanggal Dokumen</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                      <select class="form-control" id="kode_aset" name="kode_aset">
                            
                    <?php 
                      foreach ($kode_asset_F as $row) {
                    ?>
                    <option value = "<?php echo $row->kode_aset; ?>"><?php echo $row->kode_aset; ?> - <?php echo $row->nama_aset; ?></option>     
                    <?php } ?>

                    </select>
                    </td>                    
                    <td><select class="form-control"name="nama_aset"  id="nama_aset">
                            
                    <?php 
                      foreach ($kode_asset_F_nama as $row) {
                    ?>
                    <option value = "<?php echo $row->nama_aset; ?>"><?php echo $row->nama_aset; ?></option>     
                    <?php } ?>

                </select></td>
                    <td><input type="text" class="form-control" id="bangunan" name="bangunan"/></td>
                    <td><input type="text" class="form-control" id="bertingkat_tidak" name="bertingkat_tidak"/></td>
                    <td><input type="text" class="form-control" id="beton_tidak" name="beton_tidak"/></td>
                    <td><input type="text" class="form-control" id="luas" name="luas"/></td>
                    <td><input type="text" class="form-control" id="alamat" name="alamat"/></td>
                    <td><input type="date" class="form-control" id="tanggal_dokumen" name="tanggal_dokumen"/></td>
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
          <div class="text-center">
                <thead>
                <th>Nomor Dokumen</th>
                <th>Tanggal Mulai</th>
                <th>Nomor Kode Tanah</th>
                <th>Nilai Kontrak</th>
                <th>Asal Usul Pembiayaan</th>
                <th>Status Tanah</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" class="form-control" id="nomor_dokumen" name="nomor_dokumen"/></td>
                    <td><input type="text" class="form-control" id="tahun_bulan_mulai" name="tahun_bulan_mulai"/></td>
                    <td><input type="text" class="form-control" id="nomor_kode_tanah" name="nomor_kode_tanah"/></td>
                    <td><input type="number" class="form-control" id="nilai_kontrak" name="nilai_kontrak"/></td>
                    <td><input type="text" class="form-control" id="asal_usul_pembiayaan" name="asal_usul_pembiayaan"/></td>
                    <td><input type="text" class="form-control" id="status_tanah" name="status_tanah"/></td>
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
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

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
<br>
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


 