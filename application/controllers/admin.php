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
}
?>