<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends CI_Controller {

public function __construct()
	{

		parent::__construct();
		$this->load->model('Stunting_model');
		$this->load->model('Wilayah_model');
		$this->load->model('Tahun_model');

	}

public function index()
	{
		$data['judul'] = "Data Tahun";
		$data['tahun'] = $this->Tahun_model->get();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('tahun/view', $data);
		$this->load->view('templates/footer');
	}

public function tambah_data()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');


		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		  if ($this->form_validation->run() == FALSE)
                {
                    $data['judul'] = "Tambah";
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar');
					$this->load->view('templates/topbar_admin');
					$this->load->view('tahun/view');
					$this->load->view('templates/footer');
                }
                else
                {
                    $id = $this->input->post("id");
					$tahun = $this->input->post("tahun");

					$data = array(
							"id"=>$id,
							"tahun"=>$tahun,
						);

						if ($this->Tahun_model->insert($data)) {
							$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Suksess!</strong> Data Berhasil Ditambahkan
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('tahun');
						}else{

							$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Gagal!</strong> Data Gagal Ditambahkan
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('tahun');
						}
			      }

		
	}


  public function ubah($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');


		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		  if ($this->form_validation->run() == FALSE)
                {
                	$data['judul'] = "Ubah Data";
                    $this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar');
					$this->load->view('templates/topbar_admin');
					$this->load->view('tahun/view');
					$this->load->view('templates/footer');
                }
                else
                {
                    $id = $this->input->post("id");
					$tahun = $this->input->post("tahun");

					$data = array(
							"id"=>$id,
							"tahun"=>$tahun,
									);

					 		if ($this->Tahun_model->update($id, $data)) {
					               $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Suksess!</strong> Data Berhasil Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('tahun');z
					           }else{
					           	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Gagal!</strong> Data Gagal Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('tahun');
					           }
					       }
					}


public function hapus($id)
	{
		if($this->Tahun_model->hapus($id)){
		
			$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
								  <strong>Suksess!</strong> Data Berhasil Dihapus
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('tahun'));
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Gagal!</strong> Data Gagal Dihapus
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('tahun'));
		}
	}

public function tahun_pdf()
	{
		$this->load->library('dompdf_gen');
		$data['judul'] = "Cetak Data Tahun";
		$data['row'] = $this->Tahun_model->get()->result();
		$this->load->view('tahun/tahun_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($orientation, $paper_size);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data_Tahun.pdf", array('Attachment' =>0));
	}

public function aktifasi()
	{
		$id = $_REQUEST['id'];
		$val = $_REQUEST['val'];
			
		if ($val == 1) {
			$status = 0;
		}else{
			$status = 1;
		}

		$data = array('status'=>$status);
		if ($this->Tahun_model->update($id, $data)) {
			$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
								  <strong>Suksess!</strong>
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('tahun'));
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Gagal!</strong>
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('tahun'));
		}
	}



}