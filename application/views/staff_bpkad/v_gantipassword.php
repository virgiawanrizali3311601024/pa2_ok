
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Kelola Kata Sandi
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if ($this->session->flashdata('succses')) : ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('succses'); ?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>
      <div class="row">
        <div class="col-xs-13">
          <div class="box">
            <div class="box-header">
              <div class="col-md-11">
                <h3 class="box-title"></h3>
              </div>
              <div class="col-md-1">
                    <span class="pull-left">
                        <a class="btn btn-default" href="<?php echo base_url().'staff_bpkad/masukan_kibb'?>"><i class="fa fa-arrow-left"> </i> Kembali</a>
                    </span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <?php echo form_open(''); ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label col-xs-5">Kata Sandi Lama</label>
                            <div class="col-xs-7">
                                <input name="pass_lama" value="<?php echo set_value('pass_lama');?>" placeholder="Kata Sandi Lama" class="form-control" type="password">
                                <?php echo form_error('pass_lama'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-5">Kata Sandi Baru</label>
                            <div class="col-xs-7">
                                <input name="pass_baru1" value="<?php echo set_value('pass_baru1');?>" placeholder="Kata Sandi Baru" class="form-control" type="password">
                                <?php echo form_error('pass_baru1'); ?> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-5">Ulangi Kata Sandi</label>
                            <div class="col-xs-7">
                                <input name="pass_baru2" value="<?php echo set_value('pass_baru2');?>" placeholder="Ulangi Kata Sandi" class="form-control" type="password">
                               
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Update" class="btn btn-primary">
                <?php echo form_close(); ?>
            </form>
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
     $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); 
}, 5000)

window.setTimeout(function() {
     $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); 
}, 5000)




</script>
