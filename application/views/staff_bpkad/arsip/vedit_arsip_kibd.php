
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-1"><h4><b>Arsip </b></h4>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="col-md-11">
                <h3 class="box-title">Responsive Hover Table</h3>
              </div>
              <div class="col-md-1">
                    <span class="pull-left">
                        <a class="btn btn-default" href="<?php echo base_url().'staff_bpkad/arsip_kibd'?>"><i class="fa fa-arrow-left"> </i> Back</a>
                    </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo form_open(''); ?>
                <?php foreach ($output->result() as $data): ?>
                    <input type="hidden" value="<?php echo $data->id_aset; ?>" name="id_aset"/> 
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Kode Aset</label>
                                <select name="kode_aset" id="kodeaset" style="width: 100%;" class="form-control select2"  onChange="get_data(this.value)" >
                                <?php foreach ($aset as $list){
                                    if($data->kode_aset == $list->kode_aset){
                                        echo '<option value="'.$data->kode_aset.'">'.$list->kode_aset.'-'.$list->nama_aset.'</option>';
                                    }else{
                                       echo 'Data Belum Masuk';
                                    }
                                }?>
                                </select>
                                <?php echo form_error('kode_aset'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Nama Aset</label>
                                <input name="nama_aset" placeholder="Nama Aset" class="form-control" type="text" value="<?php echo $data->nama_aset; ?>">                        
                                <?php echo form_error('nama_aset'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Register</label>
                                    <input name="register" value="<?php echo $data->register; ?>" placeholder="Register" class="form-control" type="text">
                                    <?php echo form_error('register'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Konstruksi</label>
                                    <input name="konstruksi" value="<?php echo $data->konstruksi; ?>" placeholder="Konstruksi" class="form-control" type="text">
                                    <?php echo form_error('konstruksi'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Panjang</label>
                                <input name="panjang" value="<?php echo $data->panjang; ?>" placeholder="Panjang" class="form-control" type="text">
                                <?php echo form_error('panjang'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Lebar</label>
                                <input name="lebar" value="<?php echo $data->lebar; ?>" placeholder="Lebar" class="form-control" type="text">
                                <?php echo form_error('lebar'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Luas</label>
                                <input name="luas" value="<?php echo $data->luas; ?>" placeholder="Luas" class="form-control" type="text">
                                <?php echo form_error('luas'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Alamat</label>
                                <input name="alamat" value="<?php echo $data->alamat; ?>" placeholder="Alamat" class="form-control" type="text">
                                <?php echo form_error('alamat'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Tahun Pengadaan</label>
                                <input name="tahun_pengadaan" value="<?php echo $data->tahun_pengadaan; ?>" placeholder="Tahun Pengadaan" class="form-control" type="text">
                                <?php echo form_error('tahun_pengadaan'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Tanggal Dokumen</label>
                                <input name="tanggal_dokumen" value="<?php echo $data->tanggal_dokumen; ?>" placeholder="Tanggal Dokumen" class="form-control" type="text">
                                <?php echo form_error('tanggal_dokumen'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Nomor Dokumen </label>
                                <input name="nomor_dokumen" value="<?php echo $data->nomor_dokumen; ?>" placeholder="Nomor Kode " class="form-control" type="text">
                                <?php echo form_error('nomor_dokumen'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Status Tanah</label>
                                <input name="status_tanah" value="<?php echo $data->status_tanah; ?>" placeholder="Status Tanah" class="form-control" type="text">
                                <?php echo form_error('status_tanah'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Nomor Kode Tanah</label>
                                <input name="nomor_kode_tanah" value="<?php echo $data->nomor_kode_tanah; ?>" placeholder="Nomor Kode Tanah" class="form-control" type="text">
                                <?php echo form_error('nomor_kode_tanah'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Asal Usul</label>
                                <input name="asal_usul" value="<?php echo $data->asal_usul; ?>" placeholder="Asal Usul" class="form-control" type="text">
                                <?php echo form_error('asal_usul'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Harga</label>
                                <input name="harga" value="<?php echo number_format($data->harga,2,",",".") ?>" placeholder="Harga" class="form-control" type="text">
                                <?php echo form_error('harga'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Kondisi</label>
                                <input name="kondisi" value="<?php echo $data->kondisi; ?>" placeholder="Kondisi" class="form-control" type="text">
                                <?php echo form_error('kondisi'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Keterangan</label>
                                <input name="keterangan" value="<?php echo $data->keterangan; ?>" placeholder="Keterangan" class="form-control" type="text">
                                <?php echo form_error('keterangan'); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <input type="submit" value="Update" class="btn btn-primary">
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

<script type="text/javascript">

$('.select2').select2()

window.setTimeout(function() {
     $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); 
}, 5000)

$("#kodeaset").select2({
	placeholder:"Nama Aset / Kode Aset",
	ajax:{
		url:"<?php echo site_url('staff_bpkad/list_asetd')?>",
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
	url:"<?php echo site_url('staff_bpkad/get_info_asetd')?>",
		data:{kata : kata},
		success: function(data)
		{
			var dt = JSON.parse(data);
			$("input[name=nama_aset]").val(dt.nama_aset);
			
		}
	});
}

</script>
