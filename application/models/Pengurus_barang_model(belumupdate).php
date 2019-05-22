<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus_barang_model extends CI_Model {

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
							'kondisi','keterangan','kode_lokasi');
	var $column_search_kibb	= array('kode_aset','register','nama_aset','merk','ukuran','bahan','tahun_pengadaan',
							'lokasi','pabrik','no_rangka','no_mesin','no_polisi','bpkb','asal_usul','penggunaan',
							'harga','kondisi','keterangan','kode_lokasi');
	var $column_search_kibc	= array('nama_aset','kode_aset','register','kondisi','bertingkat',
							'beton_tidak','luas_lantai','tahun_pengadaan','alamat','nomor_dokumen_gedung','tanggal_dokumen',
							'status_tanah','nomor_kode_tanah','luas_tanah','asal_usul','harga','keterangan',
							'kode_lokasi');
	var $column_search_kibd	= array('nama_aset','kode_aset','register','konstruksi','panjang','lebar','luas',
							'alamat','tahun_pengadaan','tanggal_dokumen','nomor_dokumen','status_tanah','nomor_kode_tanah',
							'asal_usul','harga','kondisi','keterangan','kode_lokasi');
	var $column_search_kibe	= array('nama_aset','kode_aset','register','judul_buku','spesifikasi_buku','tahun_pengadaan',
							'nomor_dokumen','tanggal_dokumen','asal_usul','harga','kondisi','keterangan','kode_lokasi');
	var $column_search_kibf	= array('nama_aset','kode_aset','bangunan','bertingkat_tidak','beton_tidak','luas','alamat',
							'tanggal_dokumen','nomor_dokumen','tahun_bulan_mulai','nomor_kode_tanah','nilai_kontrak',
							'asal_usul_pembiayaan','status_tanah','keterangan','kode_lokasi');
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
		if($this->session->userdata('kode_lokasi'))
		{
			$this->db->where('kode_lokasi', $this->session->userdata('kode_lokasi'));
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
		if($this->session->userdata('kode_lokasi'))
		{
			$this->db->where('kode_lokasi', $this->session->userdata('kode_lokasi'));
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
		if($this->session->userdata('kode_lokasi'))
		{
			$this->db->where('kode_lokasi', $this->session->userdata('kode_lokasi'));
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
		if($this->session->userdata('kode_lokasi'))
		{
			$this->db->where('kode_lokasi', $this->session->userdata('kode_lokasi'));
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
		if($this->session->userdata('kode_lokasi'))
		{
			$this->db->where('kode_lokasi', $this->session->userdata('kode_lokasi'));
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
		if($this->session->userdata('kode_lokasi'))
		{
			$this->db->where('kode_lokasi', $this->session->userdata('kode_lokasi'));
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





	function get_list_tahun_kiba()
	{
		$this->db->select('user.kode_lokasi, kib_a.*');
		$this->db->from('user');
		$this->db->join('kib_a', 'user.kode_lokasi = kib_a.kode_lokasi ');
		$this->db->where('nip', $this->session->userdata('nip'));
		$this->db->where('kib_a.status', 'disetujui');
		$this->db->order_by('tahun_pengadaan', 'asc');
		$query = $this->db->group_by('kib_a.tahun_pengadaan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_tahun_kibb()
	{
		$this->db->select('user.kode_lokasi, kib_b.*');
		$this->db->from('user');
		$this->db->join('kib_b', 'user.kode_lokasi = kib_b.kode_lokasi ');
		$this->db->where('nip', $this->session->userdata('nip'));
		$this->db->where('kib_b.status', 'disetujui');
		$this->db->order_by('tahun_pengadaan', 'asc');
		$query = $this->db->group_by('kib_b.tahun_pengadaan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_tahun_kibc()
	{
		$this->db->select('user.kode_lokasi, kib_c.*');
		$this->db->from('user');
		$this->db->join('kib_c', 'user.kode_lokasi = kib_c.kode_lokasi ');
		$this->db->where('nip', $this->session->userdata('nip'));
		$this->db->where('kib_c.status', 'disetujui');
		$this->db->order_by('tahun_pengadaan', 'asc');
		$query = $this->db->group_by('kib_c.tahun_pengadaan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_tahun_kibd()
	{
		$this->db->select('user.kode_lokasi, kib_d.*');
		$this->db->from('user');
		$this->db->join('kib_d', 'user.kode_lokasi = kib_d.kode_lokasi ');
		$this->db->where('nip', $this->session->userdata('nip'));
		$this->db->where('kib_d.status', 'disetujui');
		$this->db->order_by('tahun_pengadaan', 'asc');
		$query = $this->db->group_by('kib_d.tahun_pengadaan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_tahun_kibe()
	{
		$this->db->select('user.kode_lokasi, kib_e.*');
		$this->db->from('user');
		$this->db->join('kib_e', 'user.kode_lokasi = kib_e.kode_lokasi ');
		$this->db->where('nip', $this->session->userdata('nip'));
		$this->db->where('kib_e.status', 'disetujui');
		$this->db->order_by('tahun_pengadaan', 'asc');
		$query = $this->db->group_by('kib_e.tahun_pengadaan');
		$query = $this->db->get();
		return $query->result();
	}

	function get_list_tahun_kibf()
	{
		$this->db->select('user.kode_lokasi, kib_f.*');
		$this->db->from('user');
		$this->db->join('kib_f', 'user.kode_lokasi = kib_f.kode_lokasi ');
		$this->db->where('nip', $this->session->userdata('nip'));
		$this->db->where('kib_f.status', 'disetujui');
		$this->db->order_by('tahun_bulan_mulai', 'asc');
		$query = $this->db->group_by('kib_f.tahun_bulan_mulai');
		$query = $this->db->get();
		return $query->result();
	}





	function get_id_kiba($idaset)
	{
		$this->db->from('kib_a');
		$this->db->where('id_aset',$idaset);
		$query = $this->db->get();

		return $query->row();
	}

	function get_id_kibb($idaset)
	{
		$this->db->from('kib_b');
		$this->db->where('id_aset',$idaset);
		$query = $this->db->get();

		return $query->row();
	}

	function get_id_kibc($idaset)
	{
		$this->db->from('kib_c');
		$this->db->where('id_aset',$idaset);
		$query = $this->db->get();

		return $query->row();
	}

	function get_id_kibd($idaset)
	{
		$this->db->from('kib_d');
		$this->db->where('id_aset',$idaset);
		$query = $this->db->get();

		return $query->row();
	}

	function get_id_kibe($idaset)
	{
		$this->db->from('kib_e');
		$this->db->where('id_aset',$idaset);
		$query = $this->db->get();

		return $query->row();
	}

	function get_id_kibf($idaset)
	{
		$this->db->from('kib_f');
		$this->db->where('id_aset',$idaset);
		$query = $this->db->get();

		return $query->row();
	}





	function download_kiba()
	{
		if($this->input->post('tahun_pengadaan'))
		{
			$this->db->where('tahun_pengadaan', $this->input->post('tahun_pengadaan'));
		}
		
		$this->db->where('kode_lokasi',$this->session->userdata('kode_lokasi'));
		$this->db->from('kib_a');
		$query = $this->db->get();
		return $query->result();
	}

	function download_kibb()
	{
		if($this->input->post('tahun_pengadaan'))
		{
			$this->db->where('tahun_pengadaan', $this->input->post('tahun_pengadaan'));
		}
		
		$this->db->where('kode_lokasi',$this->session->userdata('kode_lokasi'));
		$this->db->from('kib_b');
		$query = $this->db->get();
		return $query->result();
	}

	function download_kibc()
	{
		if($this->input->post('tahun_pengadaan'))
		{
			$this->db->where('tahun_pengadaan', $this->input->post('tahun_pengadaan'));
		}
		
		$this->db->where('kode_lokasi',$this->session->userdata('kode_lokasi'));
		$this->db->from('kib_c');
		$query = $this->db->get();
		return $query->result();
	}

	function download_kibd()
	{
		if($this->input->post('tahun_pengadaan'))
		{
			$this->db->where('tahun_pengadaan', $this->input->post('tahun_pengadaan'));
		}
		
		$this->db->where('kode_lokasi',$this->session->userdata('kode_lokasi'));
		$this->db->from('kib_d');
		$query = $this->db->get();
		return $query->result();
	}

	function download_kibe()
	{
		if($this->input->post('tahun_pengadaan'))
		{
			$this->db->where('tahun_pengadaan', $this->input->post('tahun_pengadaan'));
		}
		
		$this->db->where('kode_lokasi',$this->session->userdata('kode_lokasi'));
		$this->db->from('kib_e');
		$query = $this->db->get();
		return $query->result();
	}

	function download_kibf()
	{		
		$this->db->where('kode_lokasi',$this->session->userdata('kode_lokasi'));
		$this->db->from('kib_f');
		$query = $this->db->get();
		return $query->result();
	}

}
