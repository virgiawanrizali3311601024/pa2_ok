<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax CRUD with Bootstrap modals and Datatables</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
  
    </head> 
<body>
    <div class="container">
        <h1 style="font-size:20pt">Ajax CRUD with Bootstrap modals and Datatables with Server side Validation</h1>

        <h3>Person Data</h3>
        <br />
        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Person</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Kode Aset</th>
                    <th>Register</th>
                    <th>Nama Aset</th>
                    <th>Merk</th>
                    <th>Ukuran</th>
                    
                    <th>Bahan</th>
                    <th>Tahun Pengadaan</th>
                    <th>Lokasi</th>
                    <th>Pabrik</th>
                    <th>No Rangka</th>
                    
                    <th>No Mesin</th>
                    <th>No Polisi</th>
                    <th>Bpkb</th>
                    <th>Asal Usul</th>
                    <th>Penggunaan</th>
                    
                    <th>Harga</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>Kode Lokasi</th>
                    <th>Foto Fisik</th>
                    
                    <th>Kontrak</th>
                    <th>QRcode</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('kibb/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});



function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
}

function edit_person(id_aset)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('person/ajax_edit/')?>/"+id_aset,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_aset"]').val(data.id_aset);
            $('[name="kode_aset"]').val(data.kode_aset);
            $('[name="register"]').val(data.register);
            $('[name="nama_aset"]').val(data.nama_aset);
            $('[name="merk"]').val(data.merk);
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
            $('[name="kode_lokasi"]').val(data.kode_lokasi);
            $('[name="foto_lokasi"]').val(data.foto_lokasi);
            
            $('[name="kontrak"]').val(data.kontrak);
            $('[name="qrcode"]').val(data.qrcode);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('person/ajax_add')?>";
    } else {
        url = "<?php echo site_url('person/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_person(id_aset)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('person/ajax_delete')?>/"+id_aset,
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

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_aset"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kode Aset</label>
                            <div class="col-md-9">
                                <input name="kode_aset" placeholder="Kode Aset" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Register</label>
                            <div class="col-md-9">
                                <input name="register" placeholder="Register" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Aset</label>
                            <div class="col-md-9">
                                <input name="nama_aset" placeholder="Nama Aset" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Merk</label>
                            <div class="col-md-9">
                                <input name="merk" placeholder="Merk" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Ukuran</label>
                            <div class="col-md-9">
                                <input name="ukuran" placeholder="Ukuran" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Bahan</label>
                            <div class="col-md-9">
                                <input name="bahan" placeholder="Bahan" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tahun Pengadaan</label>
                            <div class="col-md-9">
                                <input name="tahun_pengadaan" placeholder="Tahun Pengadaan" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Lokasi</label>
                            <div class="col-md-9">
                                <input name="lokasi" placeholder="Lokasi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pabrik</label>
                            <div class="col-md-9">
                                <input name="pabrik" placeholder="Pabrik" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No Rangka</label>
                            <div class="col-md-9">
                                <input name="no_rangka" placeholder="No Rangka" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">No Mesin</label>
                            <div class="col-md-9">
                                <input name="no_mesin" placeholder="No Mesin" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No Polisi</label>
                            <div class="col-md-9">
                                <input name="no_polisi" placeholder="No Polisi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Bpkb</label>
                            <div class="col-md-9">
                                <input name="bpkb" placeholder="Bpkb" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Asal Usul</label>
                            <div class="col-md-9">
                                <input name="asal_usul" placeholder="Asal Usul" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Penggunaan</label>
                            <div class="col-md-9">
                                <input name="penggunaan" placeholder="Penggunaan" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Harga</label>
                            <div class="col-md-9">
                                <input name="harga" placeholder="Harga" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kondisi</label>
                            <div class="col-md-9">
                                <input name="kondisi" placeholder="Kondisi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Keterangan</label>
                            <div class="col-md-9">
                                <input name="keterangan" placeholder="Keterangan" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kode Lokasi</label>
                            <div class="col-md-9">
                                <input name="kode_lokasi" placeholder="Kode Lokasi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Foto Fisik</label>
                            <div class="col-md-9">
                                <input name="foto_fisik" placeholder="Foto Fisik" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Kontrak</label>
                            <div class="col-md-9">
                                <input name="kontrak" placeholder="Kontrak" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">QRcode</label>
                            <div class="col-md-9">
                                <input name="qrcode" placeholder="QRcode" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</body>
</html>