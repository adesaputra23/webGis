<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Wilayah extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		// cek_redy_login();
		$this->load->model('Stunting_model');
		$this->load->model('Wilayah_model');
		$this->load->model('Tahun_model');
	}

public function index()
	{
		$data['judul'] = "Data Wilayah";
		$data['row'] = $this->Wilayah_model->get();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('laporan_data_wilayah/view', $data);
		$this->load->view('templates/footer');
		
	}

public function wilayah_pdf()
	{
		$this->load->library('form_validation');
		if ($tahun = $this->input->get('tahun')) {
		$data['row'] = $this->Wilayah_model->get_a($tahun)->result();
		$data['tahun'] = $this->Tahun_model->get()->result();
		$data['tahun'] = $tahun;
		$this->load->library('dompdf_gen');
		$data['judul'] = "Cetak Data Wilayah";

		$this->load->view('laporan_data_wilayah/laporan_wpdf', $data);
		$this->load->view('chard/chardJs/chardJs', $data);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($orientation, $paper_size);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan_Kecamatan.pdf", array('Attachment' =>0));

		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
											  <strong>Gagal!</strong> Tidak ada data tahun yang di masukan!
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('laporan_wilayah');
		}
						   
	 }

public function prwilayah_pdf($kode_wilayah)
	{
		$data['jumlah'] = $this->Wilayah_model->getDataBykode($kode_wilayah)->result();
		$data['kode'] = $kode_wilayah;

		$this->load->library('dompdf_gen');
		$data['judul'] = "Laporan Wilayah";
		$this->load->view('laporan_data_wilayah/prwilayah_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($orientation, $paper_size);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan_Kecamatan.pdf", array('Attachment' =>0));

	}
	

}