
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-4"><h4><b>Edit Data Pembukuan KIB E</b></h4>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="col-md-11">
                <h3 class="box-title">Responsive Hover Table</h3>
              </div>
              <div class="col-md-1">
                    <span class="pull-left">
                        <a class="btn btn-default" href="<?php echo base_url().'staff_bpkad/masukan_kibe'?>"><i class="fa fa-arrow-left"> </i> Back</a>
                    </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                
                <?php foreach ($output->result() as $data): ?>
                    <input type="hidden" value="<?php echo $data->id_aset; ?>" name="id_aset"/> 
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label>Kode Aset</label>
                                <input name="kode_aset" value="<?php echo $data->kode_aset; ?>" id="kodeaset"  class="form-control"/>  
                            </div>
                            <div class="col-xs-6">
                                <label>Nama Aset</label>
                                <input name="nama_aset" value="<?php echo $data->nama_aset; ?>" placeholder="Nama Aset" class="form-control" type="text" >                        
                            </div>
                            <div class="col-xs-6">
                                <label>Register</label>
                                <input name="register" value="<?php echo $data->register; ?>" placeholder="Register" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Judul Buku</label>
                                <input name="judul_buku" value="<?php echo $data->judul_buku; ?>" placeholder="Judul Buku" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Spesifikasi Buku</label>
                                <input name="spesifikasi_buku" value="<?php echo $data->spesifikasi_buku; ?>" placeholder="Spesifikasi Buku" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Tahun Pengadaan</label>
                                <input name="tahun_pengadaan" value="<?php echo $data->tahun_pengadaan; ?>" placeholder="Tahun Pengadaan" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Nomor Dokumen</label>
                                <input name="nomor_dokumen" value="<?php echo $data->nomor_dokumen; ?>" placeholder="Nomor Dokumen" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Tanggal Dokumen</label>
                                <input name="tanggal_dokumen" value="<?php echo $data->tanggal_dokumen; ?>" placeholder="Tanggal Dokumen" class="form-control" type="text">
                            </div>
                
                            <div class="col-xs-6">
                                <label>Asal Usul</label>
                                <input name="asal_usul" value="<?php echo $data->asal_usul; ?>" placeholder="Asal Usul" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Harga</label>
                                <input name="harga" value="<?php echo $data->harga; ?>" placeholder="Harga" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Kondisi</label>
                                <input name="kondisi" value="<?php echo $data->kondisi; ?>" placeholder="Kondisi" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Keterangan</label>
                                <input name="keterangan" value="<?php echo $data->keterangan; ?>" placeholder="Keterangan" class="form-control" type="text">
                            </div>
                        
                            <div class="col-xs-6">
                                <label>Kode Lokasi</label>
                                <input name="kode_lokasi" value="<?php echo $data->kode_lokasi; ?>" placeholder="Kode Lokasi" class="form-control" readonly>
                            </div>
                            <div class="col-xs-6">
                              
                                <label>Foto Fisik</label>
                                <br>
                                <a class="btn btn-sm btn-primary" title="Download"  value="id_aset" href="<?php echo base_url() ?>staff_bpkad/get_p_imagee/<?php echo $data->id_aset ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a>
                                <!-- <input name="foto_fisik" placeholder="Foto Fisik" class="form-control" type="text"> -->
                                  
                            </div>
                        
                            <div class="col-xs-6">
                                <label>Kontrak</label>
                                <br>
                               <a class="btn btn-sm btn-primary" title="Download"  href="<?php echo base_url() ?>staff_bpkad/get_p_kontrake/<?php echo $data->id_aset ?>"><i class="glyphicon glyphicon-download-alt"></i> Download Kontrak</a>
                                <!-- <input name="foto_fisik" placeholder="Foto Fisik" class="form-control" type="text"> -->
                                
                        </div>
                    <?php endforeach; ?>
                    </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

