<?php
class Pengurus_barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Pengurus_barang_model','pb');

		if($this->session->userdata('tipe_user')!="pengurus barang"){
			redirect('login/index');
		}
  }

	function index()
	{
		$data_nama['nama'] = $this->session->userdata('nama');
		$data_nama['nip'] = $this->session->userdata('nip');
		$data_nama['kodelokasi'] = $this->session->userdata('kode_lokasi');
		$this->load->view('pengurus_barang/header',$data_nama);
		$this->load->view('pengurus_barang/dashboard');
		$this->load->view('pengurus_barang/footer');
	}

	function masukan_kiba()
	{

	}

	function masukan_kibb()
	{
		$data_nama['nama'] = $this->session->userdata('nama');
		$data_nama['nip'] = $this->session->userdata('nip');
		$data_nama['kodelokasi'] = $this->session->userdata('kode_lokasi');
		$this->load->view('pengurus_barang/header',$data_nama);
		$this->load->view('pengurus_barang/masukan/masukan_kibb');
		$this->load->view('pengurus_barang/footer');
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




	function arsip_kiba()
	{
		//bisa aja didelete $data['skpd']=$this->pb->download_kiba();
		$data['all_tahun']=$this->pb->get_list_tahun_kiba();

		$this->load->view('pengurus_barang/header');
		$this->load->view('pengurus_barang/arsip/arsip_kiba',$data);
		$this->load->view('pengurus_barang/footer');
	}
		function view_arsip_kiba()
		{
			$list = $this->pb->get_datatables_kiba();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kiba) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="detail_kiba('."'".$kiba->id_aset."'".')"><i class="glyphicon glyphicon-list"></i> Detail</a>';
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

				$row[] = $kiba->harga;
				$row[] = $kiba->kondisi;
				$row[] = $kiba->keterangan;
				$row[] = $kiba->foto_fisik;
				$row[] = $kiba->kontrak;

				$row[] = $kiba->kode_lokasi;
			
			
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->pb->count_all_kiba(),
							"recordsFiltered" => $this->pb->count_filtered_kiba(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_id_arsip_kiba($idaset)
		{
			$data=$this->pb->get_id_kiba($idaset);
			echo json_encode($data);
		}

	function arsip_kibb()//isinya selection skpd aja..
	{
		$data['skpd']=$this->pb->download_kibb();
		$data['all_tahun']=$this->pb->get_list_tahun_kibb();

		$this->load->view('pengurus_barang/header');
		$this->load->view('pengurus_barang/arsip/arsip_kibb',$data);
		$this->load->view('pengurus_barang/footer');
	}
		function view_arsip_kibb()
		{
			$list = $this->pb->get_datatables_kibb();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibb) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="detail_kibb('."'".$kibb->id_aset."'".')"><i class="glyphicon glyphicon-list"></i> Detail</a>';
				$row[] = $kibb->kode_aset;
				$row[] = $kibb->register;
				$row[] = $kibb->nama_aset;
				$row[] = $kibb->merk;
				$row[] = $kibb->ukuran;
				
				$row[] = $kibb->bahan;
				$row[] = $kibb->tahun_pengadaan;
				$row[] = $kibb->lokasi;
				$row[] = $kibb->pabrik;
				$row[] = $kibb->no_rangka;

				$row[] = $kibb->no_mesin;
				$row[] = $kibb->no_polisi;
				$row[] = $kibb->bpkb;
				$row[] = $kibb->asal_usul;
				$row[] = $kibb->penggunaan;

				$row[] = $kibb->harga;
				$row[] = $kibb->kondisi;			
				$row[] = $kibb->keterangan;
				$row[] = $kibb->kode_lokasi;
				$row[] = $kibb->foto_fisik;
				
				$row[] = $kibb->kontrak;
				$row[] = $kibb->qrcode;

							
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->pb->count_all_kibb(),
							"recordsFiltered" => $this->pb->count_filtered_kibb(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_id_arsip_kibb($idaset)
		{
			$data=$this->pb->get_id_kibb($idaset);
			echo json_encode($data);
		}

	function arsip_kibc()
	{
		$data['skpd']=$this->pb->download_kibc();
		$data['all_tahun']=$this->pb->get_list_tahun_kibc();

		$this->load->view('pengurus_barang/header');
		$this->load->view('pengurus_barang/arsip/arsip_kibc',$data);
		$this->load->view('pengurus_barang/footer');
	}

		function view_arsip_kibc()
		{
			$list = $this->pb->get_datatables_kibc();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibc) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="detail_kibc('."'".$kibc->id_aset."'".')"><i class="glyphicon glyphicon-list"></i> Detail</a>';
				$row[] = $kibc->nama_aset;
				$row[] = $kibc->kode_aset;
				$row[] = $kibc->register;
				$row[] = $kibc->kondisi;
				$row[] = $kibc->bertingkat;
				
				$row[] = $kibc->beton_tidak;
				$row[] = $kibc->luas_lantai;
				$row[] = $kibc->tahun_pengadaan;
				$row[] = $kibc->alamat;
				$row[] = $kibc->nomor_dokumen_gedung;

				$row[] = $kibc->tanggal_dokumen;
				$row[] = $kibc->status_tanah;
				$row[] = $kibc->nomor_kode_tanah;
				$row[] = $kibc->luas_tanah;
				$row[] = $kibc->asal_usul;

				$row[] = $kibc->harga;			
				$row[] = $kibc->keterangan;
				$row[] = $kibc->foto_fisik;
				$row[] = $kibc->kontrak;
				$row[] = $kibc->kode_lokasi;

							
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->pb->count_all_kibc(),
							"recordsFiltered" => $this->pb->count_filtered_kibc(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_id_arsip_kibc($idaset)
		{
			$data=$this->pb->get_id_kibc($idaset);
			echo json_encode($data);
		}

	function arsip_kibd()
	{
		$data['skpd']=$this->pb->download_kibd();
		$data['all_tahun']=$this->pb->get_list_tahun_kibd();

		$this->load->view('pengurus_barang/header');
		$this->load->view('pengurus_barang/arsip/arsip_kibd',$data);
		$this->load->view('pengurus_barang/footer');
	}

		function view_arsip_kibd()
		{
			$list = $this->pb->get_datatables_kibd();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibd) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="detail_kibd('."'".$kibd->id_aset."'".')"><i class="glyphicon glyphicon-list"></i> Detail</a>';
				$row[] = $kibd->nama_aset;
				$row[] = $kibd->kode_aset;
				$row[] = $kibd->register;
				$row[] = $kibd->konstruksi;
				$row[] = $kibd->panjang;
				
				$row[] = $kibd->lebar;
				$row[] = $kibd->luas;
				$row[] = $kibd->alamat;
				$row[] = $kibd->tahun_pengadaan;
				$row[] = $kibd->tanggal_dokumen;
				
				$row[] = $kibd->nomor_dokumen;
				$row[] = $kibd->status_tanah;
				$row[] = $kibd->nomor_kode_tanah;
				$row[] = $kibd->asal_usul;
				$row[] = $kibd->harga;

				$row[] = $kibd->kondisi;			
				$row[] = $kibd->keterangan;
				$row[] = $kibd->foto_fisik;
				$row[] = $kibd->kontrak;
				$row[] = $kibd->kode_lokasi;

							
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->pb->count_all_kibd(),
							"recordsFiltered" => $this->pb->count_filtered_kibd(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_id_arsip_kibd($idaset)
		{
			$data=$this->pb->get_id_kibd($idaset);
			echo json_encode($data);
		}

	function arsip_kibe()
	{
		$data['skpd']=$this->pb->download_kibe();
		$data['all_tahun']=$this->pb->get_list_tahun_kibe();

		$this->load->view('pengurus_barang/header');
		$this->load->view('pengurus_barang/arsip/arsip_kibe',$data);
		$this->load->view('pengurus_barang/footer');
	}

		function view_arsip_kibe()
		{
			$list = $this->pb->get_datatables_kibe();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibe) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="detail_kibe('."'".$kibe->id_aset."'".')"><i class="glyphicon glyphicon-list"></i> Detail</a>';
				$row[] = $kibe->nama_aset;
				$row[] = $kibe->kode_aset;
				$row[] = $kibe->register;
				$row[] = $kibe->judul_buku;
				$row[] = $kibe->spesifikasi_buku;
				
				$row[] = $kibe->tahun_pengadaan;
				$row[] = $kibe->nomor_dokumen;
				$row[] = $kibe->tanggal_dokumen;
				$row[] = $kibe->asal_usul;
				$row[] = $kibe->harga;

				$row[] = $kibe->kondisi;			
				$row[] = $kibe->keterangan;
				$row[] = $kibe->foto_fisik;
				$row[] = $kibe->kontrak;
				$row[] = $kibe->kode_lokasi;

							
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->pb->count_all_kibe(),
							"recordsFiltered" => $this->pb->count_filtered_kibe(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_id_arsip_kibe($idaset)
		{
			$data=$this->pb->get_id_kibe($idaset);
			echo json_encode($data);
		}

	function arsip_kibf()
	{
		$data['skpd']=$this->pb->download_kibf();
		$data['all_tahun']=$this->pb->get_list_tahun_kibf();

		$this->load->view('pengurus_barang/header');
		$this->load->view('pengurus_barang/arsip/arsip_kibf',$data);
		$this->load->view('pengurus_barang/footer');
	}

		function view_arsip_kibf()
		{
			$list = $this->pb->get_datatables_kibf();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $kibf) {
				$no++;
				$row = array();
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="detail_kibf('."'".$kibf->id_aset."'".')"><i class="glyphicon glyphicon-list"></i> Detail</a>';
				$row[] = $kibf->nama_aset;
				$row[] = $kibf->kode_aset;
				$row[] = $kibf->bangunan;
				$row[] = $kibf->bertingkat_tidak;
				$row[] = $kibf->beton_tidak;
				
				$row[] = $kibf->luas;
				$row[] = $kibf->alamat;
				$row[] = $kibf->tanggal_dokumen;
				$row[] = $kibf->nomor_dokumen;
				$row[] = $kibf->tahun_bulan_mulai;

				$row[] = $kibf->nomor_kode_tanah;
				$row[] = $kibf->nilai_kontrak;
				$row[] = $kibf->asal_usul_pembiayaan;
				$row[] = $kibf->status_tanah;			
				$row[] = $kibf->keterangan;

				$row[] = $kibf->foto_fisik;
				$row[] = $kibf->kontrak;
				$row[] = $kibf->kode_lokasi;

							
				$data[] = $row;
			}

			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->pb->count_all_kibf(),
							"recordsFiltered" => $this->pb->count_filtered_kibf(),
							"data" => $data,
			);
			echo json_encode($output);
		}

		function view_id_arsip_kibf($idaset)
		{
			$data=$this->pb->get_id_kibf($idaset);
			echo json_encode($data);
		}




	function export_kiba()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Gunawan-A')
					 ->setLastModifiedBy('Gunawan-B')
					 ->setTitle("Gunawaw-C")
					 ->setSubject("Gunawan-D")
					 ->setDescription("Gunawan-E")
					 ->setKeywords("Gunawan-F");
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
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "PEMBUKUAN ASET PEMERINTAH"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:Y1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Aset"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Kode Aset"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Register"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Luas"); // Set kolom E3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$list = $this->pb->download_kiba();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($list as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->kode_aset );
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->register);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->luas);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Kib A Pembukuan Aset");
		$excel->setActiveSheetIndex(0);

		date_default_timezone_set('Asia/Jakarta');
		$filename="Pembukuan Aset".date("d-m-Y H:i:s").".xlsx";

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
		$excel->getProperties()->setCreator('Gunawan-A')
					 ->setLastModifiedBy('Gunawan-B')
					 ->setTitle("Gunawaw-C")
					 ->setSubject("Gunawan-D")
					 ->setDescription("Gunawan-E")
					 ->setKeywords("Gunawan-F");
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
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "PEMBUKUAN ASET PEMERINTAH"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:Y1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Kode Aset"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Register"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Nama Aset"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Merk"); // Set kolom E3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$list = $this->pb->download_kibb();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($list as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->kode_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->register);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->merk);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Kib B Pembukuan Aset");
		$excel->setActiveSheetIndex(0);

		date_default_timezone_set('Asia/Jakarta');
		$filename="Pembukuan Aset".date("d-m-Y H:i:s").".xlsx";

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
		$excel->getProperties()->setCreator('Gunawan-A')
					 ->setLastModifiedBy('Gunawan-B')
					 ->setTitle("Gunawaw-C")
					 ->setSubject("Gunawan-D")
					 ->setDescription("Gunawan-E")
					 ->setKeywords("Gunawan-F");
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
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "PEMBUKUAN ASET PEMERINTAH"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:Y1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Aset"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Kode Aset"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Register"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Kondisi"); // Set kolom E3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$list = $this->pb->download_kibc();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($list as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->kode_aset );
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->register);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->kondisi);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Kib C Pembukuan Aset");
		$excel->setActiveSheetIndex(0);

		date_default_timezone_set('Asia/Jakarta');
		$filename="Pembukuan Aset".date("d-m-Y H:i:s").".xlsx";

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
		$excel->getProperties()->setCreator('Gunawan-A')
					 ->setLastModifiedBy('Gunawan-B')
					 ->setTitle("Gunawaw-C")
					 ->setSubject("Gunawan-D")
					 ->setDescription("Gunawan-E")
					 ->setKeywords("Gunawan-F");
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
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "PEMBUKUAN ASET PEMERINTAH"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:Y1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Aset"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Kode Aset"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Register"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Konstruksi"); // Set kolom E3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$list = $this->pb->download_kibd();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($list as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->kode_aset );
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->register);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->konstruksi);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Kib D Pembukuan Aset");
		$excel->setActiveSheetIndex(0);

		date_default_timezone_set('Asia/Jakarta');
		$filename="Pembukuan Aset".date("d-m-Y H:i:s").".xlsx";

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
		$excel->getProperties()->setCreator('Gunawan-A')
					 ->setLastModifiedBy('Gunawan-B')
					 ->setTitle("Gunawaw-C")
					 ->setSubject("Gunawan-D")
					 ->setDescription("Gunawan-E")
					 ->setKeywords("Gunawan-F");
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
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "PEMBUKUAN ASET PEMERINTAH"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:Y1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Aset"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Kode Aset"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Register"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Judul Buku"); // Set kolom E3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$list = $this->pb->download_kibe();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($list as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->kode_aset );
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->register);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->judul_buku);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Kib E Pembukuan Aset");
		$excel->setActiveSheetIndex(0);

		date_default_timezone_set('Asia/Jakarta');
		$filename="Pembukuan Aset".date("d-m-Y H:i:s").".xlsx";

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
		$excel->getProperties()->setCreator('Gunawan-A')
					 ->setLastModifiedBy('Gunawan-B')
					 ->setTitle("Gunawaw-C")
					 ->setSubject("Gunawan-D")
					 ->setDescription("Gunawan-E")
					 ->setKeywords("Gunawan-F");
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
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "PEMBUKUAN ASET PEMERINTAH"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:Y1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Aset"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Kode Aset"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Bangunan"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Bertingkat Tidak"); // Set kolom E3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$list = $this->pb->download_kibf();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($list as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_aset);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->kode_aset );
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->bangunan);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->bertingkat_tidak);
		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Kib F Pembukuan Aset");
		$excel->setActiveSheetIndex(0);

		date_default_timezone_set('Asia/Jakarta');
		$filename="Pembukuan Aset".date("d-m-Y H:i:s").".xlsx";

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$filename.'"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

}//end controller
?>
