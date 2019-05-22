
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
       Data Masukan KIB A
        <small>Tanah</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-13">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                  <tr>                      
                      <th>No.</th>
                      <th>Status</th>        
                      <th>Nama Aset</th>
                      <th>Kode Aset</th>
                      <th>Register</th>
                      <th>luas</th>
                      <th>Tahun Pengadaan</th>
                      <th>Alamat</th>
                      <th>Status Tanah</th>
                      <th>Asal  Usul Perolehan</th>
                      <th>Harga</th>
                      <th>Kondisi</th>
                      <th>Keterangan</th>
                      <th style="width:125px;">Action</th>             
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1; 
                    foreach($arsip as $hasil){ 
                    ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $hasil->status ?></td>
                        <td><?php echo $hasil->nama_aset ?></td>
                        <td><?php echo $hasil->kode_aset ?></td>
                        <td><?php echo $hasil->register ?></td>
                        <td><?php echo $hasil->luas ?></td>
                        <td><?php echo $hasil->tahun_pengadaan ?></td>
                        <td><?php echo $hasil->alamat ?></td>
                        <td><?php echo $hasil->status_tanah ?></td>
                        <td><?php echo $hasil->asal_usul ?></td>
                        <td><?php echo $hasil->harga ?></td>
                        <td><?php echo $hasil->kondisi ?></td>
                        <td><?php echo $hasil->keterangan ?></td>    
                        <td>
                            <a href="<?php echo base_url() ?>staff_bpkad/status_masukan_kiba/<?php echo $hasil->id_aset ?>" class="btn btn-sm btn-danger">Setujui Aset</a>
                            <a href="<?php echo base_url() ?>staff_bpkad/detail_s_kiba/<?php echo $hasil->id_aset ?>" class="btn btn-sm btn-success">Detail</a>
                            <!-- <a onclick="detail_kiba_masukan(<?php echo $hasil->id_aset ?>)" class="btn btn-sm btn-success">Detail</a> -->
                            <a href="<?php echo base_url() ?>staff_bpkad/view_edit_masukan_kiba/<?php echo $hasil->id_aset ?>" class="btn btn-sm btn-success">Edit</a>
                            <a onclick="delete_kiba_masukan(<?php echo $hasil->id_aset ?>)" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                      </tr>

                    <?php } ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
       
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    


    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });

    $('#btn-reset').click(function(){ //button reset event click
        //$('#form-filter')[0].reset();
        reload_table();  //just reload table
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});

function reload_table()
{
    $('#form-filter')[0].reset();
    table.ajax.reload(); //reload datatable ajax 
}



function delete_kiba_masukan(id_aset)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('staff_bpkad/hapus_masukan_kiba')?>/"+id_aset,
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
                <h3 class="modal-title">KIB A Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" >
                    <input type="hidden" value="" name="id_aset"/> 
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label>Nama Aset</label>
                                <input name="nama_aset" placeholder="Nama Aset" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Kode Aset</label>
                                <input name="kode_aset" placeholder="Kode Aset" class="form-control" type="text">
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
                                <label>Foto Fisik</label>
                                <input name="foto_fisik" placeholder="Foto Fisik" class="form-control" type="text">
                                
                            </div>
                        
                            <div class="col-xs-3">
                                <label>Kontrak</label>
                                <input name="kontrak" placeholder="Kontrak" class="form-control" type="text">
                                
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
                <button type="button" class="btn btn-danger" onclick="reload_table()" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal Edit -->
<div class="modal fade" id="modal_form_edit" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
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
                                <select name="nama_aset" class="form-control" id="nama-aset">
                                <option value="">Pilih Aset</option>
                                <?php foreach ($aset as $list): ?>
                                <option value="<?php echo $list->nama_aset; ?>"><?php echo $list->nama_aset; ?> - <?php echo $list->kode_aset; ?></option>
                                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <label>Kode Aset</label>
                                <select name="kode_aset" class="form-control" id="hasilkodeaset">
                                <?php foreach ($aset as $list): ?>
                                <option value="<?php echo $list->kode_aset; ?>"><?php echo $list->kode_aset; ?></option>
                                                <?php endforeach; ?>
                                </select>
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
                                <label>Foto Fisik</label>
                                <input name="foto_fisik" placeholder="Foto Fisik" class="form-control" type="text">
                                
                            </div>
                        
                            <div class="col-xs-3">
                                <label>Kontrak</label>
                                <input name="kontrak" placeholder="Kontrak" class="form-control" type="text">
                                
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
<!-- End Bootstrap modal --> -->