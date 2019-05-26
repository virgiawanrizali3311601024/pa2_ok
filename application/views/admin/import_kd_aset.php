<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
Import Kode Aset
<small>Badan Pengelola Keuangan dan Aset Daerah</small>
</h1>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<!-- left column -->

<!-- general form elements -->
<div class="box box-primary">
<!-- /.box-header -->
<!-- form start -->
<div class="box-body">
<div class="form-group">


<form action="<?=base_url('admin/ss_kel') ?>" method="post" enctype="multipart/form-data">
<div class="file-upload">
<div class="file-select">
<div class="file-select-button" id="foto_fisik">Sub Sub Kelompok</div>
<div class="file-select-name" id="noFile">Format File *.xlsx*.xls*.csv</div> 
<input type="file" name="importfile" id="importfile" required="" accept=".xlsx, .xls, .csv">
</div>
</div>
<button class="btn btn-primary" type="submit" value="submit">Submit</button>
<h1><small><small>*Sub sub kelompok pastikan semua kib kosong</small></small><br>
</form>
<h1></h1>


<div class="modal fade" id="errorModal" >
<div class="modal-dialog modal-dialog-centered">


<!-- Modal content-->
<div class="modal-content">

<div class="modal-header bg-danger">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"><b>Galat!</b></h4>
</div>
<div class="modal-body">
<p><?php echo $this->session->flashdata('error'); ?></p>
</div>

</div>
</div>

</div>



</div>
</div>


<!-- /.box-body -->



</div>
<!-- /.box -->



</div>
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>