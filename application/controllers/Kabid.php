<?php
class Kabid extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('Kabid_model','km');
		$this->load->model('admin_model');

		if($this->session->userdata('tipe_user')!="ketua"){
			redirect('login/index');
		}
  }

	function index()
	{
		$data_nama['nama'] = $this->session->userdata('nama');
		$data_nama['nip'] = $this->session->userdata('nip');
		$data_nama['kodelokasi'] = $this->session->userdata('kode_lokasi');
		$this->load->view('Kabid/header',$data_nama);
		$this->load->view('Kabid/dashboard');
		$this->load->view('Kabid/footer');
	}

	function masukan_kiba()
	{

	}

	function masukan_kibb()
	{
		$data_nama['nama'] = $this->session->userdata('nama');
		$data_nama['nip'] = $this->session->userdata('nip');
		$data_nama['kodelokasi'] = $this->session->userdata('kode_lokasi');
		$this->load->view('Kabid/header',$data_nama);
		$this->load->view('Kabid/masukan/masukan_kibb');
		$this->load->view('Kabid/footer');
	}

	function masukan_kibc()
	{

	}

	function masukan_kibd()
	{

	}

	function masukan_kibe()
	{

	}

	function masukan_kibf()
	{

	}




	function gantipassword()
	{
		$this->form_validation->set_rules('pass_lama', 'Password lama', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('pass_baru1', 'Password Baru', 'trim|required|min_length[6]|matches[pass_baru2]',[
			'matches' => 'Password Tidak Sama!',
			'min_length' => 'Password Terlalu Pendek!'
		]);
		$this->form_validation->set_rules('pass_baru2', 'Ulangi Password', 'trim|required|min_length[6]|matches[pass_baru1]');
	
		if($this->form_validation->run() == TRUE)
		{
			$data = array(
				'password' => md5($this->input->post('pass_baru1', TRUE))
				
			);
			
			$result = $this->admin_model->check_passwordlama($this->input->post('pass_lama', TRUE));
			
			if($result > 0 AND $result === true ){

				$result1 = $this->admin_model->update_pass($data);

				if($result1 > 0){
					$this->session->set_flashdata('succses', 'Password berhasil diupdate.');
					return redirect('kabid/gantipassword');
				}else{
					$this->session->set_flashdata('error', '<b>Error: </b>Password tidak berhasil diupdate.');
					return redirect('kabid/gantipassword');
				}
			}else{
				$this->session->set_flashdata('error', '<b>Error: </b>Password lama tidak benar.');
				return redirect('kabid/gantipassword');
			}	
		}

		$this->load->view('kabid/header');
		$this->load->view('kabid/v_gantipassword');
		$this->load->view('kabid/footer');
	}





	function arsip_kiba()
	{
		$data['skpd']=$this->km->get_list_skpd();		
		$data['all_tahun']=$this->km->get_list_tahun_kiba();

		$this->load->view('Kabid/header');
		$this->load->view('Kabid/arsip/arsip_kiba',$data);
		$this->load->view('Kabid/footer');
	}

		function view_arsip_kiba()
		{
			$list = $this->km->get_datatables_kiba();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kiba) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kiba->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>';
				$row[] = $kiba->nama_aset;
				$row[] = $kiba->kode_aset;
				$row[] = $kiba->luas;
				$row[] = $kiba->tahun_pengadaan;
				
				$row[] = $kiba->alamat;
				$row[] = $kiba->status_tanah;
				$row[] = $kiba->nomor_sertifikat;
				$row[] = $kiba->asal_usul;

				$row[] = $kiba->harga;
				$row[] = $kiba->kondisi;
				$row[] = $kiba->keterangan;
				//$row[] = '<a class="btn btn-sm btn-primary" href="get_imagea/'.$kiba->id_aset.'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a>';
				//$row[] = '<a class="btn btn-sm btn-primary" href="get_kontraka/'.$kiba->id_aset.'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a>';
				
				$row[] = $kiba->kode_lokasi;

							
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->km->count_all_kiba(),
							"recordsFiltered" => $this->km->count_filtered_kiba(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_detail_arsip_kiba()
		{
			$idaset=$this->input->post('idaset');

			if(isset($idaset) and !empty($idaset)){
                $records = $this->km->get_id_kiba($idaset);
                $output = '';
                foreach($records->result_array() as $row){
                	$output .= '
						 
						    <div class="row">
						    <div class="col-lg-6">
						    	<table class="table table-bordered">				    		
										<tr>
											<td><b>Nama Aset</b></td>
											<td>'.$row["nama_aset"].'</td>						    		
										</tr>	
						    		<tr>
						    			<td><b>Kode Aset</b></td>
						    			<td>'.$row["kode_aset"].'</td>
						    		</tr>
						    		<tr>
						    			<td><b>Register</b></td>
						    			<td>'.$row["register"].'</td>						    		
						    		</tr>		
						    		<tr>
						    			<td><b>Luas</b></td>
						    			<td>'.$row["luas"].'</td>						    		
						    		</tr>
						    		<tr>
						    			<td><b>Tahun Pengadaan</b></td>
						    			<td>'.$row['tahun_pengadaan'].'</td>						    		
						    		</tr>						    			
						    		<tr>
						    			<td><b>Alamat</b></td>
						    			<td>'.$row['alamat'].'</td>						    		
						    		</tr>
						    		<tr>
						    			<td><b>Status Tanah</b></td>
						    			<td>'.$row["status_tanah"].'</td>
						    		</tr>						    								    		
						    		<tr>
						    			<td><b>Tanggal Sertifikat</b></td>
						    			<td>'.$row["tanggal_sertifikat"].'</td>						    		
						    		</tr>					    								    		
								</table>
							</div>
							<div class="col-lg-6">
								<table class="table table-bordered">
										<tr>
											<td><b>Nomor Sertifikat</b></td>
											<td>'.$row["nomor_sertifikat"].'</td>
										</tr>						    								    		
										<tr>
											<td><b>Asal Usul</b></td>
											<td>'.$row["asal_usul"].'</td>						    		
										</tr>	
						    		<tr>
						    			<td><b>Harga</b></td>
						    			<td>'.$row["harga"].'</td>
						    		</tr>							    								    	
						    		<tr>
						    			<td><b>Kondisi</b></td>
						    			<td>'.$row["kondisi"].'</td>						    		
						    		</tr>						    								    															    		
						    		<tr>
						    			<td><b>Keterangan</b></td>
						    			<td>'.$row["keterangan"].'</td>						    		
						    		</tr>	
										<td><b>Foto Fisik</b></td>
						    			<td><a class="btn btn-sm btn-primary" href="get_imagea/'.encrypt_url($row["id_aset"]).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
						    		</tr>
						    		<tr>
						    			<td><b>Kontrak</b></td>
						    			<td><a class="btn btn-sm btn-primary" href="get_kontraka/'.encrypt_url($row["id_aset"]).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
						    		</tr>	
						    		<tr>
						    			<td><b>Kode Lokasi</b></td>
						    			<td>Rp.'.$row["kode_lokasi"].'</td>
						    		</tr>						    								    						    		
								</table>							
							</div>
							</div>';

                }				
                echo $output;
            }
            else {
            	echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Aset'.'</li></ul></center>';
            }
		}

		function get_imagea()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->km->download_foto_kiba(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['foto'];
			$path='./assets/berkas/KIB A/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function get_kontraka()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->km->download_kontrak_kiba(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB A/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function view_download_kiba()
		{
			$data['download']=$this->km->get_list_downloada();

			$this->load->view('kabid/header');
			$this->load->view('kabid/arsip/excel_kiba',$data);
			$this->load->view('kabid/footer');
		}



	function arsip_kibb()
	{
		$data['skpd']=$this->km->get_list_skpd();		
		$data['all_tahun']=$this->km->get_list_tahun_kibb();

		$this->load->view('Kabid/header');
		$this->load->view('Kabid/arsip/arsip_kibb',$data);
		$this->load->view('Kabid/footer');
	}

		function view_arsip_kibb()
		{
			$list = $this->km->get_datatables_kibb();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibb) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kibb->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>';
				$row[] = $kibb->kode_aset;
				$row[] = $kibb->register;
				$row[] = $kibb->nama_aset;
				$row[] = $kibb->merk;
				$row[] = $kibb->ukuran;
				
				$row[] = $kibb->bahan;
				$row[] = $kibb->tahun_pengadaan;
				$row[] = $kibb->harga;		
				$row[] = $kibb->keterangan;
				$row[] = $kibb->kode_lokasi;				
			
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->km->count_all_kibb(),
							"recordsFiltered" => $this->km->count_filtered_kibb(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_detail_arsip_kibb()
		{
			$idaset=$this->input->post('idaset');

			if(isset($idaset) and !empty($idaset)){
                $records = $this->km->get_id_kibb($idaset);
                $output = '';
                foreach($records->result_array() as $row){
                	$output .= '
						 
						    <center><img style="width:200px; height: 200px;" src="'.base_url('assets/berkas/qrcode/'.$row["qrcode"]).'"></center><br><br>
						    <div class="row">
						    <div class="col-lg-6">
						    	<table class="table table-bordered">
						    		<tr>
						    			<td><b>Kode Aset</b></td>
						    			<td>'.$row["kode_aset"].'</td>
						    		</tr>
						    		<tr>
						    			<td><b>Register</b></td>
						    			<td>'.$row["register"].'</td>						    		
						    		</tr>						    		
						    		<tr>
						    			<td><b>Nama Aset</b></td>
						    			<td>'.$row["nama_aset"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Merk</b></td>
						    			<td>'.$row["merk"].'</td>						    		
						    		</tr>
						    		<tr>
						    			<td><b>Ukuran</b></td>
						    			<td>'.$row['ukuran'].'</td>						    		
						    		</tr>						    			
						    		<tr>
						    			<td><b>Bahan</b></td>
						    			<td>'.$row['bahan'].'</td>						    		
						    		</tr>
						    		<tr>
						    			<td><b>Tahun Pengadaaan</b></td>
						    			<td>'.$row["tahun_pengadaan"].'</td>
						    		</tr>						    								    		
						    		<tr>
						    			<td><b>Lokasi</b></td>
						    			<td>'.$row["lokasi"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Pabrik</b></td>
						    			<td>'.$row["pabrik"].'</td>
						    		</tr>						    								    		
						    		<tr>
						    			<td><b>No. Rangka</b></td>
						    			<td>'.$row["no_rangka"].'</td>						    		
						    		</tr>					    								    		
								</table>
							</div>
							<div class="col-lg-6">
								<table class="table table-bordered">
						    		<tr>
						    			<td><b>No. Mesin</b></td>
						    			<td>'.$row["no_mesin"].'</td>
						    		</tr>							    								    	
						    		<tr>
						    			<td><b>No. Polisi</b></td>
						    			<td>'.$row["no_polisi"].'</td>						    		
						    		</tr>						    								    															    		
						    		<tr>
						    			<td><b>BPKB</b></td>
						    			<td>'.$row["bpkb"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Asal Usul</b></td>
						    			<td>'.$row["asal_usul"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Penggunaan</b></td>
						    			<td>'.$row['penggunaan'].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Harga</b></td>
						    			<td>Rp.'.$row["harga"].'</td>
						    		</tr>						    							    			
						    		<tr>
						    			<td><b>Kondisi</b></td>
						    			<td>'.$row["kondisi"].'</td>
						    		</tr>
						    		<tr>
						    			<td><b>Keterangan</b></td>
						    			<td>'.$row["keterangan"].'</td>
						    		</tr>		
						    		<tr>
						    			<td><b>Kode Lokasi</b></td>
						    			<td>'.$row["kode_lokasi"].'</td>
						    		</tr>						    							    			
						    		<tr>
										<td><b>Foto Fisik</b></td>
						    			<td><a class="btn btn-sm btn-primary" href="get_imageb/'.encrypt_url($row["id_aset"]).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
						    		</tr>
						    		<tr>
						    			<td><b>Kontrak</b></td>
						    			<td><a class="btn btn-sm btn-primary" href="get_kontrakb/'.encrypt_url($row["id_aset"]).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
						    		</tr>						    								    						    		
								</table>							
							</div>
							</div>';

                }				
                echo $output;
            }
            else {
            	echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Aset'.'</li></ul></center>';
            }
		}

		function get_imageb()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->km->download_foto_kibb(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['foto'];
			$path='./assets/berkas/KIB B/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function get_kontrakb()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->km->download_kontrak_kibb(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB B/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function view_download_kibb()
		{
			$data['download']=$this->km->get_list_downloadb();

			$this->load->view('kabid/header');
			$this->load->view('kabid/arsip/excel_kibb',$data);
			$this->load->view('kabid/footer');
		}



	function arsip_kibc()
	{
		$data['skpd']=$this->km->get_list_skpd();			
		$data['all_tahun']=$this->km->get_list_tahun_kibc();

		$this->load->view('Kabid/header');
		$this->load->view('Kabid/arsip/arsip_kibc',$data);
		$this->load->view('Kabid/footer');
	}

		function view_arsip_kibc()
		{
			$list = $this->km->get_datatables_kibc();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibc) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kibc->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>';
				$row[] = $kibc->nama_aset;
				$row[] = $kibc->kode_aset;
				//$row[] = $kibc->register;
				$row[] = $kibc->kondisi;
				//$row[] = $kibc->bertingkat;
				
				//$row[] = $kibc->beton_tidak;
				$row[] = $kibc->luas_lantai;
				$row[] = $kibc->tahun_pengadaan;
				$row[] = $kibc->alamat;
				//$row[] = $kibc->nomor_dokumen_gedung;

				//$row[] = $kibc->tanggal_dokumen;
				//$row[] = $kibc->status_tanah;
				//$row[] = $kibc->nomor_kode_tanah;
				$row[] = $kibc->luas_tanah;
				$row[] = $kibc->asal_usul;

				$row[] = $kibc->harga;			
				//$row[] = $kibc->keterangan;
				//$row[] = $kibc->foto_fisik;
				//$row[] = $kibc->kontrak;
				$row[] = $kibc->kode_lokasi;

				
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->km->count_all_kibc(),
							"recordsFiltered" => $this->km->count_filtered_kibc(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_detail_arsip_kibc()
		{
			$idaset=$this->input->post('idaset');

			if(isset($idaset) and !empty($idaset)){
                $records = $this->km->get_id_kibc($idaset);
                $output = '';
                foreach($records->result_array() as $row){
                	$output .= '
						 
						    <div class="row">
						    <div class="col-lg-6">
						    	<table class="table table-bordered">
						    		<tr>
						    			<td><b>Kode Aset</b></td>
						    			<td>'.$row["kode_aset"].'</td>
						    		</tr>
						    		<tr>
						    			<td><b>Register</b></td>
						    			<td>'.$row["register"].'</td>						    		
						    		</tr>						    		
						    		<tr>
						    			<td><b>Nama Aset</b></td>
						    			<td>'.$row["nama_aset"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Kondisi</b></td>
						    			<td>'.$row["kondisi"].'</td>						    		
						    		</tr>
						    		<tr>
						    			<td><b>Bertingkat</b></td>
						    			<td>'.$row['bertingkat'].'</td>						    		
						    		</tr>						    			
						    		<tr>
						    			<td><b>Beton/Tidak</b></td>
						    			<td>'.$row['beton_tidak'].'</td>						    		
						    		</tr>					    								    		
						    		<tr>
						    			<td><b>Luas Lantai</b></td>
						    			<td>'.$row["luas_lantai"].'</td>						    		
						    		</tr>
						    		<tr>
						    			<td><b>Tahun Pengadaaan</b></td>
						    			<td>'.$row["tahun_pengadaan"].'</td>
						    		</tr>		
						    		<tr>
						    			<td><b>Alamat</b></td>
						    			<td>'.$row["alamat"].'</td>
						    		</tr>						    								    		
						    		<tr>
						    			<td><b>Nomor Dokumen Gedung</b></td>
						    			<td>'.$row["nomor_dokumen_gedung"].'</td>						    		
						    		</tr>					    								    		
								</table>
							</div>
							<div class="col-lg-6">
								<table class="table table-bordered">
						    		<tr>
						    			<td><b>Tanggal Dokumen</b></td>
						    			<td>'.$row["tanggal_dokumen"].'</td>
						    		</tr>							    								    	
						    		<tr>
						    			<td><b>Status Tanah</b></td>
						    			<td>'.$row["status_tanah"].'</td>						    		
						    		</tr>						    								    															    		
						    		<tr>
						    			<td><b>Nomor Kode Tanah</b></td>
						    			<td>'.$row["nomor_kode_tanah"].'</td>						    		
						    		</tr>		
						    		<tr>
						    			<td><b>Luas Tanah</b></td>
						    			<td>'.$row['luas_tanah'].'</td>						    		
						    		</tr>
						    		<tr>
						    			<td><b>Asal Usul</b></td>
						    			<td>'.$row["asal_usul"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Harga</b></td>
						    			<td>Rp.'.$row["harga"].'</td>
						    		</tr>		
						    		<tr>
						    			<td><b>Keterangan</b></td>
						    			<td>'.$row["keterangan"].'</td>
						    		</tr>							    							    			
						    		<tr>
											<td><b>Foto Fisik</b></td>
						    			<td><a class="btn btn-sm btn-primary" href="get_imagec/'.encrypt_url($row["id_aset"]).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
						    		</tr>
						    		<tr>
						    			<td><b>Kontrak</b></td>
						    			<td><a class="btn btn-sm btn-primary" href="get_kontrakc/'.encrypt_url($row["id_aset"]).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
						    		</tr>		
						    		<tr>
						    			<td><b>Kode Lokasi</b></td>
						    			<td>'.$row["kode_lokasi"].'</td>
						    		</tr>					    								    						    		
								</table>							
							</div>
							</div>';

                }				
                echo $output;
            }
            else {
            	echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Aset'.'</li></ul></center>';
            }
		}

		function get_imagec()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->km->download_foto_kibc(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['foto'];
			$path='./assets/berkas/KIB C/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function get_kontrakc()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->km->download_kontrak_kibc(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB C/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function view_download_kibc()
		{
			$data['download']=$this->km->get_list_downloadc();

			$this->load->view('kabid/header');
			$this->load->view('kabid/arsip/excel_kibc',$data);
			$this->load->view('kabid/footer');
		}


		
	function arsip_kibd()
	{
		$data['skpd']=$this->km->get_list_skpd();			
		$data['all_tahun']=$this->km->get_list_tahun_kibd();

		$this->load->view('Kabid/header');
		$this->load->view('Kabid/arsip/arsip_kibd',$data);
		$this->load->view('Kabid/footer');
	}

		function view_arsip_kibd()
		{
			$list = $this->km->get_datatables_kibd();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibd) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kibd->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>';
				$row[] = $kibd->nama_aset;
				$row[] = $kibd->kode_aset;
				//$row[] = $kibd->register;
				//$row[] = $kibd->konstruksi;
				$row[] = $kibd->panjang;
				
				$row[] = $kibd->lebar;
				$row[] = $kibd->luas;
				$row[] = $kibd->alamat;
				$row[] = $kibd->tahun_pengadaan;
				//$row[] = $kibd->tanggal_dokumen;
				
				//$row[] = $kibd->nomor_dokumen;
				//$row[] = $kibd->status_tanah;
				//$row[] = $kibd->nomor_kode_tanah;
				$row[] = $kibd->asal_usul;
				$row[] = $kibd->harga;

				//$row[] = $kibd->kondisi;			
				//$row[] = $kibd->keterangan;
				//$row[] = $kibd->foto_fisik;
				//$row[] = $kibd->kontrak;
				$row[] = $kibd->kode_lokasi;

				
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->km->count_all_kibd(),
							"recordsFiltered" => $this->km->count_filtered_kibd(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_detail_arsip_kibd()
		{
			$idaset=$this->input->post('idaset');

			if(isset($idaset) and !empty($idaset)){
                $records = $this->km->get_id_kibd($idaset);
                $output = '';
                foreach($records->result_array() as $row){
                	$output .= '
						 
						    <div class="row">
						    <div class="col-lg-6">
						    	<table class="table table-bordered">
						    		<tr>
						    			<td><b>Kode Aset</b></td>
						    			<td>'.$row["kode_aset"].'</td>
						    		</tr>
						    		<tr>
						    			<td><b>Register</b></td>
						    			<td>'.$row["register"].'</td>						    		
						    		</tr>						    		
						    		<tr>
						    			<td><b>Nama Aset</b></td>
						    			<td>'.$row["nama_aset"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Konstruksi</b></td>
						    			<td>'.$row["konstruksi"].'</td>						    		
						    		</tr>
						    		<tr>
						    			<td><b>Panjang</b></td>
						    			<td>'.$row['panjang'].'</td>						    		
						    		</tr>						    			
						    		<tr>
						    			<td><b>Lebar</b></td>
						    			<td>'.$row['lebar'].'</td>						    		
						    		</tr>					    								    		
						    		<tr>
						    			<td><b>Luas</b></td>
						    			<td>'.$row["luas"].'</td>						    		
						    		</tr>
						    		<tr>
						    			<td><b>Alamat</b></td>
						    			<td>'.$row["alamat"].'</td>
						    		</tr>	
						    		<tr>
						    			<td><b>Tahun Pengadaaan</b></td>
						    			<td>'.$row["tahun_pengadaan"].'</td>
						    		</tr>							    								    		
						    		<tr>
						    			<td><b>Nomor Dokumen</b></td>
						    			<td>'.$row["nomor_dokumen"].'</td>						    		
						    		</tr>					    								    		
								</table>
							</div>
							<div class="col-lg-6">
								<table class="table table-bordered">
						    		<tr>
						    			<td><b>Tanggal Dokumen</b></td>
						    			<td>'.$row["tanggal_dokumen"].'</td>
						    		</tr>							    								    	
						    		<tr>
						    			<td><b>Status Tanah</b></td>
						    			<td>'.$row["status_tanah"].'</td>						    		
						    		</tr>						    								    															    		
						    		<tr>
						    			<td><b>Nomor Kode Tanah</b></td>
						    			<td>'.$row["nomor_kode_tanah"].'</td>						    		
						    		</tr>		
						    		<tr>
						    			<td><b>Asal Usul</b></td>
						    			<td>'.$row["asal_usul"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Harga</b></td>
						    			<td>Rp.'.$row["harga"].'</td>
						    		</tr>		
						    		<tr>
						    			<td><b>Kondisi</b></td>
						    			<td>'.$row["kondisi"].'</td>
						    		</tr>	
						    		<tr>
						    			<td><b>Keterangan</b></td>
						    			<td>'.$row["keterangan"].'</td>
						    		</tr>							    							    			
						    		<tr>
											<td><b>Foto Fisik</b></td>
						    			<td><a class="btn btn-sm btn-primary" href="get_imaged/'.encrypt_url($row["id_aset"]).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
						    		</tr>
						    		<tr>
						    			<td><b>Kontrak</b></td>
						    			<td><a class="btn btn-sm btn-primary" href="get_kontrakd/'.encrypt_url($row["id_aset"]).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
						    		</tr>		
						    		<tr>
						    			<td><b>Kode Lokasi</b></td>
						    			<td>'.$row["kode_lokasi"].'</td>
						    		</tr>					    								    						    		
								</table>							
							</div>
							</div>';

                }				
                echo $output;
            }
            else {
            	echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Aset'.'</li></ul></center>';
            }
		}

		function get_imaged()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->km->download_foto_kibd(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['foto'];
			$path='./assets/berkas/KIB D/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function get_kontrakd()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->km->download_kontrak_kibd(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB D/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function view_download_kibd()
		{
			$data['download']=$this->km->get_list_downloadd();

			$this->load->view('kabid/header');
			$this->load->view('kabid/arsip/excel_kibd',$data);
			$this->load->view('kabid/footer');
		}




	function arsip_kibe()
	{
		$data['skpd']=$this->km->get_list_skpd();			
		$data['all_tahun']=$this->km->get_list_tahun_kibe();

		$this->load->view('Kabid/header');
		$this->load->view('Kabid/arsip/arsip_kibe',$data);
		$this->load->view('Kabid/footer');
	}

		function view_arsip_kibe()
		{
			$list = $this->km->get_datatables_kibe();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibe) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kibe->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>';
				$row[] = $kibe->nama_aset;
				$row[] = $kibe->kode_aset;
				//$row[] = $kibe->register;
				$row[] = $kibe->judul_buku;
				$row[] = $kibe->spesifikasi_buku;
				
				$row[] = $kibe->tahun_pengadaan;
				//$row[] = $kibe->nomor_dokumen;
				//$row[] = $kibe->tanggal_dokumen;
				$row[] = $kibe->asal_usul;
				$row[] = $kibe->harga;

				//$row[] = $kibe->kondisi;			
				//$row[] = $kibe->keterangan;
				//$row[] = $kibe->foto_fisik;
				//$row[] = $kibe->kontrak;
				$row[] = $kibe->kode_lokasi;

				
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->km->count_all_kibe(),
							"recordsFiltered" => $this->km->count_filtered_kibe(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_detail_arsip_kibe()
		{
			$idaset=$this->input->post('idaset');

			if(isset($idaset) and !empty($idaset)){
                $records = $this->km->get_id_kibe($idaset);
                $output = '';
                foreach($records->result_array() as $row){
                	$output .= '
						 
						    <div class="row">
						    <div class="col-lg-6">
						    	<table class="table table-bordered">
						    		<tr>
						    			<td><b>Kode Aset</b></td>
						    			<td>'.$row["kode_aset"].'</td>
						    		</tr>
						    		<tr>
						    			<td><b>Register</b></td>
						    			<td>'.$row["register"].'</td>						    		
						    		</tr>						    		
						    		<tr>
						    			<td><b>Nama Aset</b></td>
						    			<td>'.$row["nama_aset"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Judul Buku</b></td>
						    			<td>'.$row["judul_buku"].'</td>						    		
						    		</tr>
						    		<tr>
						    			<td><b>Spesifikasi Buku</b></td>
						    			<td>'.$row['spesifikasi_buku'].'</td>						    		
						    		</tr>		
						    		<tr>
						    			<td><b>Tahun Pengadaaan</b></td>
						    			<td>'.$row["tahun_pengadaan"].'</td>
						    		</tr>					    			
						    		<tr>
						    			<td><b>Nomor Dokumen</b></td>
						    			<td>'.$row['nomor_dokumen'].'</td>						    		
						    		</tr>					    								    		
						    		<tr>
						    			<td><b>Tanggal Dokumen</b></td>
						    			<td>'.$row["tanggal_dokumen"].'</td>						    		
						    		</tr>				    								    		
								</table>
							</div>
							<div class="col-lg-6">
								<table class="table table-bordered">	
						    		<tr>
						    			<td><b>Asal Usul</b></td>
						    			<td>'.$row["asal_usul"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Harga</b></td>
						    			<td>Rp.'.$row["harga"].'</td>
						    		</tr>		
						    		<tr>
						    			<td><b>Kondisi</b></td>
						    			<td>'.$row["kondisi"].'</td>
						    		</tr>	
						    		<tr>
						    			<td><b>Keterangan</b></td>
						    			<td>'.$row["keterangan"].'</td>
						    		</tr>							    							    			
						    		<tr>
											<td><b>Foto Fisik</b></td>
						    			<td><a class="btn btn-sm btn-primary" href="get_imagee/'.encrypt_url($row["id_aset"]).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
						    		</tr>
						    		<tr>
						    			<td><b>Kontrak</b></td>
						    			<td><a class="btn btn-sm btn-primary" href="get_kontrake/'.encrypt_url($row["id_aset"]).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
						    		</tr>		
						    		<tr>
						    			<td><b>Kode Lokasi</b></td>
						    			<td>'.$row["kode_lokasi"].'</td>
						    		</tr>					    								    						    		
								</table>							
							</div>
							</div>';

                }				
                echo $output;
            }
            else {
            	echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Aset'.'</li></ul></center>';
            }
		}

		function get_imagee()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->km->download_foto_kibe(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['foto'];
			$path='./assets/berkas/KIB E/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function get_kontrake()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->km->download_kontrak_kibe(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB E/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function view_download_kibe()
		{
			$data['download']=$this->km->get_list_downloadf();

			$this->load->view('kabid/header');
			$this->load->view('kabid/arsip/excel_kibe',$data);
			$this->load->view('kabid/footer');
		}




	function arsip_kibf()
	{
		$data['skpd']=$this->km->get_list_skpd();			
		$data['all_tahun']=$this->km->get_list_tahun_kibf();

		$this->load->view('Kabid/header');
		$this->load->view('Kabid/arsip/arsip_kibf',$data);
		$this->load->view('Kabid/footer');
	}

		function view_arsip_kibf()
		{
			$list = $this->km->get_datatables_kibf();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibf) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kibf->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>';
				$row[] = $kibf->nama_aset;
				$row[] = $kibf->kode_aset;
				$row[] = $kibf->bangunan;
				//$row[] = $kibf->bertingkat_tidak;
				//$row[] = $kibf->beton_tidak;
				
				$row[] = $kibf->luas;
				$row[] = $kibf->alamat;
				//$row[] = $kibf->tanggal_dokumen;
				//$row[] = $kibf->nomor_dokumen;
				$row[] = $kibf->tahun_bulan_mulai;

				//$row[] = $kibf->nomor_kode_tanah;
				$row[] = $kibf->nilai_kontrak;
				$row[] = $kibf->asal_usul_pembiayaan;
				//$row[] = $kibf->status_tanah;			
				//$row[] = $kibf->keterangan;

				//$row[] = $kibf->foto_fisik;
				//$row[] = $kibf->kontrak;
				$row[] = $kibf->kode_lokasi;

				
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->km->count_all_kibf(),
							"recordsFiltered" => $this->km->count_filtered_kibf(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_detail_arsip_kibf()
		{
			$idaset=$this->input->post('idaset');

			if(isset($idaset) and !empty($idaset)){
                $records = $this->km->get_id_kibf($idaset);
                $output = '';
                foreach($records->result_array() as $row){
                	$output .= '
						 
						    <div class="row">
						    <div class="col-lg-6">
						    	<table class="table table-bordered">
						    		<tr>
						    			<td><b>Kode Aset</b></td>
						    			<td>'.$row["kode_aset"].'</td>
						    		</tr>					    		
						    		<tr>
						    			<td><b>Nama Aset</b></td>
						    			<td>'.$row["nama_aset"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Bangunan</b></td>
						    			<td>'.$row["bangunan"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Bertingkat/Tidak</b></td>
						    			<td>'.$row["bertingkat_tidak"].'</td>						    		
						    		</tr>
						    		<tr>
						    			<td><b>Beton/Tidak</b></td>
						    			<td>'.$row['beton_tidak'].'</td>						    		
						    		</tr>		
						    		<tr>
						    			<td><b>Luas</b></td>
						    			<td>'.$row["luas"].'</td>
						    		</tr>					    			
						    		<tr>
						    			<td><b>Alamat</b></td>
						    			<td>'.$row['alamat'].'</td>						    		
						    		</tr>					    								    		
						    		<tr>
						    			<td><b>Tanggal Dokumen</b></td>
						    			<td>'.$row["tanggal_dokumen"].'</td>						    		
						    		</tr>				    			
						    		<tr>
						    			<td><b>Nomor Dokumen</b></td>
						    			<td>'.$row['nomor_dokumen'].'</td>						    		
						    		</tr>					    								    		
						    		<tr>
						    			<td><b>Tahun Bulan Mulai</b></td>
						    			<td>'.$row["tahun_bulan_mulai"].'</td>						    		
						    		</tr>				    								    		
								</table>
							</div>
							<div class="col-lg-6">
								<table class="table table-bordered">	
						    		<tr>
						    			<td><b>Nomor Kode Tanah</b></td>
						    			<td>'.$row["nomor_kode_tanah"].'</td>						    		
						    		</tr>	
						    		<tr>
						    			<td><b>Nilai Kontrak</b></td>
						    			<td>Rp.'.$row["nilai_kontrak"].'</td>
						    		</tr>		
						    		<tr>
						    			<td><b>Asal Usul Pembiayaan</b></td>
						    			<td>'.$row["asal_usul_pembiayaan"].'</td>
						    		</tr>			
						    		<tr>
						    			<td><b>Status Tanah</b></td>
						    			<td>'.$row["status_tanah"].'</td>
						    		</tr>	
						    		<tr>
						    			<td><b>Keterangan</b></td>
						    			<td>'.$row["keterangan"].'</td>
						    		</tr>							    							    			
						    		<tr>
											<td><b>Foto Fisik</b></td>
						    			<td><a class="btn btn-sm btn-primary" href="get_imagef/'.encrypt_url($row["id_aset"]).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
						    		</tr>
						    		<tr>
						    			<td><b>Kontrak</b></td>
						    			<td><a class="btn btn-sm btn-primary" href="get_kontrakf/'.encrypt_url($row["id_aset"]).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a></td>
						    		</tr>		
						    		<tr>
						    			<td><b>Kode Lokasi</b></td>
						    			<td>'.$row["kode_lokasi"].'</td>
						    		</tr>					    								    						    		
								</table>							
							</div>
							</div>';

                }				
                echo $output;
            }
            else {
            	echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Aset'.'</li></ul></center>';
            }
		}

		function get_imagef()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->km->download_foto_kibf(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['foto'];
			$path='./assets/berkas/KIB F/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function get_kontrakf()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->km->download_kontrak_kibf(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB F/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function view_download_kibf()
		{
			$data['download']=$this->km->get_list_downloadf();

			$this->load->view('kabid/header');
			$this->load->view('kabid/arsip/excel_kibf',$data);
			$this->load->view('kabid/footer');
		}





	function export_kiba()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('BPKAD')
					 ->setLastModifiedBy('BPKAD')
					 ->setTitle("Pembukuan Aset KIB A")
					 ->setSubject("")
					 ->setDescription("")
					 ->setKeywords("");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "PEMBUKUAN ASET KIB A - TANAH"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:N1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Aset");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Kode Aset");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Register"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Luas"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Tahun Pengadaan");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Alamat");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Status Tanah");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Tanggal Sertifikat"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "Nomor Sertifikat"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Asal usul");
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Harga"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Keterangan");
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "SKPD"); 
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		
		
		$kodelokasi=$this->uri->segment(3);
		$list = $this->km->download_kiba($kodelokasi);
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($list as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_aset);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->kode_aset );
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->register);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->luas);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tahun_pengadaan);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->status_tanah );
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->tanggal_sertifikat);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->nomor_sertifikat);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->asal_usul);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->harga);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->keterangan );
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->nama_skpd );
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); 
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(25); 
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(25); 
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(45); 
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Kib A");
		$excel->setActiveSheetIndex(0);

		date_default_timezone_set('Asia/Jakarta');
		$filename="Pembukuan Aset KIB A ".date("d-m-Y H:i:s").".xlsx";

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$filename.'"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	function export_kibb()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('BPKAD')
					 ->setLastModifiedBy('BPKAD')
					 ->setTitle("Pembukuan Aset KIB B")
					 ->setSubject("")
					 ->setDescription("")
					 ->setKeywords("");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "PEMBUKUAN ASET KIB B - PERALATAN DAN MESIN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:Q1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Kode Aset"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Register"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Nama Aset"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Merk"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Ukuran"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Bahan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Tahun Pengadaan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Nomor"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I4', "Pabrik"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J4', "Rangka"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K4', "Mesin"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L4', "Polisi"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M4', "BPKB"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "Asal Usul Perolehan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('O3', "Harga"); 
		$excel->setActiveSheetIndex(0)->setCellValue('P3', "Keterangan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('Q3', "SKPD"); 
		$excel->getActiveSheet()->mergeCells('A3:A4');
		$excel->getActiveSheet()->mergeCells('B3:B4');
		$excel->getActiveSheet()->mergeCells('C3:C4');
		$excel->getActiveSheet()->mergeCells('D3:D4');
		$excel->getActiveSheet()->mergeCells('E3:E4');
		$excel->getActiveSheet()->mergeCells('F3:F4');
		$excel->getActiveSheet()->mergeCells('G3:G4');
		$excel->getActiveSheet()->mergeCells('H3:H4');
		$excel->getActiveSheet()->mergeCells('I3:M3');
		$excel->getActiveSheet()->mergeCells('N3:N4');
		$excel->getActiveSheet()->mergeCells('O3:O4');
		$excel->getActiveSheet()->mergeCells('P3:P4');
		$excel->getActiveSheet()->mergeCells('Q3:Q4');
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3:M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$kodelokasi=$this->uri->segment(3);
		$list = $this->km->download_kibb($kodelokasi);
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrowDB = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($list as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrowDB, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrowDB, $data->kode_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrowDB, $data->register);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrowDB, $data->nama_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrowDB, $data->merk);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrowDB, $data->ukuran);
		  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrowDB, $data->bahan);
		  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrowDB, $data->tahun_pengadaan);
		  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrowDB, $data->pabrik);
		  $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrowDB, $data->no_rangka);
		  $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrowDB, $data->no_mesin);
		  $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrowDB, $data->no_polisi);
		  $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrowDB, $data->bpkb);
		  $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrowDB, $data->asal_usul);
		  $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrowDB, $data->harga);
		  $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrowDB, $data->keterangan);
		  $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrowDB, $data->nama_skpd);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);	
		  
		  $no++; 
		  $numrow++; 
		  $numrowDB++; 
		}

		$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('N4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('O4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('P4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('Q4')->applyFromArray($style_row);

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(25); 
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(25); 
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(45); 
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("KIB B");
		$excel->setActiveSheetIndex(0);

		date_default_timezone_set('Asia/Jakarta');
		$filename="Pembukuan Aset KIB B ".date("d-m-Y H:i:s").".xlsx";

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$filename.'"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	function export_kibc()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('BPKAD')
					 ->setLastModifiedBy('BPKAD')
					 ->setTitle("Pembukuan Aset KIB C")
					 ->setSubject("")
					 ->setDescription("")
					 ->setKeywords("");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "PEMBUKUAN ASET KIB C - BANGUNAN DAN GEDUNG"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:R1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Aset"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nomor"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C4', "Kode Aset"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D4', "Register"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Kondisi"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Konstruksi Bangunan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F4', "Bertingkat/Tidak"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G4', "Beton/Tidak"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Luas Lantai"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Letak/Lokasi Alamat"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "Dokumen Gedung"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J4', "Tanggal"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K4', "Nomor"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Luas Tanah"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Status Tanah"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "Nomor Kode Tanah"); 
		$excel->setActiveSheetIndex(0)->setCellValue('O3', "Asal Usul"); 
		$excel->setActiveSheetIndex(0)->setCellValue('P3', "Harga"); 
		$excel->setActiveSheetIndex(0)->setCellValue('Q3', "Keterangan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('R3', "SKPD"); 
		$excel->getActiveSheet()->mergeCells('A3:A4');
		$excel->getActiveSheet()->mergeCells('B3:B4');
		$excel->getActiveSheet()->mergeCells('C3:D3');
		$excel->getActiveSheet()->mergeCells('E3:E4');
		$excel->getActiveSheet()->mergeCells('F3:G3');
		$excel->getActiveSheet()->mergeCells('H3:H4');
		$excel->getActiveSheet()->mergeCells('I3:I4');
		$excel->getActiveSheet()->mergeCells('J3:K3');
		$excel->getActiveSheet()->mergeCells('L3:L4');
		$excel->getActiveSheet()->mergeCells('M3:M4');
		$excel->getActiveSheet()->mergeCells('N3:N4');
		$excel->getActiveSheet()->mergeCells('O3:O4');
		$excel->getActiveSheet()->mergeCells('P3:P4');
		$excel->getActiveSheet()->mergeCells('Q3:Q4');
		$excel->getActiveSheet()->mergeCells('R3:R4');
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3:D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3:G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3:K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$kodelokasi=$this->uri->segment(3);
		$list = $this->km->download_kibc($kodelokasi);
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrowDB = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($list as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrowDB, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrowDB, $data->nama_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrowDB, $data->kode_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrowDB, $data->register);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrowDB, $data->kondisi);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrowDB, $data->bertingkat);
		  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrowDB, $data->beton_tidak);
		  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrowDB, $data->luas_lantai);
		  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrowDB, $data->alamat);
		  $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrowDB, $data->tanggal_dokumen);
		  $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrowDB, $data->nomor_dokumen_gedung);
		  $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrowDB, $data->luas_tanah);
		  $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrowDB, $data->status_tanah);
		  $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrowDB, $data->nomor_kode_tanah);
		  $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrowDB, $data->asal_usul);
		  $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrowDB, $data->harga);
		  $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrowDB, $data->keterangan);
		  $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrowDB, $data->nama_skpd);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
		  
		  $no++; 
		  $numrow++; 
		  $numrowDB++; 
		}

		$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('N4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('O4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('P4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('Q4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('R4')->applyFromArray($style_row);

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(40); 
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(18); 
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(18); 
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(13); 
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(45); 
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("KIB C");
		$excel->setActiveSheetIndex(0);

		date_default_timezone_set('Asia/Jakarta');
		$filename="Pembukuan Aset KIB C ".date("d-m-Y H:i:s").".xlsx";

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$filename.'"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	function export_kibd()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('BPKAD')
					 ->setLastModifiedBy('BPKAD')
					 ->setTitle("Pembukuan Aset KIB D")
					 ->setSubject("")
					 ->setDescription("")
					 ->setKeywords("");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "PEMBUKUAN ASET KIB D - JALAN, IRIGASI DAN JARINGAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:R1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Aset"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nomor"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C4', "Kode Aset"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D4', "Register"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Konstruksi"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Panjang (km)"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Lebar (m)"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Luas (m2)"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Letak/Lokasi"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "Dokumen"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J4', "Tanggal"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K4', "Nomor"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Status Tanah"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Nomor Kode Tanah"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "Asal Usul"); 
		$excel->setActiveSheetIndex(0)->setCellValue('O3', "Harga"); 
		$excel->setActiveSheetIndex(0)->setCellValue('P3', "Kondisi"); 
		$excel->setActiveSheetIndex(0)->setCellValue('Q3', "Keterangan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('R3', "SKPD"); 
		$excel->getActiveSheet()->mergeCells('A3:A4');
		$excel->getActiveSheet()->mergeCells('B3:B4');
		$excel->getActiveSheet()->mergeCells('C3:D3');
		$excel->getActiveSheet()->mergeCells('E3:E4');
		$excel->getActiveSheet()->mergeCells('F3:F4');
		$excel->getActiveSheet()->mergeCells('G3:G4');
		$excel->getActiveSheet()->mergeCells('H3:H4');
		$excel->getActiveSheet()->mergeCells('I3:I4');
		$excel->getActiveSheet()->mergeCells('J3:K3');
		$excel->getActiveSheet()->mergeCells('L3:L4');
		$excel->getActiveSheet()->mergeCells('M3:M4');
		$excel->getActiveSheet()->mergeCells('N3:N4');
		$excel->getActiveSheet()->mergeCells('O3:O4');
		$excel->getActiveSheet()->mergeCells('P3:P4');
		$excel->getActiveSheet()->mergeCells('Q3:Q4');
		$excel->getActiveSheet()->mergeCells('R3:R4');
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3:D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3:K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$kodelokasi=$this->uri->segment(3);
		$list = $this->km->download_kibd($kodelokasi);
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrowDB = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($list as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrowDB, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrowDB, $data->nama_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrowDB, $data->kode_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrowDB, $data->register);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrowDB, $data->konstruksi);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrowDB, $data->panjang);
		  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrowDB, $data->lebar);
		  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrowDB, $data->luas);
		  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrowDB, $data->alamat);
		  $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrowDB, $data->tanggal_dokumen);
		  $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrowDB, $data->nomor_dokumen);
		  $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrowDB, $data->status_tanah);
		  $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrowDB, $data->nomor_kode_tanah);
		  $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrowDB, $data->asal_usul);
		  $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrowDB, $data->harga);
		  $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrowDB, $data->kondisi);
		  $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrowDB, $data->keterangan);
		  $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrowDB, $data->nama_skpd);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
		  
		  $no++; 
		  $numrow++; 
		  $numrowDB++; 
		}

		$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('N4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('O4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('P4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('Q4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('R4')->applyFromArray($style_row);

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(40); 
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(18); 
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(18); 
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(13); 
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(18); 
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(45); 
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("KIB D");
		$excel->setActiveSheetIndex(0);

		date_default_timezone_set('Asia/Jakarta');
		$filename="Pembukuan Aset KIB D ".date("d-m-Y H:i:s").".xlsx";

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$filename.'"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	function export_kibe()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('BPKAD')
					 ->setLastModifiedBy('BPKAD')
					 ->setTitle("Pembukuan Aset KIB E")
					 ->setSubject("")
					 ->setDescription("")
					 ->setKeywords("");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "PEMBUKUAN ASET KIB E - ASET TETAP LAINNYA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:M1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Aset"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nomor"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C4', "Kode Aset"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D4', "Register"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Buku/Perpustakaan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E4', "Judul"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F4', "Spesifikasi"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Dokumen"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G4', "Tanggal"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H4', "Nomor"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Tahun Cetak/Pembelian/Pengadaan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "Asal Usul"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Harga"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Keterangan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "SKPD"); 
		$excel->getActiveSheet()->mergeCells('A3:A4');
		$excel->getActiveSheet()->mergeCells('B3:B4');
		$excel->getActiveSheet()->mergeCells('C3:D3');
		$excel->getActiveSheet()->mergeCells('E3:F3');
		$excel->getActiveSheet()->mergeCells('G3:H3');
		$excel->getActiveSheet()->mergeCells('I3:I4');
		$excel->getActiveSheet()->mergeCells('J3:J4');
		$excel->getActiveSheet()->mergeCells('K3:K4');
		$excel->getActiveSheet()->mergeCells('L3:L4');
		$excel->getActiveSheet()->mergeCells('M3:M4');
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3:D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3:F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3:H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$kodelokasi=$this->uri->segment(3);
		$list = $this->km->download_kibe($kodelokasi);
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrowDB = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($list as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrowDB, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrowDB, $data->nama_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrowDB, $data->kode_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrowDB, $data->register);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrowDB, $data->judul_buku);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrowDB, $data->spesifikasi_buku);
		  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrowDB, $data->tanggal_dokumen);
		  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrowDB, $data->nomor_dokumen);
		  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrowDB, $data->tahun_pengadaan);
		  $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrowDB, $data->asal_usul);
		  $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrowDB, $data->harga);
		  $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrowDB, $data->keterangan);
		  $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrowDB, $data->nama_skpd);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
		  
		  $no++; 
		  $numrow++; 
		  $numrowDB++; 
		}

		$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M4')->applyFromArray($style_row);

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(40); 
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(18); 
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(18); 
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(13); 
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(18); 
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(45); 
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("KIB E");
		$excel->setActiveSheetIndex(0);

		date_default_timezone_set('Asia/Jakarta');
		$filename="Pembukuan Aset KIB E ".date("d-m-Y H:i:s").".xlsx";

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$filename.'"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	function export_kibf()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('BPKAD')
					 ->setLastModifiedBy('BPKAD')
					 ->setTitle("Pembukuan Aset KIB F")
					 ->setSubject("")
					 ->setDescription("")
					 ->setKeywords("");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "PEMBUKUAN ASET KIB F - KONSTRUKSI DALAM PENGERJAAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:Q1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Aset"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Kode Aset"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D4', "Bangunan (P,SP,D)"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Konstruksi Bangunan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E4', "Bertingkat/Tidak"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F4', "Beton/Tidak"); 
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Luas (M²)"); 
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Letak/Lokasi Alamat"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Dokumen Gedung"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I4', "Tanggal"); 
		$excel->setActiveSheetIndex(0)->setCellValue('J4', "Nomor"); 
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Tgl, Bln, Thn Mulai"); 
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Status Tanah"); 
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Nomor Kode Tanah"); 
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "Asal Usul Pembiayaan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('O3', "Nilai Kontrak (ribuan Rp)"); 
		$excel->setActiveSheetIndex(0)->setCellValue('P3', "Keterangan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('Q3', "SKPD"); 
		$excel->getActiveSheet()->mergeCells('A3:A4');
		$excel->getActiveSheet()->mergeCells('B3:B4');
		$excel->getActiveSheet()->mergeCells('C3:C4');
		$excel->getActiveSheet()->mergeCells('D3:D4');
		$excel->getActiveSheet()->mergeCells('E3:F3');
		$excel->getActiveSheet()->mergeCells('G3:G4');
		$excel->getActiveSheet()->mergeCells('H3:H4');
		$excel->getActiveSheet()->mergeCells('I3:J3');
		$excel->getActiveSheet()->mergeCells('K3:K4');
		$excel->getActiveSheet()->mergeCells('L3:L4');
		$excel->getActiveSheet()->mergeCells('M3:M4');
		$excel->getActiveSheet()->mergeCells('N3:N4');
		$excel->getActiveSheet()->mergeCells('O3:O4');
		$excel->getActiveSheet()->mergeCells('P3:P4');
		$excel->getActiveSheet()->mergeCells('Q3:Q4');
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3:F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3:J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$kodelokasi=$this->uri->segment(3);
		$list = $this->km->download_kibf($kodelokasi);
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrowDB = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($list as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrowDB, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrowDB, $data->nama_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrowDB, $data->kode_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrowDB, $data->bangunan);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrowDB, $data->bertingkat);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrowDB, $data->beton_tidak);
		  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrowDB, $data->luas);
		  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrowDB, $data->alamat);
		  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrowDB, $data->tanggal_dokumen);
		  $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrowDB, $data->nomor_dokumen_gedung);
		  $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrowDB, $data->tahun_bulan_mulai);
		  $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrowDB, $data->status_tanah);
		  $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrowDB, $data->nomor_kode_tanah);
		  $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrowDB, $data->asal_usul_pembiayaan);
		  $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrowDB, $data->nilai_kontrak);
		  $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrowDB, $data->keterangan);
		  $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrowDB, $data->nama_skpd);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
		  
		  $no++; 
		  $numrow++; 
		  $numrowDB++; 
		}

		$excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('N4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('O4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('P4')->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('Q4')->applyFromArray($style_row);

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(40); 
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(18); 
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(18); 
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(13); 
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(45); 
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("KIB F");
		$excel->setActiveSheetIndex(0);

		date_default_timezone_set('Asia/Jakarta');
		$filename="Pembukuan Aset KIB F ".date("d-m-Y H:i:s").".xlsx";

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$filename.'"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

}//end controller
?>
