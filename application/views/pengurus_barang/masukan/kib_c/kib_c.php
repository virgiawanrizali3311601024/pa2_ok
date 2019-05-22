<?php require_once(APPPATH.'/views/Assets/header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        KIB C
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'petugas_inven/index'?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url().'petugas_inven/kib_c'?>">KIB C</a></li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
		 
          <div class="box">
            <div class="box-header">
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a></a></li>
              <li><a></a></li>
			  <li class="dropdown">
                <a  class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Cetak <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a  href="<?php echo base_url()?>petugas_inven/cetak_qrcode_c" target="_blank">Cetak QR CODE</a></li>
                    <li><a href="<?php echo base_url()?>petugas_inven/pdf_kib_c" target="_blank">Cetak Laporan</a></li>
                  </ul>
              </li>
              <li class="pull-left header"> Bangunan dan Gedung</li>
            </ul>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-striped wrap">
                <thead>
                <tr>
                </tr>
                </thead>   
				 <tbody>
                                    
            </tbody>
              </table>
              <a href="<?php echo base_url()?>petugas_inven/DownloadKibB" class="btn btn-info btn-sm">
          <span class="glyphicon glyphicon-download-alt"></span> Download Sebagai File Excel
        </a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
    </div>
  <!-- /.content-wrapper -->
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- ./awal kodingan ku -->


<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable({
      
  
      columns: [
            { title: "No" },
            { title: "Kode Barang" },
            { title: "Nama Barang" },
            { title: "Register" },
            { title: "Kondisi Bangunan" },
            { title: "Luas Lantai" },
            { title: "Tanggal Dokumen" },
            { title: "No.Dokumen" },
            { title: "Luas" },
            { title: "Nomor Kode Tanah" },

            {
              title: "Harga",
              render: $.fn.dataTable.render.number(',', '.', 2  ,'Rp ')
            },
        ],

      "serverSide": false,
      "stateSave": true,
      "autoWidth": false,
      
      
        "ajax": {
            url : "<?php echo site_url("petugas_inven/Data_kib_c/1") ?>",
            type : 'GET'
        },
       
    });
});

</script>
<!-- ./akhir kodingan ku -->