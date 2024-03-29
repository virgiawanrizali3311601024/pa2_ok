<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if ($this->session->flashdata('succses')) : ?>
            <div class="alert alert-info">
                <?php echo $this->session->flashdata('succses'); ?>
            </div>
        <?php endif; ?>
    
      <h1>
       Arsip KIB A
        <small>Tanah</small>
      </h1>
    </section>
    <br>
    <form id="form-filter" class="box form-inline content-header">
        <div class="form-group">
            <label>Lokasi</label>
             <div>
                <select style="width: 255px" name="kode_lokasi" id="kode_lokasi" class="form-control">
                    <option value="">Pilih SKPD</option>
                  <?php foreach ($skpd as $list): ?>
                    <option value="<?php echo $list->kode_lokasi; ?>"><?php echo $list->nama_skpd; ?> - <?php echo $list->kode_lokasi; ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Tahun Pengadaan</label>
             <div>
                <select style="width: 255px" name="tahun_pengadaan" id="tahun_pengadaan" class="form-control">
                    <option value=""></option>
                    <?php foreach ($all_tahun as $baris): ?>
                    <option value="<?php echo $baris->tahun_pengadaan; ?>"><?php echo $baris->tahun_pengadaan; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div>
                <br>
                <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                <button type="button" id="btn-reset" class="btn btn-default">Reset</button>

            </div>
        </div>
    </form>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-13">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
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
                      <th>Asal Usul</th>
                      
                      <th>Harga</th> 
                      <th>Kondisi</th>
                      <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
        <a href="<?php echo base_url().'staff_bpkad/view_download_kiba'?>" class="btn btn-primary">Konversi Ke Excel</a>
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
     $(".alert-info").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); 
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