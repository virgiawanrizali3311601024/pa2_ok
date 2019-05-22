<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabid_model extends CI_Model {

	//var $table 		= 'kib_b';
	var $column_order_kiba	= array(null,'nama_aset','kode_aset','register','luas','tahun_pengadaan',
							'alamat','status_tanah','tanggal_sertifikat','nomor_sertifikat','asal_usul','harga',
							'kondisi','keterangan','foto_fisik','kontrak','kode_lokasi');
	var $column_order_kibb	= array(null,'kode_aset','register','nama_aset','merk','ukuran','bahan','tahun_pengadaan',
							'lokasi','pabrik','no_rangka','no_mesin','no_polisi','bpkb','asal_usul','penggunaan',
							'harga','kondisi','keterangan','kode_lokasi','foto_fisik','kontrak','qrcode');
	var $column_order_kibc	= array(null,'nama_aset','kode_aset','register','kondisi','bertingkat',
							'beton_tidak','luas_lantai','tahun_pengadaan','alamat','nomor_dokumen_gedung','tanggal_dokumen',
							'status_tanah','nomor_kode_tanah','luas_tanah','asal_usul','harga','keterangan',
							'foto_fisik','kontrak','kode_lokasi');
	var $column_order_kibd	= array(null,'nama_aset','kode_aset','register','konstruksi','panjang','lebar','luas',
							'alamat','tahun_pengadaan','tanggal_dokumen','nomor_dokumen','status_tanah','nomor_kode_tanah',
							'asal_usul','harga','kondisi','keterangan','foto_fisik','kontrak','kode_lokasi');
	var $column_order_kibe	= array(null,'nama_aset','kode_aset','register','judul_buku','spesifikasi_buku','tahun_pengadaan',
							'nomor_dokumen','tanggal_dokumen','asal_usul','harga','kondisi','keterangan','foto_fisik',
							'kontrak','kode_lokasi');
	var $column_order_kibf	= array(null,'nama_aset','kode_aset','bangunan','bertingkat_tidak','beton_tidak','luas',
							'alamat','tanggal_dokumen','nomor_dokumen','tahun_bulan_mulai','nomor_kode_tanah','nilai_kontrak',
							'asal_usul_pembiayaan','status_tanah','keterangan','foto_fisik','kontrak','kode_lokasi');
	


	var $column_search_kiba	= array('nama_aset','kode_aset','register','luas','tahun_pengadaan',
							'alamat','status_tanah','tanggal_sertifikat','nomor_sertifikat','asal_usul','harga',
							'kondisi','keterangan','kib_a.kode_lokasi');
	var $column_search_kibb	= array('kode_aset','register','nama_aset','merk','ukuran','bahan','tahun_pengadaan',
							'lokasi','pabrik','no_rangka','no_mesin','no_polisi','bpkb','asal_usul','penggunaan',
							'harga','kondisi','keterangan','kib_b.kode_lokasi');
	var $column_search_kibc	= array('nama_aset','kode_aset','register','kondisi','bertingkat',
							'beton_tidak','luas_lantai','tahun_pengadaan','alamat','nomor_dokumen_gedung','tanggal_dokumen',
							'status_tanah','nomor_kode_tanah','luas_tanah','asal_usul','harga','keterangan',
							'kib_c.kode_lokasi');
	var $column_search_kibd	= array('nama_aset','kode_aset','register','konstruksi','panjang','lebar','luas',
							'alamat','tahun_pengadaan','tanggal_dokumen','nomor_dokumen','status_tanah','nomor_kode_tanah',
							'asal_usul','harga','kondisi','keterangan','kib_d.kode_lokasi');
	var $column_search_kibe	= array('nama_aset','kode_aset','register','judul_buku','spesifikasi_buku','tahun_pengadaan',
							'nomor_dokumen','tanggal_dokumen','asal_usul','harga','kondisi','keterangan',
							'kib_e.kode_lokasi');
	var $column_search_kibf	= array('nama_aset','kode_aset','bangunan','bertingkat_tidak','beton_tidak','luas','alamat',
							'tanggal_dokumen','nomor_dokumen','tahun_bulan_mulai','nomor_kode_tanah','nilai_kontrak',
							'asal_usul_pembiayaan','status_tanah','keterangan','kib_f.kode_lokasi');
	var $order				= array('id_aset' => 'desc');

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query_kiba()
	{
		//add custom filter here
		if($this->input->post('tahun_pengadaan'))
		{
			$this->db->where('tahun_pengadaan', $this->input->post('tahun_pengadaan'));
		}
		if($this->input->post('harga_rendah') && $this->input->post('harga_tinggi'))
		{
			//gagal $this->db->where('asal_usul between', $this->input->post('harga_rendah') and $this->input->post('harga_tinggi'));
			$this->db->where('asal_usul >=',$this->input->post('harga_rendah'));
			$this->db->where('asal_usul <=',$this->input->post('harga_tinggi'));
		}
		if($this->input->post('kode_lokasi'))
		{
			$this->db->where('kib_a.kode_lokasi', $this->input->post('kode_lokasi'));
		}		

		$this->db->from('kib_a');
		$this->db->where('status', 'disetujui');

		$i = 0;
	
		foreach ($this->column_search_kiba as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search_kiba) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_kiba[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	private function _get_datatables_query_kibb()
	{
		//add custom filter here
		if($this->input->post('tahun_pengadaan'))
		{
			$this->db->where('tahun_pengadaan', $this->input->post('tahun_pengadaan'));
		}
		if($this->input->post('harga_rendah') && $this->input->post('harga_tinggi'))
		{
			//gagal $this->db->where('asal_usul between', $this->input->post('harga_rendah') and $this->input->post('harga_tinggi'));
			$this->db->where('asal_usul >=',$this->input->post('harga_rendah'));
			$this->db->where('asal_usul <=',$this->input->post('harga_tinggi'));
		}	
		if($this->input->post('kode_lokasi'))
		{
			$this->db->where('kib_b.kode_lokasi', $this->input->post('kode_lokasi'));
		}	

		$this->db->from('kib_b');
		$this->db->where('status', 'disetujui');
		$i = 0;
	
		foreach ($this->column_search_kibb as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search_kibb) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_kibb[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	private function _get_datatables_query_kibc()
	{
		//add custom filter here
		if($this->input->post('tahun_pengadaan'))
		{
			$this->db->where('tahun_pengadaan', $this->input->post('tahun_pengadaan'));
		}
		if($this->input->post('harga_rendah') && $this->input->post('harga_tinggi'))
		{
			//gagal $this->db->where('asal_usul between', $this->input->post('harga_rendah') and $this->input->post('harga_tinggi'));
			$this->db->where('asal_usul >=',$this->input->post('harga_rendah'));
			$this->db->where('asal_usul <=',$this->input->post('harga_tinggi'));
		}
		if($this->input->post('kode_lokasi'))
		{
			$this->db->where('kib_c.kode_lokasi', $this->input->post('kode_lokasi'));
		}
		

		$this->db->from('kib_c');
		$this->db->where('status', 'disetujui');
		$i = 0;
	
		foreach ($this->column_search_kibc as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search_kibc) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_kibc[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	private function _get_datatables_query_kibd()
	{
		//add custom filter here
		if($this->input->post('tahun_pengadaan'))
		{
			$this->db->where('tahun_pengadaan', $this->input->post('tahun_pengadaan'));
		}
		if($this->input->post('harga_rendah') && $this->input->post('harga_tinggi'))
		{
			//gagal $this->db->where('asal_usul between', $this->input->post('harga_rendah') and $this->input->post('harga_tinggi'));
			$this->db->where('asal_usul >=',$this->input->post('harga_rendah'));
			$this->db->where('asal_usul <=',$this->input->post('harga_tinggi'));
		}
		if($this->input->post('kode_lokasi'))
		{
			$this->db->where('kib_d.kode_lokasi', $this->input->post('kode_lokasi'));
		}
		

		$this->db->from('kib_d');
		$this->db->where('status', 'disetujui');
		$i = 0;
	
		foreach ($this->column_search_kibd as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search_kibd) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_kibd[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	private function _get_datatables_query_kibe()
	{
		//add custom filter here
		if($this->input->post('tahun_pengadaan'))
		{
			$this->db->where('tahun_pengadaan', $this->input->post('tahun_pengadaan'));
		}
		if($this->input->post('harga_rendah') && $this->input->post('harga_tinggi'))
		{
			//gagal $this->db->where('asal_usul between', $this->input->post('harga_rendah') and $this->input->post('harga_tinggi'));
			$this->db->where('harga >=',$this->input->post('harga_rendah'));
			$this->db->where('harga <=',$this->input->post('harga_tinggi'));
		}
		if($this->input->post('kode_lokasi'))
		{
			$this->db->where('kib_e.kode_lokasi', $this->input->post('kode_lokasi'));
		}
		

		$this->db->from('kib_e');
		$this->db->where('status', 'disetujui');
		$i = 0;
	
		foreach ($this->column_search_kibe as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search_kibe) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_kibe[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	private function _get_datatables_query_kibf()
	{
		//add custom filter here
		if($this->input->post('tahun_pengadaan'))
		{
			$this->db->where('tahun_pengadaan', $this->input->post('tahun_pengadaan'));
		}
		if($this->input->post('harga_rendah') && $this->input->post('harga_tinggi'))
		{
			//gagal $this->db->where('asal_usul between', $this->input->post('harga_rendah') and $this->input->post('harga_tinggi'));
			$this->db->where('asal_usul >=',$this->input->post('harga_rendah'));
			$this->db->where('asal_usul <=',$this->input->post('harga_tinggi'));
		}
		if($this->input->post('kode_lokasi'))
		{
			$this->db->where('kib_f.kode_lokasi', $this->input->post('kode_lokasi'));
		}
		

		$this->db->from('kib_f');
		$this->db->where('status', 'disetujui');
		$i = 0;
	
		foreach ($this->column_search_kibf as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search_kibf) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_kibf[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	



	function count_filtered_kiba()
	{
		$this->_get_datatables_query_kiba();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_filtered_kibb()
	{
		$this->_get_datatables_query_kibb();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_filtered_kibc()
	{
		$this->_get_datatables_query_kibc();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_filtered_kibd()
	{
		$this->_get_datatables_query_kibd();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_filtered_kibe()
	{
		$this->_get_datatables_query_kibe();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_filtered_kibf()
	{
		$this->_get_datatables_query_kibf();
		$query = $this->db->get();
		return $query->num_rows();
	}





	function count_all_kiba()
	{
		$this->db->from('kib_a');
		return $this->db->count_all_results();
	}

	function count_all_kibb()
	{
		$this->db->from('kib_b');
		return $this->db->count_all_results();
	}

	function count_all_kibc()
	{
		$this->db->from('kib_c');
		return $this->db->count_all_results();
	}

	function count_all_kibd()
	{
		$this->db->from('kib_d');
		return $this->db->count_all_results();
	}

	function count_all_kibe()
	{
		$this->db->from('kib_e');
		return $this->db->count_all_results();
	}

	function count_all_kibf()
	{
		$this->db->from('kib_f');
		return $this->db->count_all_results();
	}





	function get_datatables_kiba()
	{
		$this->_get_datatables_query_kiba();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function get_datatables_kibb()
	{
		$this->_get_datatables_query_kibb();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function get_datatables_kibc()
	{
		$this->_get_datatables_query_kibc();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function get_datatables_kibd()
	{
		$this->_get_datatables_query_kibd();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function get_datatables_kibe()
	{
		$this->_get_datatables_query_kibe();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function get_datatables_kibf()
	{
		$this->_get_datatables_query_kibf();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}





	function get_list_skpd()
	{
		$this->db->select('user.kode_lokasi, skpd.*');
		$this->db->from('user');
		$this->db->join('skpd', 'user.kode_lokasi = skpd.kode_lokasi ');
		$query = $this->db->group_by('skpd.kode_lokasi');
		$query = $this->db->get();
		return $query->result();

		//$this->db->select('skpd.*, kib_a.kode_lokasi');
		//$this->db->from('skpd');
		//$this->db->join('kib_a', 'skpd.kode_lokasi = kib_a.kode_lokasi ');
		//$query = $this->db->get();
		//return $query->result();
	}





	function get_list_downloada()
	{
		$this->db->select('kib_a.*, skpd.*');
		$this->db->from('kib_a');
		$this->db->join('skpd', 'kib_a.kode_lokasi = skpd.kode_lokasi ');
		$this->db->where('kib_a.status', 'disetujui');
		$this->db->order_by('kib_a.kode_lokasi', 'asc');
		$query = $this->db->group_by('kib_a.kode_lokasi');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_downloadb()
	{
		$this->db->select('kib_b.*, skpd.*');
		$this->db->from('kib_b');
		$this->db->join('skpd', 'kib_b.kode_lokasi = skpd.kode_lokasi ');
		$this->db->join('user', 'kib_b.kode_lokasi = user.kode_lokasi ');
		$this->db->where('kib_b.status', 'disetujui');
		$this->db->order_by('kib_b.kode_lokasi', 'asc');
		$query = $this->db->group_by('kib_b.kode_lokasi');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_downloadc()
	{
		$this->db->select('kib_c.*, skpd.*');
		$this->db->from('kib_c');
		$this->db->join('skpd', 'kib_c.kode_lokasi = skpd.kode_lokasi ');
		$this->db->join('user', 'kib_c.kode_lokasi = user.kode_lokasi ');
		$this->db->where('kib_c.status', 'disetujui');
		$this->db->order_by('kib_c.kode_lokasi', 'asc');
		$query = $this->db->group_by('kib_c.kode_lokasi');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_downloadd()
	{
		$this->db->select('kib_d.*, skpd.*');
		$this->db->from('kib_d');
		$this->db->join('skpd', 'kib_d.kode_lokasi = skpd.kode_lokasi ');
		$this->db->join('user', 'kib_d.kode_lokasi = user.kode_lokasi ');
		$this->db->where('user.nip', $this->session->userdata('nip'));
		$this->db->where('kib_d.status', 'disetujui');
		$this->db->order_by('kib_d.kode_lokasi', 'asc');
		$query = $this->db->group_by('kib_d.kode_lokasi');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_downloade()
	{
		$this->db->select('kib_e.*, skpd.*');
		$this->db->from('kib_e');
		$this->db->join('skpd', 'kib_e.kode_lokasi = skpd.kode_lokasi ');
		$this->db->join('user', 'kib_e.kode_lokasi = user.kode_lokasi ');
		$this->db->where('kib_e.status', 'disetujui');
		$this->db->order_by('kib_e.kode_lokasi', 'asc');
		$query = $this->db->group_by('kib_e.kode_lokasi');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_downloadf()
	{
		$this->db->select('kib_f.*, skpd.*');
		$this->db->from('kib_f');
		$this->db->join('skpd', 'kib_f.kode_lokasi = skpd.kode_lokasi ');
		$this->db->join('user', 'kib_f.kode_lokasi = user.kode_lokasi ');
		$this->db->where('kib_f.status', 'disetujui');
		$this->db->order_by('kib_f.kode_lokasi', 'asc');
		$query = $this->db->group_by('kib_f.kode_lokasi');
		$query = $this->db->get();
		return $query->result();
	}
	




	function get_list_tahun_kiba()
	{
		$this->db->select('tahun_pengadaan');
		$this->db->from('kib_a');
		$this->db->where('status', 'disetujui');
		$this->db->order_by('tahun_pengadaan', 'asc');
		$query = $this->db->group_by('tahun_pengadaan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_tahun_kibb()
	{
		$this->db->select('tahun_pengadaan');
		$this->db->from('kib_b');
		$this->db->where('status', 'disetujui');
		$this->db->order_by('tahun_pengadaan', 'asc');
		$query = $this->db->group_by('tahun_pengadaan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_tahun_kibc()
	{
		$this->db->select('tahun_pengadaan');
		$this->db->from('kib_c');
		$this->db->where('status', 'disetujui');
		$this->db->order_by('tahun_pengadaan', 'asc');
		$query = $this->db->group_by('tahun_pengadaan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_tahun_kibd()
	{
		$this->db->select('tahun_pengadaan');
		$this->db->from('kib_d');
		$this->db->where('status', 'disetujui');
		$this->db->order_by('tahun_pengadaan', 'asc');
		$query = $this->db->group_by('tahun_pengadaan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_tahun_kibe()
	{
		$this->db->select('tahun_pengadaan');
		$this->db->from('kib_e');
		$this->db->where('status', 'disetujui');
		$this->db->order_by('tahun_pengadaan', 'asc');
		$query = $this->db->group_by('tahun_pengadaan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_tahun_kibf()
	{
		$this->db->select('tahun_bulan_mulai');
		$this->db->from('kib_f');
		$this->db->where('status', 'disetujui');
		$this->db->order_by('tahun_bulan_mulai', 'asc');
		$query = $this->db->group_by('tahun_bulan_mulai');
		$query = $this->db->get();
		return $query->result();
	}





	function get_id_kiba($idaset)
	{
		$this->db->from('kib_a');
		$this->db->where('id_aset',$idaset);
		$query = $this->db->get();

		return $query;
	}

	function get_id_kibb($idaset)
	{

		$this->db->from('kib_b');
		$this->db->where('id_aset',$idaset);
		$query = $this->db->get();

		return $query;
	}

	function get_id_kibc($idaset)
	{
		$this->db->from('kib_c');
		$this->db->where('id_aset',$idaset);
		$query = $this->db->get();

		return $query;
	}

	function get_id_kibd($idaset)
	{
		$this->db->from('kib_d');
		$this->db->where('id_aset',$idaset);
		$query = $this->db->get();

		return $query;
	}

	function get_id_kibe($idaset)
	{
		$this->db->from('kib_e');
		$this->db->where('id_aset',$idaset);
		$query = $this->db->get();

		return $query;
	}

	function get_id_kibf($idaset)
	{
		$this->db->from('kib_f');
		$this->db->where('id_aset',$idaset);
		$query = $this->db->get();

		return $query;
	}




	function download_foto_kiba($id)
	{
		$hsl=$this->db->query("SELECT foto_fisik AS foto FROM kib_a WHERE id_aset='$id'");
		return $hsl;
	}

	function download_foto_kibb($id)
	{
		$hsl=$this->db->query("SELECT foto_fisik AS foto FROM kib_b WHERE id_aset='$id'");
		return $hsl;
	}

	function download_foto_kibc($id)
	{
		$hsl=$this->db->query("SELECT foto_fisik AS foto FROM kib_c WHERE id_aset='$id'");
		return $hsl;
	}

	function download_foto_kibd($id)
	{
		$hsl=$this->db->query("SELECT foto_fisik AS foto FROM kib_d WHERE id_aset='$id'");
		return $hsl;
	}

	function download_foto_kibe($id)
	{
		$hsl=$this->db->query("SELECT foto_fisik AS foto FROM kib_e WHERE id_aset='$id'");
		return $hsl;
	}

	function download_foto_kibf($id)
	{
		$hsl=$this->db->query("SELECT foto_fisik AS foto FROM kib_f WHERE id_aset='$id'");
		return $hsl;
	}





	function download_kontrak_kiba($id)
	{
		$hsl=$this->db->query("SELECT kontrak AS kontrak FROM kib_a WHERE id_aset='$id'");
		return $hsl;
	}

	function download_kontrak_kibb($id)
	{
		$hsl=$this->db->query("SELECT kontrak AS kontrak FROM kib_b WHERE id_aset='$id'");
		return $hsl;
	}

	function download_kontrak_kibc($id)
	{
		$hsl=$this->db->query("SELECT kontrak AS kontrak FROM kib_c WHERE id_aset='$id'");
		return $hsl;
	}

	function download_kontrak_kibd($id)
	{
		$hsl=$this->db->query("SELECT kontrak AS kontrak FROM kib_d WHERE id_aset='$id'");
		return $hsl;
	}

	function download_kontrak_kibe($id)
	{
		$hsl=$this->db->query("SELECT kontrak AS kontrak FROM kib_e WHERE id_aset='$id'");
		return $hsl;
	}

	function download_kontrak_kibf($id)
	{
		$hsl=$this->db->query("SELECT kontrak AS kontrak FROM kib_f WHERE id_aset='$id'");
		return $hsl;
	}





	function download_kiba($kodelokasi)
	{
		if($kodelokasi)
		{
			$this->db->where('kib_a.kode_lokasi', $kodelokasi);
		}

		$this->db->from('kib_a');
		$this->db->join('skpd', 'kib_a.kode_lokasi = skpd.kode_lokasi');
		$this->db->where('status', 'disetujui');
		$this->db->order_by('nama_aset', 'asc');
		$query = $this->db->get();
		return $query->result();		
	}

	function download_kibb($kodelokasi)
	{
		if($kodelokasi)
		{
			$this->db->where('kib_b.kode_lokasi', $kodelokasi);
		}
		
		$this->db->from('kib_b');
		$this->db->join('skpd', 'kib_b.kode_lokasi = skpd.kode_lokasi');
		$this->db->where('status', 'disetujui');
		$this->db->order_by('nama_aset', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function download_kibc($kodelokasi)
	{
		if($kodelokasi)
		{
			$this->db->where('kib_c.kode_lokasi', $kodelokasi);
		}
		
		$this->db->from('kib_c');
		$this->db->join('skpd', 'kib_c.kode_lokasi = skpd.kode_lokasi');
		$this->db->where('status', 'disetujui');
		$this->db->order_by('nama_aset', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function download_kibd($kodelokasi)
	{
		if($kodelokasi)
		{
			$this->db->where('kib_d.kode_lokasi', $kodelokasi);
		}
		
		$this->db->from('kib_d');
		$this->db->join('skpd', 'kib_d.kode_lokasi = skpd.kode_lokasi');
		$this->db->where('status', 'disetujui');
		$this->db->order_by('nama_aset', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function download_kibe($kodelokasi)
	{
		if($kodelokasi)
		{
			$this->db->where('kib_e.kode_lokasi', $kodelokasi);
		}
		
		$this->db->from('kib_e');
		$this->db->join('skpd', 'kib_e.kode_lokasi = skpd.kode_lokasi');
		$this->db->where('status', 'disetujui');
		$this->db->order_by('nama_aset', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function download_kibf()
	{
		if($kodelokasi)
		{
			$this->db->where('kib_f.kode_lokasi', $kodelokasi);
		}
		$this->db->from('kib_f');
		$this->db->join('skpd', 'kib_f.kode_lokasi = skpd.kode_lokasi');
		$this->db->where('status', 'disetujui');
		$this->db->order_by('nama_aset', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

}
