<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

public function login()
	{
		cek_redy_login();
		$data['judul'] = "Login";
		$this->load->view('templates/header', $data);
		$this->load->view('auth/login');
	}

public function proses_login()
	{
		$post = $this->input->post(null, true);
		if(isset($post['login'])){
			$this->load->model('user_model');
			$query = $this->user_model->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$param = array(
					'email' => $row->email,
					'level' => $row->level
				);

				if ($row->status == 1) {
					$this->session->set_userdata($param);
						echo ("<script LANGUAGE='JavaScript'>
	    					window.alert('Login berhasil');
	    					window.location.href='" .base_url('admin'). "';
	   					 </script>");
				}else{
					echo ("<script LANGUAGE='JavaScript'>
    					window.alert('Login gagal Status login anda belum di aktifkan');
    					window.location.href='" .base_url('auth/login'). "';
   					 </script>");
				}

				

			} else{
				echo ("<script LANGUAGE='JavaScript'>
    					window.alert('Login gagal email dan pasword salah');
    					window.location.href='" .base_url('auth/login'). "';
   					 </script>");

			}
		}
	}

public function logut()
	{
		$param = array('email', 'level');
		$this->session->unset_userdata($param);
		redirect('daskboard?tahun=2019');
	}

public function lupa_pasword()
	{
		$this->load->view('templates/header');
		$this->load->view('auth/lupa_pasword');	
		$this->load->view('templates/footer');
	}

}