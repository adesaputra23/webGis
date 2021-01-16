<?php

Class Fungsi {

	protected $ci;

	function __construct(){
		$this->ci =& get_instance();
	}

	function user_login()
	{
		$this->ci->load->model('user_model');
		$email = $this->ci->session->userdata('email');
		$user_data = $this->ci->user_model->get($email)->row();
		return $user_data;

	}

}