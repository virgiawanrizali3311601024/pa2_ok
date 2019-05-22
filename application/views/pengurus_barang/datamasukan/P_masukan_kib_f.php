 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
       Data Pembukuan KIB F
        <small>Konstruksi Dalam Pengerjaan</small>
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
                      <th>Bangunan</th>
                      <th>Beringkat/Tidak</th>
                      <th>Beton/Tidak</th>
                      <th>Luas </th>
                      <th>Alamat</th>
                      <th>Tanggal Dokumen</th>
                      <th>Nomor Dokumen Gedung</th>
                      <th>Tahun Mulai</th>
                      <th>Nomor Kode Tanah</th>
                      <th>Nilai Kontrak</th>    
                      <th>Asal  Usul Pembiayaan</th>
                    
              
                      
                                            
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
                        <td><?php echo $hasil->bangunan ?></td>
                        <td><?php echo $hasil->bertingkat_tidak ?></td>
                        <td><?php echo $hasil->beton_tidak ?></td>
                        <td><?php echo $hasil->luas ?></td>
                        <td><?php echo $hasil->alamat ?></td>
                        <td><?php echo $hasil->tanggal_dokumen ?></td>
                        <td><?php echo $hasil->nomor_dokumen?></td>
                        <td><?php echo $hasil->tahun_bulan_mulai ?></td>
                        <td><?php echo $hasil->nomor_kode_tanah ?></td>
                        <td><?php echo $hasil->nilai_kontrak ?></td>
                        <td><?php echo $hasil->asal_usul_pembiayaan ?></td>
              
                        <td>
                         <a href="<?php echo base_url() ?>Pengurus_barang/detail_kibf/<?php echo $hasil->id_aset ?>" class="btn btn-sm btn-success">Detail</a>
                        <a href="<?php echo base_url() ?>Pengurus_barang/view_edit_Pmasukan_kibf/<?php echo $hasil->id_aset ?>" class="btn btn-sm btn-success">Edit</a>
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

function detail_kib_masukan(id_aset)
{
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Pengurus_barang/view_id_masukan_kibf/')?>/"+id_aset,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_aset"]').val(data.id_aset);
            $('[name="nama_aset"]').val(data.nama_aset);
            $('[name="kode_aset"]').val(data.kode_aset);
            $('[name="bangunan"]').val(data.bangunan);
            $('[name="bertingkat_tidak"]').val(data.bertingkat_tidak);
            $('[name="beton_tidak"]').val(data.beton_tidak);
            $('[name="luas"]').val(data.luas);
            $('[name="alamat"]').val(data.alamat);
            $('[name="tanggal_dokumen"]').val(data.tanggal_dokumen);
            $('[name="nomor_dokumen"]').val(data.nomor_dokumen);
            $('[name="tahun_bulan_mulai"]').val(data.tahun_bulan_mulai);
            $('[name="nomor_kode_tanah"]').val(data.nomor_kode_tanah);
            $('[name="nilai_kontrak"]').val(data.nilai_kontrak);
            $('[name="asal_usul_pembiayaan"]').val(data.asal_usul_pembiayaan);
            $('[name="status_tanah"]').val(data.status_tanah);
            $('[name="keterangan"]').val(data.keterangan);
            $('[name="foto_fisik"]').val(data.foto_fisik);
            $('[name="kontrak"]').val(data.kontrak);
            $('[name="kode_lokasi"]').val(data.kode_lokasi);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Detail Kib F'); // Set title to Bootstrap modal title

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
                <h3 class="modal-title">KIB F Form</h3>
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
                                <label>Bangunan</label>
                                <input name="bangunan" placeholder="Register" class="form-control" type="text">
                            </div>
                             <div class="col-xs-3">
                                <label>Bertingkat/Tidak</label>
                                <input name="bertingkat_tidak" placeholder="Bertingkat" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-3">
                                <label>Beton/Tidak</label>
                                <input name="beton_tidak" placeholder="Beton / Tidak" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-3">
                                <label>Luas</label>
                                <input name="luas" placeholder="Luas Lantai" class="form-control" type="text">
                                
                            </div>
                        
                            <div class="col-xs-3">
                                <label>Alamat</label>
                                <input name="alamat" placeholder="Alamat" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-3">
                                <label>Tanggal Dokumen</label>
                                <input name="tanggal_dokumen" placeholder="Tanggal Dokumen" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-3">
                                <label>Nomor Dokumen</label>
                                <input name="nomor_dokumen" placeholder="Nomor Dokumen Gedung" class="form-control" type="text">    
                            </div>
                             

                            <div class="col-xs-3">
                                <label>Tahun Mulai</label>
                                <input name="tahun_bulan_mulai" placeholder="Tahun Pengadaan" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Nomor Kode Tanah</label>
                                <input name="nomor_kode_tanah" placeholder="Nomor Kode Tanah" class="form-control" type="text">
                            </div>
                            
                            <div class="col-xs-3">
                                <label>nilai_kontrak</label>
                                <input name="luas_tanah" placeholder="BPKB" class="form-control" type="text">
                                
                            </div>
                            <div class="col-xs-3">
                                <label>Asal Pembiayaaan</label>
                                <input name="asal_usul_pembiayaan" placeholder="Asal Usul" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Kondisi</label>
                                <input name="kondisi" placeholder="Kondisi" class="form-control" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Status Tanah</label>
                                <input name="status_tanah" placeholder="Nomor Mesin" class="form-control" type="text">
                            </div>
                            
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
