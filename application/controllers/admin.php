<?php
class Admin extends CI_Controller {

	function __construct()
	{
    parent::__construct();
        
		$this->load->model('Admin_model','am');
		if($this->session->userdata('tipe_user')!="admin"){
			redirect('login/index');
        }
  }

  function index()
	{
		$data_nama['nama'] = $this->session->userdata('nama');
		$data_nama['nip'] = $this->session->userdata('nip');
		$data_nama['kodelokasi'] = $this->session->userdata('kode_lokasi');
		$this->load->view('admin/header',$data_nama);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
  }
    
  function ks_bpkad()
  {
		$data['user']=$this->am->get_list_user();
		//$data['all_tahun']=$this->am->get_list_tahun_kiba();

		$this->load->view('admin/header');
		$this->load->view('admin/user/staff-bpkad',$data);
		$this->load->view('admin/footer');
	}

	function tambah_user()
  {
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tipe_user', 'Hak Akses', 'trim|required');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]',[
			'matches' => 'Password Tidak Sama!',
			'min_length' => 'Password Terlalu Pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[6]|matches[password1]');
	
		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST['tambah']))
			{
				$nip = $this->input->post('nip', TRUE);
				$nama = $this->input->post('nama', TRUE);
				$hakakses = $this->input->post('tipe_user', TRUE);
				$checkbox = $this->input->post('kode_lokasi', TRUE);
				$password = (md5($this->input->post('password1', TRUE)));
				for($i=0;$i<count($checkbox);$i++)
				{
					$kodelokasi=$checkbox[$i];
					$this->am->add_user($nip,$hakakses,$password,$nama,$kodelokasi);
				}
				$this->session->set_flashdata('succses','Data berhasil ditambahkan.');
				redirect('admin/index');
			}

			
		}

		$data['kodelokasi']=$this->am->list_kodelokasi();

		$this->load->view('admin/header-cadangan');
		$this->load->view('admin/user/tambah-user',$data);
		$this->load->view('admin/footer');
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
			
			$result = $this->am->check_passwordlama($this->input->post('pass_lama', TRUE));
			
			if($result > 0 AND $result === true ){

				$result1 = $this->am->update_pass($data);

				if($result1 > 0){
					$this->session->set_flashdata('succses', 'Password berhasil diupdate.');
					return redirect('admin/gantipassword');
				}else{
					$this->session->set_flashdata('error', '<b>Error: </b>Password tidak berhasil diupdate.');
					return redirect('admin/gantipassword');
				}
			}else{
				$this->session->set_flashdata('error', '<b>Error: </b>Password lama tidak benar.');
				return redirect('admin/gantipassword');
			}	
		}

		$this->load->view('admin/header');
		$this->load->view('admin/v_gantipassword');
		$this->load->view('admin/footer');
	}

	function hapus_user()
	{
		$nip = $this->uri->segment(3);
		$kodelokasi = $this->uri->segment(4);
		$this->am->delete_user($nip,$kodelokasi);

		$this->session->set_flashdata('succses','Data berhasil dihapus.');
		redirect('admin/ks_bpkad');
		
	}

	function edit_user()
	{
		$this->form_validation->set_rules('nip', 'Nip', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tipe_user', 'Hak Akses', 'trim|required');
		$this->form_validation->set_rules('kode_lokasi', 'Kode Lokasi', 'trim|required');
	
		if($this->form_validation->run() == TRUE)
		{
			$niplama = $this->input->post('niplama');
			$nip = $this->input->post('nip', TRUE);
			$nama = $this->input->post('nama', TRUE);
			$tipeuser = $this->input->post('tipe_user', TRUE);
			$kodelokasi = $this->input->post('kode_lokasi', TRUE);
			$kodelokasilama = $this->input->post('kode_lokasilama', TRUE);

			$this->am->update_user($niplama,$nip,$nama,$tipeuser,$kodelokasi,$kodelokasilama);

			$this->session->set_flashdata('succses','Data yang anda Update berhasil.');
			redirect('admin/ks_bpkad');
		}	

		$nip=$this->uri->segment(3);	
		$kodelokasi=$this->uri->segment(4);		
		$data['output']=$this->am->get_nip_user($nip, $kodelokasi);
		$data['akses']=$this->am->get_list_all();
		$data['kodelokasi']=$this->am->get_list_kodelokasi();

		$this->load->view('admin/header');
		$this->load->view('admin/user/vedit-user', $data);
		$this->load->view('admin/footer');
	}
	
	function ss_kel(){
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		if ($this->input->post('importfile')) {
            $path = ROOT_UPLOAD_IMPORT_PATH;
 
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls|jpg|png';
            $config['remove_spaces'] = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            
            if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
            }
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            
            $arrayCount = count($allDataInSheet);
            $flag = 0;
            $createArray = array('gol','bid','kel','s_kel','ss_kel','kd_aset','nm_aset');
            $makeArray = array('gol' => 'gol', 'bid' => 'bid', 'kel' => 'kel', 's_kel' => 's_kel', 'ss_kel' => 'ss_kel', 'kd_aset' => 'kd_aset', 'nm_aset' => 'nm_aset');
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    } else {
                        
                    }
                }
            }
            $data = array_diff_key($makeArray, $SheetDataKey);
           
            if (empty($data)) {
                $flag = 1;
            }
            if ($flag == 1) {
                for ($i = 2; $i <= $arrayCount; $i++) {
                    $addresses = array();
                    $gol = $SheetDataKey['gol'];
                    $bid = $SheetDataKey['bid'];
                    $kel = $SheetDataKey['kel'];
                    $s_kel = $SheetDataKey['s_kel'];
					$ss_kel = $SheetDataKey['ss_kel'];
					$kd_aset = $SheetDataKey['kd_aset'];
					$nm_aset = $SheetDataKey['nm_aset'];
                    $gol = filter_var(trim($allDataInSheet[$i][$gol]), FILTER_SANITIZE_STRING);
                    $bid = filter_var(trim($allDataInSheet[$i][$bid]), FILTER_SANITIZE_STRING);
                    $kel = filter_var(trim($allDataInSheet[$i][$kel]), FILTER_SANITIZE_STRING);
                    $s_kel = filter_var(trim($allDataInSheet[$i][$s_kel]), FILTER_SANITIZE_STRING);
					$ss_kel = filter_var(trim($allDataInSheet[$i][$ss_kel]), FILTER_SANITIZE_STRING);
					$kd_aset = filter_var(trim($allDataInSheet[$i][$kd_aset]), FILTER_SANITIZE_STRING);
					$nm_aset = filter_var(trim($allDataInSheet[$i][$nm_aset]), FILTER_SANITIZE_STRING);
                    $fetchData[] = array('gol' => $gol, 'bid' => $bid, 'kel' => $kel, 's_kel' => $s_kel, 'ss_kel' => $ss_kel, 'kd_set' => $kd_set, 'nm_aset' => $nm_aset);
                }              
                $data['data_aset'] = $fetchData;
                $this->import->setBatchImport($fetchData);
                $this->import->importData();
            } else {
                echo "Please import correct file";
            }
        }
        $this->load->view('import/display', $data);
        
    }
	}
}
?>