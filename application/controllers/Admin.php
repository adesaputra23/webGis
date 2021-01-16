<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

public function __construct()
	{

		parent::__construct();
		$this->load->model('Stunting_model');
		$this->load->model('Wilayah_model');
		$this->load->model('User_model');

	}

public function index()
	{
		$data['wilayah'] = $this->Wilayah_model->hitungJumlah();
		$data['stunting'] = $this->Stunting_model->hitungJumlah();
		$data['user'] = $this->User_model->hitungJumlah();
		$data['judul'] = "Dashboard";
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

public function profil()
	{
		$data['judul'] = "Profil";
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('profil/profil');
		$this->load->view('templates/footer');
	}

public function ubah()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nip', 'Nip', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('puskesmas', 'Puskesmas', 'required');
		$this->form_validation->set_rules('user', 'User name', 'required');

		if ($this->input->post('pasword')) {
			$this->form_validation->set_rules('pasword', 'Pasword', 'required|min_length[6]');
			$this->form_validation->set_rules('pasword2', 'Konfirmasi password', 'required|min_length[6]|matches[pasword]', array('matches' => '%s salah'));
		}

		if ($this->input->post('pasword2')) {
			$this->form_validation->set_rules('pasword2', 'Konfirmasi password', 'required|min_length[6]|matches[pasword]', array('matches' => '%s salah'));
		}
		

		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('min_length', '%s minimal 6 karakter');


		if ($this->form_validation->run() == FALSE)
                {
                		$data['judul'] = "Ubah Profil";
                		$data ['row'] = $this->User_model->get();
                		$data['wilayah'] = $this->Wilayah_model->get();
						$this->load->view('templates/header',$data);
						$this->load->view('templates/sidebar');
						$this->load->view('templates/topbar_admin');
						$this->load->view('profil/ubah', $data);
						$this->load->view('templates/footer');
                	}
                else
                {
                    
					echo "gagal tampil";
						
					}

		}
}