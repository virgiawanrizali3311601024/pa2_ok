<!DOCTYPE html>
<html>
<head >
<?php 
foreach ($data->result() as $row):
	
?>
	<style type="text/css">
	</style>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title> Cetak Label Aset <?php
	  $last = $this->uri->total_segments();
	  $record_num = $this->uri->segment($last);
	  echo urldecode($record_num);
        ?>
	</title>
	
	<!-- Google Fonts -->
	<link src="<?php echo base_url()?>assets/css/fontgogleapis.css" rel="stylesheet" type="text/css">
	<link src="<?php echo base_url()?>assets/css/gicon.css" rel="stylesheet" type="text/css">
	<!-- online goole icon -->
	

	<!-- Bootstrap Core Css -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Waves Effect Css -->
	<link href="<?php echo base_url()?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

	<!-- Animation Css -->
	<link href="<?php echo base_url()?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

	<!-- Custom Css -->
	<link href="<?php echo base_url()?>assets/css/admin.css" rel="stylesheet">

	<!-- JQuery DataTable Css -->
	<link href="<?php echo base_url()?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

	<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="<?php echo base_url()?>assets/css/themes/all-themes.css" rel="stylesheet" />

	<!-- MENU JQUERY -->
	<script type="text/javascript" href="<?php echo base_url()?>assets/plugins/jquery/jquery.js"></script>

	<!-- font awesome -->
	<link href="<?php echo base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

	<!-- toggle switch -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap-toggle.min.css">
	<style type="text/css">
		@page { size: 21.59cm 35.56cm;  margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px;  margin-top:50px;}
		@media print { body {size: 21.0cm 29.7cm;  margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px;} }
		body { font-size: 50% }
		tr {padding: 5px}
		div .header {padding: 0px;}
	</style>
	
<style type="text/css">
/*	th, td, tr {
		border: 1px solid black;
	}*/
	.tengah td {padding-left: 0px; margin-right: 0px; padding-right: 0px; font-weight: normal;}
	.ttd td {font-weight: bold;}
	.tengah {width: 70%; margin-left: 94px}
	.tbatas {width: 100%}
	.body {padding: 0px; margin: 0px}
	.card { width: 380px}
</style>
</head>

<body>


<table align="center" >		
		<tr style=" height: 50px">
			<th width="100%">
			<!-- kartu member tampak dari depan -->
			<div class="card" style="border-radius: 0px; border: 2px solid grey;">
				<div class="header" align="center" style=" padding: 0px; margin:0;border-bottom: 1px solid grey">
					<table align="center" class="tbatas">
						<th style="padding: 5px;" class="logos">
							<img src="<?php echo base_url()?>assets/dist/img/index.png"  alt="logo" width="35" height="40" style=" z-index: 1; margin: 0px 0px 0px 13px"></th> 
						</th>
						<th style="font-size: 50%">
							<center><h2><b>ASET INI TELAH</b></h2></br>
							<h2><b>DILAKUKAN PELABELAN</b></h2></center></br>
						</th>						
					</table>
				</div>
				<div class="body">	

	


			

				<img src="<?php echo base_url().'assets/berkas/qrcode/'.$row->qrcode; ?>"  style="position: absolute;" class="pull-right" width="100" height="100"></img>
				<table class="tengah responsive" style="font-size: 80%">
						 
						<tr>
							<th rowspan="20" style="padding: 10px; padding-right:0.5px" valign="top"></th>
							<th valign="top" width="33%">Nama Barang</th>	
							<th width="3%">:</th>
							<td align="left"><?php echo $row->nama_aset ?> </td>
							
						</tr>
						<tr valign="top">
							<th width="18%">Kode Aset</th>
							<th width="2%">:</th>
							<td align="left"> <?php echo $row->kode_aset ?> </td>
						</tr>
						<tr valign="top">
							<th>Register</th>
							<th width="2%">:</th>
							<td align="left"><?php echo $row->register  ?>  </td>
						</tr>
						<tr valign="top">
							<th>Tahun Pengadaan</th>	
							<th width="2%">:</th>
							<td align="left"><?php echo $row->tahun_pengadaan  ?>  </td>
						</tr>
						<tr valign="top">
							<th>Kode Lokasi</th>	
							<th width="2%">:</th>
							<td align="left"><?php echo $row->kode_lokasi  ?>  </td>
						</tr>
						
					
						</table>
					
				
					
				</div>
					<div class="header" style=" padding: 1px; margin:0;border-bottom: 1px solid grey" ></div>
					
					
					 <h6 align="left" >Tanggal Pelebelan : Batam, <?php echo date('d M Y'); ?></h6>
			</div>
			</th>
		</tr>		
</table>
<?php endforeach; ?>
</body>
</html>
       