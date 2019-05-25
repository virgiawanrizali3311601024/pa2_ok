<?php
class Staff_bpkad extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('Staff_bpkad_model','sb');
		$this->load->model('admin_model');

		if($this->session->userdata('tipe_user')!="staff bpkad"){
			redirect('login/index');
		}
  }

	function index()
	{
		$data_nama['nama'] = $this->session->userdata('nama');
		$data_nama['nip'] = $this->session->userdata('nip');
		$data_nama['kodelokasi'] = $this->session->userdata('kode_lokasi');
		$this->load->view('Staff_bpkad/header',$data_nama);
		$this->load->view('Staff_bpkad/dashboard');
		$this->load->view('Staff_bpkad/footer');
	}

	function detail_s_kiba($idaset)
		{
			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_detail_kiba($idaset);
			//$data['aset']=$this->pb->get_list_p_aseta();
			//echo json_encode($data->row());
			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/detail_kib_a_s', $data);
			$this->load->view('Staff_bpkad/footer');
			
			

			//$data['output'] = $this->person->get_by_id_view($id);
            //$this->load->view('view_Detail', $data);
		}
	function detail_s_kibb($idaset)
		{
			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_detail_kibb($idaset);
			//$data['aset']=$this->pb->get_list_p_aseta();
			//echo json_encode($data->row());

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/detail_kib_b_s', $data);
			$this->load->view('Staff_bpkad/footer');

			//$data['output'] = $this->person->get_by_id_view($id);
            //$this->load->view('view_Detail', $data);
		}
	function detail_s_kibc($idaset)
		{
			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_detail_kibc($idaset);
			//$data['aset']=$this->pb->get_list_p_aseta();
			//echo json_encode($data->row());

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/detail_kib_c_s', $data);
			$this->load->view('Staff_bpkad/footer');

			//$data['output'] = $this->person->get_by_id_view($id);
            //$this->load->view('view_Detail', $data);
		}
	function detail_s_kibd($idaset)
		{
			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_detail_kibd($idaset);
			//$data['aset']=$this->pb->get_list_p_aseta();
			//echo json_encode($data->row());

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/detail_kib_d_s', $data);
			$this->load->view('Staff_bpkad/footer');

			//$data['output'] = $this->person->get_by_id_view($id);
            //$this->load->view('view_Detail', $data);
		}
	
	function detail_s_kibe($idaset)
		{
			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_detail_kibe($idaset);
			//$data['aset']=$this->pb->get_list_p_aseta();
			//echo json_encode($data->row());

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/detail_kib_e_s', $data);
			$this->load->view('Staff_bpkad/footer');

			//$data['output'] = $this->person->get_by_id_view($id);
            //$this->load->view('view_Detail', $data);
		}
		function detail_s_kibf($idaset)
		{
			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_detail_kibf($idaset);
			//$data['aset']=$this->pb->get_list_p_aseta();
			//echo json_encode($data->row());

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/detail_kib_f_s', $data);
			$this->load->view('Staff_bpkad/footer');

			//$data['output'] = $this->person->get_by_id_view($id);
            //$this->load->view('view_Detail', $data);
		}


