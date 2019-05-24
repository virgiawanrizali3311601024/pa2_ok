
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-1"><h4><b>Update User </b></h4>
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
                <h3 class="box-title"></h3>
              </div>
              <div class="col-md-1">
                    <span class="pull-left">
                        <a class="btn btn-default" href="<?php echo base_url().'admin/ks_bpkad'?>"><i class="fa fa-arrow-left"> </i> Back</a>
                    </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo form_open(''); ?>
                <?php foreach ($output->result() as $data): ?>
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-2">
                                <label>NIP</label>
                                <input name="nip" value="<?php echo $data->nip; ?>" placeholder="NIP" class="form-control" type="number">
                                <?php echo form_error('nip'); ?>
                            </div>
                            <div class="col-xs-3">
                                <label>Nama</label>
                                <input name="nama" placeholder="Nama " class="form-control" type="text" value="<?php echo $data->nama; ?>">    
                                <?php echo form_error('nama'); ?>                    
                            </div>
                            <div class="col-xs-2">
                                <label>Hak Akses</label>
                                <select name="tipe_user" class="form-control" >
                                <?php foreach ($akses as $list){ ?>
                                    <option value="<?php echo $data->tipe_user; ?>"<?php if($list->tipe_user==$data->tipe_user) echo 'selected="selected"'; ?>><?php echo $list->tipe_user; ?></option>
                                <?php } ?> 
                                </select> 
                                                              
                                <?php echo form_error('tipe_user'); ?>
                            </div>
                            <div class="col-xs-5">
                                <label>Kode lokasi</label>
                                <select name="kode_lokasi" style="width: 100%;" class="form-control" >
                                <?php foreach ($kodelokasi as $lokasi){ ?>
                                    <option value="<?php echo $data->kode_lokasi; ?>"<?php if($lokasi->kode_lokasi==$data->kode_lokasi) echo 'selected="selected"'; ?>><?php echo $lokasi->kode_lokasi; ?>--<?php echo $lokasi->nama_skpd; ?></option>
                                <?php } ?> 
                                </select> 

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

//Date picker
$('#datepicker').datepicker({
      autoclose: true
})

$('.select2').select2()

$("#kodeaset").select2({
	placeholder:"Nama Aset / Kode Aset",
	ajax:{
		url:"<?php echo site_url('staff_bpkad/list_aseta')?>",
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
	url:"<?php echo site_url('staff_bpkad/get_info_aseta')?>",
		data:{kata : kata},
		success: function(data)
		{
			var dt = JSON.parse(data);
			$("input[name=nama_aset]").val(dt.nama_aset);
			
		}
	});
}

</script>
