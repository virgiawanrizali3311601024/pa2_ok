<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Kelola User
        <small>Ketua & Staff BPKAD</small>
      </h1>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-13">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
              <a class="btn btn-sm btn-primary" href="<?php echo base_url().'admin/tambah_user/'?>" title="Tambah" ><i class="glyphicon glyphicon-list"></i> Tambah User</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
              <table id="table-data" class="table table-bordered table-striped">
                <thead>
                  <tr>                      
                      <th style="width:200px;">Action</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Hak Akses</th>
                      <th>Kode Lokasi</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($user as $data): ?>
                  <tr>
                      <td>
                      <a class="btn btn-sm btn-primary" href="<?php echo base_url().'admin/edit_user/'.$data->nip;?>" title="Edit" ><i class="glyphicon glyphicon-list"></i> Edit</a>
                      <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/hapus_user/'.$data->nip;?>" title="Delete" ><i class="glyphicon glyphicon-list"></i> Delete</a>
                      </td>
                      <td><?php echo $data->nip ?></td>
                      <td><?php echo $data->nama ?></td>
                      <td><?php echo $data->tipe_user ?></td>
                      <td><?php echo $data->kode_lokasi ?></td>
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

