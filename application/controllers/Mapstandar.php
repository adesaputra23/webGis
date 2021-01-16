<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapstandar extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->model('Wilayah_model');
		$this->load->model('Stunting_model');
	}


public function index()
	{
		$data['judul'] = "Peta Penyebaran";
		$tahun=$this->input->get('tahun');
        $data['hasil'] = $this->Stunting_model->cari_d($tahun)->result();
        $data['detail'] = $this->Stunting_model->getDataByID($tahun)->result();
        $data['tahun'] = $tahun;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/head');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
	    $this->load->view('petastandar/mapView', $data);
	    $this->load->view('petastandar/js/mapJs', $data);
		$this->load->view('templates/footer');

	}

public function cari($tahun)
	{
	$data['judul'] = "Peta Penyebaran";
    $data['detail'] = $this->Wilayah_model->getDataByID($tahun);
    $this->load->view('templates/header', $data);
	$this->load->view('templates/head');
	$this->load->view('templates/sidebar');
	$this->load->view('templates/topbar_admin');
	$this->load->view('petastandar/mapView', $data);
	$this->load->view('templates/footer');
    // var_dump($data);
    // die();
	}


}