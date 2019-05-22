
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-2"><h4><b>Tambah User </b></h4>
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
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-2">
                                <label>NIP</label>
                                <input name="nip" placeholder="NIP" class="form-control" type="text" >    
                                <?php echo form_error('nip'); ?> 
                                <br>
                                <label>Kode Lokasi</label>        
                            </div>
                            <div class="col-xs-2">
                                <label>Nama</label>
                                <input name="nama" placeholder="Nama" class="form-control" type="text">
                                <?php echo form_error('nama'); ?>
                            </div>
                            <div class="col-xs-2">
                                <label>Hak Akses</label>
                                <select name="tipe_user" class="form-control">
                                    <option value=""></option>
                                    <option value="ketua">Ketua</option>
                                    <option value="staff bpkad">Staff BPKAD</option>
                                    <option value="pengurus barang">Pengurus Barang</option>
                                </select>
                                <?php echo form_error('tipe_user'); ?>                           
                            </div>
                            <div class="col-xs-2">
                                <label>Password</label>
                                <input name="password1"  placeholder="Password" class="form-control" type="password">
                                <?php echo form_error('password1'); ?>
                                
                            </div>
                            <div class="col-xs-2">
                                <label>Confirm Password</label>
                                <input name="password2"  placeholder="Konfirmasi Password" class="form-control" type="password">
                                
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <?php foreach ($kodelokasi as $lokasi): ?>
                            <div class="col-xs-3">
                                <div class="checkbox">
                                    <label><input name="kode_lokasi[]" class="minimal" type="checkbox" value="<?php echo $lokasi->kode_lokasi;?>"><?php echo $lokasi->nama_skpd?></label>
                                </div>
                            </div>   
                            <?php endforeach; ?>                       
                        </div>
                    </div>
                    <input type="submit" value="Tambah" name="tambah" class="btn btn-primary">
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

</script>
