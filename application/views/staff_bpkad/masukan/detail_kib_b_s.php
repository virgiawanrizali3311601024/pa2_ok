
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-3"><h4><b>Edit Data Pembukuan KIB A</b></h4>
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
                        <a class="btn btn-default" href="<?php echo base_url().'staff_bpkad/masukan_kibb'?>"><i class="fa fa-arrow-left"> </i> Back</a>
                    </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
                <?php foreach ($output->result() as $data): ?>
                   
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label>Nama Aset</label>
                                <input name="kode_aset" placeholder="Kode Aset" class="form-control" type="text" value="<?php echo $data->kode_aset; ?>" readonly>                        
                            </div>
                             <div class="col-xs-6">
                                <label>Nama Aset</label>
                                <input name="nama_aset" placeholder="Nama Aset" class="form-control" type="text" value="<?php echo $data->nama_aset; ?>" readonly>                        
                            </div>
                            <div class="col-xs-6">
                                <label>Register</label>
                                <input name="register" placeholder="Register" class="form-control" type="text" value="<?php echo $data->register; ?>">
                            </div>
                            <div class="col-xs-6">
                                <label>Merk</label>
                                <input name="merk" placeholder="Merk" class="form-control" type="text" value="<?php echo $data->merk; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label>Ukuran</label>
                                <input name="ukuran" placeholder="Ukuran" class="form-control" type="text" value="<?php echo $data->ukuran; ?>">
                            </div>
                            <div class="col-xs-6">
                                <label>Bahan</label>
                                <input name="bahan" placeholder="Bahan" class="form-control" type="text" value="<?php echo $data->bahan; ?>">
                            </div>
                            <div class="col-xs-6">
                                <label>Tahun Pengadaan</label>
                                <input name="tahun_pengadaan" placeholder="Tahun Pengadaan" value="<?php echo $data->tahun_pengadaan; ?>" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Lokasi</label>
                                <input name="lokasi" placeholder="Lokasi" value="<?php echo $data->lokasi; ?>" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label>Pabrik</label>
                                <input name="pabrik" placeholder="Pabrik" value="<?php echo $data->pabrik; ?>" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>No Rangka</label>
                                    <input name="no_rangka" placeholder="No Rangka" value="<?php echo $data->no_rangka; ?>" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>No Mesin</label>
                                <input name="no_mesin" placeholder="No Mesin" value="<?php echo $data->no_mesin; ?>" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>No Polisi</label>
                                <input name="no_polisi" placeholder="No Polisi" value="<?php echo $data->no_polisi; ?>" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label>Bpkb</label>
                                <input name="bpkb" placeholder="Bpkb" value="<?php echo $data->bpkb; ?>" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Asal Usul</label>
                                <input name="asal_usul" placeholder="Asal Usul" value="<?php echo $data->asal_usul; ?>" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Penggunaan</label>
                                <input name="penggunaan" placeholder="Penggunaan" value="<?php echo $data->penggunaan; ?>" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Harga</label>
                                <input name="harga" placeholder="Harga" value="<?php echo $data->harga; ?>" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <label>Kondisi</label>
                                <input name="kondisi" placeholder="Kondisi" value="<?php echo $data->kondisi; ?>" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Keterangan</label>
                                <input name="keterangan" placeholder="Keterangan" value="<?php echo $data->keterangan; ?>" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Kode Lokasi</label>
                                <input name="kode_lokasi" placeholder="Kode Lokasi" value="<?php echo $data->kode_lokasi; ?>" class="form-control" type="text" readonly>
                            </div>
                             <div class="col-xs-6">
                                <label>Foto Fisik</label>
                                <br>
                                <a class="btn btn-sm btn-primary" title="Download"  href="<?php echo base_url() ?>staff_bpkad/get_p_imageb/<?php echo $data->id_aset ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a>
                                <!-- <input name="foto_fisik" placeholder="Foto Fisik" class="form-control" type="text"> -->
                                
                            </div>
                        
                            <div class="col-xs-6">
                                <label>Kontrak</label>
                                <br>
                               <a class="btn btn-sm btn-primary" title="Download"  href="<?php echo base_url() ?>staff_bpkad/get_p_kontrakb/<?php echo $data->id_aset ?>"><i class="glyphicon glyphicon-download-alt"></i> Download Kontrak</a>
                                <!-- <input name="foto_fisik" placeholder="Foto Fisik" class="form-control" type="text"> -->
                                
                            </div>
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


