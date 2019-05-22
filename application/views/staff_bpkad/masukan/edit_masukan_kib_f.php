
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-4"><h4><b>Edit Data Pembukuan KIB F</b></h4>
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
                        <a class="btn btn-default" href="<?php echo base_url().'staff_bpkad/masukan_kibf'?>"><i class="fa fa-arrow-left"> </i> Back</a>
                    </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo form_open('staff_bpkad/edit_masukan_kibf'); ?>
                <?php foreach ($output->result() as $data): ?>
                    <input type="hidden" value="<?php echo $data->id_aset; ?>" name="id_aset"/> 
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Kode Aset</label>
                                <select name="kode_aset" id="kodeaset"  class="form-control"  onChange="get_data(this.value)" >
                                <?php foreach ($aset as $list){
                                    if($data->kode_aset == $list->kode_aset){
                                        echo '<option value="'.$data->kode_aset.'">'.$list->kode_aset.'-'.$list->nama_aset.'</option>';
                                    }else{
                                       echo 'Data Belum Masuk';
                                    }
                                }?>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <label>Nama Aset</label>
                                <input name="nama_aset" placeholder="Nama Aset" class="form-control" type="text" value="<?php echo $data->nama_aset; ?>" readonly>                        
                            </div>
                            <div class="col-xs-3">
                                <label>Bangunan</label>
                                <input name="bangunan" value="<?php echo $data->bangunan; ?>" placeholder="Bangunan" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Bertingkat / Tidak</label>
                                <input name="bertingkat_tidak" value="<?php echo $data->bertingkat_tidak; ?>" placeholder="Bertingkat / Tidak" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Beton/Tidak</label>
                                <input name="beton_tidak" value="<?php echo $data->beton_tidak; ?>" placeholder="Beton/Tidak" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Luas</label>
                                <input name="luas" value="<?php echo $data->luas; ?>" placeholder="Luas" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Alamat</label>
                                <input name="alamat" value="<?php echo $data->alamat; ?>" placeholder="Alamat" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Tanggal Dokumen</label>
                                <input name="tanggal_dokumen" value="<?php echo $data->tanggal_dokumen; ?>" placeholder="Tanggal Dokumen" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Nomor Dokumen</label>
                                <input name="nomor_dokumen" value="<?php echo $data->nomor_dokumen; ?>" placeholder="Nomor Dokumen" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Tahun Bulan Mulai</label>
                                <input name="tahun_bulan_mulai" value="<?php echo $data->tahun_bulan_mulai; ?>" placeholder="Tahun Bulan Mulai" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Nomor Kode Tanah</label>
                                <input name="nomor_kode_tanah" value="<?php echo $data->nomor_kode_tanah; ?>" placeholder="Nomor Kode Tanah" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Nilai Kontrak</label>
                                <input name="nilai_kontrak" value="<?php echo $data->nilai_kontrak; ?>" placeholder="Nilai Kontrak" class="form-control" type="text">
                            </div>
                        
                        
                            <div class="col-xs-3">
                                <label>Asal Usul Pembiayaan</label>
                                <input name="asal_usul_pembiayaan" value="<?php echo $data->asal_usul_pembiayaan; ?>" placeholder="Asal Usul Pembiayaan" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Status Tanah</label>
                                <input name="status_tanah" value="<?php echo $data->status_tanah; ?>" placeholder="Status Tanah" class="form-control" type="text">
                            </div>
                    
                        
                            <div class="col-xs-3">
                                <label>Keterangan</label>
                                <input name="keterangan" value="<?php echo $data->keterangan; ?>" placeholder="Keterangan" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                 <label>Kode Lokasi</label>
                                <input name="kode_lokasi" value="<?php echo $data->kode_lokasi; ?>" placeholder="Kode Lokasi" class="form-control" readonly>
                                
                                <input name="foto_fisik"  value="<?php echo $data->foto_fisik; ?>" class="form-control" type="hidden" readonly>
                                <input name="kontrak"  value="<?php echo $data->kontrak; ?>" class="form-control" type="hidden" readonly>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                    <input type="submit" value="Update" class="btn btn-primary">
                     </div>
                <?php echo form_close(); ?>
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


