
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <section class="content-header">
      <h1>
       Data Pembukuan KIB A
        <small>Tanah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>
      <!-- Main content -->
      
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
              
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
                      <th>Tanggal Sertifkat</th>
                      <th>Nomor Sertifikat</th>
                      <th>Asal  Usul Perolehan</th>
                      <th>Harga</th>
                   <!--    <th>Kondisi</th>
                      <th>Keterangan</th>
                      <th>Foto Fisik</th>
                      <th>Kontrak</th>
                      <th>Kondisi Lokasi</th> -->
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
                        <td><?php echo $hasil->tanggal_sertifikat ?></td>
                        <td><?php echo $hasil->nomor_sertifikat ?></td>
                        <td><?php echo $hasil->asal_usul ?></td>
                        <td><?php echo $hasil->harga ?></td>
                        <!-- <td><?php echo $hasil->kondisi ?></td>
                        <td><?php echo $hasil->keterangan ?></td>
                        <td><?php echo $hasil->foto_fisik ?></td>
                        <td><?php echo $hasil->kontrak ?></td>
                        <td><?php echo $hasil->kode_lokasi ?></td>   -->    
                        <td>
                            <a href="<?php echo base_url() ?>Pengurus_barang/detail_kiba/<?php echo $hasil->id_aset ?>" class="btn btn-sm btn-success">Detail</a>
                            <!-- <a onclick="detail_kiba_masukan(<?php //echo $hasil->id_aset ?>)" class="btn btn-sm btn-success">Detail</a> -->
                             <a href="<?php echo base_url() ?>Pengurus_barang/view_edit_Pmasukan_kiba/<?php echo $hasil->id_aset ?>" class="btn btn-sm btn-success">Edit</a>
                        </td>
                
                      </tr>

                    <?php } ?>
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

function detail_kiba_masukan(id_aset)
{
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Pengurus_barang/view_id_masukan_kiba/')?>/"+id_aset,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {


            $('[name="id_aset"]').val(data.id_aset);
            $('[name="hasil"]').val(data.id_aset);
            $('[name="nama_aset"]').val(data.nama_aset);
            $('[name="kode_aset"]').val(data.kode_aset);
            $('[name="register"]').val(data.register);
            $('[name="luas"]').val(data.luas);
            $('[name="tahun_pengadaan"]').val(data.tahun_pengadaan);

            $('[name="alamat"]').val(data.alamat);
            $('[name="status_tanah"]').val(data.status_tanah);
            $('[name="tanggal_sertifikat"]').val(data.tanggal_sertifikat);
            $('[name="nomor_sertifikat"]').val(data.nomor_sertifikat);
            $('[name="asal_usul"]').val(data.asal_usul);
            
            $('[name="harga"]').val(data.harga);
            $('[name="kondisi"]').val(data.kondisi);
            $('[name="keterangan"]').val(data.keterangan);
            $('[name="foto_fisik"]').val(data.foto_fisik);
            $('[name="kontrak"]').val(data.kontrak);

            $('[name="kode_lokasi"]').val(data.kode_lokasi);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Detail Kib'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
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
                            <table class="table table-bordered">
                                <div class="col-xs-6">
                                
                                <label>Id Aset</label>
                                <input name="id_aset"  id="id_aset" placeholder="Nama Aset" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                
                                <label>Nama Aset</label>
                                <input name="nama_aset" placeholder="Nama Aset" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Kode Aset</label>
                                <input name="kode_aset" placeholder="Kode Aset" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Register</label>
                                <input name="register" placeholder="Register" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Luas</label>
                                <input name="luas" placeholder="Luas" class="form-control" type="text">
                                
                            </div>
                            
                            <div class="col-xs-6">
                                <label>Tahun Pengadaan</label>
                                <input name="tahun_pengadaan" placeholder="Tahun Pengadaan" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-6">
                                <label>Alamat</label>
                                <input name="alamat" placeholder="Alamat" class="form-control" type="text">
                                 
                            </div>

                       
                            <div class="col-xs-6">
                                <label>Status Tanah</label>
                                <input name="status_tanah" placeholder="Status Tanah" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-6">
                                <label>Tanggal Sertifikat</label>
                                <input name="tanggal_sertifikat" placeholder="Tanggal Sertifikat" class="form-control" type="text">
                                
                            </div>
                       </table>
                       <table class="table table-bordered">
                      
                            <div class="col-xs-6">
                                <label>Nomor Sertifikat</label>
                                <input name="nomor_sertifikat" placeholder="Nomor Sertifikat" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-6">
                                <label>Asal Usul</label>
                                <input name="asal_usul" placeholder="Asal Usul" class="form-control" type="text">
                                
                            </div>                 
                            <div class="col-xs-6">
                                <label>Harga</label>
                                <input name="harga" placeholder="Harga" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-6">
                                <label>Kondisi</label>
                                <input name="kondisi" placeholder="Kondisi" class="form-control" type="text">
                                
                            </div>
                        
                            <div class="col-xs-6">
                                <label>Keterangan</label>
                                <input name="keterangan" placeholder="Keterangan" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-6">
                                <label>Kode Lokasi</label>
                                <input name="kode_lokasi" placeholder="Kode Lokasi" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-6">
                              
                                <label>Foto Fisik</label>
                                <br>
                                <a class="btn btn-sm btn-primary" title="Download"  value="id_aset" href="<?php echo base_url() ?>Pengurus_barang/get_p_imagea/<?php $id_aset ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a>
                                <!-- <input name="foto_fisik" placeholder="Foto Fisik" class="form-control" type="text"> -->
                                  
                            </div>
                        
                            <div class="col-xs-6">
                                <label>Kontrak</label>
                                <br>
                               <a class="btn btn-sm btn-primary" title="Download"  href="<?php echo base_url() ?>Pengurus_barang/get_p_kontraka/<?php $id_aset ?>"><i class="glyphicon glyphicon-download-alt"></i> Download Kontrak</a>
                                <!-- <input name="foto_fisik" placeholder="Foto Fisik" class="form-control" type="text"> -->
                                
                            </div>
                            
                             </div>
                        </div>
                    </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="reload_table()" data-dismiss="modal">Cancel</button>
            </div>
                </form>
                </table>
            </div>
            
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

