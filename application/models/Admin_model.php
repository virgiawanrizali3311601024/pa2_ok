<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function update_pass($data)
	{
		$this->db->set($data);
		$this->db->where('nip', $this->session->userdata('nip'));
		$this->db->update('user');
		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	function check_passwordlama($pass_lama)
	{
		$this->db->where('nip', $this->session->userdata('nip'));
		$this->db->where('password', md5($pass_lama));
		$query = $this->db->get('user');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}

    function get_list_user()
	{
		$kecuali= array('admin');
		$this->db->from('user');
		$this->db->where_not_in('tipe_user', $kecuali);
		$query = $this->db->get();
		return $query->result();
	}
	
	function list_kodelokasi()
	{
		$this->db->from('skpd');
		$this->db->order_by('kode_lokasi', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function add_user($nip,$hakakses,$password,$nama,$kodelokasi)
	{
		$data = array (
			'nip' => $nip,
			'tipe_user' => $hakakses,
			'password' => $password,
			'nama' => $nama,
			'kode_lokasi' => $kodelokasi
		);
		return $this->db->insert('user', $data);
	}

	function update_user($niplama,$nip,$nama,$tipeuser,$kodelokasi,$kodelokasilama)
	{
		//$all=$this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
		$data = array(
			'nip'	=> $nip,
			'nama'	=> $nama,
			'tipe_user'	=>$tipeuser,
			'kode_lokasi'	=>$kodelokasi
		);
		$this->db->where('nip', $niplama);
		$this->db->where('kode_lokasi', $kodelokasilama);
		return $this->db->update('user',$data);
	}

	function delete_user($nip,$kodelokasi)
	{
		$this->db->where('nip', $nip);
		$this->db->where('kode_lokasi', $kodelokasi);
		$this->db->delete('user');
	}

	function get_nip_user($nip,$kodelokasi)
	{
		$this->db->from('user');
		$this->db->where('nip', $nip);
		$this->db->where('kode_lokasi', $kodelokasi);
		$query = $this->db->get();
		return $query;
	}

	function get_list_all()
	{
		$this->db->from('user');
		$query = $this->db->group_by('tipe_user');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_kodelokasi()
	{
		$this->db->from('skpd');
		$this->db->order_by('nama_skpd', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

}
