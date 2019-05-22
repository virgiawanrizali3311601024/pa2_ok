
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row">
        <?php if ($this->session->flashdata('succses')) : ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('succses'); ?>
            </div>
        <?php endif; ?>
          <div class="col-sm-1"><h4><b>Arsip </b></h4>
          </div>
          <div class="col-sm-2">
          <form id="form-filter" class="form-horizontal">
              <div class="form-group">
                <select name="kode_lokasi" id="kode_lokasi" class="form-control">
                  <option value="">Pilih SKPD</option>
                  <?php foreach ($skpd as $list): ?>
                    <option value="<?php echo $list->kode_lokasi; ?>"><?php echo $list->nama_skpd; ?> - <?php echo $list->kode_lokasi; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <select name="tahun_pengadaan" id="tahun_pengadaan" class="form-control">
                  <option value="">Pilih Tahun</option>
                  <?php foreach ($all_tahun as $baris): ?>
                    <option value="<?php echo $baris->tahun_pengadaan; ?>"><?php echo $baris->tahun_pengadaan; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label class="col-sm-9 control-label">Harga Terendah</label>
                <div class="col-sm-15">
                    <input type="number" class="form-control" id="harga_rendah">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-9 control-label">Harga Tertinggi</label>
                <div class="col-sm-15">
                    <input type="number" class="form-control" id="harga_tinggi">
                </div>
              </div>
              <div class="form-group">
                <label for="LastName" class="col-sm-2 control-label"></label>
                <div class="col-sm-4">
                    <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                    <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                </div>
                </div>
          </form>
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
              <h3 class="box-title">Responsive Hover Table</h3>
              <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                  <tr>                      
                      <th style="width:125px;">Action</th>
                      <th>Nama Aset</th>
                      <th>Kode Aset</th>
                      <th>luas</th>
                      <th>Tahun Pengadaan</th>
                      
                      <th>Alamat</th>
                      <th>Status Tanah</th>
                      <th>Nomor Sertifikat</th>
                      <th>Asal Usul</th>
                      
                      <th>Harga</th> 
                      <th>Kondisi</th>
                      <th>Keterangan</th>

                      <th>Kode Lokasi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="container">
        <a href="<?php echo base_url()?>staff_bpkad/export_kiba" class="btn btn-primary">Konversi Ke Excel</a>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">

var save_method; 
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true,
        "serverSide": true, 
        "order": [], 


        
        "ajax": {
            "url": "<?php echo site_url('staff_bpkad/view_arsip_kiba')?>",
            "type": "POST",
            "data": function ( data ) {
                data.kode_lokasi = $('#kode_lokasi').val();
                data.tahun_pengadaan = $('#tahun_pengadaan').val();
                data.harga_rendah = $('#harga_rendah').val();
                data.harga_tinggi = $('#harga_tinggi').val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], 
            "orderable": false, 
        },
        ],

    });


    $('#btn-filter').click(function(){ 
        table.ajax.reload();  //just reload table
    });

    $('#btn-reset').click(function(){ 
        //$('#form-filter')[0].reset();
        reload_table(); 
    });

    

});

$('#table').on('click', '.item-detail', function(){
            	// Get the id of selected phone and assign it in a variable called phoneData
                var idaset = $(this).attr('data');
                // Start AJAX function
                $.ajax({
                	// Path for controller function which fetches selected phone data
                    url: "<?php echo base_url() ?>staff_bpkad/view_detail_arsip_kiba",
                    // Method of getting data
                    method: "POST",
                    // Data is sent to the server
                    data: {idaset:idaset},
                    // Callback function that is executed after data is successfully sent and recieved
                    success: function(data){
                    	// Print the fetched data of the selected phone in the section called #phone_result 
                    	// within the Bootstrap modal
                        $('#aset_result').html(data);
                        // Display the Bootstrap modal
                        $('#modal_form').modal('show');
                    }

                });
});

window.setTimeout(function() {
     $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); 
}, 5000)

function reload_table()
{
    $('#form-filter')[0].reset();
    table.ajax.reload(); 
}

function delete_kiba(id_aset)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('staff_bpkad/hapus_arsip_kiba')?>/"+id_aset,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>

<!-- Bootstrap modal detail -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Detail KIB</h3>
            </div>
            <div class="modal-body">
                <div id="aset_result">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal Edit -->
<div class="modal fade" id="modal_form_edit" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content"  >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Edit KIB A Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_edit" >
                    <input type="hidden" value="" name="id_aset"/> 
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Nama Aset</label>
                                <select name="nama_aset" id="namaaset" style="width: 100%;" class="form-control select2"  onChange="get_data(this.value)">
                                
                                <?php foreach ($aset as $list): ?>
                                <option value="<?php echo $list->nama_aset; ?>"><?php echo $list->nama_aset; ?> - <?php echo $list->kode_aset; ?></option>
                                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <label>Kode Aset</label>
                                <input id="kodeaset" name="kode_aset" placeholder="Kode Aset" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Register</label>
                                <input name="register" placeholder="Register" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Luas</label>
                                <input name="luas" placeholder="Luas" class="form-control" type="text">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Tahun Pengadaan</label>
                                <input name="tahun_pengadaan" placeholder="Tahun Pengadaan" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Alamat</label>
                                <input name="alamat" placeholder="Alamat" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-3">
                                <label>Status Tanah</label>
                                <input name="status_tanah" placeholder="Status Tanah" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-3">
                                <label>Tanggal Sertifikat</label>
                                <input name="tanggal_sertifikat" placeholder="Tanggal Sertifikat" class="form-control" type="text">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Nomor Sertifikat</label>
                                <input name="nomor_sertifikat" placeholder="Nomor Sertifikat" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-3">
                                <label>Asal Usul</label>
                                <input name="asal_usul" placeholder="Asal Usul" class="form-control" type="text">
                                
                            </div>                 
                            <div class="col-xs-3">
                                <label>Harga</label>
                                <input name="harga" placeholder="Harga" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-3">
                                <label>Kondisi</label>
                                <input name="kondisi" placeholder="Kondisi" class="form-control" type="text">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Keterangan</label>
                                <input name="keterangan" placeholder="Keterangan" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-3">
                                <label>Kode Lokasi</label>
                                <input name="kode_lokasi" placeholder="Kode Lokasi" class="form-control" type="text">
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary save">Save</button>
                <button type="button" class="btn btn-danger" onclick="reload_table()" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->