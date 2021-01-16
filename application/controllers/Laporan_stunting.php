<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_stunting extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		// cek_redy_login();
		$this->load->model('Stunting_model');
		$this->load->model('Wilayah_model');
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
		
		
	}

public function laporan()
	{
		$data['judul'] = "Data Wilayah";
		$data['row'] = $this->Wilayah_model->get();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('laporan_stunting/laporan', $data);
		$this->load->view('templates/footer');
		
	}

public function data($kode_wilayah)
	{
		$data['judul'] = "Data Stunting";
		$data['detail'] = $this->Wilayah_model->getDataByID($kode_wilayah);
		$data['pos'] = $this->Wilayah_model->get_kode($kode_wilayah);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('laporan_stunting/lihat', $data);
		$this->load->view('templates/footer');
		
	}

public function stunting_pdf($kode_wilayah)
	{
		if ($tahun = $this->input->get('tahun')) {
		$data['jumlah'] = $this->Stunting_model->data_s($kode_wilayah, $tahun);
		$data['kode'] = $kode_wilayah;
		$data['tahun'] = $tahun;
		$this->load->library('dompdf_gen');
		$data['judul'] = "Cetak Laporan";
		$this->load->view('laporan_stunting/stunting_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($orientation, $paper_size);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan_Stunting.pdf", array('Attachment' =>0));

		}
	}
	

}