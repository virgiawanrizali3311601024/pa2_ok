<?php
class Login extends CI_Controller {

  function __construct(){

    parent::__construct();

    $this->load->helper('form');
    $this->load->model('login_model','login');
  }

  function index(){

    $this->load->view('form_login');
  }

  function proseslogin(){

    $nip=$this->input->post('nip');
    $pass=md5($this->input->post('password'));

    $ceklogin=$this->login->ceklogin($nip,$pass);

    if($ceklogin){
      foreach($ceklogin as $row)
      $this->session->set_userdata('nip',$row->nip);
      $this->session->set_userdata('tipe_user',$row->tipe_user);
      $this->session->set_userdata('kode_lokasi',$row->kode_lokasi);
      $this->session->set_userdata('nama',$row->nama);

      if($this->session->userdata('tipe_user')=="ketua"){
        redirect('Kabid/arsip_kibb');
      }elseif($this->session->userdata('tipe_user')=="staff bpkad"){
        redirect('Staff_bpkad/masukan_kibb');
      }elseif($this->session->userdata('tipe_user')=="pengurus barang"){
        redirect('Pengurus_barang/Input_kibb');
      }elseif($this->session->userdata('tipe_user')=="admin"){
        redirect('admin/ks_bpkad');
      }else{
        $data['pesan']="Anda Bukan Pengguna Aplikasi Pembukuan, Silahkan Hubungi Staff BPKAD.";
        $this->load->view('form_login',$data);
      }
    }else{
      $data['pesan']="Nip atau Password tidak sesuai.";
      $this->load->view('form_login',$data);
      redirect('http://localhost/pa2_ok/');
    }
  }//end function proseslogin

  function logout(){

    $this->session->sess_destroy();
    redirect('http://localhost/pa2_ok/');
  }

}//end controller
?>
