<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <h1>
       Data Pembukuan KIB B
        <small>Peralatan dan Mesin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>
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
                      <th>Merek</th>
                      <th>Ukuran</th>
                      <th>Bahan</th>
                      <th>Tahun Pengadaan</th>
                      <th>Lokasi</th>
                      <th>Pabrik</th>
                      <th>Nomor Rangka</th>
                      <th>Nomor Mesin</th>
                      <th>Nomor Polisi</th>
                      <th>BPKB</th>
                      <th>Asal  Usul Perolehan</th>
                      <th>Pengguaan</th>
                      <th>Harga</th>
                     <!--  <th>Kondisi</th>
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
                        <td><?php echo $hasil->merk ?></td>
                        <td><?php echo $hasil->ukuran ?></td>
                        <td><?php echo $hasil->bahan ?></td>
                        <td><?php echo $hasil->tahun_pengadaan ?></td>
                        <td><?php echo $hasil->lokasi ?></td>
                        <td><?php echo $hasil->pabrik ?></td>
                        <td><?php echo $hasil->no_rangka ?></td>
                        <td><?php echo $hasil->no_mesin ?></td>
                        <td><?php echo $hasil->no_polisi ?></td>
                        <td><?php echo $hasil->bpkb ?></td>
                        <td><?php echo $hasil->asal_usul ?></td>
                        <td><?php echo $hasil->penggunaan ?></td>
                        <td><?php echo $hasil->harga ?></td>
                       <!--  <td><?php echo $hasil->kondisi ?></td>
                        <td><?php echo $hasil->keterangan ?></td>
                        <td><?php echo $hasil->foto_fisik ?></td>
                        <td><?php echo $hasil->kontrak ?></td>
                        <td><?php echo $hasil->kode_lokasi ?></td> -->
                        <td>  
                        <a href="<?php echo base_url() ?>Pengurus_barang/detail_kibb/<?php echo $hasil->id_aset ?>" class="btn btn-sm btn-success">Detail</a>
                        <!-- <a onclick="detail_kibb_masukan(<?php echo $hasil->id_aset ?>)" class="btn btn-sm btn-success">Detail</a> -->
                        <a href="<?php echo base_url() ?>Pengurus_barang/view_edit_Pmasukan_kibb/<?php echo $hasil->id_aset ?>" class="btn btn-sm btn-success">Edit</a>
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


function detail_kibb_masukan(id_aset)
{
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Pengurus_barang/view_id_masukan_kibb/')?>/"+id_aset,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_aset"]').val(data.id_aset);
            $('[name="nama_aset"]').val(data.nama_aset);
            $('[name="kode_aset"]').val(data.kode_aset);
            $('[name="register"]').val(data.register);
            $('[name="ukuran"]').val(data.ukuran);

            $('[name="bahan"]').val(data.bahan);
            $('[name="tahun_pengadaan"]').val(data.tahun_pengadaan);
            $('[name="lokasi"]').val(data.lokasi);
            $('[name="pabrik"]').val(data.pabrik);
            $('[name="no_rangka"]').val(data.no_rangka);
            $('[name="no_mesin"]').val(data.no_mesin);

            $('[name="no_polisi"]').val(data.no_polisi);
            $('[name="bpkb"]').val(data.bpkb);
            $('[name="asal_usul"]').val(data.asal_usul);
            $('[name="penggunaan"]').val(data.penggunaan);
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

$('.select2').select2()

$("#kodeaset").select2({
  placeholder:"Nama Aset / Kode Aset",
  ajax:{
    url:"<?php echo site_url('Pengurus_barang/list_asetb')?>",
    dataType: 'json',
    data: function (params) {

            var queryParameters = {
                text: params.term
            }
            return queryParameters;
        } 
  },
  cache: true,
  minimumInputLength: 2,
  formatResult: format,
  formatSelection: format,
  escapeMarkup: function(m) { return m; }
});

function format(x)
{
  return x.text;
}

function get_data(kata)
{
  $.ajax({
  url:"<?php echo site_url('Pengurus_barang/get_info_asetb')?>",
    data:{kata : kata},
    success: function(data)
    {
      var dt = JSON.parse(data);
      $("input[name=nama_aset]").val(dt.nama_aset);
      
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
                <h3 class="modal-title">KIB B Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" >
                    <input type="hidden" value="" name="id_aset"/> 
                    <div class="form-body">
                        <div class="form-group row">
                           <table class="table table-bordered">
                            <div class="col-xs-6">
                                <label>Kode Aset</label>
                                <input name="kode_aset" placeholder="Kode Aset" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Register</label>
                                <input name="register" placeholder="Register" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Nama Aset</label>
                                <input name="nama_aset" placeholder="Nama Aset" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Merk</label>
                                <input name="merk" placeholder="Merk" class="form-control" type="text">
                            </div>
  
                            <div class="col-xs-6">
                                <label>Ukuran</label>
                                <input name="ukuran" placeholder="Ukuran" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Bahan</label>
                                <input name="bahan" placeholder="Bahan" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Tahun Pengadaan</label>
                                <input name="tahun_pengadaan" placeholder="Tahun Pengadaan" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Lokasi</label>
                                <input name="lokasi" placeholder="Lokasi" class="form-control" type="text">
                            </div>
                        
                            <div class="col-xs-6">
                                <label>Pabrik</label>
                                <input name="pabrik" placeholder="Pabrik" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>No Rangka</label>
                                    <input name="no_rangka" placeholder="No Rangka" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>No Mesin</label>
                                <input name="no_mesin" placeholder="No Mesin" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>No Polisi</label>
                                <input name="no_polisi" placeholder="No Polisi" class="form-control" type="text">
                            </div>
               
               
                            <div class="col-xs-6">
                                <label>Bpkb</label>
                                <input name="bpkb" placeholder="Bpkb" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Asal Usul</label>
                                <input name="asal_usul" placeholder="Asal Usul" class="form-control" type="text">
                            </div>
                            <div class="col-xs-6">
                                <label>Penggunaan</label>
                                <input name="penggunaan" placeholder="Penggunaan" class="form-control" type="text">
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
                                <a class="btn btn-sm btn-primary" title="Download"  href="<?php echo base_url('id_aset') ?>Pengurus_barang/get_p_imageb/<?php echo $id_aset ?>"><i class="glyphicon glyphicon-download-alt"></i> Download</a>
                                <!-- <input name="foto_fisik" placeholder="Foto Fisik" class="form-control" type="text"> -->
                                
                            </div>
                        
                            <div class="col-xs-6">
                                <label>Kontrak</label>
                                <br>
                               <a class="btn btn-sm btn-primary" title="Download"  href="<?php echo base_url() ?>Pengurus_barang/get_p_kontrakb/<?php echo $hasil->id_aset ?>"><i class="glyphicon glyphicon-download-alt"></i> Download Kontrak</a>
                                <!-- <input name="foto_fisik" placeholder="Foto Fisik" class="form-control" type="text"> -->
                                
                            </div>
                            
                            
                        
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="reload_table()" data-dismiss="modal">Cancel</button>
            </div>

                </form>
 </table>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