////////////////////////////////////////////////////////////////////////// download
	function get_p_imagea($id_aset)
	{
			$id_aset=$this->uri->segment(3);
			$get_db=$this->sb->download_foto_p_kiba($id_aset);
			$this->load->helper('download');
			$q=$get_db->row_array();
			$file=$q['foto'];
			$path='./assets/berkas/KIB A/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
	}

	function get_p_kontraka($id_aset)
		{
			$id_aset=$this->uri->segment(3);
			$get_db=$this->sb->download_kontrak_p_kiba($id_aset);
			$this->load->helper('download');
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB A/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}
	function get_p_imageb($id_aset)
		{
			$id_aset=$this->uri->segment(3);
			$get_db=$this->sb->download_foto_p_kibb($id_aset);
			$this->load->helper('download');
			$q=$get_db->row_array();
			$file=$q['foto'];
			$path='./assets/berkas/KIB B/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

	function get_p_kontrakb($id_aset)
		{
			$id_aset=$this->uri->segment(3);
			$get_db=$this->sb->download_kontrak_p_kibb($id_aset);
			$this->load->helper('download');
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB B/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

	function get_p_imagec($id_aset)
		{
			$id_aset=$this->uri->segment(3);
			$get_db=$this->sb->download_foto_p_kibc($id_aset);
			$this->load->helper('download');
			$q=$get_db->row_array();
			$file=$q['foto'];
			$path='./assets/berkas/KIB C/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

	function get_p_kontrakc($id_aset)
		{
			$id_aset=$this->uri->segment(3);
			$get_db=$this->sb->download_kontrak_p_kibc($id_aset);
			$this->load->helper('download');
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB C/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}
	function get_p_imaged($id_aset)
		{
			$id_aset=$this->uri->segment(3);
			$get_db=$this->sb->download_foto_p_kibd($id_aset);
			$this->load->helper('download');
			$q=$get_db->row_array();
			$file=$q['foto'];
			$path='./assets/berkas/KIB D/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

	function get_p_kontrakd($id_aset)
		{
			$id_aset=$this->uri->segment(3);
			$get_db=$this->sb->download_kontrak_p_kibd($id_aset);
			$this->load->helper('download');
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB D/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}
	function get_p_imagee($id_aset)
		{
			$id_aset=$this->uri->segment(3);
			$get_db=$this->sb->download_foto_p_kibe($id_aset);
			$this->load->helper('download');
			$q=$get_db->row_array();
			$file=$q['foto'];
			$path='./assets/berkas/KIB E/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

	function get_p_kontrake($id_aset)
		{
			$id_aset=$this->uri->segment(3);
			$get_db=$this->sb->download_kontrak_p_kibe($id_aset);
			$this->load->helper('download');
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB E/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}
	function get_p_imagef($id_aset)
		{
			$id_aset=$this->uri->segment(3);
			$get_db=$this->sb->download_foto_p_kibf($id_aset);
			$this->load->helper('download');
			$q=$get_db->row_array();
			$file=$q['foto'];
			$path='./assets/berkas/KIB F/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

	function get_p_kontrakf($id_aset)
		{
			$id_aset=$this->uri->segment(3);
			$get_db=$this->sb->download_kontrak_p_kibf($id_aset);
			$this->load->helper('download');
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB F/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}
///////////////////////////////////////////////// Tambah data

    function masukan_kiba()
		{
			$data['arsip']=$this->sb->get_masukan_kiba();
			$data['skpd']=$this->sb->get_list_skpd();
			$data['aset']=$this->sb->get_list_aseta();
			$data['all_tahun']=$this->sb->get_list_tahun_kiba();

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/masukan_kib_a',$data);
			$this->load->view('Staff_bpkad/footer');
		}
	function masukan_kibb()
		{
			$data['arsip']=$this->sb->get_masukan_kibb();
			$data['skpd']=$this->sb->get_list_skpd();
			$data['aset']=$this->sb->get_list_asetb();
			$data['all_tahun']=$this->sb->get_list_tahun_kibb();

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/masukan_kib_b',$data);
			$this->load->view('Staff_bpkad/footer');
		}
	function masukan_kibc()
		{
			$data['arsip']=$this->sb->get_masukan_kibc();
			$data['skpd']=$this->sb->get_list_skpd();
			$data['aset']=$this->sb->get_list_asetc();
			$data['all_tahun']=$this->sb->get_list_tahun_kibc();

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/masukan_kib_c',$data);
			$this->load->view('Staff_bpkad/footer');

		}

	function masukan_kibd()
		{
			$data['arsip']=$this->sb->get_masukan_kibd();
			$data['skpd']=$this->sb->get_list_skpd();
			$data['aset']=$this->sb->get_list_asetd();
			$data['all_tahun']=$this->sb->get_list_tahun_kibd();

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/masukan_kib_d',$data);
			$this->load->view('Staff_bpkad/footer');
		}

	function masukan_kibe()
		{
			$data['arsip']=$this->sb->get_masukan_kibe();
			$data['skpd']=$this->sb->get_list_skpd();
			$data['aset']=$this->sb->get_list_asete();
			$data['all_tahun']=$this->sb->get_list_tahun_kibe();

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/masukan_kib_e',$data);
			$this->load->view('Staff_bpkad/footer');
		}

	function masukan_kibf()
		{
			$data['arsip']=$this->sb->get_masukan_kibf();
			$data['skpd']=$this->sb->get_list_skpd();
			$data['aset']=$this->sb->get_list_asetf();
			$data['all_tahun']=$this->sb->get_list_tahun_kibf();

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/masukan_kib_f',$data);
			$this->load->view('Staff_bpkad/footer');
		}
  
//////////////////////////////////////////////////////// Status 
	function status_masukan_kiba()
		{
			$id_aset = $this->uri->segment(3);

			$this->sb->updatestatus_($id_aset);

			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
				                                    </div>');

			//redirect
			redirect('Staff_bpkad/arsip_kiba');
		}



	function status_masukan_kibb()
		{
			$id_aset = $this->uri->segment(3);
			$data=$this->sb->get_id_detail_o_kibb($id_aset);
			foreach ($data as $dataaset) {
				
					
			 $this->load->library('ciqrcode'); //pemanggilan library QR CODE


				$conffig['cacheable']	= true; //boolean, the default is true
				$config['cachedir']		= './assets/'; //string, the default is application/cache/
				$config['errorlog']		= './assets/'; //string, the default is application/logs/
				$config['imagedir']		= './assets/berkas/qrcode/'; //direktori penyimpanan qr code
				$config['quality']		= true; //boolean, the default is true
				$config['size']			= '1024'; //interger, the default is 1024
				$config['black']		= array(224,255,255); // array, default is array(255,255,255)
				$config['white']		= array(70,130,180); // array, default is array(0,0,0)
				$this->ciqrcode->initialize($config);

				$image_name=$id_aset.'.png'; //buat name dari qr code sesuai dengan nim
				
				$params['data'] = ("     Nama Aset: ".$dataaset['nama_aset']."
					Kode Aset: ".$dataaset['kode_aset']."
					Register: ".$dataaset['register']."
					Merk: ".$dataaset['merk']."
					Ukuran: ".$dataaset['ukuran']."
					Bahan: ".$dataaset['bahan']."
					Tahun Pengadaan: ".$dataaset['tahun_pengadaan']."
					Pabrik: ".$dataaset['pabrik']."
					No. Rangka: ".$dataaset['no_rangka']."
					No. Mesin: ".$dataaset['no_mesin']."
					No. Polisi: ".$dataaset['no_polisi']."
					Bpkb: ".$dataaset['bpkb']."
					Asal Usul: ".$dataaset['asal_usul']."
					Harga: ".$dataaset['harga']."
					kode_lokasi: ".$dataaset['kode_lokasi']
					); //data yang akan di jadikan QR CODE
				//$params['data'] = $nim; 
				$params['level'] = 'H'; //H=High
				$params['size'] = 10;
				$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
				$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE}

			$this->sb->updatestatus_b($id_aset,$image_name);

		}
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
				                                    </div>');

			//redirect
			redirect('Staff_bpkad/arsip_kibb');

		}
	function status_masukan_kibc()
		{
			$id_aset = $this->uri->segment(3);

			$this->sb->updatestatus_c($id_aset);

			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
				                                    </div>');

			//redirect
			redirect('Staff_bpkad/arsip_kibc');
		}
	function status_masukan_kibd()
		{
			$id_aset = $this->uri->segment(3);

			$this->sb->updatestatus_d($id_aset);

			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
						                                    </div>');

					//redirect
			redirect('Staff_bpkad/arsip_kibd');
		}
	function status_masukan_kibe()
		{
			$id_aset = $this->uri->segment(3);

			$this->sb->updatestatus_e($id_aset);

			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
						                                    </div>');

			//redirect
			redirect('Staff_bpkad/arsip_kibe');
	   }
	function status_masukan_kibf()
		{
			$id_aset = $this->uri->segment(3);

			$this->sb->updatestatus_f($id_aset);

			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
						                                    </div>');

					//redirect
			redirect('Staff_bpkad/arsip_kibf');
		}
//////////// delete 
   function hapus_masukan_kiba($id_aset)
		{
			$this->sb->delete_masukan_kiba($id_aset);
			echo json_encode(array("status" => TRUE));
		}
	function hapus_masukan_kibb($id_aset)
		{
			$this->sb->delete_masukan_kibb($id_aset);
			echo json_encode(array("status" => TRUE));
		}
   function hapus_masukan_kibc($id_aset)
		{
			$this->sb->delete_masukan_kibc($id_aset);
			echo json_encode(array("status" => TRUE));
		}
   function hapus_masukan_kibd($id_aset)
		{
			$this->sb->delete_masukan_kibd($id_aset);
			echo json_encode(array("status" => TRUE));
		}
    function hapus_masukan_kibe($id_aset)
		{
			$this->sb->delete_masukan_kibe($id_aset);
			echo json_encode(array("status" => TRUE));
		}

    function hapus_masukan_kibf($id_aset)
		{
			$this->sb->delete_masukan_kibf($id_aset);
		    echo json_encode(array("status" => TRUE));
		}




				
				
////////////////////////////////////////////////////  edit


				
	function view_id_masukan_kiba($idaset)
		{
			$data=$this->sb->get_id_kiba_masukan($idaset);
			echo json_encode($data);
		}
	function view_id_masukan_kibb($idaset)
		{
			$data=$this->sb->get_id_kibb_masukan($idaset);
			echo json_encode($data);
		}
	function view_id_masukan_kibc($idaset)
		{
			$data=$this->sb->get_id_kibc_masukan($idaset);
			echo json_encode($data);
		}
	function view_id_masukan_kibd($idaset)
		{
			$data=$this->sb->get_id_kibd_masukan($idaset);
			echo json_encode($data);
		}
	function view_id_masukan_kibe($idaset)
		{
			$data=$this->sb->get_id_kibe_masukan($idaset);
			echo json_encode($data);
		}
	function view_id_masukan_kibf($idaset)
		{
			$data=$this->sb->get_id_kibf_masukan($idaset);
			echo json_encode($data);
		}

/////////////////////////////// edit fung


    function view_edit_masukan_kiba($idaset)
		{
			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_s_kiba($idaset);
			$data['aset']=$this->sb->get_list_s_aseta();
			

			$this->load->view('Staff_bpkad/header-cadangan');
			$this->load->view('Staff_bpkad/masukan/edit_masukan_kib_a', $data);
			$this->load->view('Staff_bpkad/footer');
		}
	function view_edit_masukan_kibb($idaset)
		{
			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_s_kibb($idaset);
			$data['aset']=$this->sb->get_list_s_asetb();
			

			$this->load->view('Staff_bpkad/header-cadangan');
			$this->load->view('Staff_bpkad/masukan/edit_masukan_kib_b', $data);
			$this->load->view('Staff_bpkad/footer');
		}
	function view_edit_masukan_kibc($idaset)
		{
			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_s_kibc($idaset);
			$data['aset']=$this->sb->get_list_s_asetc();
			

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/edit_masukan_kib_c', $data);
			$this->load->view('Staff_bpkad/footer');
		}
	function view_edit_masukan_kibd($idaset)
		{
			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_s_kibd($idaset);
			$data['aset']=$this->sb->get_list_s_asetd();
			

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/edit_masukan_kib_d', $data);
			$this->load->view('Staff_bpkad/footer');
		}
	function view_edit_masukan_kibe($idaset)
		{
			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_s_kibe($idaset);
			$data['aset']=$this->sb->get_list_s_asete();
			

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/edit_masukan_kib_e', $data);
			$this->load->view('Staff_bpkad/footer');
		}
	function view_edit_masukan_kibf($idaset)
		{
			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_s_kibf($idaset);
			$data['aset']=$this->sb->get_list_s_asetf();
			

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/masukan/edit_masukan_kib_f', $data);
			$this->load->view('Staff_bpkad/footer');
		}
		///////////////////////////////////////

	function get_info_s_aseta()
	   {
			$id = $this->input->get('kata');
			
			$info = $this->db->select("*")
											->from("sub_sub_kelompok")
											->where("kode_aset",$id)
											->get()
											->row();
			echo json_encode($info);
											
	   }
	function list_s_aseta()
		{
			$return_arr = array();
			$row_array = array();
			$text = $this->input->get('text');
			$aset = $this->db->select("*")
												->from("sub_sub_kelompok")
												->like("nama_aset", $text)
												->where("id_golongan", '01.')
												->or_like("kode_aset",$text)
												->where("id_golongan", '01.')
												->get();
			if($aset->num_rows() > 0)
			{
				foreach($aset->result_array() as $row)
				{
					$row_array['id'] = $row['kode_aset'];
					$row_array['text'] = utf8_encode("<strong>[".$row['kode_aset'] ."]</strong> $row[nama_aset]");
					array_push($return_arr,$row_array);
				}
			}
		}

	function get_info_s_asetb()
	   {
			$id = $this->input->get('kata');
			
			$info = $this->db->select("*")
											->from("sub_sub_kelompok")
											->where("kode_aset",$id)
											->get()
											->row();
			echo json_encode($info);
											
	   }
	function list_s_asetb()
		{
			$return_arr = array();
			$row_array = array();
			$text = $this->input->get('text');
			$aset = $this->db->select("*")
												->from("sub_sub_kelompok")
												->like("nama_aset", $text)
												->where("id_golongan", '02.')
												->or_like("kode_aset",$text)
												->where("id_golongan", '02.')
												->get();
			if($aset->num_rows() > 0)
			{
				foreach($aset->result_array() as $row)
				{
					$row_array['id'] = $row['kode_aset'];
					$row_array['text'] = utf8_encode("<strong>[".$row['kode_aset'] ."]</strong> $row[nama_aset]");
					array_push($return_arr,$row_array);
				}
			}
		}
	function get_info_s_asetc()
	   {
			$id = $this->input->get('kata');
			
			$info = $this->db->select("*")
											->from("sub_sub_kelompok")
											->where("kode_aset",$id)
											->get()
											->row();
			echo json_encode($info);
											
	   }
	function list_s_asetc()
		{
			$return_arr = array();
			$row_array = array();
			$text = $this->input->get('text');
			$aset = $this->db->select("*")
												->from("sub_sub_kelompok")
												->like("nama_aset", $text)
												->where("id_golongan", '03.')
												->or_like("kode_aset",$text)
												->where("id_golongan", '03.')
												->get();
			if($aset->num_rows() > 0)
			{
				foreach($aset->result_array() as $row)
				{
					$row_array['id'] = $row['kode_aset'];
					$row_array['text'] = utf8_encode("<strong>[".$row['kode_aset'] ."]</strong> $row[nama_aset]");
					array_push($return_arr,$row_array);
				}
			}
		}
	function get_info_s_asetd()
	   {
			$id = $this->input->get('kata');
			
			$info = $this->db->select("*")
											->from("sub_sub_kelompok")
											->where("kode_aset",$id)
											->get()
											->row();
			echo json_encode($info);
											
	   }
	function list_s_asetd()
		{
			$return_arr = array();
			$row_array = array();
			$text = $this->input->get('text');
			$aset = $this->db->select("*")
												->from("sub_sub_kelompok")
												->like("nama_aset", $text)
												->where("id_golongan", '04.')
												->or_like("kode_aset",$text)
												->where("id_golongan", '04.')
												->get();
			if($aset->num_rows() > 0)
			{
				foreach($aset->result_array() as $row)
				{
					$row_array['id'] = $row['kode_aset'];
					$row_array['text'] = utf8_encode("<strong>[".$row['kode_aset'] ."]</strong> $row[nama_aset]");
					array_push($return_arr,$row_array);
				}
			}
		}
	function get_info_s_asete()
	   {
			$id = $this->input->get('kata');
			
			$info = $this->db->select("*")
											->from("sub_sub_kelompok")
											->where("kode_aset",$id)
											->get()
											->row();
			echo json_encode($info);
											
	   }
	function list_s_asete()
		{
			$return_arr = array();
			$row_array = array();
			$text = $this->input->get('text');
			$aset = $this->db->select("*")
												->from("sub_sub_kelompok")
												->like("nama_aset", $text)
												->where("id_golongan", '05.')
												->or_like("kode_aset",$text)
												->where("id_golongan", '05.')
												->get();
			if($aset->num_rows() > 0)
			{
				foreach($aset->result_array() as $row)
				{
					$row_array['id'] = $row['kode_aset'];
					$row_array['text'] = utf8_encode("<strong>[".$row['kode_aset'] ."]</strong> $row[nama_aset]");
					array_push($return_arr,$row_array);
				}
			}
		}
	function get_info_s_asetf()
	   {
			$id = $this->input->get('kata');
			
			$info = $this->db->select("*")
											->from("sub_sub_kelompok")
											->where("kode_aset",$id)
											->get()
											->row();
			echo json_encode($info);
											
	   }
	function list_s_asetf()
		{
			$return_arr = array();
			$row_array = array();
			$text = $this->input->get('text');
			$aset = $this->db->select("*")
												->from("sub_sub_kelompok")
												->like("nama_aset", $text)
												->where("id_golongan", '06.')
												->or_like("kode_aset",$text)
												->where("id_golongan", '06.')
												->get();
			if($aset->num_rows() > 0)
			{
				foreach($aset->result_array() as $row)
				{
					$row_array['id'] = $row['kode_aset'];
					$row_array['text'] = utf8_encode("<strong>[".$row['kode_aset'] ."]</strong> $row[nama_aset]");
					array_push($return_arr,$row_array);
				}
			}
		}

	function edit_masukan_kiba()
		{
			$idaset = $this->input->post('id_aset');
			$namaaset = $this->input->post('nama_aset', TRUE);
			$kodeaset = $this->input->post('kode_aset', TRUE);
			$register = $this->input->post('register', TRUE);
			$luas = $this->input->post('luas', TRUE);
			$tahunpengadaan = $this->input->post('tahun_pengadaan', TRUE);
					
			$alamat = $this->input->post('alamat', TRUE);
			$statustanah = $this->input->post('status_tanah', TRUE);
			$tanggalsertifikat = $this->input->post('tanggal_sertifikat', TRUE);
			$nomorsertifikat = $this->input->post('nomor_sertifikat', TRUE);				
			$asalusul = $this->input->post('asal_usul', TRUE);
					
			$harga = $this->input->post('harga', TRUE);
			$kondisi = $this->input->post('kondisi', TRUE);
			$keterangan = $this->input->post('keterangan', TRUE);
			$fotofisik = $this->input->post('foto_fisik', TRUE);
			$kontrak = $this->input->post('kontrak', TRUE);

			$kodelokasi = $this->input->post('kode_lokasi', TRUE);

			$this->sb->update_masukan_kiba($idaset,$namaaset,$kodeaset,$register,$luas,$tahunpengadaan,$alamat,$statustanah,$tanggalsertifikat,$nomorsertifikat,$asalusul,$harga,$kondisi,$keterangan,$fotofisik,$kontrak,$kodelokasi);
			redirect('Staff_bpkad/masukan_kiba');
		}


	
	
	function edit_masukan_kibb()
		{ 
					$idaset = $this->input->post('id_aset');
					$kodeaset = $this->input->post('kode_aset');
					$register = $this->input->post('register');
					$namaaset = $this->input->post('nama_aset');
					$merk = $this->input->post('merk');
					$ukuran = $this->input->post('ukuran');
					$bahan = $this->input->post('bahan');
					$tahun = $this->input->post('tahun_pengadaan');
										
					$lokasi = $this->input->post('lokasi');
					$pabrik = $this->input->post('pabrik');
					$rangka = $this->input->post('no_rangka');
					$mesin = $this->input->post('no_mesin');
					$polisi = $this->input->post('no_polisi');


					$bpkb = $this->input->post('bpkb');					
					$asalusul = $this->input->post('asal_usul');
					$penggunaan = $this->input->post('penggunaan');
										
					$harga = $this->input->post('harga');
					$kondisi = $this->input->post('kondisi');
					$keterangan = $this->input->post('keterangan');
					$kodelokasi = $this->input->post('kode_lokasi');
					$fotofisik = $this->input->post('foto_fisik');
					$kontrak = $this->input->post('kontrak');
					

					$this->load->library('ciqrcode'); //pemanggilan library QR CODE

					$config['cacheable']	= true; //boolean, the default is true
					$config['cachedir']		= './assets/'; //string, the default is application/cache/
					$config['errorlog']		= './assets/'; //string, the default is application/logs/
					$config['imagedir']		= './assets/berkas/qrcode/'; //direktori penyimpanan qr code
					$config['quality']		= true; //boolean, the default is true
					$config['size']			= '1024'; //interger, the default is 1024
					$config['black']		= array(224,255,255); // array, default is array(255,255,255)
					$config['white']		= array(70,130,180); // array, default is array(0,0,0)
					$this->ciqrcode->initialize($config);

					$image_name=$idaset.'.png'; //buat name dari qr code sesuai dengan nim

					$params['data'] = ("		  Nama Aset: ".$namaaset."
					Kode Aset: ".$kodeaset."
					Register: ".$register."
					Merk: ".$merk."
					Ukuran: ".$ukuran."
					Bahan: ".$bahan."
					Tahun: ".$tahun."
					Pabrik: ".$pabrik."
					No. Rangka: ".$rangka."
					No. Mesin: ".$mesin."
					No. Polisi: ".$polisi."
					Bpkb: ".$bpkb."
					Asal Usul: ".$asalusul."
					Harga: ".$harga."
					Kode Lokasi: ".$kodelokasi); //data yang akan di jadikan QR CODE
					//$params['data'] = $nim; 
					$params['level'] = 'H'; //H=High
					$params['size'] = 10;
					$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
					$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

			//$this->_validate();

			 	

				
			$this->sb->update_masukan_kibb($idaset,$kodeaset,$register,$namaaset,$merk ,$ukuran ,$bahan ,$tahun ,$lokasi ,$pabrik,$rangka ,$mesin ,$polisi, $bpkb,$asalusul ,$penggunaan ,$harga ,$kondisi ,$keterangan ,$kodelokasi ,$fotofisik ,$kontrak ,$image_name );
			redirect('Staff_bpkad/masukan_kibb');
		}

		
	function edit_masukan_kibc()
		{
			//$this->_validate();
			$idaset = $this->input->post('id_aset');
			$namaaset = $this->input->post('nama_aset');
			$kodeaset = $this->input->post('kode_aset');
			$register = $this->input->post('register');
			$kondisi = $this->input->post('kondisi');
			$bertingkat = $this->input->post('bertingkat');
			$betontidak = $this->input->post('beton_tidak');
			$luaslantai = $this->input->post('luas_lantai');
			$tahunpengadaan = $this->input->post('tahun_pengadaan');
			$alamat = $this->input->post('alamat');
			$nomordokumengedung = $this->input->post('nomor_dokumen_gedung');
			$tanggaldokumen = $this->input->post('tanggal_dokumen');
			$statustanah = $this->input->post('status_tanah');
			$nomorkodetanah = $this->input->post('nomor_kode_tanah');
			$luastanah = $this->input->post('luas_tanah');				
			$asalusul = $this->input->post('asal_usul');
			
			$harga = $this->input->post('harga');
			$keterangan = $this->input->post('keterangan');
			$fotofisik = $this->input->post('foto_fisik');
			$kontrak = $this->input->post('kontrak');
			$kodelokasi = $this->input->post('kode_lokasi');

			$this->sb->update_masukan_kibc($idaset,$namaaset,$kodeaset,$register,$kondisi,$bertingkat,$betontidak,$luaslantai,$tahunpengadaan,$alamat,$nomordokumengedung,$tanggaldokumen,$statustanah,$nomorkodetanah,$luastanah,$asalusul,$harga,$keterangan,$fotofisik,$kontrak,$kodelokasi);
			redirect('Staff_bpkad/masukan_kibc');
		}

		function edit_masukan_kibd()
		{
			//$this->_validate();
			$idaset = $this->input->post('id_aset');
			$namaaset = $this->input->post('nama_aset');
			$kodeaset = $this->input->post('kode_aset');
			$register = $this->input->post('register');
			$konstruksi = $this->input->post('konstruksi');
			$panjang = $this->input->post('panjang');
			$lebar = $this->input->post('lebar');
			$luas = $this->input->post('luas');
			$alamat = $this->input->post('alamat');
			$tahunpengadaan = $this->input->post('tahun_pengadaan');
			$tanggaldokumen = $this->input->post('tanggal_dokumen');
			$nomordokumen = $this->input->post('nomor_dokumen');
			$statustanah = $this->input->post('status_tanah');
			$nomorkodetanah = $this->input->post('nomor_kode_tanah');			
			$asalusul = $this->input->post('asal_usul');
			
			$harga = $this->input->post('harga');
			$kondisi = $this->input->post('kondisi');
			$keterangan = $this->input->post('keterangan');
			$fotofisik = $this->input->post('foto_fisik');
			$kontrak = $this->input->post('kontrak');
			$kodelokasi = $this->input->post('kode_lokasi');


			$this->sb->update_masukan_kibd($idaset,$namaaset,$kodeaset,$register,$konstruksi,$panjang,$lebar,$luas,
										$alamat,$tahunpengadaan,$tanggaldokumen,$nomordokumen,$statustanah,$nomorkodetanah,
										$asalusul,$harga,$kondisi,$keterangan,$fotofisik,$kontrak,$kodelokasi);
			redirect('Staff_bpkad/masukan_kibd');
			}

		function edit_masukan_kibe()
			{
			$idaset = $this->input->post('id_aset');
			$namaaset = $this->input->post('nama_aset');
			$kodeaset = $this->input->post('kode_aset');
			$register = $this->input->post('register');
			$judulbuku = $this->input->post('judul_buku');
			$spesifikasibuku = $this->input->post('spesifikasi_buku');
			$tahunpengadaan = $this->input->post('tahun_pengadaan');
			$nomordokumen = $this->input->post('nomor_dokumen');
			$tanggaldokumen = $this->input->post('tanggal_dokumen');			
			$asalusul = $this->input->post('asal_usul');
				
			$harga = $this->input->post('harga');
			$kondisi = $this->input->post('kondisi');
			$keterangan = $this->input->post('keterangan');
			$fotofisik = $this->input->post('foto_fisik');
			$kontrak = $this->input->post('kontrak');
			$kodelokasi = $this->input->post('kode_lokasi');

			$this->sb->update_masukan_kibe($idaset,$namaaset,$kodeaset,$register,$judulbuku,$spesifikasibuku,$tahunpengadaan,$nomordokumen,$tanggaldokumen,$asalusul,$harga,$kondisi,$keterangan,$fotofisik,$kontrak,$kodelokasi);
			redirect('Staff_bpkad/masukan_kibe');
		}

		function edit_masukan_kibf()
		{
			$idaset = $this->input->post('id_aset');
			$namaaset = $this->input->post('nama_aset');
			$kodeaset = $this->input->post('kode_aset');
			$bangunan = $this->input->post('bangunan');
			$bertingkattidak = $this->input->post('bertingkat_tidak');
			$betontidak = $this->input->post('beton_tidak');
			$luas = $this->input->post('luas');
			$alamat = $this->input->post('alamat');
			$tanggaldokumen = $this->input->post('tanggal_dokumen');
			$nomordokumen = $this->input->post('nomor_dokumen');
			$tahunbulanmulai = $this->input->post('tahun_bulan_mulai');
			$nomorkodetanah = $this->input->post('nomor_kode_tanah');	
			$nilaikontrak = $this->input->post('nilai_kontrak');		
			$asalusulpembiayaan = $this->input->post('asal_usul_pembiayaan');
				
			$statustanah = $this->input->post('status_tanah');
			$keterangan = $this->input->post('keterangan');
			$fotofisik = $this->input->post('foto_fisik');
			$kontrak = $this->input->post('kontrak');
			$kodelokasi = $this->input->post('kode_lokasi');

			$this->sb->update_masukan_kibf($idaset,$namaaset,$kodeaset,$bangunan,$bertingkattidak,$betontidak,$luas,$alamat,
										$tanggaldokumen,$nomordokumen,$tahunbulanmulai,$nomorkodetanah,$nilaikontrak,$asalusulpembiayaan,
										$statustanah,$keterangan,$fotofisik,$kontrak,$kodelokasi);
			redirect('Staff_bpkad/masukan_kibf');
		}

		function scan()
	{
		$this->load->view('Staff_bpkad/scan/index.html');
	
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
					return redirect('staff_bpkad/gantipassword');
				}else{
					$this->session->set_flashdata('error', '<b>Error: </b>Password tidak berhasil diupdate.');
					return redirect('staff_bpkad/gantipassword');
				}
			}else{
				$this->session->set_flashdata('error', '<b>Error: </b>Password lama tidak benar.');
				return redirect('staff_bpkad/gantipassword');
			}	
		}

		$this->load->view('Staff_bpkad/header');
		$this->load->view('Staff_bpkad/v_gantipassword');
		$this->load->view('Staff_bpkad/footer');
	}





	function arsip_kiba()
	{
		$data['skpd']=$this->sb->get_list_skpd();
		$data['all_tahun']=$this->sb->get_list_tahun_kiba();

		$this->load->view('Staff_bpkad/header');
		$this->load->view('Staff_bpkad/arsip/arsip_kiba',$data);
		$this->load->view('Staff_bpkad/footer');
	}
		function list_aseta()
		{
			$return_arr = array();
			$row_array = array();
			$text = $this->input->get('text');
			$aset = $this->db->select("*")
												->from("sub_sub_kelompok")
												->like("nama_aset", $text)
												->where("id_golongan", '01.')
												->or_like("kode_aset",$text)
												->where("id_golongan", '01.')
												->get();
			if($aset->num_rows() > 0)
			{
				foreach($aset->result_array() as $row)
				{
					$row_array['id'] = $row['kode_aset'];
					$row_array['text'] = utf8_encode("<strong>[".$row['kode_aset'] ."]</strong> $row[nama_aset]");
					array_push($return_arr,$row_array);
				}
			}
			echo json_encode(array("results" => $return_arr ));
		}

		function get_info_aseta()
		{
			$id = $this->input->get('kata');
			
			$info = $this->db->select("*")
											->from("sub_sub_kelompok")
											->where("kode_aset",$id)
											->get()
											->row();
			echo json_encode($info);
											
		}

		function view_arsip_kiba()
		{
			$list = $this->sb->get_datatables_kiba();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kiba) {
				$no++;
				$tahun = $kiba->tahun_pengadaan;
				$tahunrendah = min(array($tahun));
				$tahuntinggi = max(array($tahun));
				$row = array();
				//add html for action
				if($tahunrendah < $tahuntinggi)
				{
					$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kiba->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>
						<a disabled class="btn btn-sm btn-primary" href="view_edit_arsip_kiba/'.encrypt_url($kiba->id_aset).'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a disabled class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kiba('."'".$kiba->id_aset."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
				}else{
					$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kiba->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>
						<a  class="btn btn-sm btn-primary" href="view_edit_arsip_kiba/'.encrypt_url($kiba->id_aset).'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a  class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kiba('."'".$kiba->id_aset."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
				}
				
				$row[] = $kiba->nama_aset;
				$row[] = $kiba->kode_aset;
				$row[] = $kiba->register;
				$row[] = $kiba->luas;
				$row[] = $kiba->tahun_pengadaan;
				
				$row[] = $kiba->alamat;
				$row[] = $kiba->status_tanah;
				$row[] = $kiba->tanggal_sertifikat;
				$row[] = $kiba->nomor_sertifikat;
				$row[] = $kiba->asal_usul;

				$row[] = number_format($kiba->harga,2,",",".");
				$row[] = $kiba->kondisi;
				$row[] = $kiba->keterangan;
				/*$row[] = '<a class="btn btn-sm btn-primary" href="get_imagea/'.encrypt_url($kiba->id_aset).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a>';
				$row[] = '<a class="btn btn-sm btn-primary" href="get_kontraka/'.encrypt_url($kiba->id_aset).'" title="Download"><i class="glyphicon glyphicon-download-alt"></i> Download</a>';*/
				
				$row[] = $kiba->kode_lokasi;

							
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->sb->count_all_kiba(),
							"recordsFiltered" => $this->sb->count_filtered_kiba(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_detail_arsip_kiba()
		{
			$idaset=$this->input->post('idaset');

			if(isset($idaset) and !empty($idaset)){
                $records = $this->sb->get_id_kiba($idaset);
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
											<td>Rp. '.number_format($row["harga"],2,",",".").'</td>											
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

		function view_edit_arsip_kiba($idaset)
		{
			$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'trim|required');
			$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'trim|required');
			$this->form_validation->set_rules('register', 'Register', 'trim|required|max_length[5]');
			$this->form_validation->set_rules('luas', 'Luas', 'trim|required');
			$this->form_validation->set_rules('tahun_pengadaan', 'Tahun Pengadaan', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('status_tanah', 'Status Tanah', 'trim|required');
			$this->form_validation->set_rules('tanggal_sertifikat', 'Tanggal Sertifikat', 'trim|required');
			$this->form_validation->set_rules('nomor_sertifikat', 'Nomor Sertifikat', 'trim|required');
			$this->form_validation->set_rules('asal_usul', 'Asal Usul', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		
			if($this->form_validation->run() == TRUE)
			{
				$idaset = $this->input->post('id_aset');
				$namaaset = $this->input->post('nama_aset', TRUE);
				$kodeaset = $this->input->post('kode_aset', TRUE);
				$register = $this->input->post('register', TRUE);
				$luas = $this->input->post('luas', TRUE);
				$tahunpengadaan = $this->input->post('tahun_pengadaan', TRUE);
						
				$alamat = $this->input->post('alamat', TRUE);
				$statustanah = $this->input->post('status_tanah', TRUE);
				$tanggalsertifikat = $this->input->post('tanggal_sertifikat', TRUE);
				$nomorsertifikat = $this->input->post('nomor_sertifikat', TRUE);				
				$asalusul = $this->input->post('asal_usul', TRUE);
						
				$harga = $this->input->post('harga', TRUE);
				$kondisi = $this->input->post('kondisi', TRUE);
				$keterangan = $this->input->post('keterangan', TRUE);

				$this->sb->update_arsip_kiba($idaset,$namaaset,$kodeaset,$register,$luas,$tahunpengadaan,$alamat,$statustanah,
											$tanggalsertifikat,$nomorsertifikat,$asalusul,$harga,$kondisi,$keterangan);

				$this->session->set_flashdata('succses','Data yang anda Update berhasil.');
				redirect('staff_bpkad/arsip_kiba');
			}

			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_kiba(decrypt_url($idaset));
			$data['aset']=$this->sb->get_list_aseta();
			//echo json_encode($data->row());

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/arsip/vedit_arsip_kiba', $data);
			$this->load->view('Staff_bpkad/footer');

			
		}

		function hapus_arsip_kiba($id_aset)
		{
			$this->sb->delete_arsip_kiba($id_aset);
			echo json_encode(array("status" => TRUE));
		}

		function get_imagea()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->sb->download_foto_kiba(decrypt_url($id));
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
			$get_db=$this->sb->download_kontrak_kiba(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB A/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function view_download_kiba()
		{
			$data['download']=$this->sb->get_list_downloada();

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/arsip/excel_kiba',$data);
			$this->load->view('Staff_bpkad/footer');
		}



	function arsip_kibb()
	{
		$data['skpd']=$this->sb->get_list_skpd();
		$data['all_tahun']=$this->sb->get_list_tahun_kibb();

		$this->load->view('Staff_bpkad/header');
		$this->load->view('Staff_bpkad/arsip/arsip_kibb',$data);
		$this->load->view('Staff_bpkad/footer');
	}

		function list_asetb()
		{
			$return_arr = array();
			$row_array = array();
			$text = $this->input->get('text');
			$aset = $this->db->select("*")
												->from("sub_sub_kelompok")
												->like("nama_aset", $text)
												->where("id_golongan", '02.')
												->or_like("kode_aset",$text)
												->where("id_golongan", '02.')
												->get();
			if($aset->num_rows() > 0)
			{
				foreach($aset->result_array() as $row)
				{
					$row_array['id'] = $row['kode_aset'];
					$row_array['text'] = utf8_encode("<strong>[".$row['kode_aset'] ."]</strong> $row[nama_aset]");
					array_push($return_arr,$row_array);
				}
			}
			echo json_encode(array("results" => $return_arr ));
		}

		function get_info_asetb()
		{
			$id = $this->input->get('kata');
			
			$info = $this->db->select("*")
											->from("sub_sub_kelompok")
											->where("kode_aset",$id)
											->get()
											->row();
			echo json_encode($info);
											
		}

		function view_arsip_kibb()
		{
			$list = $this->sb->get_datatables_kibb();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibb) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kibb->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>
						<a class="btn btn-sm btn-primary" href="cetak/'.encrypt_url($kibb->id_aset).'" title="Cetak"><i class="glyphicon glyphicon-download-alt"></i> Cetak</a>
						<a class="btn btn-sm btn-primary" href="view_edit_arsip_kibb/'.encrypt_url($kibb->id_aset).'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kibb('."'".$kibb->id_aset."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
				$row[] = $kibb->kode_aset;
				$row[] = $kibb->register;
				$row[] = $kibb->nama_aset;
				$row[] = $kibb->merk;
				$row[] = $kibb->ukuran;
				
				$row[] = $kibb->bahan;
				$row[] = $kibb->tahun_pengadaan;
				$row[] = number_format($kibb->harga,2,",",".");		
				$row[] = $kibb->keterangan;
				$row[] = $kibb->kode_lokasi;				
			
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->sb->count_all_kibb(),
							"recordsFiltered" => $this->sb->count_filtered_kibb(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		public function cetak($idaset)
		{
			$data['data'] = $this->sb->qrcode(decrypt_url($idaset));
			$this->load->view('staff_bpkad/arsip/cetak_qrcode',$data);
		}

		function view_detail_arsip_kibb()
		{
			$idaset=$this->input->post('idaset');

			if(isset($idaset) and !empty($idaset)){
                $records = $this->sb->get_id_kibb($idaset);
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
											<td>Rp. '.number_format($row["harga"],2,",",".").'</td>	
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

		function view_edit_arsip_kibb($idaset)
		{
			$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'trim|required');
			$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'trim|required');
			$this->form_validation->set_rules('register', 'Register', 'trim|required|max_length[5]');
			$this->form_validation->set_rules('merk', 'Merk', 'trim|required');
			$this->form_validation->set_rules('ukuran', 'Ukuran', 'trim|required');
			$this->form_validation->set_rules('bahan', 'Bahan', 'trim|required');
			$this->form_validation->set_rules('tahun_pengadaan', 'Tahun Pengadaan', 'trim|required');
			$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
			$this->form_validation->set_rules('pabrik', 'Pabrik', 'trim|required');
			$this->form_validation->set_rules('no_rangka', 'No. Rangka', 'trim|required');
			$this->form_validation->set_rules('no_mesin', 'No. Mesin', 'trim|required');
			$this->form_validation->set_rules('no_polisi', 'No. Polisi', 'trim|required');
			$this->form_validation->set_rules('bpkb', 'BPKB', 'trim|required');
			$this->form_validation->set_rules('asal_usul', 'Asal usul', 'trim|required');
			$this->form_validation->set_rules('penggunaan', 'Penggunaan', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		
			if($this->form_validation->run() == TRUE)
			{
				$idaset = $this->input->post('id_aset');
				$kodeaset = $this->input->post('kode_aset', TRUE);
				$register = $this->input->post('register', TRUE);
				$namaaset = $this->input->post('nama_aset', TRUE);
				$merk = $this->input->post('merk', TRUE);
				$ukuran = $this->input->post('ukuran', TRUE);
				$bahan = $this->input->post('bahan', TRUE);
				$tahun = $this->input->post('tahun_pengadaan', TRUE);

				$lokasi = $this->input->post('lokasi', TRUE);
				$pabrik = $this->input->post('pabrik', TRUE);
				$rangka = $this->input->post('no_rangka', TRUE);
				$mesin = $this->input->post('no_mesin', TRUE);
				$polisi = $this->input->post('no_polisi', TRUE);


				$bpkb = $this->input->post('bpkb', TRUE);
				$asalusul = $this->input->post('asal_usul', TRUE);
				$penggunaan = $this->input->post('penggunaan', TRUE);

				$harga = $this->input->post('harga', TRUE);
				$kondisi = $this->input->post('kondisi', TRUE);
				$keterangan = $this->input->post('keterangan', TRUE);
				$kodelokasi = $this->input->post('kode_lokasi', TRUE);

				/*$dq = $this->sb->get_id_kibbb($idaset);
				if(file_exists('assets/berkas/qrcode/'.$dq->id_aset) && $dq->id_aset){
					unlink('assets/berkas/qrcode/'.$dq->id_aset);
				}*/

				$this->load->library('ciqrcode'); //pemanggilan library QR CODE

				$config['cacheable']	= true; //boolean, the default is true
				$config['cachedir']		= './assets/'; //string, the default is application/cache/
				$config['errorlog']		= './assets/'; //string, the default is application/logs/
				$config['imagedir']		= './assets/berkas/qrcode/'; //direktori penyimpanan qr code
				$config['quality']		= true; //boolean, the default is true
				$config['size']			= '1024'; //interger, the default is 1024
				$config['black']		= array(224,255,255); // array, default is array(255,255,255)
				$config['white']		= array(70,130,180); // array, default is array(0,0,0)
				$this->ciqrcode->initialize($config);

				$image_name=$idaset.'.png'; //buat name dari qr code sesuai dengan nim

				$params['data'] = ("		  Nama Aset: ".$namaaset."
				Kode Aset: ".$kodeaset."
				Register: ".$register."
				Merk: ".$merk."
				Ukuran: ".$ukuran."
				Bahan: ".$bahan."
				Tahun: ".$tahun."
				Pabrik: ".$pabrik."
				No. Rangka: ".$rangka."
				No. Mesin: ".$mesin."
				No. Polisi: ".$polisi."
				Bpkb: ".$bpkb."
				Asal Usul: ".$asalusul."
				Harga: ".$harga."
				Kode Lokasi: ".$kodelokasi); //data yang akan di jadikan QR CODE
				//$params['data'] = $nim; 
				$params['level'] = 'H'; //H=High
				$params['size'] = 10;
				$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
				$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE


				$this->sb->update_arsip_kibb($idaset,$kodeaset,$register,$namaaset,$merk,$ukuran,$bahan,$tahun,$lokasi,
											$pabrik,$rangka,$mesin,$polisi,$bpkb,$asalusul,$penggunaan,$harga,$kondisi,
											$keterangan,$image_name);

				$this->session->set_flashdata('succses','Data yang anda Update berhasil.');
				redirect('staff_bpkad/arsip_kibb');
			}

			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_kibb(decrypt_url($idaset));
			$data['aset']=$this->sb->get_list_asetb();
			//echo json_encode($data->row());

			$this->load->view('Staff_bpkad/header-cadangan');
			$this->load->view('Staff_bpkad/arsip/vedit_arsip_kibb', $data);
			$this->load->view('Staff_bpkad/footer');

			//$data['output'] = $this->person->get_by_id_view($id);
            //$this->load->view('view_Detail', $data);
		}

		function hapus_arsip_kibb($id_aset)
		{
			$this->sb->delete_arsip_kibb($id_aset);
			echo json_encode(array("status" => TRUE));
		}

		function get_imageb()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->sb->download_foto_kibb(decrypt_url($id));
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
			$get_db=$this->sb->download_kontrak_kibb(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB B/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function view_download_kibb()
		{
			$data['download']=$this->sb->get_list_downloadb();

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/arsip/excel_kibb',$data);
			$this->load->view('Staff_bpkad/footer');
		}



	function arsip_kibc()
	{
		$data['skpd']=$this->sb->get_list_skpd();
		$data['all_tahun']=$this->sb->get_list_tahun_kibc();

		$this->load->view('Staff_bpkad/header');
		$this->load->view('Staff_bpkad/arsip/arsip_kibc',$data);
		$this->load->view('Staff_bpkad/footer');
	}

		function list_asetc()
		{
			$return_arr = array();
			$row_array = array();
			$text = $this->input->get('text');
			$aset = $this->db->select("*")
												->from("sub_sub_kelompok")
												->like("nama_aset", $text)
												->where("id_golongan", '03.')
												->or_like("kode_aset",$text)
												->where("id_golongan", '03.')
												->get();
			if($aset->num_rows() > 0)
			{
				foreach($aset->result_array() as $row)
				{
					$row_array['id'] = $row['kode_aset'];
					$row_array['text'] = utf8_encode("<strong>[".$row['kode_aset'] ."]</strong> $row[nama_aset]");
					array_push($return_arr,$row_array);
				}
			}
			echo json_encode(array("results" => $return_arr ));
		}

		function get_info_asetc()
		{
			$id = $this->input->get('kata');
			
			$info = $this->db->select("*")
											->from("sub_sub_kelompok")
											->where("kode_aset",$id)
											->get()
											->row();
			echo json_encode($info);
											
		}

		function view_arsip_kibc()
		{
			$list = $this->sb->get_datatables_kibc();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibc) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kibc->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>
							<a class="btn btn-sm btn-primary" href="view_edit_arsip_kibc/'.encrypt_url($kibc->id_aset).'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
							<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kibc('."'".$kibc->id_aset."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
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

				$row[] = number_format($kibc->harga,2,",",".");			
				//$row[] = $kibc->keterangan;
				//$row[] = $kibc->foto_fisik;
				//$row[] = $kibc->kontrak;
				$row[] = $kibc->kode_lokasi;

				
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->sb->count_all_kibc(),
							"recordsFiltered" => $this->sb->count_filtered_kibc(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_detail_arsip_kibc()
		{
			$idaset=$this->input->post('idaset');

			if(isset($idaset) and !empty($idaset)){
                $records = $this->sb->get_id_kibc($idaset);
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
											<td>Rp. '.number_format($row["harga"],2,",",".").'</td>	
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

		function view_edit_arsip_kibc($idaset)
		{
			$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'trim|required');
			$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'trim|required');
			$this->form_validation->set_rules('register', 'Register', 'trim|required|max_length[5]');
			$this->form_validation->set_rules('kondisi', 'kondisi', 'trim|required');
			$this->form_validation->set_rules('bertingkat', 'Bertingkat', 'trim|required');
			$this->form_validation->set_rules('beton_tidak', 'Beton/Tidak', 'trim|required');
			$this->form_validation->set_rules('luas_lantai', 'Luas Lantai', 'trim|required');
			$this->form_validation->set_rules('tahun_pengadaan', 'Tahun Pengadaan', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('nomor_dokumen_gedung', 'No. Dokumen Gedung', 'trim|required');
			$this->form_validation->set_rules('tanggal_dokumen', 'Tanggal Dokumen', 'trim|required');
			$this->form_validation->set_rules('status_tanah', 'Status Tanah', 'trim|required');
			$this->form_validation->set_rules('nomor_kode_tanah', 'No. Kode Tanah', 'trim|required');
			$this->form_validation->set_rules('luas_tanah', 'Luas Tanah', 'trim|required');
			$this->form_validation->set_rules('asal_usul', 'Asal Usul', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		
			if($this->form_validation->run() == TRUE)
			{
				$idaset = $this->input->post('id_aset');
				$namaaset = $this->input->post('nama_aset', TRUE);
				$kodeaset = $this->input->post('kode_aset', TRUE);
				$register = $this->input->post('register', TRUE);
				$kondisi = $this->input->post('kondisi', TRUE);
				$bertingkat = $this->input->post('bertingkat', TRUE);
				$betontidak = $this->input->post('beton_tidak', TRUE);
				$luaslantai = $this->input->post('luas_lantai', TRUE);
				$tahunpengadaan = $this->input->post('tahun_pengadaan', TRUE);
				$alamat = $this->input->post('alamat', TRUE);
				$nomordokumengedung = $this->input->post('nomor_dokumen_gedung', TRUE);
				$tanggaldokumen = $this->input->post('tanggal_dokumen', TRUE);
				$statustanah = $this->input->post('status_tanah', TRUE);
				$nomorkodetanah = $this->input->post('nomor_kode_tanah', TRUE);
				$luastanah = $this->input->post('luas_tanah', TRUE);				
				$asalusul = $this->input->post('asal_usul', TRUE);
				
				$harga = $this->input->post('harga', TRUE);
				$keterangan = $this->input->post('keterangan', TRUE);

				$this->sb->update_arsip_kibc($idaset,$namaaset,$kodeaset,$register,$kondisi,$bertingkat,$betontidak,$luaslantai,
											$tahunpengadaan,$alamat,$nomordokumengedung,$tanggaldokumen,$statustanah,$nomorkodetanah,
											$luastanah,$asalusul,$harga,$keterangan);

				$this->session->set_flashdata('succses','Data yang anda Update berhasil.');
				redirect('staff_bpkad/arsip_kibc');
			}

			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_kibc(decrypt_url($idaset));
			$data['aset']=$this->sb->get_list_asetc();
			//echo json_encode($data->row());

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/arsip/vedit_arsip_kibc', $data);
			$this->load->view('Staff_bpkad/footer');

			//$data['output'] = $this->person->get_by_id_view($id);
            //$this->load->view('view_Detail', $data);
		}

		function edit_arsip_kibc()
		{
			$idaset = $this->input->post('id_aset');
			$namaaset = $this->input->post('nama_aset', TRUE);
			$kodeaset = $this->input->post('kode_aset', TRUE);
			$register = $this->input->post('register', TRUE);
			$kondisi = $this->input->post('kondisi', TRUE);
			$bertingkat = $this->input->post('bertingkat', TRUE);
			$betontidak = $this->input->post('beton_tidak', TRUE);
			$luaslantai = $this->input->post('luas_lantai', TRUE);
			$tahunpengadaan = $this->input->post('tahun_pengadaan', TRUE);
			$alamat = $this->input->post('alamat', TRUE);
			$nomordokumengedung = $this->input->post('nomor_dokumen_gedung', TRUE);
			$tanggaldokumen = $this->input->post('tanggal_dokumen', TRUE);
			$statustanah = $this->input->post('status_tanah', TRUE);
			$nomorkodetanah = $this->input->post('nomor_kode_tanah', TRUE);
			$luastanah = $this->input->post('luas_tanah', TRUE);				
			$asalusul = $this->input->post('asal_usul', TRUE);
			
			$harga = $this->input->post('harga', TRUE);
			$keterangan = $this->input->post('keterangan', TRUE);

			$this->sb->update_arsip_kibc($idaset,$namaaset,$kodeaset,$register,$kondisi,$bertingkat,$betontidak,$luaslantai,
										$tahunpengadaan,$alamat,$nomordokumengedung,$tanggaldokumen,$statustanah,$nomorkodetanah,
										$luastanah,$asalusul,$harga,$keterangan);
			redirect('staff_bpkad/arsip_kibc');
		}

		function hapus_arsip_kibc($id_aset)
		{
			$this->sb->delete_arsip_kibc($id_aset);
			echo json_encode(array("status" => TRUE));
		}

		function get_imagec()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->sb->download_foto_kibc(decrypt_url($id));
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
			$get_db=$this->sb->download_kontrak_kibc(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB C/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function view_download_kibc()
		{
			$data['download']=$this->sb->get_list_downloadc();

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/arsip/excel_kibc',$data);
			$this->load->view('Staff_bpkad/footer');
		}


		
	function arsip_kibd()
	{
		$data['skpd']=$this->sb->get_list_skpd();
		$data['all_tahun']=$this->sb->get_list_tahun_kibd();

		$this->load->view('Staff_bpkad/header');
		$this->load->view('Staff_bpkad/arsip/arsip_kibd',$data);
		$this->load->view('Staff_bpkad/footer');
	}

		function list_asetd()
		{
			$return_arr = array();
			$row_array = array();
			$text = $this->input->get('text');
			$aset = $this->db->select("*")
												->from("sub_sub_kelompok")
												->like("nama_aset", $text)
												->where("id_golongan", '04.')
												->or_like("kode_aset",$text)
												->where("id_golongan", '04.')
												->get();
			if($aset->num_rows() > 0)
			{
				foreach($aset->result_array() as $row)
				{
					$row_array['id'] = $row['kode_aset'];
					$row_array['text'] = utf8_encode("<strong>[".$row['kode_aset'] ."]</strong> $row[nama_aset]");
					array_push($return_arr,$row_array);
				}
			}
			echo json_encode(array("results" => $return_arr ));
		}

		function get_info_asetd()
		{
			$id = $this->input->get('kata');
			
			$info = $this->db->select("*")
											->from("sub_sub_kelompok")
											->where("kode_aset",$id)
											->get()
											->row();
			echo json_encode($info);
											
		}

		function view_arsip_kibd()
		{
			$list = $this->sb->get_datatables_kibd();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibd) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kibd->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>
						<a class="btn btn-sm btn-primary" href="view_edit_arsip_kibd/'.encrypt_url($kibd->id_aset).'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kibd('."'".$kibd->id_aset."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
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
				$row[] = number_format($kibd->harga,2,",",".");

				//$row[] = $kibd->kondisi;			
				//$row[] = $kibd->keterangan;
				//$row[] = $kibd->foto_fisik;
				//$row[] = $kibd->kontrak;
				$row[] = $kibd->kode_lokasi;

				
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->sb->count_all_kibd(),
							"recordsFiltered" => $this->sb->count_filtered_kibd(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_detail_arsip_kibd()
		{
			$idaset=$this->input->post('idaset');

			if(isset($idaset) and !empty($idaset)){
                $records = $this->sb->get_id_kibd($idaset);
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
											<td>Rp. '.number_format($row["harga"],2,",",".").'</td>	
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

		function view_edit_arsip_kibd($idaset)
		{
			$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'trim|required');
			$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'trim|required');
			$this->form_validation->set_rules('register', 'Register', 'trim|required|max_length[5]');
			$this->form_validation->set_rules('konstruksi', 'Konstruksi', 'trim|required');
			$this->form_validation->set_rules('panjang', 'Panjang', 'trim|required');
			$this->form_validation->set_rules('lebar', 'Lebar', 'trim|required');
			$this->form_validation->set_rules('luas', 'Luas', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('tahun_pengadaan', 'Tahun Pengadaan', 'trim|required');
			$this->form_validation->set_rules('tanggal_dokumen', 'Tanggal Dokumen', 'trim|required');
			$this->form_validation->set_rules('nomor_dokumen', 'No. Dokumen', 'trim|required');
			$this->form_validation->set_rules('status_tanah', 'Status Tanah', 'trim|required');
			$this->form_validation->set_rules('nomor_kode_tanah', 'No. Kode Tanah', 'trim|required');
			$this->form_validation->set_rules('asal_usul', 'Asal Usul', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		
			if($this->form_validation->run() == TRUE)
			{
				$idaset = $this->input->post('id_aset');
				$namaaset = $this->input->post('nama_aset', TRUE);
				$kodeaset = $this->input->post('kode_aset', TRUE);
				$register = $this->input->post('register', TRUE);
				$konstruksi = $this->input->post('konstruksi', TRUE);
				$panjang = $this->input->post('panjang', TRUE);
				$lebar = $this->input->post('lebar', TRUE);
				$luas = $this->input->post('luas', TRUE);
				$alamat = $this->input->post('alamat', TRUE);
				$tahunpengadaan = $this->input->post('tahun_pengadaan', TRUE);
				$tanggaldokumen = $this->input->post('tanggal_dokumen', TRUE);
				$nomordokumen = $this->input->post('nomor_dokumen', TRUE);
				$statustanah = $this->input->post('status_tanah', TRUE);
				$nomorkodetanah = $this->input->post('nomor_kode_tanah', TRUE);			
				$asalusul = $this->input->post('asal_usul', TRUE);
				
				$harga = $this->input->post('harga', TRUE);
				$kondisi = $this->input->post('kondisi', TRUE);
				$keterangan = $this->input->post('keterangan', TRUE);


				$this->sb->update_arsip_kibd($idaset,$namaaset,$kodeaset,$register,$konstruksi,$panjang,$lebar,$luas,
											$alamat,$tahunpengadaan,$tanggaldokumen,$nomordokumen,$statustanah,$nomorkodetanah,
											$asalusul,$harga,$kondisi,$keterangan);

				$this->session->set_flashdata('succses','Data yang anda Update berhasil.');
				redirect('staff_bpkad/arsip_kibd');
			}

			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_kibd(decrypt_url($idaset));
			$data['aset']=$this->sb->get_list_asetd();
			//echo json_encode($data->row());

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/arsip/vedit_arsip_kibd', $data);
			$this->load->view('Staff_bpkad/footer');

			//$data['output'] = $this->person->get_by_id_view($id);
            //$this->load->view('view_Detail', $data);
		}

		function edit_arsip_kibd()
		{
			$idaset = $this->input->post('id_aset');
			$namaaset = $this->input->post('nama_aset', TRUE);
			$kodeaset = $this->input->post('kode_aset', TRUE);
			$register = $this->input->post('register', TRUE);
			$konstruksi = $this->input->post('konstruksi', TRUE);
			$panjang = $this->input->post('panjang', TRUE);
			$lebar = $this->input->post('lebar', TRUE);
			$luas = $this->input->post('luas', TRUE);
			$alamat = $this->input->post('alamat', TRUE);
			$tahunpengadaan = $this->input->post('tahun_pengadaan', TRUE);
			$tanggaldokumen = $this->input->post('tanggal_dokumen', TRUE);
			$nomordokumen = $this->input->post('nomor_dokumen', TRUE);
			$statustanah = $this->input->post('status_tanah', TRUE);
			$nomorkodetanah = $this->input->post('nomor_kode_tanah', TRUE);			
			$asalusul = $this->input->post('asal_usul', TRUE);
			
			$harga = $this->input->post('harga', TRUE);
			$kondisi = $this->input->post('kondisi', TRUE);
			$keterangan = $this->input->post('keterangan', TRUE);


			$this->sb->update_arsip_kibd($idaset,$namaaset,$kodeaset,$register,$konstruksi,$panjang,$lebar,$luas,
										$alamat,$tahunpengadaan,$tanggaldokumen,$nomordokumen,$statustanah,$nomorkodetanah,
										$asalusul,$harga,$kondisi,$keterangan);
			redirect('staff_bpkad/arsip_kibd');
		}

		function hapus_arsip_kibd($id_aset)
		{
			$this->sb->delete_arsip_kibd($id_aset);
			echo json_encode(array("status" => TRUE));
		}

		function get_imaged()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->sb->download_foto_kibd(decrypt_url($id));
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
			$get_db=$this->sb->download_kontrak_kibd(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB D/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function view_download_kibd()
		{
			$data['download']=$this->sb->get_list_downloadd();

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/arsip/excel_kibd',$data);
			$this->load->view('Staff_bpkad/footer');
		}




	function arsip_kibe()
	{
		$data['skpd']=$this->sb->get_list_skpd();
		$data['all_tahun']=$this->sb->get_list_tahun_kibe();

		$this->load->view('Staff_bpkad/header');
		$this->load->view('Staff_bpkad/arsip/arsip_kibe',$data);
		$this->load->view('Staff_bpkad/footer');
	}

		function list_asete()
		{
			$return_arr = array();
			$row_array = array();
			$text = $this->input->get('text');
			$aset = $this->db->select("*")
												->from("sub_sub_kelompok")
												->like("nama_aset", $text)
												->where("id_golongan", '05.')
												->or_like("kode_aset",$text)
												->where("id_golongan", '05.')
												->get();
			if($aset->num_rows() > 0)
			{
				foreach($aset->result_array() as $row)
				{
					$row_array['id'] = $row['kode_aset'];
					$row_array['text'] = utf8_encode("<strong>[".$row['kode_aset'] ."]</strong> $row[nama_aset]");
					array_push($return_arr,$row_array);
				}
			}
			echo json_encode(array("results" => $return_arr ));
		}

		function get_info_asete()
		{
			$id = $this->input->get('kata');
			
			$info = $this->db->select("*")
											->from("sub_sub_kelompok")
											->where("kode_aset",$id)
											->get()
											->row();
			echo json_encode($info);
											
		}

		function view_arsip_kibe()
		{
			$list = $this->sb->get_datatables_kibe();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibe) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kibe->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>
				<a class="btn btn-sm btn-primary" href="view_edit_arsip_kibe/'.encrypt_url($kibe->id_aset).'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kibe('."'".$kibe->id_aset."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
				$row[] = $kibe->nama_aset;
				$row[] = $kibe->kode_aset;
				//$row[] = $kibe->register;
				$row[] = $kibe->judul_buku;
				$row[] = $kibe->spesifikasi_buku;
				
				$row[] = $kibe->tahun_pengadaan;
				//$row[] = $kibe->nomor_dokumen;
				//$row[] = $kibe->tanggal_dokumen;
				$row[] = $kibe->asal_usul;
				$row[] = number_format($kibe->harga,2,",",".");

				//$row[] = $kibe->kondisi;			
				//$row[] = $kibe->keterangan;
				//$row[] = $kibe->foto_fisik;
				//$row[] = $kibe->kontrak;
				$row[] = $kibe->kode_lokasi;

				
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->sb->count_all_kibe(),
							"recordsFiltered" => $this->sb->count_filtered_kibe(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_detail_arsip_kibe()
		{
			$idaset=$this->input->post('idaset');

			if(isset($idaset) and !empty($idaset)){
                $records = $this->sb->get_id_kibe($idaset);
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
											<td>Rp. '.number_format($row["harga"],2,",",".").'</td>	
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

		function view_edit_arsip_kibe($idaset)
		{
			$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'trim|required');
			$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'trim|required');
			$this->form_validation->set_rules('register', 'Register', 'trim|required|max_length[5]');
			$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'trim|required');
			$this->form_validation->set_rules('spesifikasi_buku', 'Spesifikasi Buku', 'trim|required');
			$this->form_validation->set_rules('tahun_pengadaan', 'Tahun Pengadaan', 'trim|required');
			$this->form_validation->set_rules('nomor_dokumen', 'No. Dokumen', 'trim|required');
			$this->form_validation->set_rules('tanggal_dokumen', 'Tanggal Dokumen', 'trim|required');
			$this->form_validation->set_rules('asal_usul', 'Asal Usul', 'trim|required');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
			$this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		
			if($this->form_validation->run() == TRUE)
			{
				$idaset = $this->input->post('id_aset');
				$namaaset = $this->input->post('nama_aset', TRUE);
				$kodeaset = $this->input->post('kode_aset', TRUE);
				$register = $this->input->post('register', TRUE);
				$judulbuku = $this->input->post('judul_buku', TRUE);
				$spesifikasibuku = $this->input->post('spesifikasi_buku', TRUE);
				$tahunpengadaan = $this->input->post('tahun_pengadaan', TRUE);
				$nomordokumen = $this->input->post('nomor_dokumen', TRUE);
				$tanggaldokumen = $this->input->post('tanggal_dokumen', TRUE);			
				$asalusul = $this->input->post('asal_usul', TRUE);
					
				$harga = $this->input->post('harga', TRUE);
				$kondisi = $this->input->post('kondisi', TRUE);
				$keterangan = $this->input->post('keterangan', TRUE);

				$this->sb->update_arsip_kibe($idaset,$namaaset,$kodeaset,$register,$judulbuku,$spesifikasibuku,$tahunpengadaan,
											$nomordokumen,$tanggaldokumen,$asalusul,$harga,$kondisi,$keterangan);

				$this->session->set_flashdata('succses','Data yang anda Update berhasil.');
				redirect('staff_bpkad/arsip_kibe');
			}

			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_kibe(decrypt_url($idaset));
			$data['aset']=$this->sb->get_list_asete();
			//echo json_encode($data->row());

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/arsip/vedit_arsip_kibe', $data);
			$this->load->view('Staff_bpkad/footer');

			//$data['output'] = $this->person->get_by_id_view($id);
            //$this->load->view('view_Detail', $data);
		}

		function edit_arsip_kibe()
		{
			$idaset = $this->input->post('id_aset');
			$namaaset = $this->input->post('nama_aset', TRUE);
			$kodeaset = $this->input->post('kode_aset', TRUE);
			$register = $this->input->post('register', TRUE);
			$judulbuku = $this->input->post('judul_buku', TRUE);
			$spesifikasibuku = $this->input->post('spesifikasi_buku', TRUE);
			$tahunpengadaan = $this->input->post('tahun_pengadaan', TRUE);
			$nomordokumen = $this->input->post('nomor_dokumen', TRUE);
			$tanggaldokumen = $this->input->post('tanggal_dokumen', TRUE);			
			$asalusul = $this->input->post('asal_usul', TRUE);
				
			$harga = $this->input->post('harga', TRUE);
			$kondisi = $this->input->post('kondisi', TRUE);
			$keterangan = $this->input->post('keterangan', TRUE);

			$this->sb->update_arsip_kibe($idaset,$namaaset,$kodeaset,$register,$judulbuku,$spesifikasibuku,$tahunpengadaan,
										$nomordokumen,$tanggaldokumen,$asalusul,$harga,$kondisi,$keterangan);
			redirect('staff_bpkad/arsip_kibe');
		}

		function hapus_arsip_kibe($id_aset)
		{
			$this->sb->delete_arsip_kibe($id_aset);
			echo json_encode(array("status" => TRUE));
		}

		function get_imagee()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->sb->download_foto_kibe(decrypt_url($id));
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
			$get_db=$this->sb->download_kontrak_kibe(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB E/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function view_download_kibe()
		{
			$data['download']=$this->sb->get_list_downloade();

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/arsip/excel_kibe',$data);
			$this->load->view('Staff_bpkad/footer');
		}




	function arsip_kibf()
	{
		$data['skpd']=$this->sb->get_list_skpd();
		$data['all_tahun']=$this->sb->get_list_tahun_kibf();

		$this->load->view('Staff_bpkad/header');
		$this->load->view('Staff_bpkad/arsip/arsip_kibf',$data);
		$this->load->view('Staff_bpkad/footer');
	}

		function list_asetf()
		{
			$return_arr = array();
			$row_array = array();
			$text = $this->input->get('text');
			$aset = $this->db->select("*")
												->from("sub_sub_kelompok")
												->like("nama_aset", $text)
												->where("id_golongan", '06.')
												->or_like("kode_aset",$text)
												->where("id_golongan", '06.')
												->get();
			if($aset->num_rows() > 0)
			{
				foreach($aset->result_array() as $row)
				{
					$row_array['id'] = $row['kode_aset'];
					$row_array['text'] = utf8_encode("<strong>[".$row['kode_aset'] ."]</strong> $row[nama_aset]");
					array_push($return_arr,$row_array);
				}
			}
			echo json_encode(array("results" => $return_arr ));
		}

		function get_info_asetf()
		{
			$id = $this->input->get('kata');
			
			$info = $this->db->select("*")
											->from("sub_sub_kelompok")
											->where("kode_aset",$id)
											->get()
											->row();
			echo json_encode($info);
											
		}

		function view_arsip_kibf()
		{
			$list = $this->sb->get_datatables_kibf();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibf) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="'.$kibf->id_aset.'"><i class="glyphicon glyphicon-list"></i> Detail</a>
				<a class="btn btn-sm btn-primary" href="view_edit_arsip_kibf/'.encrypt_url($kibf->id_aset).'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kibf('."'".$kibf->id_aset."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
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
				$row[] = number_format($kibf->nilai_kontrak,2,",",".");
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
							"recordsTotal" => $this->sb->count_all_kibf(),
							"recordsFiltered" => $this->sb->count_filtered_kibf(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_detail_arsip_kibf()
		{
			$idaset=$this->input->post('idaset');

			if(isset($idaset) and !empty($idaset)){
                $records = $this->sb->get_id_kibf($idaset);
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
											<td>Rp. '.number_format($row["nilai_kontrak"],2,",",".").'</td>	
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

		function view_edit_arsip_kibf($idaset)
		{
			$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'trim|required');
			$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'trim|required');
			$this->form_validation->set_rules('bangunan', 'Bangunan', 'trim|required');
			$this->form_validation->set_rules('bertingkat_tidak', 'Bertingkat/Tidak', 'trim|required');
			$this->form_validation->set_rules('beton_tidak', 'Beton/Tidak', 'trim|required');
			$this->form_validation->set_rules('luas', 'Luas', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('tanggal_dokumen', 'Tanggal Dokumen', 'trim|required');
			$this->form_validation->set_rules('nomor_dokumen', 'No. Dokumen', 'trim|required');
			$this->form_validation->set_rules('tahun_bulan_mulai', 'Tahun, Bulan Mulai', 'trim|required');
			$this->form_validation->set_rules('nomor_kode_tanah', 'No. Kode Tanah', 'trim|required');
			$this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'trim|required');
			$this->form_validation->set_rules('asal_usul_pembiayaan', 'Asal Usul Pembiayaan', 'trim|required');
			$this->form_validation->set_rules('status_tanah', 'Status Tanah', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		
			if($this->form_validation->run() == TRUE)
			{
				$idaset = $this->input->post('id_aset');
				$namaaset = $this->input->post('nama_aset', TRUE);
				$kodeaset = $this->input->post('kode_aset', TRUE);
				$bangunan = $this->input->post('bangunan', TRUE);
				$bertingkattidak = $this->input->post('bertingkat_tidak', TRUE);
				$betontidak = $this->input->post('beton_tidak', TRUE);
				$luas = $this->input->post('luas', TRUE);
				$alamat = $this->input->post('alamat', TRUE);
				$tanggaldokumen = $this->input->post('tanggal_dokumen', TRUE);
				$nomordokumen = $this->input->post('nomor_dokumen', TRUE);
				$tahunbulanmulai = $this->input->post('tahun_bulan_mulai', TRUE);
				$nomorkodetanah = $this->input->post('nomor_kode_tanah', TRUE);	
				$nilaikontrak = $this->input->post('nilai_kontrak', TRUE);		
				$asalusulpembiayaan = $this->input->post('asal_usul_pembiayaan', TRUE);
					
				$statustanah = $this->input->post('status_tanah', TRUE);
				$keterangan = $this->input->post('keterangan', TRUE);

				$this->sb->update_arsip_kibf($idaset,$namaaset,$kodeaset,$bangunan,$bertingkattidak,$betontidak,$luas,$alamat,
											$tanggaldokumen,$nomordokumen,$tahunbulanmulai,$nomorkodetanah,$nilaikontrak,$asalusulpembiayaan,
											$statustanah,$keterangan);

				$this->session->set_flashdata('succses','Data yang anda Update berhasil.');
				redirect('staff_bpkad/arsip_kibf');
			}

			$idaset=$this->uri->segment(3);			
			$data['output']=$this->sb->get_id_kibf(decrypt_url($idaset));
			$data['aset']=$this->sb->get_list_asetf();
			//echo json_encode($data->row());

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/arsip/vedit_arsip_kibf', $data);
			$this->load->view('Staff_bpkad/footer');

			//$data['output'] = $this->person->get_by_id_view($id);
            //$this->load->view('view_Detail', $data);
		}

		function edit_arsip_kibf()
		{
			$idaset = $this->input->post('id_aset');
			$namaaset = $this->input->post('nama_aset', TRUE);
			$kodeaset = $this->input->post('kode_aset', TRUE);
			$bangunan = $this->input->post('bangunan', TRUE);
			$bertingkattidak = $this->input->post('bertingkat_tidak', TRUE);
			$betontidak = $this->input->post('beton_tidak', TRUE);
			$luas = $this->input->post('luas', TRUE);
			$alamat = $this->input->post('alamat', TRUE);
			$tanggaldokumen = $this->input->post('tanggal_dokumen', TRUE);
			$nomordokumen = $this->input->post('nomor_dokumen', TRUE);
			$tahunbulanmulai = $this->input->post('tahun_bulan_mulai', TRUE);
			$nomorkodetanah = $this->input->post('nomor_kode_tanah', TRUE);	
			$nilaikontrak = $this->input->post('nilai_kontrak', TRUE);		
			$asalusulpembiayaan = $this->input->post('asal_usul_pembiayaan', TRUE);
				
			$statustanah = $this->input->post('status_tanah', TRUE);
			$keterangan = $this->input->post('keterangan', TRUE);

			$this->sb->update_arsip_kibf($idaset,$namaaset,$kodeaset,$bangunan,$bertingkattidak,$betontidak,$luas,$alamat,
										$tanggaldokumen,$nomordokumen,$tahunbulanmulai,$nomorkodetanah,$nilaikontrak,$asalusulpembiayaan,
										$statustanah,$keterangan);
			redirect('staff_bpkad/arsip_kibf');
		}

		function hapus_arsip_kibf($id_aset)
		{
			$this->sb->delete_arsip_kibf($id_aset);
			echo json_encode(array("status" => TRUE));
		}

		function get_imagef()
		{
			$id=$this->uri->segment(3);
			$get_db=$this->sb->download_foto_kibf(decrypt_url($id));
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
			$get_db=$this->sb->download_kontrak_kibf(decrypt_url($id));
			$q=$get_db->row_array();
			$file=$q['kontrak'];
			$path='./assets/berkas/KIB F/'.$file;
			$data = file_get_contents($path);
			$name = $file;
			force_download($name, $data);
		}

		function view_download_kibf()
		{
			$data['download']=$this->sb->get_list_downloadf();

			$this->load->view('Staff_bpkad/header');
			$this->load->view('Staff_bpkad/arsip/excel_kibf',$data);
			$this->load->view('Staff_bpkad/footer');
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
		$excel->getActiveSheet()->mergeCells('A1:M1'); // Set Merge Cell pada kolom A1 sampai E1
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
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		
		$kodelokasi=$this->uri->segment(3);
		$list = $this->sb->download_kiba($kodelokasi);
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
		$excel->getActiveSheet()->mergeCells('A1:P1'); // Set Merge Cell pada kolom A1 sampai E1
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
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		
		$kodelokasi=$this->uri->segment(3);
		$list = $this->sb->download_kibb($kodelokasi);
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
		$excel->getActiveSheet()->mergeCells('A1:Q1'); // Set Merge Cell pada kolom A1 sampai E1
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
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		
		$kodelokasi=$this->uri->segment(3);
		$list = $this->sb->download_kibc($kodelokasi);
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
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(25); 
		
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
		$excel->getActiveSheet()->mergeCells('A1:Q1'); // Set Merge Cell pada kolom A1 sampai E1
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
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		
		$kodelokasi=$this->uri->segment(3);
		$list = $this->sb->download_kibd($kodelokasi);
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
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(18); 
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); 
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(30); 
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(15); 
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(25); 
		
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
		$excel->getActiveSheet()->mergeCells('A1:L1'); // Set Merge Cell pada kolom A1 sampai E1
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
		$excel->getActiveSheet()->mergeCells('A3:A4');
		$excel->getActiveSheet()->mergeCells('B3:B4');
		$excel->getActiveSheet()->mergeCells('C3:D3');
		$excel->getActiveSheet()->mergeCells('E3:F3');
		$excel->getActiveSheet()->mergeCells('G3:H3');
		$excel->getActiveSheet()->mergeCells('I3:I4');
		$excel->getActiveSheet()->mergeCells('J3:J4');
		$excel->getActiveSheet()->mergeCells('K3:K4');
		$excel->getActiveSheet()->mergeCells('L3:L4');
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
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		
		$kodelokasi=$this->uri->segment(3);
		$list = $this->sb->download_kibe($kodelokasi);
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
		$excel->getActiveSheet()->mergeCells('A1:P1'); // Set Merge Cell pada kolom A1 sampai E1
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
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		
		$kodelokasi=$this->uri->segment(3);
		$list = $this->sb->download_kibf($kodelokasi);
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
