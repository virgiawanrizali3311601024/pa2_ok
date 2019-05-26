  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if ($this->session->flashdata('succses')) : ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('succses'); ?>
            </div>
        <?php endif; ?>
      <h1>
       Arsip KIB D
        <small>Jalan dan Irigasi</small>
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
              <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Muat Ulang</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                  <tr>                      
                      <th style="width:125px;">Action</th>
                      <th>Nama Aset</th>
                      <th>Kode Aset</th>
                      <th>Panjang</th>
                      
                      <th>Lebar</th>
                      <th>Luas</th>
                      <th>Alamat</th>
                      <th>Tahun Pengadaan</th>
                      
                      <th>Asal Usul</th>
                      <th>Harga</th> 
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
        <a href="<?php echo base_url().'kabid/view_download_kibd'?>" class="btn btn-primary">Konversi Ke Excel</a>
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

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.


        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('kabid/view_arsip_kibd')?>",
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
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });


    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });

    $('#btn-reset').click(function(){ //button reset event click
        //$('#form-filter')[0].reset();
        reload_table()();  //just reload table
    });

});

$('#table').on('click', '.item-detail', function(){
            	// Get the id of selected phone and assign it in a variable called phoneData
                var idaset = $(this).attr('data');
                // Start AJAX function
                $.ajax({
                	// Path for controller function which fetches selected phone data
                    url: "<?php echo base_url() ?>kabid/view_detail_arsip_kibd",
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

function reload_table()
{
    $('#form-filter')[0].reset();
    table.ajax.reload(); //reload datatable ajax 
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Detail KIB</h3>
            </div>
            <div class="modal-body form">
                <div id="aset_result">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="reload_table()" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->