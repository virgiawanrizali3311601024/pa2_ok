
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
                        <a class="btn btn-default" href="<?php echo base_url().'staff_bpkad/arsip_kibb'?>"><i class="fa fa-arrow-left"> </i> Back</a>
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
                                <input name="register" placeholder="Register" class="form-control" type="text" value="<?php echo $data->register; ?>">
                                <?php echo form_error('register'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Merk</label>
                                <input name="merk" placeholder="Merk" class="form-control" type="text" value="<?php echo $data->merk; ?>">
                                <?php echo form_error('merk'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Ukuran</label>
                                <input name="ukuran" placeholder="Ukuran" class="form-control" type="text" value="<?php echo $data->ukuran; ?>">
                                <?php echo form_error('ukuran'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Bahan</label>
                                <input name="bahan" placeholder="Bahan" class="form-control" type="text" value="<?php echo $data->bahan; ?>">
                                <?php echo form_error('bahan'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Tahun Pengadaan</label>
                                <input name="tahun_pengadaan" placeholder="Tahun Pengadaan" value="<?php echo $data->tahun_pengadaan; ?>" class="form-control" type="text">
                                <?php echo form_error('tahun_pengadaan'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Lokasi</label>
                                <input name="lokasi" placeholder="Lokasi" value="<?php echo $data->lokasi; ?>" class="form-control" type="text">
                                <?php echo form_error('lokasi'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Pabrik</label>
                                <input name="pabrik" placeholder="Pabrik" value="<?php echo $data->pabrik; ?>" class="form-control" type="text">
                                <?php echo form_error('pabrik'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>No Rangka</label>
                                <input name="no_rangka" placeholder="No Rangka" value="<?php echo $data->no_rangka; ?>" class="form-control" type="text">
                                <?php echo form_error('no_rangka'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>No Mesin</label>
                                <input name="no_mesin" placeholder="No Mesin" value="<?php echo $data->no_mesin; ?>" class="form-control" type="text">
                                <?php echo form_error('no_mesin'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>No Polisi</label>
                                <input name="no_polisi" placeholder="No Polisi" value="<?php echo $data->no_polisi; ?>" class="form-control" type="text">
                                <?php echo form_error('no_polisi'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Bpkb</label>
                                <input name="bpkb" placeholder="Bpkb" value="<?php echo $data->bpkb; ?>" class="form-control" type="text">
                                <?php echo form_error('bpkb'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Asal Usul</label>
                                <input name="asal_usul" placeholder="Asal Usul" value="<?php echo $data->asal_usul; ?>" class="form-control" type="text">
                                <?php echo form_error('asal_usul'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Penggunaan</label>
                                <input name="penggunaan" placeholder="Penggunaan" value="<?php echo $data->penggunaan; ?>" class="form-control" type="text">
                                <?php echo form_error('penggunaan'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Harga</label>
                                <input name="harga" placeholder="Harga" value="<?php echo number_format($data->harga,2,",",".") ?>" class="form-control" type="text">
                                <?php echo form_error('harga'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Kondisi</label>
                                <input name="kondisi" placeholder="Kondisi" value="<?php echo $data->kondisi; ?>" class="form-control" type="text">
                                <?php echo form_error('kondisi'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Keterangan</label>
                                <input name="keterangan" placeholder="Keterangan" value="<?php echo $data->keterangan; ?>" class="form-control" type="text">
                                <?php echo form_error('keterangan'); ?>
                            </div>
                            <div class="col-xs-3">
                                <input name="kode_lokasi" placeholder="Kode Lokasi" value="<?php echo $data->kode_lokasi; ?>" class="form-control" type="hidden">
                                <?php echo form_error('kode_lokasi'); ?>
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

window.setTimeout(function() {
     $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); 
}, 5000)

$('.select2').select2()

$("#kodeaset").select2({
	placeholder:"Nama Aset / Kode Aset",
	ajax:{
		url:"<?php echo site_url('staff_bpkad/list_asetb')?>",
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
	url:"<?php echo site_url('staff_bpkad/get_info_asetb')?>",
		data:{kata : kata},
		success: function(data)
		{
			var dt = JSON.parse(data);
			$("input[name=nama_aset]").val(dt.nama_aset);
			
		}
	});
}

</script>
