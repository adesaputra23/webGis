<?php  

function cek_redy_login()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('email');
		if ($user_session) {
			redirect('admin');
		}
	}


function cek_not_login()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('email');
		if (!$user_session) {
			redirect('daskboard');
		}
	}






?>