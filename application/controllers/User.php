<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

public function __construct(){
		parent::__construct();
		cek_not_login();
		$this->load->model('user_model');
		$this->load->model('Wilayah_model');
	}

public function data_user()
	{
		// cek_not_login();
		//$this->load->model('user_model');
		$data['judul'] = "Data User";
		$data['row'] = $this->user_model->lihat();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('user/data_user', $data);
		$this->load->view('templates/footer');
	}

public function tambah_data()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[tb_user.email]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('user', 'User name', 'required');
		$this->form_validation->set_rules('pasword', 'Pasword', 'required|min_length[6]');
		$this->form_validation->set_rules('pasword2', 'Konfirmasi password', 'required|min_length[6]|matches[pasword]', array('matches' => '%s salah'));

		$this->form_validation->set_message('required', '%s tidak boleh kosong');
		$this->form_validation->set_message('min_length', '%s minimal 6 karakter');
		$this->form_validation->set_message('is_unique', '%s sudah digunakan');

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = "Tambah Data";
			$data['wilayah'] = $this->Wilayah_model->get();
            $data['row'] = $this->user_model->get();
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar_admin');
			$this->load->view('user/tambah_data', $data);
			$this->load->view('templates/footer');
         }else{
         	$email = $this->input->post("email");
			$username = $this->input->post("user");
			$pasword = $this->input->post("pasword");
			$nama = $this->input->post("nama");
			$puskesmas = $this->input->post("puskesmas");
			$kecamatan = $this->input->post("kecamatan");
			$alamat = $this->input->post("alamat");
			$hp = $this->input->post("hp");
			$level = $this->input->post("level");

			$data = array(
					"nip" =>"",
					"email"=>$email,
					"username"=>$username,
					"pasword"=>sha1($pasword),
					"nama"=>$nama,
					"puskesmas"=>$puskesmas,  
					"kode_wilayah"=>$kecamatan, 
					"alamat"=>$alamat,
					"no_hp"=>$hp,
					"level"=>$level, 

				);

					$config['upload_path']          = './assets/img/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 2080;
	                $config['file_name']             = 'nip';
	                

	                $this->load->library('upload', $config);

			        if ( ! $this->upload->do_upload('gambar'))
			        {
			                $error = array('error' => $this->upload->display_errors());

			                 $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
									  <strong>Gagal!</strong> Data Gagal Ditambahkan
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>');
			               		redirect('user/tambah_data');
			        }
			        else
			        {
			                $upload_data = $this->upload->data();
			                $file_name = $upload_data['file_name'];
			                $data['gambar']=$file_name;
			                if ($this->user_model->insert($data)) {
			               	$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
									  <strong>Suksess!</strong> Data Berhasil Ditambahkan
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>');
			               		redirect('user/data_user');
			                }
			        }
         }
                    
		
	}

public function edit_data($nip)
	{
		// cek_not_login();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nip', 'Nip', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('user', 'User name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

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
                	$query = $this->user_model->detail2($nip);
                	if ($query->num_rows() > 0) {
                		$data['judul'] = "Ubah Data";
                		$data['data'] = $query->row();
                		$data ['row'] = $this->user_model->get();
                		$data['wilayah'] = $this->Wilayah_model->get();
						$this->load->view('templates/header', $data);
						$this->load->view('templates/sidebar');
						$this->load->view('templates/topbar_admin');
						$this->load->view('user/edit_data', $data);
						$this->load->view('templates/footer');
                	}else {
                		echo ("<script LANGUAGE='JavaScript'>
    							window.alert('Data tidak di temukan');
    							window.location.href='" .base_url('user/tambah_data'). "';
   					 			</script>");
                	} 
                }
                else
                {
                    
					$nip = $this->input->post("nip");
					$email = $this->input->post("email");
					$username = $this->input->post("user");
					$pasword = $this->input->post("pasword");
					if ($pasword == null) {
						$pasword = $this->input->post("pas3");
					}

					$nama = $this->input->post("nama");
					$alamat = $this->input->post("alamat");
					$hp = $this->input->post("hp");
					$level = $this->input->post("level");
					$gambar = $this->input->post("gambar");


					$config['upload_path'] = './assets/img/';
				    $config['allowed_types'] = 'gif|jpg|png|jpeg';

				    $this->load->library('upload', $config);

				    if ( ! $this->upload->do_upload('gambar'))
				    {
				        $error = array('error' => $this->upload->display_errors());
				    }
				    else
				    {

				        $upload_data=$this->upload->data();
				        $gambar=$upload_data['file_name'];
				    }

						    $data=array(
						    			"nip"=>$nip,
						    			"email"=>$email,
										"username"=>$username,
										"pasword"=>sha1($pasword),
										"nama"=>$nama, 
										"alamat"=>$alamat,
										"no_hp"=>$hp,
										"level"=>$level,
						    			"gambar"=>$gambar);

					 		if ($this->user_model->update($nip, $data)) {
					               $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Suksess!</strong> Data Berhasil Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('user/data_user');
					           }else{
					           		$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
											  <strong>Gagal!</strong> Data Gagal Diubah
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>');
					               		redirect('user/edit_data');
					           }


						                }

	}

public function detail_data($nip)
	{
		// cek_not_login();
		//$this->load->model('user_model');
		$data['judul'] = "Data User";
		$data['detail'] = $this->user_model->detail($nip);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar_admin');
		$this->load->view('user/detail_data', $data);
		$this->load->view('templates/footer');
	}

public function hapus($nip)
	{
		$data = $this->user_model->detail($nip);
		$nama = './assets/img/'.$data->gambar;

		if(is_readable($nama) && unlink($nama)){
			$delete = $this->user_model->hapus($nip);
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Suksess!</strong> Data Berhasil Dihapus
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('user/data_user'));
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Gagal!</strong> Data Gagal Dihapus
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('user/data_user'));
		}
	}

public function user_pdf()
	{
		$this->load->library('dompdf_gen');
		$data['judul'] = "Cetak Data User";
		$data['row'] = $this->user_model->lihat();
		$this->load->view('user/user_pdf', $data);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($orientation, $paper_size);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Data_User.pdf", array('Attachment' =>0));
	}

public function aktifasi()
	{
		$nip = $_REQUEST['nip'];
		$val = $_REQUEST['val'];
			
		if ($val == 1) {
			$status = 0;
		}else{
			$status = 1;
		}

		$data = array('status'=>$status);
		if ($this->User_model->update($nip, $data)) {
			$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
								  <strong>Suksess!</strong>
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('user/data_user'));
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Gagal!</strong>
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>');
			redirect(base_url('user/data_user'));
		}
	}



}