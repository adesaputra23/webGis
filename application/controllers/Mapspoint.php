<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapspoint extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->model('Wilayah_model');
		$this->load->model('Stunting_model');
		$this->load->model('Desa_model');
		$this->load->model('Tahun_model');
	}


public function index()
	{
		$data['judul'] = "Peta Lokasi";
		$tahun=$this->input->post('tahun');
        $data['hasil'] = $this->Stunting_model->cari_d($tahun)->result();
        $data['detail'] = $this->Stunting_model->getDataByID($tahun)->result();
        $data['tahun'] = $tahun;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/head');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
	    $this->load->view('petapoint/mapView', $data);
		$this->load->view('templates/footer');

	}

public function cari($tahun)
	{
	$data['judul'] = "Peta Lokasi";
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

public function wilayah()
	{
		$data['judul'] = "Peta Lokasi";
		$tahun = $this->input->post('tahun');
		$kode_wilayah = $this->input->post('kec');
		$data['nama_desa'] = $kode_wilayah;
		$data['v_wilayah'] = $this->Wilayah_model->get_kode($kode_wilayah);
		$data['v_desa'] = $this->Desa_model->get_w($kode_wilayah, $tahun);
		$data['v_tampil'] = $this->Stunting_model->cari_i($kode_wilayah)->result();
		$data['v_kec'] = $this->Desa_model->kec($tahun, $kode_wilayah);
		$data['tahun'] = $tahun;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/head');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('petapoint/mapW', $data);
		$this->load->view('petapoint/js/mapW', $data);
		$this->load->view('templates/footer');
		
	}

public function desa($kode_wilayah)
	{
		$data['judul'] = "Peta Lokasi";
		$desa = $this->input->post('desa');
		$tahun = $this->input->post('tahun');
		$data['desa'] = $this->Stunting_model->h($kode_wilayah);
		$data['v_wilayah'] = $this->Wilayah_model->get_kode($kode_wilayah);
		$data['t_desa'] = $this->Desa_model->get_kode($desa);
		$data['v_desa'] = $this->Desa_model->get_w($kode_wilayah);
		$data['v_tanda'] = $this->Desa_model->v_marker($desa, $tahun);
		$data['k_desa'] = $this->Stunting_model->k_desa($desa, $tahun, $kode_wilayah);
		$data['s_desa'] = $this->Stunting_model->s_desa($desa, $tahun, $kode_wilayah);
		$data['tahun'] = $tahun;
		$data['a_desa'] = $desa;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/head');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('petapoint/mapDesa', $data);
		$this->load->view('petapoint/js/mapD', $data);
		$this->load->view('templates/footer');
		
	}

public function test_1()
	{
		$this->db->select('kode_wilayah,ketegori, COUNT(ketegori) as total');
		$this->db->from('tb_stunting'); 
		$this->db->group_by('kode_wilayah'); 
		$this->db->order_by('total', 'desc');
        $this->db->where("ketegori", 'sangat pendek');
        $this->db->where("tahun", 2019);
      $db = $this->db->get();

      foreach ($db->result() as $key => $value) {
      	echo $value->kode_wilayah;
      	echo "<br>";
      	echo $value->ketegori;
      	echo "=";
      	echo $value->total;
      	echo "<br>";
      }
	}

public function test_2()
	{
		$this->db->select('kode_wilayah,tahun, COUNT(tahun) as total');
		$this->db->from('tb_stunting');
		$this->db->group_by('kode_wilayah');
		$this->db->group_by('tahun');
		$this->db->order_by('total', 'desc');
      $db = $this->db->get();

      foreach ($db->result() as $key => $value) {
      	print_r($value->total);
      	echo "<br>";
      	print_r($value->kode_wilayah);
      	echo "<br>";
      	print_r($value->tahun);
      	echo "<br>";
      }
	}

public function cari_d()
    {
        $this->db->select('*');
        $this->db->where("tahun", 2019);
        $this->db->where("alamat",'Ngijo');
        $this->db->where("ketegori",'Pendek');
      	$db = $this->db->get('tb_stunting');

      foreach ($db->result() as $key => $value) {
      	echo $value->nama;
      	echo "<br>";
      }
    }


}