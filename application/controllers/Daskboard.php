<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daskboard extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		cek_redy_login();
		$this->load->model('Stunting_model');
		$this->load->model('Wilayah_model');
		$this->load->model('Tahun_model');
		$this->load->model('Desa_model');

	}

public function index()
	{
		$tahun=$this->input->post('tahun');
		$kec=$this->input->post('kec');
        $data['detail'] = $this->Stunting_model->getDataByID($tahun)->result();
        $data['row'] = $this->Wilayah_model->get_a($tahun)->result();
		$data['tahun'] = $this->Tahun_model->get()->result();
		$data['kec'] = $this->Wilayah_model->get()->result();
		$data['v_tampil'] = $this->Stunting_model->cari_p($tahun,$kec)->result();
        $data['tahun'] = $tahun;
        $data['v_kec'] = $kec;
		$this->load->view('home/header');
		$this->load->view('templates/head');
		$this->load->view('home/topbar');
		$this->load->view('home/baner');
		$this->load->view('daskboard/home');
		$this->load->view('home/footer');
   		$this->load->view('daskboard/peta/point',$data);
   		$this->load->view('daskboard/chard/chard', $data);
   		$this->load->view('daskboard/peta/standar');
	}

public function standar()
	{	
		$tahun = $this->input->get('tahun');
		$data['v_tampil'] = $this->Stunting_model->cari_d($tahun)->result();
		$data['tahun'] = $tahun;
		$this->load->view('home/header');
		$this->load->view('templates/head');
		$this->load->view('home/topbar');
		$this->load->view('daskboard/template/peta_standar', $data);
		$this->load->view('home/footer');
		$this->load->view('daskboard/peta/standar', $data);
	}

public function lokasi()
	{

		$tahun = $this->input->post('tahun');
		$kode_wilayah = $this->input->post('kec');

		$data['v_tampil'] = $this->Stunting_model->cari_a($tahun)->result();
		
		$this->load->view('home/header');
		$this->load->view('templates/head');
		$this->load->view('home/topbar');
		$this->load->view('daskboard/template/point');
		$this->load->view('home/footer');
		$this->load->view('daskboard/peta/point',$data);
	}

public function wilayah()
	{
		$tahun = $this->input->post('tahun');
		$kode_wilayah = $this->input->post('kec');
		$data['v_wilayah'] = $this->Wilayah_model->get_kode($kode_wilayah);
		$data['v_desa'] = $this->Desa_model->get_w($kode_wilayah);
		$data['v_tampil'] = $this->Stunting_model->cari_i($kode_wilayah)->result();
		$data['v_kec'] = $this->Desa_model->kec($tahun, $kode_wilayah);
		$data['tahun'] = $tahun;
		
		$this->load->view('home/header');
		$this->load->view('templates/head');
		$this->load->view('home/topbar');
		$this->load->view('daskboard/template/wilayah', $data);
		$this->load->view('home/footer');
		$this->load->view('daskboard/peta/wilayah',$data);
	}

public function desa($kode_wilayah)
	{
		$tahun = $this->input->post('tahun');
		$desa = $this->input->post('desa');
		$data['desa'] = $this->Stunting_model->h($kode_wilayah);
		$data['v_wilayah'] = $this->Wilayah_model->get_kode($kode_wilayah);
		$data['t_desa'] = $this->Desa_model->get_kode($desa);
		$data['v_desa'] = $this->Desa_model->get_w($kode_wilayah);
		$data['v_tanda'] = $this->Desa_model->v_marker($desa, $tahun);
		$data['k_desa'] = $this->Stunting_model->k_desa($desa, $tahun, $kode_wilayah);
		$data['s_desa'] = $this->Stunting_model->s_desa($desa, $tahun, $kode_wilayah);
		$data['tahun'] = $tahun;
		$data['m_desa'] = $desa;

		$this->load->view('home/header');
		$this->load->view('templates/head');
		$this->load->view('home/topbar');
		$this->load->view('daskboard/template/desa', $data);
		$this->load->view('home/footer');
		$this->load->view('daskboard/peta/desa',$data);
	}

public function rute()
	{
		$tahun = $this->input->post('tahun');
		$kec = $this->input->post('kec');
		$data['v_tampil'] = $this->Stunting_model->cari_p($tahun,$kec)->result();
		$this->load->view('home/header');
		$this->load->view('templates/head');
		$this->load->view('home/topbar');
		$this->load->view('daskboard/template/rute');
		$this->load->view('daskboard/peta/rute',$data);
		$this->load->view('home/footer');
		
	}

public function grafik()
	{
		$tahun = $this->input->post('tahun');
		$data['tahun'] = $tahun;
		$this->load->view('home/header');
		$this->load->view('templates/head');
		$this->load->view('home/topbar');
		$this->load->view('daskboard/template/grafik', $data);
		$this->load->view('home/footer');
		$this->load->view('daskboard/peta/grafik', $data);
	}



	

}