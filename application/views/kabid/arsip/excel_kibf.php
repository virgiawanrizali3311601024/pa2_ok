<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Download Arsip KIB F
        <small>Konstruksi Dalam Pengerjaan</small>
      </h1>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-13">
          <div class="box">
            <div class="box-header">
                <div class="col-md-12">
                    <span class="pull-right">
                        <a class="btn btn-default" href="<?php echo base_url().'kabid/arsip_kibf'?>"><i class="fa fa-arrow-left"> </i> Back</a>
                    </span>
                </div>              
            </div>
            
            <br><br>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="table-data" class="table table-bordered table-striped">
                <thead>
                  <tr>                      
                      <th>Nama SKPD</th>
                      <th>Kode Lokasi</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($download as $data): ?>
                  <tr>
                      <td><?php echo $data->nama_skpd ?></td>
                      <td><?php echo $data->kode_lokasi ?></td>                
                      <td>
                      <a class="btn btn-sm btn-primary" href="<?php echo base_url().'kabid/export_kibf/'.$data->kode_lokasi?>" title="Download" ><i class="glyphicon glyphicon-list"></i> Download</a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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

$(document).ready(function() {
    $('#table-data').DataTable( {
        "paging":   true,
        "ordering": true,
        "info":     true
    } );
} );

</script>