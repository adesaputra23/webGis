<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chard extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		// cek_redy_login();
		$this->load->model('Stunting_model');
		$this->load->model('Wilayah_model');
		$this->load->model('Tahun_model');
		$this->load->model('Desa_model');

	}

public function index()
	{
		// $tahun=$this->input->get('tahun');
  //       $data['detail'] = $this->Stunting_model->getDataByID($tahun)->result();
  //       $data['tahun'] = $tahun;
		$data['judul'] = "Grafik";
		$tahun1=$this->input->get('tahun1');
		$tahun2=$this->input->get('tahun2');
		$data['chard1'] = $this->Desa_model->chard1($tahun1)->result();
		$data['chard2'] = $this->Desa_model->chard2($tahun2)->result();
		$data['name'] = $this->Desa_model->chard1($tahun1,$tahun2)->result();
		$data['pendek'] = $this->Desa_model->kategori_pendek($tahun1)->result();
		$data['s_pendek'] = $this->Desa_model->kategori_s_pendek($tahun1)->result();
		$data['row'] = $this->Wilayah_model->get_a($tahun1,$tahun2)->result();
		$data['tahun'] = $this->Tahun_model->get()->result();
		$data['tahun1'] = $tahun1;
		$data['tahun2'] = $tahun2;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('chard/chard',$data);
		$this->load->view('templates/footer');
		$this->load->view('chard/chardJs/chardJs', $data);
		$this->load->view('chard/chardJs/chard_kategori', $data);
	}

public function pdf()
	{
		$tahun1=$this->input->get('tahun1');
		$tahun2=$this->input->get('tahun2');
        // $data['detail'] = $this->Stunting_model->getDataByID($tahun1)->result();
        // $data['tahun'] = $tahun;
		$data['judul'] = "Cetak Grafik";
		// $tahun=$this->input->get('tahun');
		$data['chard1'] = $this->Desa_model->chard1($tahun1)->result();
		$data['chard2'] = $this->Desa_model->chard2($tahun2)->result();
		$data['name'] = $this->Desa_model->chard2($tahun1,$tahun2)->result();
		$data['pendek'] = $this->Desa_model->kategori_pendek($tahun1)->result();
		$data['s_pendek'] = $this->Desa_model->kategori_s_pendek($tahun1)->result();
		//$data['row'] = $this->Wilayah_model->get_a($tahun)->result();
		$data['tahun'] = $this->Tahun_model->get()->result();
		$data['tahun1'] = $tahun1;
		$data['tahun2'] = $tahun2;
		$this->load->view('chard/pdf',$data);
		$this->load->view('chard/chardJs/chardJs', $data);
		$this->load->view('chard/chardJs/chard_kategori', $data);
	}



	

}