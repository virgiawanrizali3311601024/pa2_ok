<?php
class Login_model extends CI_Model {

	function ceklogin($nip,$pass)
	{
		$this->db->select('nip,tipe_user,password,nama,kode_lokasi');
		$this->db->from('user');
		$this->db->where('nip',$nip);
		$this->db->where('password', $pass);
		$this->db->limit(1);

		$query=$this->db->get();

		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}

}
