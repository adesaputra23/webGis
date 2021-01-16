<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rute extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->model('Wilayah_model');
		$this->load->model('Stunting_model');
	}


public function index()
	{
		
		$tahun=$this->input->post('tahun');
		$kec=$this->input->post('kec');
		$data['judul'] = "Rute";
        $data['hasil'] = $this->Stunting_model->cari_d($tahun)->result();
        $data['detail'] = $this->Stunting_model->getDataByID($tahun)->result();
        $data['v_tampil'] = $this->Stunting_model->cari_p($tahun,$kec)->result();
        $data['kec'] = $this->Wilayah_model->get()->result();
        $data['kode'] = $this->Wilayah_model->get_kode($kec);
        $data['tahun'] = $tahun;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/head');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
	    $this->load->view('rute/mapView', $data);
		$this->load->view('templates/footer');
		$this->load->view('rute/js/mapJs',$data);

	}

	public function cari($tahun)
	{
	$data['judul'] = "Rute";
    $data['detail'] = $this->Wilayah_model->getDataByID($tahun);
    $this->load->view('templates/header', $data);
	$this->load->view('templates/head');
	$this->load->view('templates/sidebar');
	$this->load->view('templates/topbar_admin');
	$this->load->view('petapoint/mapView', $data);
	$this->load->view('templates/footer');
    // var_dump($data);
    // die();
	}


}